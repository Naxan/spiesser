<?php
	class LstCategorie {

	    // Liste des Produits
	    var $lst_categorie;
	    var $separateur = ";";


	    function LstCategorie() {
	        $categorie = "null";
	        $id_categorie = 0;
			$ligne = 0;
			$produits = new Produits();
			if (($handle = fopen("public/fichiers/produits.csv", "r")) !== FALSE) {
			    while (($data = fgetcsv($handle, 1000, $this->separateur)) !== FALSE) {
			    	$categorie;
			    	$nom;
			    	$portion;
			    	$prix;
			    	$curseur = 0;
			    	$data = $this->remove_empty_data($data);
			   		$num = count($data);
			        if ($num == 4){
			        	if (!$produits->isEmpty()) {
			        		$this->lst_categorie[$id_categorie] = $produits;
			        		$id_categorie++;
			        	}
			        	$produits = new Produits();
			   			$categorie = $data[0];
			   			$produits->id = $id_categorie;
			   			$produits->categorie = $categorie;
			   			$curseur = 1;
			   			$ligne = 0;
			   		}
			   		$nom = $data[$curseur];
			   		$portion = $data[$curseur+1];
			   		$prix = $data[$curseur+2];
			   		//echo 'ajout d\'une ligne : categorie : '.$categorie.' ligne : '.$ligne.' <br/>';

			        $produits->lst_produits[$ligne] = new Produit($ligne, $nom, $portion, $prix);
			        $ligne++;
			    }
			    fclose($handle);
			}
	    }


	    /* Enlever les vides pour detecter les entrées de liste de produits */
	    function remove_empty_data($array){
	    	$i = 0;
	    	$num = count($array);
	    	$result;
	        for ($c=0; $c < $num; $c++) {
	        	if (trim($array[$c]) != ''){
	        		$result[$i] = $array[$c];
	        		$i++;
	        	}
	        }
	        return $result;
	    }
	}

	class Produits {
		var $id;
		var $categorie;
		var $lst_produits;
		function Produits() {
		}

		function isEmpty() {
			return empty($this->lst_produits);
		}

		function initProduits() {
			$this->id = "";
			$this->categorie = "";
			$this->lst_produits = array();
		}
	}

	class Produit {
		var $id;
		var $nom;
		var $portion;
		var $prix;
		function Produit($id, $nom, $portion, $prix) {
			$this->id = $id;
			$this->nom = $nom;
			$this->portion = $portion;
			$this->prix = $prix;
		}
	}
?>