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
include '../modele/modele_match.php';

//Gestion du cas en fonction du modèle
switch ($mode) {
    case 1: //Insertion d'un tournoi
        // recuperation des variables du formulaire de annuaire1.php par le tableau associatif $_POST
		$date_match=$_POST["date_match"];
		$id_tournoi=$_POST["id_tournoi"];
        $id_equipe1=$_POST["id_equipe1"];
        $id_equipe2=$_POST["id_equipe2"];
        $score1=$_POST["score1"];
        $score2=$_POST["score2"];
        $tir_but=$_POST["tir_but"];
        $score3=$_POST["score3"];
        $score4=$_POST["score4"];
        $id_vainqueur=$_POST["id_vainqueur"];

		// Vérification des champs numero, nom, classe et moyenne (si il ne sont pas vides ?)
		if( empty($date_match) || empty($id_tournoi)|| empty($id_equipe1) || empty($id_equipe2) || empty($score1) || empty($score2) || empty($tir_but) || empty($id_vainqueur))  // le signe || signifie OU
		{
			$message_erreur="ATTENTION : Le champ nom ou prénom ou la date entree ou classe ou moyenne n'a pas été rempli correctement, veuillez vérifier";
			// redirection vers la page vue erreur
			header("Location: ../Vue/vue_erreur.php?erreur=$message_erreur");
			exit(); // interruption après redirection
		}
		else // $nom et $prenom sont corrects  
		{
			// appel de fonction d'insertion (couche Modele)
			$nb_lignes=insert_equipe($date_match, $id_tournoi, $id_equipe1, $id_equipe2, $score1, $score2, $tir_but, $score3, $score4, $id_vainqueur); 

			// on a inséré 1 ligne
			if($nb_lignes > 0) 
			{
				header("Location:../Vue/vue_match.php?nb=$nb_lignes"); // page de confirmation
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
		$date_match=$_POST["date_match"];
		$id_tournoi=$_POST["id_tournoi"];
        $id_equipe1=$_POST["id_equipe1"];
        $id_equipe2=$_POST["id_equipe2"];
        $score1=$_POST["score1"];
        $score2=$_POST["score2"];
        $tir_but=$_POST["tir_but"];
        $score3=$_POST["score3"];
        $score4=$_POST["score4"];
        $id_vainqueur=$_POST["id_vainqueur"];

		// Vérification des champs numero, nom, classe et moyenne (si il ne sont pas vides ?)
		if( empty($date_match) || empty($id_tournoi)|| empty($id_equipe1) || empty($id_equipe2) || empty($id_vainqueur))  // le signe || signifie OU
		{
			$message_erreur="ATTENTION : Le champ numero ou autres n'a pas été rempli correctement, veuillez vérifier";
			// redirection vers la page vue erreur
			header("Location: ../Vue/vue_erreur.php?erreur=$message_erreur");
			exit(); // interruption après redirection
		}
		else // $numero, $nom, $prenom, $date_tournoi sont corrects  
		{
			// appel de fonction d'insertion (couche Modele)
			$nb_lignes = update_equipe($date_match, $id_tournoi, $id_equipe1, $id_equipe2, $score1, $score2, $tir_but, $score3, $score4, $id_vainqueur);  
			// on a inséré 1 ligne
			if($nb_lignes > 0) 
			{
				header("Location: ../Vue/vue_match.php"); // page de confirmation
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
				header("Location:../Vue/vue_match.php?nb=$nb_lignes"); // page de confirmation
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
