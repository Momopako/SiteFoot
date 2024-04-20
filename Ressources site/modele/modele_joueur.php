<?php

 // fonction qui renvoie un tableau de tous les joeuurs
 function obtenir_liste_des_joueurs() 
 {
	// pour connexion au SGBD
	require '../Controleur/param_connexion.php'; 
	
	$les_joueurs = array(); // création du tableau
	$requete="select * from joueur inner join licence on licence.id = joueur.id";
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
			$les_joueurs[] = mysqli_fetch_array($resultat_sql); 
			$i=$i+1; // incrémentation
		}
	}
	return $les_joueurs;// le tableau sera vide en cas d'erreur
}// fin fonction()

function obtenir_par_id($id) // fonction qui renvoie un joueur
 {
	// pour connexion au SGBD
	require '../Controleur/param_connexion.php'; 
	
	$joueurs = array(); // création du tableau (le résultat du SELECT est toujours un tableau)
	$joueur = array(); // tableau pour extraire le 1er joueur trouvé
	
	$requete=" select joueur.id,joueur.nom, joueur.prenom, joueur.date_naissance ,licence.id,(select licence.numero from licence where id = joueur.id), licence.status_licence 
	from joueur 
	inner join licence on licence.id = joueur.id_licence";


	
	$resultat_sql = mysqli_query($lien_base, "$requete");
	
	if($resultat_sql == false) // si impossible d'exécuter la requête SELECT
	{	
		die("Impossible d'executer la requete: $requete".mysqli_error($lien_base));
	}
	else // SELECT réussi : il ne peut y avoir qu'un adherent
	{
		$joueurs[] = mysqli_fetch_array($resultat_sql);
		$joueur = $joueurs[0];
	}
	return $joueur;// le tableau sera vide en cas d'erreur
}// fin fonction()

function obtenir_par_value() // fonction qui renvoie un joueur
 {
	// pour connexion au SGBD
	require '../Controleur/param_connexion.php'; 
	
	$joueurs = array(); // création du tableau (le résultat du SELECT est toujours un tableau)
	$joueur = array(); // tableau pour extraire le 1er joueur trouvé
	
	$requete=" select joueur.id,joueur.nom, joueur.prenom, joueur.date_naissance ,licence.id,(select licence.numero from licence where id = joueur.id), licence.status_licence 
	from joueur 
	inner join licence on licence.id = joueur.id_licence";


	
	$resultat_sql = mysqli_query($lien_base, "$requete");
	
	if($resultat_sql == false) // si impossible d'exécuter la requête SELECT
	{	
		die("Impossible d'executer la requete: $requete".mysqli_error($lien_base));
	}
	else // SELECT réussi : il ne peut y avoir qu'un adherent
	{
		$joueurs[] = mysqli_fetch_array($resultat_sql);
		$joueur = $joueurs[0];
	}
	return $joueur;// le tableau sera vide en cas d'erreur
}// fin fonction()

// page contenant les différentes fonctions d'accès à la base
//_______________________________________________________________
function insert_joueur ($nom, $prenom, $date_naissance, $id_licence) // insere un nouveau joueur  dans la table joueur
{
	// fichier externe car la connexion est utilisée dans différentes pages
	require '../Controleur/param_connexion.php'; 
	
	// initialisation de la variable à zéro
	$nb_lignes = 0; 
	
	// Requete d'insertion MYSQL. 
	$requete= "INSERT INTO joueur ( nom, prenom, date_naissance) VALUES ('$nom','$prenom','$date_naissance','$id_licence');";
	
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
		$nb_lignes=mysqli_affected_rows($lien_base);
		header("Location: ../Vue/vue_joueur.php"); // compte le nombre de lignes affectées (normalement 1 ligne insérée)
	}
	return $nb_lignes ; // renvoie le nb de lignes insérées : normalement 1
} // fin fonction insert_joueur

function delete_joueur($id) // suppression joueur  dans la table joueur
{
	// fichier externe car la connexion est utilisée dans différentes pages
	require '../Controleur/param_connexion.php'; 
	
	// initialisation de la variable à zéro
	$nb_lignes = 0; 
	
	// Requete de suppression MYSQL. 
	$requete = "DELETE FROM joueur WHERE id IN ($id)";
	
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
	}
	return $nb_lignes ; // renvoie le nb de lignes insérées : normalement 1
} // fin fonction delete_joueur

function update_joueur($id, $nom, $prenom, $date_naissance, $status_Licence) // insere un nouveau membre  dans la table membres
{
	// fichier externe car la connexion est utilisée dans différentes pages
	require '../Controleur/param_connexion.php'; 
	$nb_lignes=0; // initialisation de la variable à zéro
	
	// Requete de modification MYSQL. 
	$requete= "UPDATE joueur set nom='$nom', prenom='$prenom', date_naissance='$date_naissance' where id='$id'";
	// tentative d'execution de la requete INSERT dans la base
	$reponse_serveur=mysqli_query($lien_base, "$requete");
	if($reponse_serveur==false) // si false : impossible d'exécuter la requête INSERT
	{	
		$message_erreur = "Impossible d'executer la requete: $requete ".mysqli_error($lien_base);
		die();
		header("Location:vue_erreur.php?erreur=$message_erreur"); // page d'affichage d'erreur
		exit(); // interruption de la fonction après redirection
	}
	else // modification réussi
	{
		$nb_lignes = mysqli_affected_rows($lien_base); // compte le nombre de lignes affectées (normalement 1 ligne insérée)
	}
	return $nb_lignes ; // renvoie le nb de lignes modifiées : normalement 1
 } // fin fonction update_joueur
?>