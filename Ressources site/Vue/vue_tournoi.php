<html>
    <head>
        <title>Menu des Tournois</title>
        <meta NAME="Author" CONTENT="Thierry Blavin">
        <meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8">
        <!-- appel feuille de style -->
        <link href="style_op.css" type="text/css" rel="stylesheet" media="all">
    </head>
    <body align="center">
        <form action="../Vue/vue_tournoi_creation.php" method="POST">
                    <input type='hidden' name='mode' value='3'>
                    <table border=0>
                    <tr>
                        <td align="center" colspan="8"><b>Nos tournois</b></td>
                    </tr>
                    <tr>
                           
                        <th>ID</th>
                        <th>Nom du tournoi</th>
                        <th>Ville</th>
                        <th>Date Tournoi</th>
                        <th>Actions<br></th>  
                    </tr>  
                    <?php
                        //Inclusion du modèle du design paterb MVC
                        include '../modele/modele_tournoi.php';

                        // création du tableau des étudiants à ce stade)
                        $les_tournois = array(); 
                        
                        // appel de la fonction depuis le modèle pour la récupération de la liste des étudiants
                        $les_tournois = obtenir_liste_des_tournois(); 
                        
                        // nombre de lignes à afficher
                        $nb = count($les_tournois); 

                        if($nb > 0) // on a le nombre de ligne du tableau
                        {
                            // attention dans un tableau la numérotation commence à zéro
                            $i=0;						
                            while ($i<$nb)
                            {
                                $un_tournoi=$les_tournois[$i];  // extraction d'une ligne du tableau "les_adherents"
                                $id=$un_tournoi['id'];			// extraction des champs de la ligne
                                $nomTournoi=$un_tournoi['nom'];
                                $ville=$un_tournoi['ville'];
                                $date_tournoi=$un_tournoi['date_tournoi'];
                                echo "<td>$id</a></td><td>$nomTournoi</td><td>$ville</td><td>$date_tournoi</td>";
                                echo "<td><a href='vue_tournoi_update.php?id=$id'>Modifier</a></td>";
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