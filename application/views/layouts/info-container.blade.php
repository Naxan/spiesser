<?php
/*
|--------------------------------------------------------------------------
| Info Container Layout
|--------------------------------------------------------------------------
|
|	Gestion du container présentant les
|
*/
?>
	
	<ul id="ticker"> 
		<?php $i=0; ?>
		@foreach($infos as $info)
			<li class="ticker-info"> 
				<div id="open-quote-info" class="quote-info"> </div>
					{{$info->information}} 
				<div id="close-quote-info" class="quote-info"> </div>
			</li>
			<?php $i++; ?>
		@endforeach

	</ul>