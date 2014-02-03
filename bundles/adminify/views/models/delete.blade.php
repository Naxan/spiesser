<div class="well well-white main-cont">

<div class="page-header">
	<h2>Delete {{$model}}</h2>
</div>

<p class="lead">Etes-vous sûr de vouloir supprimer cet élément ?</p>

<p class="lead"><strong>Cette action est irréversible !</strong></p>

{{Form::open(null, 'DELETE')}}

<div class="form-actions">
	{{Form::submit('Oui ! Supprimer l\'élément '.$model, array('class' => 'btn btn-danger'))}}
</div>

{{Form::token()}}
{{Form::close()}}

</div>