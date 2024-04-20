<?php
include("../modele/modele_match.php");
$les_matchs = array();
$les_matchs = obtenir_liste_des_matchs();
?>

<!DOCTYPE html>
<html lang="fr-FR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter des matchs</title>
</head>
<body align="center">
    <form action="../Controleur/controleur_match.php" method="POST">
        <input type="hidden" name="mode" value="1">

        <table align="center">
        <table border="">
            
            <tr>
                <td align="left">Date du Match :</td>
                <td align="left"><input type="date" name="dateMatch"></td>
            </tr>
            <tr>
                <td align="left">Nom du tournoi :</td>
                <td align="left">
                    <select name="nomTournoi" id="">
                        <?php 
                            foreach ($les_matchs as $match) { ?>
                                <option value="<?php echo $match['nomTournoi']; ?>"><?php echo $match['nomTournoi']; ?></option>
                        <?php } ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td align="left">Nom Equipe 1 :</td>
                <td align="left">
                    <select name="nomEquipe1" id="">
                        <?php foreach ($les_matchs as $equipe) { ?>
                            <option value="<?php echo $equipe['nomEquipe1']; ?>"><?php echo $equipe['nomEquipe1']; ?></option>
                        <?php } ?>
                    </select>
                </td>
            </tr>
            
            <tr>
                <td align="left">Nom Equipe 2 :</td>
                <td align="left">
                    <select name="nomEquipe2" id="">
                        <?php foreach ($les_matchs as $equipe) { ?>
                            <option value="<?php echo $equipe['nomEquipe2']; ?>"><?php echo $equipe['nomEquipe2']; ?></option>
                        <?php } ?>
                    </select>
                </td>
            </tr>
            
            <tr>
                <td align="left">Tirs au but :</td>
                <td align="left">
                    <label>
                        <input type="radio" name="choix" value="1"> Oui
                    </label>
                    <label>
                        <input type="radio" name="choix" value="0"> Non
                    </label>
                </td>
            </tr>
            <tr>
                <td align="left">Score Equipe 1 :</td>
                <td align="left"><input type="number" name="score1"></td>
            </tr>
            <tr>
                <td align="left">Score Equipe 2 :</td>
                <td align="left"><input type="number" name="score2"></td>
            </tr>
        <tr>
            <td align="left">Score Additionnel Equipe 1 :</td>
            <td align="left"><input type="number" name="score3"></td>
        </tr>
        <tr>
            <td align="left">Score Additionnel Equipe 2 :</td>
            <td align="left"><input type="number" name="score4"></td>
        </tr>
        <tr>
                <td align="left">Nom de l'équipe Vainqueur :</td>
                <td align="left">
                    <select name="winner" id="">
                        <?php for ($i = 0; $i < count($les_matchs); $i++) { ?>
                            <option value="<?php echo $les_matchs[$i]['nomVainqueur']; ?>"><?php echo $les_matchs[$i]['nomVainqueur']; ?></option>
                        <?php } ?>
                    </select>
                </td>
            </tr>
        <tr>
                <td align="center" colspan="2">
                <input type="submit" value="ajouter" name="envoyer">
        </td>
        </tr>
        <tr>
                <td align="center" colspan="2">
                <a href="vue_match.php">Liste des matchs</a>
        </td>
        </tr>
        </table>
        </form>

        </body>
        </html>