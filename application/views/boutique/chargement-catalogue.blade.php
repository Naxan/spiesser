
@if ($articles != null)
	<form id="formulaire-ajout-article">
		<div id="titre-catalogue-actif"> Catalogue {{$categorie->categorie}}</div>
		<div id="help-catalogue-actif"> (Tournez les pages en passant la souris sur les bords du catalogue ou en utilisant les touches fléchés de votre clavier) </div>
		<div id="catalogue-charcuterie" class="catalogue">


             <!-- TRAITEMENT POUR CATALOGUE SPECIAL-->
                @if ($categorie->presentation_speciale)
                    <div id="presentation-categorie-page1" class="presentation-categorie">
                        <?php
                            $src_img = '../img/boutique/cat-'.$categorie->id.'/presentation.jpg';
                            $default_img = '../img/boutique/photo-en-cours.jpg';
                        ?>
                        {{$categorie->texte_presentation}}
                        <div id="presentation-categorie-image">
                            <a href="{{$src_img}}" onclick="return(false)">
                                <img class="presentation-img" src="{{$src_img}}" alt="{{$categorie->categorie}}" onError="this.src='{{$default_img}}'"/>
                            </a>
                            <img class="recette-img" src="../img/boutique/icon-recette.png" alt="Télecharger le conseil cuisine"/>
                            <?php
                                $conseil = "./img/boutique/cat-".$categorie->id."/conseils.docx";
                                if (!file_exists($conseil)) {
                                    $conseil = "./img/boutique/cat-".$categorie->id."/conseils.jpg";
                                }
                            ?>
                            <a class="telecharger-recette" href="{{$conseil}}"> Télecharger les conseils <b> cuisine </b> ou <b> documentation </b> </a>
                        </div>
                    </div>
                @endif




			    {{$nbArticles = 0}}
                @foreach ($articles as $article)
                    @if ($nbArticles % 4 == 0)
                        <div>
                    @endif


                        <?php
                            $src_img = '../img/boutique/cat-'.$categorie->id.'/article-'.$article->code_article.'.jpg';
                            $default_img = '../img/boutique/photo-en-cours.jpg';
                            $indication_vente_liste = explode("|", $article->indication_vente_liste);
                        ?>
                        <div id="nouvel-article">
                            <a href="{{$src_img}}" onclick="return(false)" class="preview"> <img class="article-img" src="{{$src_img}}" alt="{{$article->article}}" onError="this.src='{{$default_img}}'"/> </a>
                            <div id="article-details">
                                <div id="article-titre"> {{$article->article}} </div>
                                <div id="article-alsacien"> "{{$article->article_alsacien}}" </div>
                                <div id="article-description"> {{$article->description}} </div>
                                <div id="article-indication"> {{$article->indication_vente}} </div>
                            </div>
                            <div id="ajout-suppression-article">
                                <div id="ajout-article">
                                    <select id="action-article-{{$article->id}}">
                                        <option value="ajouter"> Ajouter </option>
                                        <option value="supprimer"> Supprimer </option>
                                    </select>


                                    @if ($indication_vente_liste[0] == 'KG')
                                        <input id="nb-articles-{{$article->id}}" name="value" class="nb-articles gramme" />
                                    @else
                                        <input id="nb-articles-{{$article->id}}" name="value" class="nb-articles unite" />
                                    @endif


                                     <!--
                                    @if ($indication_vente_liste[0] == "tranche(s) fine(s)" || $indication_vente_liste[0] == "tranches fines" || $indication_vente_liste[0] == "pièce(s)" || $indication_vente_liste[0] == "demi-lune" ||  $indication_vente_liste[0] == "paire(s)" || $indication_vente_liste[0] == "paquet(s)" ||  $indication_vente_liste[0] == "tranche(s)" || $indication_vente_liste[0] == "quenelle(s)" || $indication_vente_liste[0] == "KG" || $indication_vente_liste[0] == "portion(s)" || $indication_vente_liste[0] == "centimètre(s)" || $indication_vente_liste[0] == "portion(s) en vrac" || $indication_vente_liste[0] == "barquette(s)" || $indication_vente_liste[0] == "filet(s)" || $indication_vente_liste[0] == "demi-pièce(s)" || $indication_vente_liste[0] == "poche(s)" )
                                        <span id="indication-article-portion-{{$article->id}}" class="indication-article-portion"> </span>
                                    @else
                                        <span id="indication-article-portion-{{$article->id}}" class="indication-article-portion"> Kg </span>
                                    @endif
                                   <input id="nb-articles-{{$article->id}}" class="nb-articles" type="text" size="2" value="1" style="width:80px;"/>
                                    <select id="indication-article-{{$article->id}}" class="indication-article">
                                        @foreach ($indication_vente_liste as $type_vente)
                                            <option value="{{$type_vente}}"> {{$type_vente}} </option>
                                        @endforeach
                                    </select>
                                    -->
                                    <span id="indication_vente_portion"> {{$indication_vente_liste[0]}} </span>
                                    <button type="submit" class="article-a-ajouter" value="{{$article->id}}"> Valider </button>
                                    <span id="indication_prix"> ({{$article->indication_prix}} le kilo)</span>
                                </div>
                            </div>
                        </div>
                    <?php $nbArticles++ ?>
                    @if ($nbArticles % 4 == 0)
                        </div>
                    @endif
                @endforeach
                @if (!$nbArticles % 4 == 0)
                    </div>
                @endif

        </div>
		<div class="close-catalogue"> <a href="../panier"> Afficher le panier </a> </div>
		<div class="close-catalogue"> <a href="#" onclick="initPanier()"> Supprimer tous les éléments du panier </a> </div>
		<div class="close-catalogue"> <a href="#" onclick="closeCatalogue()"> Fermer le catalogue </a> </div>
	</form>
@endif
