<?php
// recuperation des variables du formulaire de annuaire1.php par le tableau associatif $_POST
$id = -1;
$mode=$_POST["mode"];
$mode=$_POST["mode"];
if (isset($_POST['Modifier'])){
	$mode = 2;
}
else if (isset($_POST['Supprimer'])){
	$mode = 3;
}
//Inclusion du modèle du design paterb MVC
include '../modele/modele_equipe.php';

//Gestion du cas en fonction du modèle
switch ($mode) {
    case 1: //Insertion d'un tournoi
        // recuperation des variables du formulaire de annuaire1.php par le tableau associatif $_POST
		
		$nom=$_POST["nom"];
		$anneeCreation=$_POST["anneeCreation"];

		// Vérification des champs numero, nom, classe et moyenne (si il ne sont pas vides ?)
		if( empty($nom) || empty($anneeCreation))  // le signe || signifie OU
		{
			$message_erreur="ATTENTION : Le champ nom ou prénom ou la date entree ou classe ou moyenne n'a pas été rempli correctement, veuillez vérifier";
			// redirection vers la page vue erreur
			header("Location: ../Vue/vue_erreur.php?erreur=$message_erreur");
			exit(); // interruption après redirection
		}
		else // $nom et $prenom sont corrects  
		{
			// appel de fonction d'insertion (couche Modele)
			$nb_lignes=insert_equipe($nom, $anneeCreation); 

			// on a inséré 1 ligne
			if($nb_lignes > 0) 
			{
				header("Location:../Vue/vue_equipe.php?nb=$nb_lignes"); // page de confirmation
				exit(); // interruption de la fonction après redirection
			}
			else // il y a eu une erreur
			{
				$message_erreur="Erreur lors de l'insertion des données";
				// redirection vers la page vue erreur
				header("Location: ../Vue/vue_erreur.php?erreur=$message_erreur");
			}		
		} // fin si empty nom
        break;
    case 2: //Modification d'un tournoi
		// recuperation des variables du formulaire de annuaire1.php par le tableau associatif $_POST
		$id=$_POST["id"];
		$nom=$_POST["nom"];
		$anneeCreation=$_POST["anneeCreation"];

		// Vérification des champs numero, nom, classe et moyenne (si il ne sont pas vides ?)
		if( empty($id)|| empty($nom) || empty($anneeCreation))  // le signe || signifie OU
		{
			$message_erreur="ATTENTION : Le champ numero ou autres n'a pas été rempli correctement, veuillez vérifier";
			// redirection vers la page vue erreur
			header("Location: ../Vue/vue_erreur.php?erreur=$message_erreur");
			exit(); // interruption après redirection
		}
		else // $numero, $nom, $prenom, $date_tournoi sont corrects  
		{
			// appel de fonction d'insertion (couche Modele)
			$nb_lignes = update_equipe($id, $nom, $anneeCreation);  
			// on a inséré 1 ligne
			if($nb_lignes > 0) 
			{
				header("Location: ../Vue/vue_equipe.php"); // page de confirmation
				exit(); // interruption de la fonction après redirection
			}
			else // il y a eu une erreur
			{
				
				$message_erreur="Erreur lors de suppression des données";
				// redirection vers la page vue erreur
				header("Location:../Vue/vue_erreur.php?erreur=$message_erreur");
			}		
		} // fin si empty nom
        break;
	case 3: //Suppression d'un tournoi
		//Recuperation de la liste 
		if (isset($_POST["id"])) {
			$id =$_POST["id"];
	    }
		// Vérification des champs numero, nom, classe et moyenne (si il ne sont pas vides ?)
		if( empty($id))  // le signe || signifie OU
		{
			$message_erreur="ATTENTION : Le champ id n'a pas été rempli correctement, veuillez vérifier";
			// redirection vers la page vue erreur
			header("Location: ../Vue/vue_erreur.php?erreur=$message_erreur");
			exit(); // interruption après redirection
		}
		else // $nom et $prenom sont corrects  
		{
			// appel de fonction d'insertion (couche Modele)
			$nb_lignes = delete_equipe($id); 

			// on a inséré 1 ligne
			if($nb_lignes > 0) 
			{
				header("Location:../Vue/vue_equipe.php?nb=$nb_lignes"); // page de confirmation
				exit(); // interruption de la fonction après redirection
			}
			else // il y a eu une erreur
			{
				$message_erreur="Erreur lors de suppression des données";
				// redirection vers la page vue erreur
				header("Location: ../Vue/vue_erreur.php?erreur=$message_erreur");
			}		
		} // fin si empty nom
		break;
}
?>
