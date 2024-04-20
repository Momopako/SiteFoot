<html>
    <head>
        <title> tournoi</title>
        <meta NAME="Author" CONTENT="Thierry Blavin">
        <meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8">
        <!-- appel feuille de style -->
        <link href="accueil.css" type="text/css" rel="stylesheet" media="all">
    </head>
    <body align="center">
        <form action="controleur_joueur.php" method="POST">
                <input type='hidden' name='mode' value='1'>
                <h1 class ="titre" align ="center"> Bienvenue au tournoi de foot de l'association </h1>
                <table border=0>
                <tr>
                    <td align="center" colspan="2">
                        <a href="vue_tournoi.php"> Menu Tournoi</a>
                    </td>
                </tr>

                <tr>
                    <td align="center" colspan="2">
                        <a href="vue_joueur.php"> Menu Joueur</a>
                    </td>
                </tr>

                <tr>
                    <td align="center" colspan="2">
                        <a href="vue_equipe.php"> Menu Equipe</a>
                    </td>
                </tr>

                <tr>
                    <td align="center" colspan="2">
                        <a href="vue_licence.php"> Menu Licence</a>
                    </td>
                </tr>

                <tr>
                    <td align="center" colspan="2">
                        <a href="vue_match.php"> Menu Match</a>
                    </td>
                </tr>

                <tr>
                    <td align="center" colspan="2">
                        <a href="vue_classement.php"> Menu Classement</a>
                    </td>



                </table>
            </fieldset>
        </form>
    </body>
</html>