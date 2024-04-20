<html>
    <head>
        <title>Modification d'un Match</title>
        <meta NAME="Author" CONTENT="Thierry Blavin">
        <meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8">
        <!-- appel feuille de style -->
        <link href="style_op.css" type="text/css" rel="stylesheet" media="all">
    </head>
    <body align="center">
        <form action="../controleur/controleur_match.php" method="POST">
                <input type='hidden' name='mode' value='2'>
                <?php
                    //Recupération du numero courant
                    $id = $_GET["id"];
                    
                    include '../modele/modele_match.php';
                    
                    // création du tableau des adhérents (vide à ce stade)
                    $match = array();
                    $match = obtenir_par_id($id); // appel de la fonction
                    
                    $nb = count($id); // nombre trouvé
                    
                    if($nb == 0) // aucun pour ce numéro
                    {
                        echo "<p>Aucun étudiant trouvé</p>";
                        die(); // arret
                    }
                    else  // $nb > 0 donc on a trouvé  1
                    {
                            $id = $match['idMatch'];			// extraction des champs de la ligne
                            $date_match = $match['date_match'];
                            $id_tournoi = $match['id_tournoi'];
                            $id_equipe1 = $match['id_equipe1'];
                            $id_equipe2 = $match['id_equipe2'];
                            $nomTournoi = $match['nomTournoi'];
                            $nomEquipe1 = $match['nomEquipe1'];
                            $nomEquipe2 = $match['nomEquipe2'];
                            $score1 = $match['score1'];
                            $score2 = $match['score2'];
                            $tir_but = $match['tir_but'];
                            $score3 = $match['score3'];
                            $score4 = $match['score4'];
                            $id_vainqueur = $match['id_vainqueur'];
                            $nomVainqueur = $match['nomVainqueur'];
                            if ($score3 == NULL){
                                $scoreNul = "Pas de score additionnel";
                            }
                            else {
                                $scoreNul = "Pas de score additionnel";
                            }
                            if ($tir_but == 0){
                                $tir_but = "Non";
                            }
                            else{
                                $tir_but = "Oui";
                            }
                            echo "<table>";
                            echo "<tr><td align='left' colspan='2'><b>Les informations du bulletin en modification du Match :</b></td></tr>";
                            echo "<tr><td>ID :</td><td>$id</td></tr>"; // ID non modifiable
                            echo "<input type='hidden' name='id' value='$id'>"; // input caché non modifiable
                            
                            echo "<tr><td>Date du Match :</td><td><input type='date' name='date_match' size='20' value='$date_match'></td></tr>";
                            echo "<tr><td>Nom du Tournoi :</td><td><input type='text' name='nomTournoi' size='20' value='$nomTournoi'></td></tr>";
                            echo "<tr><td>Nom Equipe 1 :</td><td><input type='text' name='nomEquipe1' size='20' value='$nomEquipe1'></td></tr>";
                            echo "<tr><td>Nom Equipe 2 :</td><td><input type='text' name='nomEquipe2' size='20' value='$nomEquipe2'></td></tr>";
                            echo "<tr><td>Score Equipe 1 :</td><td><input type='text' name='score1' size='20' value='$score1'></td></tr>";
                            echo "<tr><td>Score Equipe 2 :</td><td><input type='text' name='score2' size='20' value='$score2'></td></tr>";
                            echo "<tr><td>Tir au But  :</td><td><input type='checkbox' name='tir_but_Non' size='20' value='$tir_but'>Non<input type='checkbox' name='tir_but_oui' size='20' value='$tir_but'>Oui</td></tr>";
                            echo "<tr><td>Score additionnel Equipe 1 :</td><td><input type='text' name='score3' size='20' value='$score3' placeholder='$scoreNul'></td></tr>";
                            echo "<tr><td>Score additionnel Equipe 2 :</td><td><input type='text' name='score4' size='20' value='$score4' placeholder='$scoreNul'></td></tr>";
                            echo "<tr><td>Nom Equipe Vainqueur :</td><td><input type='text' name='nomVainqueur' size='20' value='$nomVainqueur'></td></tr>";
                            echo "</table>";
                        
                            if (isset($_POST['tir_but_Non'])){
                                $tir_but = 0;
                            }
                            else{
                                $tir_but = 1;
                            }
                    }
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
                    <li><a href='vue_match.php'>retour accueil</a></li>
                </ul>
        </form>
    </body>
</html>