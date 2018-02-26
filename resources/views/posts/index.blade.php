<!DOCTYPE html>
<html>
<head>
	<title>Les Offres</title>
</head>
<body>
	<a href=" {{ URL::route('posts.create')}}">Créer une offre</a>
	<ul>
		@foreach ($posts as $post)
		 	<li>
		 		{{ $post->nom}}
		 		<a href=" {{ URL::route('posts.show', $post->id)}}">Show</a>
		 		<a href=" {{ URL::route('posts.edit', $post->id)}}">Editer</a>
		 		{{ Form::open([
		 			'route' => ['posts.destroy', $post->id], 
		 			'method' => 'delete'
		 		]) }}
				    <button type="submit" >Supprimer</button>
				{{ Form::close() }}
		 	</li>
		@endforeach
	</ul>
</body>
</html>