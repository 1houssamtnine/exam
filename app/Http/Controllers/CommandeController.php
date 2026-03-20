<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\commandes;
use app\Models\clients;
use app\Models\produits;
use app\Models\details_commandes;
use Illuminate\Support\Facades\DB;
use App\Events\CommandeUpdated;

class CommandeController extends Controller
{
    public function index()
    {
    $commandes = Commandes::with('client','details.produit')->paginate(10);
    return view('commandes.index', compact('commandes'));
    }

    public function create()
    {
        $clients = Clients::all();
        return view('commandes.create', compact('clients'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'client_id' => 'required',
            'date' => 'required'
        ]);

        Commandes::create($request->all());

        return redirect()->route('commandes.index');
    }

    public function edit($id)
    {
        $commande = Commandes::findOrFail($id);
        $clients = Clients::all();
        return view('commandes.edit', compact('commande','clients'));
    }

    public function destroy($id)
    {
        Commandes::destroy($id);
        return redirect()->route('commandes.index');
    }

    public function show($id)
    {
    $commande = Commandes::with('details.produit')->findOrFail($id);
    $produits = Produits::all();

    return view('commandes.show', compact('commande','produits'));
    } 

    public function addProduit(Request $request, $id)
    {
    Details_Commandes::create([
        'commande_id' => $id,
        'produit_id' => $request->produit_id,
        'quantite' => $request->quantite
    ]);

    return back();
    }

    

    public function stats()
    {
    $parClient = DB::table('commandes')
        ->select('client_id', DB::raw('count(*) as total'))
        ->groupBy('client_id')
        ->get();

    $parProduit = DB::table('details_commandes')
        ->join('produits','produits.id','=','details_commandes.produit_id')
        ->select('produits.nom', DB::raw('SUM(produits.prix * quantite) as total'))
        ->groupBy('produits.nom')
        ->get();

    return view('commandes.stats', compact('parClient','parProduit'));
    }

    

   public function update(Request $request, $id)
   {
    $commande = Commandes::findOrFail($id);
    $commande->update($request->all());

    event(new CommandeUpdated($commande));

    return redirect()->route('commandes.index');
   }

    
}