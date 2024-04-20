<?php
// recuperation des variables du formulaire de annuaire1.php par le tableau associatif $_POST
$id = -1;
$mode=$_POST["mode"];
//Inclusion du modèle du design paterb MVC
include '../modele/modele_joueur.php';

//Gestion du cas en fonction du modèle
switch ($mode) {
    case 1: //Insertion d'un joueur
        // recuperation des variables du formulaire de annuaire1.php par le tableau associatif $_POST
		$prenom=$_POST["prenom"];
		$nom=$_POST["nom"];
		$date_naissance=$_POST["date_naissance"];
		$id_licence=$_POST["id_licence"];


		// Vérification des champs id, nom, classe et moyenne (si il ne sont pas vides ?)
		if(  empty($nom) || empty($prenom) || empty($date_naissance) || empty($id_licence) )  // le signe || signifie OU
		{
			$message_erreur="ATTENTION : Le champ nom ou prénom ou la date de naissance ou status licence  n'a pas été rempli correctement, veuillez vérifier";
			// redirection vers la page vue erreur
			header("Location: vue_erreur.php?erreur=$message_erreur");
			exit(); // interruption après redirection
		}
		else // $nom et $prenom sont corrects  
		{
			// appel de fonction d'insertion (couche Modele)
			$nb_lignes=insert_joueur($nom, $prenom, $date_naissance, $id_licence); 

			// on a inséré 1 ligne
			if($nb_lignes > 0) 
			{
				header("Location:../Vue/vue_joueur.php?nb=$nb_lignes"); // page de confirmation
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
    case 2: //Modification d'un joueur
		// recuperation des variables du formulaire de annuaire1.php par le tableau associatif $_POST

		$id=$_POST["id"];

		$prenom=$_POST["prenom"];
		$nom=$_POST["nom"];
		$date_naissance=$_POST["date_naissance"];
		$status_Licence=$_POST["status_licence"];

		// Vérification des champs id, nom, classe et moyenne (si il ne sont pas vides ?)
		if( empty($id)|| empty($prenom) || empty($nom) || empty($date_naissance))  // le signe || signifie OU
		{
			echo"Le mode est 1 ".$mode;
			$message_erreur="ATTENTION : Le champ id ou autres n'a pas été rempli correctement, veuillez vérifier";
			// redirection vers la page vue erreur
			header("Location: vue_erreur.php?erreur=$message_erreur");
			exit(); // interruption après redirection
		}
		else // $id, $nom, $prenom, $date_entree, $classe et $moyenne sont corrects  
		{
			// appel de fonction d'insertion (couche Modele)
			$nb_lignes = update_joueur($id, $nom, $prenom, $date_naissance, $status_Licence);  
			// on a inséré 1 ligne
			if($nb_lignes > 0) 
			{
				header("Location:../Vue/vue_joueur.php?nb=$nb_lignes"); // page de confirmation
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
	case 3: //Suppression d'un joueur
		//Recuperayion de la liste 
		if (isset($_POST["joueur"])) {
			$id = implode(",", $_POST["joueur"]);
	    }
		echo "La liste des lignes à supprimer : ".$id;  

		// Vérification des champs id, nom, classe et moyenne (si il ne sont pas vides ?)
		if( empty($id))  // le signe || signifie OU
		{
			$message_erreur="ATTENTION : Le champ id n'a pas été rempli correctement, veuillez vérifier";
			// redirection vers la page vue erreur
			header("Location: vue_erreur.php?erreur=$message_erreur");
			exit(); // interruption après redirection
		}
		else // $nom et $prenom sont corrects  
		{
			// appel de fonction d'insertion (couche Modele)
			$nb_lignes = delete_joueur($id); 

			// on a inséré 1 ligne
			if($nb_lignes > 0) 
			{
				header("Location:../Vue/vue_joueur.php?nb=$nb_lignes"); // page de confirmation
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
