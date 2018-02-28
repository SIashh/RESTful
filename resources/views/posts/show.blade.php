<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<p>Nom : {!! $post->nom!!}</p>
	<p>Domaine : {!! $post->domaine!!}</p>
	<p>Niveau d'étude : {!! $post->niveauetude!!}</p>
	<p>Date de début de stage : {!! $post->datedebut!!}</p>
	<p>Durée : {!! $post->duree!!}</p>
	<p>Lien : {!! $post->lien!!}</p>
	<a href=" {{ URL::route('posts.index')}}">Retour à la base de données</a>
</body>
</html>