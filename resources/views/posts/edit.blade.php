{!! Form::model(
	$post, [
		'method' => $post->id ? 'PUT' : 'POST', 
		'route' => 
			$post-> id ? ['posts.update', $post->id] : 'posts.store'
	]
)!!}

	{!!	Form::text('nom')	!!}

	@if($errors->has('nom')) 
		{!! $errors->first('nom')!!}
	@endif

	{!!	Form::text('domaine')	!!}

	@if($errors->has('domaine')) 
		{!! $errors->first('domaine')!!}
	@endif

	{!!	Form::text('niveauetude')	!!}

	@if($errors->has('niveauetude')) 
		{!! $errors->first('niveauetude')!!}
	@endif

	{!!	Form::text('datedebut')	!!}

	@if($errors->has('datedebut')) 
		{!! $errors->first('datedebut')!!}
	@endif

	{!!	Form::text('duree')	!!}

	@if($errors->has('duree')) 
		{!! $errors->first('duree')!!}
	@endif

	{!!	Form::text('lien')	!!}

	@if($errors->has('lien')) 
		{!! $errors->first('lien')!!}
	@endif

	<button type="submit">Sauvegarder</button>

{!! 
	Form::close()
!!}