<h1>Stats</h1>

<h2>Commandes par client</h2>
@foreach($parClient as $c)
<p>Client {{ $c->client_id }} : {{ $c->total }}</p>
@endforeach

<h2>CA par produit</h2>
@foreach($parProduit as $p)
<p>{{ $p->nom }} : {{ $p->total }}</p>
@endforeach