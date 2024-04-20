<html>
    <head>
        <title>Menu des matchs</title>
        <meta NAME="Author" CONTENT="Thierry Blavin">
        <meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8">
        <!-- appel feuille de style -->
        <link href="style_op.css" type="text/css" rel="stylesheet" media="all">
    </head>
    <body align="center">
        <form action="../Vue/vue_match_creation.php" method="POST">
                    <input type='hidden' name='mode' value='3'>
                    <table border=0>
                    <tr>
                        <td align="center" colspan="8"><b>Nos Matchs</b></td>
                    </tr>
                    <tr>
                           
                        <th>ID </th>
                        <th> Date Match</th>
                        <th> Nom Tournoi</th>
                        <th> Nom Equipe 1</th>
                        <th> Nom Equipe 2<br></th> 
                        <th> Score Equipe 1<br></th> 
                        <th> Score Equipe 2<br></th>
                        <th> Tir au But ?  <br></th>
                        <th> Score additionnel Equipe 1 <br></th>
                        <th> Score additionnel Equipe 2 <br></th>
                        <th> Nom Vainqueur<br></th>
                    </tr>  
                    <?php
                        //Inclusion du modèle du design paterb MVC
                        include '../modele/modele_match.php';

                        // création du tableau des étudiants à ce stade)
                        $les_matchs = array();
                        $les_equipes = array();
                        $les_tournois = array();
                        // appel de la fonction depuis le modèle pour la récupération de la liste des étudiants
                        $les_matchs = obtenir_liste_des_matchs(); 

                        // nombre de lignes à afficher
                        $nb = count($les_matchs); 

                        if($nb > 0) // on a le nombre de ligne du tableau
                        {
                            // attention dans un tableau la numérotation commence à zéro
                            $i=0;						
                            while ($i<$nb)
                            {
                                $un_match=$les_matchs[$i];  // extraction d'une ligne du tableau "les_adherents"
                                $id=$un_match['idMatch'];			// extraction des champs de la ligne
                                $date_match=$un_match['date_match'];
                                $id_tournoi=$un_match['id_tournoi'];
                                $nomTournoi=$un_match['nomTournoi'];
                                $nomEquipe1=$un_match['nomEquipe1'];
                                $nomEquipe2=$un_match['nomEquipe2'];
                                $id_equipe1=$un_match['id_equipe1'];
                                $id_equipe2=$un_match['id_equipe2'];
                                $score1=$un_match['score1'];
                                $score2=$un_match['score2'];
                                $tir_but=$un_match['tir_but'];
                                $score3=$un_match['score3'];
                                $score4=$un_match['score4'];
                                $id_vainqueur=$un_match['id_vainqueur'];
                                $nomVainqueur=$un_match['nomVainqueur'];
                                
                                if ($score3 == NULL){
                                    $score3 = "Pas de score additionnel";
                                }
                                if ($score4 == NULL){
                                    $score4 = "Pas de score additionnel";
                                }
                                
                                echo "<td>$id </a></td><td> $date_match </td><td> $nomTournoi</td><td>$nomEquipe1 </td><td> $nomEquipe2 </td><td>$score1</td><td>$score2</td><td>$tir_but</td><td>$score3</td><td>$score4</td><td>$nomVainqueur</td>";
                                echo "<td><a href='vue_match_update.php?id=$id'>Modifier</a></td>";
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