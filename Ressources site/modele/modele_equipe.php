<?php

 // fonction qui renvoie un tableau de toutes les equipes
 function obtenir_liste_des_equipes() 
 {
	// pour connexion au SGBD
	require '../controleur/param_connexion.php'; 
	
	$les_equipes = array(); // création du tableau
	$requete="select * from equipe";
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
			$les_equipes[] = mysqli_fetch_array($resultat_sql); 
			$i=$i+1; // incrémentation
		}
	}
	return $les_equipes;// le tableau sera vide en cas d'erreur
}// fin fonction()

function obtenir_par_id($id) // fonction qui renvoie un étudiant
 {
	// pour connexion au SGBD
	require '../controleur/param_connexion.php'; 
	
	$equipes = array(); // création du tableau (le résultat du SELECT est toujours un tableau)
	$equipe = array(); // tableau pour extraire le 1er tournoi trouvé
	
	$requete="select * from equipe where id=$id";
	
	$resultat_sql = mysqli_query($lien_base, "$requete");
	
	if($resultat_sql == false) // si impossible d'exécuter la requête SELECT
	{	
		die("Impossible d'executer la requete: $requete".mysqli_error($lien_base));
	}
	else // SELECT réussi : il ne peut y avoir qu'un adherent
	{
		$equipes[] = mysqli_fetch_array($resultat_sql);
		$equipe = $equipes[0];
	}
	return $equipe;// le tableau sera vide en cas d'erreur
}// fin fonction()

// page contenant les différentes fonctions d'accès à la base
//_______________________________________________________________
function insert_equipe($nom, $anneeCreation) // insere un nouveau tournoi  dans la table tournoi
{
	// fichier externe car la connexion est utilisée dans différentes pages
	require '../controleur/param_connexion.php'; 
	
	// initialisation de la variable à zéro
	$nb_lignes = 0; 
	
	// Requete d'insertion MYSQL. 
	$requete= "INSERT INTO equipe (nom, anneeCreation) VALUES ('$nom','$anneeCreation');";
	
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
        header("Location: ../Vue/vue_equipe.php");
    }
	return $nb_lignes ; // renvoie le nb de lignes insérées : normalement 1
} // fin fonction insert_tournoi

function delete_equipe($id) // suppression tournoi  dans la table tournoi
{
	// fichier externe car la connexion est utilisée dans différentes pages
	require '../controleur/param_connexion.php'; 
	
	// initialisation de la variable à zéro
	$nb_lignes = 0; 
	
	// Requete de suppression MYSQL. 
	$requete = "DELETE FROM equipe WHERE id IN ($id)";
	
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
        header("Location: ../Vue/vue_equipe.php");
    }
	return $nb_lignes ; // renvoie le nb de lignes insérées : normalement 1
} // fin fonction delete_tournoi

function update_equipe($id,$nom, $anneeCreation) // insere un nouveau tournoi dans la table tournoi
{
	// fichier externe car la connexion est utilisée dans différentes pages
	require '../controleur/param_connexion.php'; 
	
	$nb_lignes=0; // initialisation de la variable à zéro
	
	// Requete de modification MYSQL. 
	$requete= "UPDATE equipe set id='$id', nom='$nom', anneeCreation='$anneeCreation' WHERE id=$id";
	
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
        header("Location: ../Vue/vue_equipe.php");
    }
	return $nb_lignes ; // renvoie le nb de lignes modifiées : normalement 1
 } // fin fonction update_tournoi
?>