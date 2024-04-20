<?php
// recuperation des variables du formulaire de annuaire1.php par le tableau associatif $_POST
$id = -1;
$mode=$_POST["mode"];
if(isset($_POST["Enregistrer"])){
	$mode = 2;
}else if (isset($_POST["Supprimer"])){
	$mode = 3;
}
//Inclusion du modèle du design paterb MVC
include '../Modele/modele_licence.php';

//Gestion du cas en fonction du modèle
switch ($mode) {
    case 1: //Insertion d'une licence
        // recuperation des variables du formulaire de annuaire1.php par le tableau associatif $_POST
		$numero=$_POST["numero"];
		$categorie=$_POST["categorie"];
		$annee_Licence=$_POST["annee_licence"];
		$status_Licence=$_POST["status_licence"];


		// Vérification des champs id, numero, categorie, annee_licence et status_licence (si il ne sont pas vides ?)
		if(  empty($numero) || empty($categorie) || empty($annee_Licence) || empty($status_Licence) )  // le signe || signifie OU
		{
			$message_erreur="ATTENTION : Le champ numero ou categorie ou l'annee de licence ou status licence  n'a pas été rempli correctement, veuillez vérifier";
			// redirection vers la page vue erreur
			header("Location: ../Vue/vue_erreur.php?erreur=$message_erreur");
			exit(); // interruption après redirection
		}
		else // $numero et $categorie sont corrects  
		{
			// appel de fonction d'insertion (couche Modele)
			$nb_lignes=insert_licence($numero, $categorie, $annee_Licence, $status_Licence); 

			// on a inséré 1 ligne
			if($nb_lignes > 0) 
			{
				header("Location:../Vue/vue_licence.php?nb=$nb_lignes"); // page de confirmation
				exit(); // interruption de la fonction après redirection
			}
			else // il y a eu une erreur
			{
				$message_erreur="Erreur lors de l'insertion des données";
				// redirection vers la page vue erreur
				header("Location: ../Vue/vue_erreur.php?erreur=$message_erreur");
			}		
		} // fin si empty numero
        break;
    case 2: //Modification d'une licence
		// recuperation des variables du formulaire de annuaire1.php par le tableau associatif $_POST

		$id=$_POST["id"];

		$numero=$_POST["numero"];
		$annee_Licence=$_POST["annee_licence"];
		$categorie=$_POST["categorie"];
		$status_Licence=$_POST["status_licence"];

		// Vérification des champs id, numero, classe et moyenne (si il ne sont pas vides ?)
		//if( empty($id)|| empty($numero) || empty($categorie) || empty($annee_Licence)|| empty($status_Licence))
		if (1!=1) // le signe || signifie OU
		{
			echo " numero".$numero;
			//$message_erreur="ATTENTION : Le champ id ou autres n'a pas été rempli correctement, veuillez vérifier";
			// redirection vers la page vue erreur
			//header("Location: ../Vue/vue_erreur.php?erreur=$message_erreur");
			exit(); // interruption après redirection
		}
		else // $id, $numero, $categorie, $annee_Licence, $status_Licence sont corrects  
		{
			echo " id 4:".$id;
			// appel de fonction d'insertion (couche Modele)
			$nb_lignes = update_licence($id, $numero, $categorie, $annee_Licence, $status_Licence);  
			// on a inséré 1 ligne
			if($nb_lignes > 0) 
			{
				header("Location:../Vue/vue_licence.php?nb=$nb_lignes"); // page de confirmation
				exit(); // interruption de la fonction après redirection
			}
			else // il y a eu une erreur
			{
				$message_erreur="Erreur lors de suppression des données";
				// redirection vers la page vue erreur
				header("Location: ../Vue/vue_erreur.php?erreur=$message_erreur");
			}		
		} // fin si empty numero
        break;
	case 3: //Suppression d'une licence
		//Recuperayion de la liste 
		if (isset($_POST["licence"])) {
			$id = implode(",", $_POST["licence"]);
	    }
		echo "La liste des lignes à supprimer : ".$id;  

		// Vérification des champs id, numero, categorie, annee_licence et status_licencee (si il ne sont pas vides ?)
		if( empty($id))  // le signe || signifie OU
		{
			$message_erreur="ATTENTION : Le champ id n'a pas été rempli correctement, veuillez vérifier";
			// redirection vers la page vue erreur
			header("Location: vue_erreur.php?erreur=$message_erreur");
			exit(); // interruption après redirection
		}
		else // $numero et $categorie sont corrects  
		{
			// appel de fonction d'insertion (couche Modele)
			$nb_lignes = delete_licence($id); 

			// on a inséré 1 ligne
			if($nb_lignes > 0) 
			{
				header("Location:../Vue/vue_licence.php?nb=$nb_lignes"); // page de confirmation
				exit(); // interruption de la fonction après redirection
			}
			else // il y a eu une erreur
			{
				$message_erreur="Erreur lors de suppression des données";
				// redirection vers la page vue erreur
				header("Location: vue_erreur.php?erreur=$message_erreur");
			}		
		} // fin si empty numero
		break;
}
?>
