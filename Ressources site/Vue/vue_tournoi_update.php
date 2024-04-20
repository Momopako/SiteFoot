<html>
    <head>
        <title>Modification d'un tournoi</title>
        <meta NAME="Author" CONTENT="Thierry Blavin">
        <meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8">
        <!-- appel feuille de style -->
        <link href="style_op.css" type="text/css" rel="stylesheet" media="all">
    </head>
    <body align="center">
        <form action="../controleur/controleur_tournoi.php" method="POST">
                <input type='hidden' name='mode' value='2'>
                <?php
                    //Recupération du numero courant
                    $id = $_GET["id"];
                    
                    include '../modele/modele_tournoi.php';
                    
                    // création du tableau des adhérents (vide à ce stade)
                    $tournoi = array();
                    $tournoi = obtenir_par_id($id); // appel de la fonction
                    
                    $nb = count($id); // nombre trouvé
                    
                    if($nb == 0) // aucun pour ce numéro
                    {
                        echo "<p>Aucun étudiant trouvé</p>";
                        die(); // arret
                    }
                    else  // $nb > 0 donc on a trouvé  1
                    {
                            $id = $tournoi['id'];			// extraction des champs de la ligne
                            $nom = $tournoi['nom'];
                            $ville = $tournoi['ville'];
                            $date_tournoi = $tournoi['date_tournoi'];
                            echo "<table>";
                            echo "<tr><td align='left' colspan='2'><b>Les informations du bulletin en modification du Tournoi :</b></td></tr>";
                            echo "<tr><td>ID :</td><td>$id</td></tr>"; // ID non modifiable
                            echo "<input type='hidden' name='id' value='$id'>"; // input caché non modifiable
                            
                            echo "<tr><td>Nom :</td><td><input type='text' name='nom' size='20' value='$nom'></td></tr>";
                            echo "<tr><td>Ville :</td><td><input type='text' name='ville' size='20' value='$ville'></td></tr>";
                            echo "<tr><td>Date du Tournoi :</td><td><input type='date' name='date_tournoi' size='20' value='$date_tournoi'></td></tr>";
                            echo "</table>";
                    } // fin if... else...
                ?>
                <table border=0>
                    
                <tr>
                        <td align="right" colspan="2" >
                            <input type="submit" value="Modifier" name="Modifier">
                            <input type="submit" name ="Supprimer" value="Supprimer">
                        </td>
                
                <?php 
                    
                ?>
                    </tr>
                </table>
                
                <ul>
                    <li><a href='vue_tournoi.php'>retour accueil</a></li>
                </ul>
        </form>
    </body>
</html>