<h1>Détails Commande</h1>

@foreach($commande->details as $detail)
<p>{{ $detail->produit->nom }} - {{ $detail->quantite }}</p>
@endforeach

<h2>Ajouter produit</h2>

<form method="POST" action="{{ route('commandes.addProduit',$commande->id) }}">
@csrf

<select name="produit_id">
@foreach($produits as $produit)
<option value="{{ $produit->id }}">{{ $produit->nom }}</option>
@endforeach
</select>

<input type="number" name="quantite">

<button>Ajouter</button>
</form>