<?php
include ("../Modele/modele_joueur.php");


$joueurs = obtenir_par_value();

?>

<html>
    <head>
        <title>Création d'un Joueur</title>
        <meta NAME="Author" CONTENT="Thierry Blavin">
        <meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8">
        <!-- appel feuille de style -->
        <link href="accueil.css" type="text/css" rel="stylesheet" media="all">
    </head>
    <body align="center">
        <form action="../Controleur/controleur_joueur.php" method="POST">
                <input type='hidden' name='mode' value='1'>
                <h1 class ="titre" align ="center"> CREATION D'UN JOUEUR</h1>
                <table border=0>
                <tr>

                    <label for="nom">Nom:</label>
                    <input type="text"  name="nom"><br><br>
                    
                </tr>

                <tr>
                    <label for="prenom">Prénom:</label>
                    <input type="text" name="prenom"><br><br>
                </tr>

                <tr>
                    <label for="date_naissance">Date de naissance:</label>
                    <input type="date"  name="date_naissance"><br><br>
                </tr>
                <tr>
                    <label for="id_licence">ID Licence:</label>
                    <input type="number"  name="id_licence"><br><br>
                </tr>
                <tr>
                    <select name="numero" id="">
                        <?php foreach($joueurs as $licence){ ?>
                            <option value="<?php echo $licence['licence.numero'];?>"><?php echo $licence['licence.numero']; ?></option>
                        <?php } ?>
                    </select>
                </tr>
                </table>
                    <table border=0>
                        <tr>
                            <td align="right" colspan="2" >
                                <input type="submit" value="Ajouter">
                            </td>
                        </tr>
                    </table>

                <ul>
                    <li><a href='vue_joueur.php'>Retour Accueil</a></li>
                </ul>
        </form>
    </body>
</html>