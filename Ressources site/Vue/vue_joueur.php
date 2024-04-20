<html>
    <head>
        <title>Menu des Joueurs</title>
        <meta NAME="Author" CONTENT="Thierry Blavin">
        <meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8">
        <!-- appel feuille de style -->
        <link href="accueil.css" type="text/css" rel="stylesheet" media="all">
    </head>
    <body align="center">
        <form action="../Vue/vue_joueur_creation.php" method="POST">
                    <input type='hidden' name='mode' value='3'>
                    <table border=0>
                    <tr>
                        <td align="center" colspan="8"><b> Nos Joueurs </b></td>
                    </tr>
                    <tr>
                        <th></th>
                        <th>Id</th>    
                        <th>Prenom</th>
                        <th>Nom</th>
                        <th>Date de naissance</th>
                        <th>Status Licence</th>
                        <th>Actions<br></th>  
                    </tr>  
                    <?php
                        //Inclusion du modèle du design paterb MVC
                        include '../modele/modele_joueur.php';

                        // création du tableau des joueurs à ce stade)
                        $les_joueurs = array(); 
                        
                        // appel de la fonction depuis le modèle pour la récupération de la liste des joueurs
                        $les_joueurs = obtenir_liste_des_joueurs(); 
                        
                        // nombre de lignes à afficher
                        $nb = count($les_joueurs); 

                        if($nb > 0) // on a le nombre de ligne du tableau
                        {
                            // attention dans un tableau la numérotation commence à zéro
                            $i=0;						
                            while ($i<$nb)
                            {
                                $un_joueur=$les_joueurs[$i];  // extraction d'une ligne du tableau "les_adherents"
                                $id=$un_joueur['id'];			// extraction des champs de la ligne
                                $prenom=$un_joueur['prenom'];
                                $nom=$un_joueur['nom'];
                                $date_naissance=$un_joueur['date_naissance'];
                                $status_Licence=$un_joueur['status_licence'];
                                if ($status_Licence == 1){
                                    $str_status_licence = "valide";
                                }else{
                                    $str_status_licence = "perime";
                                }
                                echo "<tr><td><input type='checkbox' name='joueur[]' value='$id'></td>";
                                echo "<td>$id</td></a><td>$prenom</td><td>$nom</td><td>$date_naissance</td><td>$str_status_licence</td>";
                                echo "<td><a href='vue_joueur_update.php?id=$id'>Modifier</a></td>";
                                echo "</tr>";
                                $i=$i+1;
                            } // fin boucle
                        }	
                    ?>
                </table>
                <table border=0>
                    <tr>
                        <td align="right" colspan="2" >
                            <input type="submit" value="Ajouter">
                        </td>
                    </tr>
                </table>
                <ul>
                    <li><a href='vue_acceuil.php'>retour accueil</a></li>
                </ul>
            </fieldset>
        </form>
    </body>
</html>