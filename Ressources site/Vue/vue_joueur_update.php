<html>
    <head>
        <title>Modification d'un Joueur</title>
        <meta NAME="Author" CONTENT="Thierry Blavin">
        <meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8">
        <!-- appel feuille de style -->
        <link href="style_op.css" type="text/css" rel="stylesheet" media="all">
    </head>
    <body align="center">
        <form action="../Controleur/controleur_joueur.php" method="POST">
            <fieldset>
                <input type='hidden' name='mode' value='2'>
                <?php
                    //Recupération du id courant
                    $id = $_GET["id"];
                    
                    include '../modele/modele_joueur.php';
                    
                    // création du tableau des adhérents (vide à ce stade)
                    $joueur = array();
                    $joueur = obtenir_par_id($id); // appel de la fonction
                    
                    $nb = count($id); // nombre trouvé
                    
                    if($nb == 0) // aucun pour ce numéro
                    {
                        echo "<p>Aucun joueur trouvé</p>";
                        die(); // arret
                    }
                    else  // $nb > 0 donc on a trouvé  1
                    {
                            
                            $id = $joueur['id'];			// extraction des champs de la ligne
                            $nom = $joueur['nom'];
                            $prenom = $joueur['prenom'];
                            $date_naissance = $joueur['date_naissance'];
                            $status_Licence = $joueur['status_licence'];
                            $licence = $joueur['numero'];
                            
                            echo "<table>";
                            echo "<tr><td align='left' colspan='2'><b>Les informations du bulletin en modification : </b></td></tr>";
                            echo "<tr><td>id :</td><td>$id</td></tr>"; // ID non modifiable
                            echo "<input type='hidden' name='id' value='$id'>"; // input caché non modifiable
                            
                            echo "<tr><td>Nom :</td><td><input type='text' name='nom' size='20' value='$nom'></td></tr>";
                            echo "<tr><td>Prenom :</td><td><input type='text' name='prenom' size='20' value='$prenom'></td></tr>";
                            echo "<tr><td>Date_naissance :</td><td><input type='date' name='date_naissance' size='20' value='$date_naissance'></td></tr>";
                            echo "<tr><td>Licence : </td><td><select name='licence'>
                            
                                <option value='$licence'>$licence</option>
                                <option value='$licence'>$licence</option>
                                <option value='$licence'>$licence</option>
                                <option value='hamster'>Hamster</option>
                                <option value='parrot'>Parrot</option>
                                <option value='spider'>Spider</option>
                                <option value='goldfish'>Goldfish</option>
                                </select></td></tr>";
                            echo "</table>";

                    }
                ?>
                <table border=0>
                    <tr>
                        <td align="right" colspan="2" >
                            <input type="submit" value="Enregistrer">
                        </td>
                    </tr>
                </table>
                <ul>
                    <li><a href='vue_joueur.php'>retour accueil</a></li>
                </ul>
            </fieldset>
        </form>
    </body>
</html>