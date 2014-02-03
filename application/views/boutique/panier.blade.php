@layout('layouts.global')

<!--  PANIER -->

@section('sous-menu')
	<br/> <br/>
@endsection

@section('content')
		<h1> Mon panier </h1>
		<div id="global-panier"> 
			@include('boutique.chargement-panier')
		</div>
@endsection

@section('js-files')

@endsection