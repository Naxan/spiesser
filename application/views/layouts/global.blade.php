<?php
/*
|--------------------------------------------------------------------------
| Default Layout
|--------------------------------------------------------------------------
|
|	Structure principal du site 
| Nécéssaire lors de chaque chargement de page
|
*/
?>

<!doctype html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	<title>Boucherie-Charcuterie-Traiteur Spiesser</title>
	<meta name="viewport" content="width=device-width">
	<meta name="keywords" content="Boucherie charcuterie traiteur spiesser christine holtzheim">
	<meta name="robots" content="index, follow">
	<link rel="shortcut icon" href="../img/favicon.ico">
	<link rel="stylesheet" href="css/knacss.css" media="all">
	<link rel="stylesheet" href="css/dropdown.css">
	<link href="js/booklet/jquery.booklet.latest.css" type="text/css" rel="stylesheet" media="screen, projection, tv" />
	<link href="js/impromptu/impromptu.css" type="text/css" rel="stylesheet" media="screen, projection, tv" />
	<!-- <link rel="stylesheet/less" type="text/css" href="less/global.less"> -->
	<link rel="stylesheet" href="less/global.css">
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css">
	
	{{-- Head Javascript Files --}}
	{{ HTML::script("js/less.js") }}
	{{ HTML::script("js/jquery.js") }}
	{{ HTML::script("js/ticker.js") }}
	{{ HTML::script('js/info-container.js') }}
	{{ HTML::script("js/mail-contact.js") }}
	{{ HTML::script("js/impromptu/impromptu.js")}}
	{{ HTML::script("js/ckeditor/ckeditor.js")}}
	<script type="text/javascript">

	  var _gaq = _gaq || [];
	  _gaq.push(['_setAccount', 'UA-38162536-1']);
	  _gaq.push(['_trackPageview']);

	  (function() {
	    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
	    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
	    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	  })();

	</script>
	
</head>
<body>
	<div class="chargement"> <img src="img/boutique/loading2.gif"/> Veuillez patienter </div>
	<div id="all-but-footer">
		<div id="header"> 
			<div id="header-logo"> <img id="header-logo-img" src="./img/header/header-logo.png"/>  </div>
			<div id="header-title"> Chez Christine : Tradition et Innovation au Féminin </div>
			<?php
				/* Ancien lien pour s'inscrire à la newsletter  
				<div id="header-inscription-newsletter"> <a href="#" onclick="showInscriptionNewsletter()"> Lettre d'informations </a> </div>  
				<div id="header-inscription-newsletter-clicked"> 
					<form id="inscription-newsletter" action="../inscription-newsletter" method="post">
						<input id="input-mail-newsletter" name="mail" type="text" placeholder="Entrez votre adresse mail"/>
						<input type="submit" value="S'abonner"/>
					</form>
				</div>  
				*/
			?>
			<div id="header-promotions"> <a href="../boutique"> Commandez en ligne !! </a> </div>
		</div>
		
		@include('layouts.menu')

		@if (!empty($infos)) 
		<div id="info-container">
			@include('layouts.info-container')
		</div>
		@endif

		<div id="content">
			@yield('content')
		</div>
	</div>

	<div id="footer"> 
		@include('layouts.footer')
	</div>

	@yield('js-files')
	{{ HTML::script('js/lettre-information.js') }}
	{{ HTML::script("js/mail-contact.js") }}
</body>
</html>
