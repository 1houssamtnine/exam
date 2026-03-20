<form method="POST" action="{{ route('commandes.update',$commande->id) }}">
@csrf
@method('PUT')

<select name="client_id">
@foreach($clients as $client)
<option value="{{ $client->id }}" 
{{ $client->id == $commande->client_id ? 'selected' : '' }}>
{{ $client->nom }}
</option>
@endforeach
</select>

<input type="date" name="date" value="{{ $commande->date }}">

<button type="submit">Modifier</button>
</form>