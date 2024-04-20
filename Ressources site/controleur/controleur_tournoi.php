<?php
// recuperation des variables du formulaire de annuaire1.php par le tableau associatif $_POST
$id = -1;
$mode=$_POST["mode"];
if (isset($_POST['Modifier'])){
	$mode = 2;
}
else if (isset($_POST['Supprimer'])){
	$mode = 3;
}
//Inclusion du modèle du design paterb MVC
include '../modele/modele_tournoi.php';

//Gestion du cas en fonction du modèle
switch ($mode) {
    case 1: //Insertion d'un tournoi
        // recuperation des variables du formulaire de annuaire1.php par le tableau associatif $_POST
		$nom=$_POST["nom"];
		$ville=$_POST["ville"];
		$date_tournoi=$_POST["date_tournoi"];

		// Vérification des champs numero, nom, classe et moyenne (si il ne sont pas vides ?)
		if( empty($nom) || empty($ville) || empty($date_tournoi))  // le signe || signifie OU
		{
			$message_erreur="ATTENTION : Le champ nom ou prénom ou la date entree ou classe ou moyenne n'a pas été rempli correctement, veuillez vérifier";
			// redirection vers la page vue erreur
			header("Location: vue_erreur.php?erreur=$message_erreur");
			exit(); // interruption après redirection
		}
		else // $nom et $prenom sont corrects  
		{
			// appel de fonction d'insertion (couche Modele)
			$nb_lignes=insert_tournoi($nom, $ville, $date_tournoi); 

			// on a inséré 1 ligne
			if($nb_lignes > 0) 
			{
				header("Location:../Vue/vue_tournoi.php?nb=$nb_lignes"); // page de confirmation
				exit(); // interruption de la fonction après redirection
			}
			else // il y a eu une erreur
			{
				$message_erreur="Erreur lors de l'insertion des données";
				// redirection vers la page vue erreur
				header("Location: vue_erreur.php?erreur=$message_erreur");
			}		
		} // fin si empty nom
        break;
    case 2: //Modification d'un tournoi
		// recuperation des variables du formulaire de annuaire1.php par le tableau associatif $_POST
		$id=$_POST["id"];
		$nom=$_POST["nom"];
		$ville=$_POST["ville"];
		$date_tournoi=$_POST["date_tournoi"];

		// Vérification des champs numero, nom, classe et moyenne (si il ne sont pas vides ?)
		if( empty($id)|| empty($nom) || empty($ville) || empty($date_tournoi))  // le signe || signifie OU
		{
			$message_erreur="ATTENTION : Le champ numero ou autres n'a pas été rempli correctement, veuillez vérifier";
			// redirection vers la page vue erreur
			header("Location: vue_erreur.php?erreur=$message_erreur");
			exit(); // interruption après redirection
		}
		else // $numero, $nom, $prenom, $date_tournoi sont corrects  
		{
			// appel de fonction d'insertion (couche Modele)
			$nb_lignes = update_tournoi($id, $nom, $ville, $date_tournoi);  

			// on a inséré 1 ligne
			if($nb_lignes > 0) 
			{
				header("Location:../Vue/vue_tournoi.php"); // page de confirmation
				exit(); // interruption de la fonction après redirection
			}
			else // il y a eu une erreur
			{
				$message_erreur="Erreur lors de suppression des données";
				// redirection vers la page vue erreur
				header("Location: vue_erreur.php?erreur=$message_erreur");
			}		
		} // fin si empty nom
        break;
	case 3: //Suppression d'un tournoi
		//Recuperation de la liste 
		if (isset($_POST["tournoi"])) {
			$id = implode(",", $_POST["tournoi"]);
	    }
		// Vérification des champs numero, nom, classe et moyenne (si il ne sont pas vides ?)
		if( empty($id))  // le signe || signifie OU
		{
			$message_erreur="ATTENTION : Le champ numero n'a pas été rempli correctement, veuillez vérifier";
			// redirection vers la page vue erreur
			header("Location: vue_erreur.php?erreur=$message_erreur");
			exit(); // interruption après redirection
		}
		else // $nom et $prenom sont corrects  
		{
			// appel de fonction d'insertion (couche Modele)
			$nb_lignes = delete_tournoi($id); 

			// on a inséré 1 ligne
			if($nb_lignes > 0) 
			{
				header("Location:../Vue/vue_tournoi.php?nb=$nb_lignes"); // page de confirmation
				exit(); // interruption de la fonction après redirection
			}
			else // il y a eu une erreur
			{
				$message_erreur="Erreur lors de suppression des données";
				// redirection vers la page vue erreur
				header("Location: vue_erreur.php?erreur=$message_erreur");
			}		
		} // fin si empty nom
		break;
}
?>
