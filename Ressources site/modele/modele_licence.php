<?php

 // fonction qui renvoie un tableau de tous les joeuurs
 function obtenir_liste_des_licences() 
 {
	// pour connexion au SGBD
	require '../Controleur/param_connexion.php'; 
	
	$les_licences = array(); // création du tableau
	$requete="select * from licence ";
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
			$les_licences[] = mysqli_fetch_array($resultat_sql); 
			$i=$i+1; // incrémentation
		}
	}
	return $les_licences;// le tableau sera vide en cas d'erreur
}// fin fonction()

function obtenir_par_id($id) // fonction qui renvoie une licence
 {
	// pour connexion au SGBD
	require '../Controleur/param_connexion.php'; 
	
	$licences = array(); // création du tableau (le résultat du SELECT est toujours un tableau)
	$licence = array(); // tableau pour extraire le 1er licence trouvé
	
	$requete="select * from licence where id=$id";


	
	$resultat_sql = mysqli_query($lien_base, "$requete");
	
	if($resultat_sql == false) // si impossible d'exécuter la requête SELECT
	{	
		die("Impossible d'executer la requete: $requete".mysqli_error($lien_base));
	}
	else // SELECT réussi : il ne peut y avoir qu'un adherent
	{
		$licences[] = mysqli_fetch_array($resultat_sql);
		$licence = $licences[0];
	}
	return $licence;// le tableau sera vide en cas d'erreur
}// fin fonction()

// page contenant les différentes fonctions d'accès à la base
//_______________________________________________________________
function insert_licence($numero, $categorie, $annee_Licence, $status_Licence) // insere un nouveau lience  dans la table licence
{
	// fichier externe car la connexion est utilisée dans différentes pages
	require '../Controleur/param_connexion.php'; 
	
	// initialisation de la variable à zéro
	$nb_lignes = 0; 
	
	// Requete d'insertion MYSQL. 
	$requete= "INSERT INTO licence ( numero, categorie, annee_licence, status_licence) VALUES ('$numero','$categorie','$annee_Licence','$status_Licence');";
	
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
	}
	return $nb_lignes ; // renvoie le nb de lignes insérées : normalement 1
} // fin fonction insert_licence

function delete_licence($id) // suppression licence  dans la table licence
{
	// fichier externe car la connexion est utilisée dans différentes pages
	require '../Controleur/param_connexion.php'; 
	
	// initialisation de la variable à zéro
	$nb_lignes = 0; 
	
	// Requete de suppression MYSQL. 
	$requete = "DELETE FROM licence WHERE id IN ($id)";
	
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
} // fin fonction delete_licence

function update_licence($id, $numero, $categorie, $annee_Licence, $status_Licence) // insere un nouveau membre  dans la table membres
{
	// fichier externe car la connexion est utilisée dans différentes pages
	require '../Controleur/param_connexion.php'; 
	$nb_lignes=0; // initialisation de la variable à zéro
	
	// Requete de modification MYSQL. 
	$requete= "UPDATE licence set id='$id', numero='$numero', categorie='$categorie', annee_licence='$annee_Licence', status_licence= '$status_Licence' where id=$id ";
	echo " requete :".$requete;
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
        header("Location: ../Vue/vue_licence.php");
    }
	return $nb_lignes ; // renvoie le nb de lignes modifiées : normalement 1
 } // fin fonction update_licence
?>