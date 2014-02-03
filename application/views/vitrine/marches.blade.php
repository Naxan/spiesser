@layout('layouts.global')

<!--  MARCHES -->

@section('sous-menu')
	<br/> <br/>
@endsection

@section('content')

	<h1> Les marchés </h1>
	<div class="clear"> </div>


	<table class="planning-marches" border="1">
		<thead> 
			<th> </th>
			<th> Neudorf </th>
			<th> Strasbourg - Place Broglie </th>
			<th> La Robertsau </th>
		</thead>

		<tbody> 
			<tr> 
				<th> Mardi </th>
				<td> De 6h à 12h </td>
				<td> </td>
				<td> </td>
			</tr>
			<tr> 
				<th> Mercredi </th>
				<td> </td>
				<td> De 6h à 16h </td>
				<td> </td>
			</tr>
			<tr> 
				<th> Jeudi </th>
				<td> </td>
				<td> </td>
				<td> De 6h à 13h </td>
			</tr>
			<tr> 
				<th> Vendredi </th>
				<td> </td>
				<td> De 6h à 16h </td>
				<td> </td>
			</tr>
			<tr> 
				<th> Samedi </th>
				<td> De 6h30 à 12h30 </td>
				<td> </td>
				<td> De 6h30 à 12h30</td>
			</tr>
		</tbody>
	</table>

	<div class="clear"> </div>


	<div class="photos">
		<div class="photo flash"> 
			<div class="lbl-photos"> 
				Place Broglie <br/>
				<a href="http://goo.gl/maps/SmyVo"> Voir la géolocalisation du marché </a>
			</div>
				<img class="img-photos" alt="Broglie" src="../img/marches/broglie.png"/>
		</div>

		<!--
		<div class="photo flash"> 
			<div class="lbl-photos"> 
				Illkirch  <br/>
				<a href="http://goo.gl/maps/DZdxN"> Voir la géolocalisation du marché </a>
			</div>
				<img class="img-photos" alt="Illkirch" src="../img/marches/illkirch.jpg"/>
		</div>
		-->


		<div class="photo flash"> 
			<div class="lbl-photos"> 
				Neudorf<br/>
				<a href="http://goo.gl/maps/2liKV"> Voir la géolocalisation du marché </a>
			</div>
				<img class="img-photos" alt="Neudorf" src="../img/marches/neudorf.png"/>
		</div>

		<div class="photo flash"> 
			<div class="lbl-photos"> 
				La Robertsau <br/>
				<a href="http://goo.gl/maps/uZHZU"> Voir la géolocalisation du marché </a>
			</div>
				<img class="img-photos" alt="La Robertsau" src="../img/marches/robertsau.png"/>
		</div>

	</div>

@endsection
