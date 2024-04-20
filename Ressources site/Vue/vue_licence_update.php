<html>
    <head>
        <title>Modification d'une Licence</title>
        <meta NAME="Author" CONTENT="Thierry Blavin">
        <meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8">
        <!-- appel feuille de style -->
        <link href="accueil.css" type="text/css" rel="stylesheet" media="all">
    </head>
    <body align="center">
        <form action="../Controleur/controleur_licence.php" method="POST">
            <fieldset>
                <input type='hidden' name='mode' value='2'>
                <?php
                    //Recupération du id courant
                    $id = $_GET["id"];
                    
                    include '../Modele/modele_licence.php';
                    
                    // création du tableau des adhérents (vide à ce stade)
                    $licence = array();
                    $licence = obtenir_par_id($id); // appel de la fonction
                    
                    $nb = count($id); // nombre trouvé
                    
                    if($nb == 0) // aucun pour ce numéro
                    {
                        echo "<p>Aucune licence trouvé</p>";
                        die(); // arret
                    }
                    else  // $nb > 0 donc on a trouvé  1
                    {
                            $id = $licence['id'];			// extraction des champs de la ligne
                            $numero = $licence['numero'];
                            $categorie = $licence['categorie'];
                            $annee_Licence = $licence['annee_licence'];
                            $status_Licence = $licence['status_licence'];
                            if ($status_Licence == 1){
                                $str_status_licence = "valide";
                            }else{
                                $str_status_licence = "perime";
                            }
                            echo "<table>";
                            echo "<tr><td align='left' colspan='2'><b>Les informations du bulletin en modification : </b></td></tr>";
                            echo "<tr><td>id :</td><td>$id</td></tr>"; // ID non modifiable
                            echo "<input type='hidden' name='id' value='$id'>"; // input caché non modifiable
                            
                            echo "<tr><td>numero :</td><td><input type='text' name='numero' size='20' value='$numero'></td></tr>";
                            echo "<tr><td>categorie :</td><td><input type='text' name='categorie' size='20' value='$categorie'></td></tr>";
                            echo "<tr><td>annee_licence :</td><td><input type='number' name='annee_licence' size='20' value='$annee_Licence'></td></tr>";
                            echo "<tr><td> status_licence :</td><td><input type='checkbox' name ='status_licence' value='1'<?php if ($status_Licence == 'valide') echo 'checked';?>Valide</td>
                                    <td><input type='checkbox' name='status_licence' value='0'<?php if($status_Licence =='perime') echo 'checked';?> Perime</td></tr>";
                            echo "</table>";

                    } // fin if... else...
                ?>
                <table border=0>
                    <tr>
                        <td align="right" colspan="2" >
                            <input type="submit" value="Enregistrer">
                        </td>
                    </tr>
                </table>
                <ul>
                    <li><a href='vue_licence.php'>retour accueil</a></li>
                </ul>
            </fieldset>
        </form>
    </body>
</html>


