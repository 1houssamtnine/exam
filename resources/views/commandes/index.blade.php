@foreach($commandes as $commande)
    <h3>Client: {{ optional($commande->client)->nom ?? 'Client inconnu' }}</h3>
    <p>Date: {{ $commande->date }}</p>

    <ul>
    @foreach($commande->details as $detail)
        <li>
            {{ optional($detail->produit)->nom ?? 'Produit supprimé' }} - Qte: {{ $detail->quantite }}
        </li>
    @endforeach
    </ul>
@endforeach

{{ $commandes->links() }}