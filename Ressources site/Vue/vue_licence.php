<html>
    <head>
        <title>Menu Licence</title>
        <meta NAME="Author" CONTENT="Thierry Blavin">
        <meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8">
        <!-- appel feuille de style -->
        <link href="accueil.css" type="text/css" rel="stylesheet" media="all">
    </head>
    <body align="center">
        <form action="../Vue/vue_licence_creation.php" method="POST">
                    <input type='hidden' name='mode' value='3'>
                    <table border=0>
                    <tr>
                        <td align="center" colspan="8"><b> Nos Licences </b></td>
                    </tr>
                    <tr>
                        <th></th>
                        <th>Id</th>    
                        <th>Numéro</th>
                        <th>Catégorie</th>
                        <th>Status Licence </th>
                        <th>Année Licence</th>
                        <th>Actions<br></th>  
                    </tr>  
                    <?php
                        //Inclusion du modèle du design paterb MVC
                        include '../Modele/modele_licence.php';

                        // création du tableau des licences à ce stade)
                        $les_licences = array(); 
                        
                        // appel de la fonction depuis le modèle pour la récupération de la liste des licences
                        $les_licences = obtenir_liste_des_licences(); 
                        
                        // nombre de lignes à afficher
                        $nb = count($les_licences); 

                        if($nb > 0) // on a le nombre de ligne du tableau
                        {
                            // attention dans un tableau la numérotation commence à zéro
                            $i=0;						
                            while ($i<$nb)
                            {
                                $une_licence=$les_licences[$i];  // extraction d'une ligne du tableau "les_adherents"
                                $id=$une_licence['id'];			// extraction des champs de la ligne
                                $numero=$une_licence['numero'];
                                $categorie=$une_licence['categorie'];
                                $annee_Licence=$une_licence['annee_licence'];
                                $status_Licence=$une_licence['status_licence'];
                                if ($status_Licence == 1){
                                    $str_status_licence = "valide";
                                }else{
                                    $str_status_licence = "perime";
                                }
                                echo "<tr><td><input type='checkbox' name='licence[]' value='$id'></td>";
                                echo "<td>$id</td></a><td>$numero</td><td>$categorie</td><td>$str_status_licence</td><td>$annee_Licence</td>";
                                echo "<td><a href='vue_licence_update.php?id=$id'>Modifier</a></td>";
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