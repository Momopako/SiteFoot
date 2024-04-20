<?php

 // fonction qui renvoie un tableau de toutes les equipes
 function obtenir_liste_des_matchs() 
 {
	// pour connexion au SGBD
	require '../controleur/param_connexion.php'; 
	
	$les_matchs = array(); // création du tableau
	$requete="select matchs.id as idMatch ,matchs.date_match , matchs.id_tournoi, matchs.id_equipe1, matchs.id_equipe2, matchs.score1,matchs.score2, matchs.tir_but,matchs.score3, matchs.score4,
	matchs.id_vainqueur , equipe.id, (select equipe.nom from equipe where id = matchs.id_equipe1 )as nomEquipe1,(select equipe.nom from equipe where id = matchs.id_equipe2 )as nomEquipe2,
	(select equipe.nom from equipe where id = matchs.id_vainqueur)as nomVainqueur,tournoi.id, (select tournoi.nom from tournoi where id = matchs.id_tournoi  )as nomTournoi  
	from matchs 
	inner join equipe on equipe.id = matchs.id_equipe1 
	inner join tournoi on tournoi.id = matchs.id_tournoi";
	$resultat_sql = mysqli_query($lien_base, "$requete");
	
	// si impossible d'exécuter la requête SELECT
	if($resultat_sql == false) 
	{	
		die("Impossible d'executer la requete: $requete " . mysqli_error($lien_base));
	}
	else // SELECT réussi
	{
		// compte le nombre de lignes du SELECT
		$nb_lignes = mysqli_affected_rows($lien_base); 
		$i=1; // compteur
		while($i<=$nb_lignes)
		{
			// ajout des résultats du select
			$les_matchs[] = mysqli_fetch_array($resultat_sql); 
			$i=$i+1; // incrémentation
		}
	}
	return $les_matchs;// le tableau sera vide en cas d'erreur
}// fin fonction()

function obtenir_par_id($id) // fonction qui renvoie un étudiant
 {
	// pour connexion au SGBD
	require '../controleur/param_connexion.php'; 
	
	$matchs = array(); // création du tableau (le résultat du SELECT est toujours un tableau)
	$match = array(); // tableau pour extraire le 1er tournoi trouvé
	
	$requete="select matchs.id as idMatch ,matchs.date_match , matchs.id_tournoi, matchs.id_equipe1, matchs.id_equipe2, matchs.score1,matchs.score2, matchs.tir_but,matchs.score3, matchs.score4,
	matchs.id_vainqueur , equipe.id, (select equipe.nom from equipe where id = matchs.id_equipe1 )as nomEquipe1,(select equipe.nom from equipe where id = matchs.id_equipe2 )as nomEquipe2,
	(select equipe.nom from equipe where id = matchs.id_vainqueur)as nomVainqueur,tournoi.id, tournoi.nom as nomTournoi  from matchs 
	inner join equipe on equipe.id = matchs.id_equipe1 
	inner join tournoi on tournoi.id = matchs.id_tournoi where matchs.id=$id";
	
	$resultat_sql = mysqli_query($lien_base, "$requete");
	
	if($resultat_sql == false) // si impossible d'exécuter la requête SELECT
	{	
		die("Impossible d'executer la requete: $requete".mysqli_error($lien_base));
	}
	else // SELECT réussi : il ne peut y avoir qu'un adherent
	{
		$matchs[] = mysqli_fetch_array($resultat_sql);
		$match = $matchs[0];
	}
	return $match;// le tableau sera vide en cas d'erreur
}// fin fonction()

// page contenant les différentes fonctions d'accès à la base
//_______________________________________________________________
function insert_match($date_match, $id_tournoi, $id_equipe1, $id_equipe2, $score1, $score2, $tir_but, $score3, $score4, $id_vainqueur) // insere un nouveau tournoi  dans la table tournoi
{
	// fichier externe car la connexion est utilisée dans différentes pages
	require '../controleur/param_connexion.php'; 
	
	// initialisation de la variable à zéro
	$nb_lignes = 0; 
	
	// Requete d'insertion MYSQL. 
	$requete= "INSERT INTO matchs (date_match, id_tournoi, id_equipe1, id_equipe2, score1, score2, tir_but, score3, score4, id_vainqueur)
    VALUES ('$date_match', '$id_tournoi', '$id_equipe1', '$id_equipe2', '$score1', '$score2', '$tir_but', '$score3', '$score4', '$id_vainqueur');";
	
	// tentative d'execution de la requete INSERT dans la base
	$reponse_serveur = mysqli_query($lien_base, "$requete");
	
	// si false : impossible d'exécuter la requête INSERT
	if($reponse_serveur == false) 
	{	
		$message_erreur = "Impossible d'executer la requete: $requete".mysqli_error($lien_base);
		die();
		header("Location:vue_erreur.php?erreur=$message_erreur"); // page d'affichage d'erreur
		exit(); // interruption de la fonction après redirection
	}
	else // insert réussi
	{
		$nb_lignes=mysqli_affected_rows($lien_base); // compte le nombre de lignes affectées (normalement 1 ligne insérée)
        header("Location: ../Vue/vue_match.php");
    }
	return $nb_lignes ; // renvoie le nb de lignes insérées : normalement 1
} // fin fonction insert_tournoi

function delete_match($id) // suppression tournoi  dans la table tournoi
{
	// fichier externe car la connexion est utilisée dans différentes pages
	require '../controleur/param_connexion.php'; 
	
	// initialisation de la variable à zéro
	$nb_lignes = 0; 
	
	// Requete de suppression MYSQL. 
	$requete = "DELETE FROM matchs WHERE id IN ($id)";
	
	// tentative d'execution de la requete INSERT dans la base
	$reponse_serveur = mysqli_query($lien_base, "$requete");
	
	// si false : impossible d'exécuter la requête INSERT
	if($reponse_serveur == false) 
	{	
		$message_erreur = "Impossible d'executer la requete: $requete".mysqli_error($lien_base);
		die();
		header("Location:vue_erreur.php?erreur=$message_erreur"); // page d'affichage d'erreur
		exit(); // interruption de la fonction après redirection
	}
	else // suppression réussi
	{
		$nb_lignes = mysqli_affected_rows($lien_base); // compte le nombre de lignes affectées (normalement 1 ligne insérée)
        header("Location: ../Vue/vue_match.php");
    }
	return $nb_lignes ; // renvoie le nb de lignes insérées : normalement 1
} // fin fonction delete_tournoi

function update_match($date_match, $id_tournoi, $id_equipe1, $id_equipe2, $score1, $score2, $tir_but, $score3, $score4, $id_vainqueur) // insere un nouveau tournoi dans la table tournoi
{
	// fichier externe car la connexion est utilisée dans différentes pages
	require '../controleur/param_connexion.php'; 
	
	$nb_lignes=0; // initialisation de la variable à zéro
	
	// Requete de modification MYSQL. 
	$requete= "select matchs.id ,matchs.date_match , matchs.id_tournoi, matchs.id_equipe1, matchs.id_equipe2, matchs.score1,matchs.score2, matchs.tir_but,matchs.score3, matchs.score4,
	matchs.id_vainqueur , equipe.id, (select equipe.nom from equipe where id = matchs.id_equipe1 )as nomEquipe1,(select equipe.nom from equipe where id = matchs.id_equipe2 )as nomEquipe2,
	(select equipe.nom from equipe where id = matchs.id_vainqueur)as nomVainqueur,tournoi.id, tournoi.nom as nomTournoi from matchs 
	inner join equipe on equipe.id = matchs.id_equipe1 
	inner join tournoi on tournoi.id = matchs.id_tournoi UPDATE match set date_match='$date_match', id_tournoi='$id_tournoi', id_equipe1='$id_equipe1', id_equipe2='$id_equipe2', score1='$score1', score2='$score2', tir_but='$tir_but', score3='$score3', score4='$score4', id_vainqueur='$id_vainqueur' WHERE id=$id";
	
	// tentative d'execution de la requete INSERT dans la base
	$reponse_serveur=mysqli_query($lien_base, "$requete");
	if($reponse_serveur==false) // si false : impossible d'exécuter la requête INSERT
	{	
		$message_erreur = "Impossible d'executer la requete: $requete ".mysqli_error($lien_base);
		die();
		header("Location: ../Vue/vue_erreur.php?erreur=$message_erreur"); // page d'affichage d'erreur
		exit(); // interruption de la fonction après redirection
	}
	else // modification réussi
	{
        
		$nb_lignes = mysqli_affected_rows($lien_base); // compte le nombre de lignes affectées (normalement 1 ligne insérée)
        header("Location: ../Vue/vue_match.php");
    }
	return $nb_lignes ; // renvoie le nb de lignes modifiées : normalement 1
 } // fin fonction update_tournoi
?>