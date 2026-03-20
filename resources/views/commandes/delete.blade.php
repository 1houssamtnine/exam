<form method="POST" action="{{ route('commandes.destroy',$commande->id) }}">
@csrf
@method('DELETE')
<button>Supprimer</button>
</form>