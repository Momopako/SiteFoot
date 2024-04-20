<html>
    <head>
        <title>Menu des équipes</title>
        <meta NAME="Author" CONTENT="Thierry Blavin">
        <meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8">
        <!-- appel feuille de style -->
        <link href="style_op.css" type="text/css" rel="stylesheet" media="all">
    </head>
    <body align="center">
        <form action="../Vue/vue_equipe_creation.php" method="POST">
                    <input type='hidden' name='mode' value='3'>
                    <table border=0>
                    <tr>
                        <td align="center" colspan="8"><b><h1>Les Equipes</h1></b></td>
                    </tr>
                    <tr>
                           
                        <th>ID</th>
                        <th>Nom de l'équipe</th>
                        <th>Année de Création</th>
                        <th>Actions<br></th>  
                    </tr>  
                    <?php
                        //Inclusion du modèle du design paterb MVC
                        include '../modele/modele_equipe.php';

                        // création du tableau des étudiants à ce stade)
                        $les_equipes = array(); 
                        
                        // appel de la fonction depuis le modèle pour la récupération de la liste des étudiants
                        $les_equipes = obtenir_liste_des_equipes(); 
                        
                        // nombre de lignes à afficher
                        $nb = count($les_equipes); 
                        if($nb > 0) // on a le nombre de ligne du tableau
                        {
                            // attention dans un tableau la numérotation commence à zéro
                            $i=0;						
                            while ($i<$nb)
                            {
                                $une_equipe=$les_equipes[$i];  // extraction d'une ligne du tableau "les_adherents"
                                $id=$une_equipe['id'];			// extraction des champs de la ligne
                                $nomEquipe=$une_equipe['nom'];
                                $anneeCreation=$une_equipe['anneeCreation'];
                                $id_tournoi =$une_equipe['id_tournoi'];                                
                                echo "<td>$id</a></td><td>$nomEquipe</td><td>$anneeCreation</td>";
                                echo "<td><a href='vue_equipe_update.php?id=$id'>Modifier</a></td>";
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