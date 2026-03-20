<form method="POST" action="{{ route('commandes.store') }}">
@csrf

<select name="client_id">
@foreach($clients as $client)
<option value="{{ $client->id }}">{{ $client->nom }}</option>
@endforeach
</select>

<input type="date" name="date">

<button type="submit">Ajouter</button>
</form>