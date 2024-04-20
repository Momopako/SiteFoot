
<html>
    <head>
        <title> Création d'une Licence</title>
        <meta NAME="Author" CONTENT="Thierry Blavin">
        <meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8">
        <!-- appel feuille de style -->
        <link href="accueil.css" type="text/css" rel="stylesheet" media="all">
    </head>
    <body align="center">
        <form action="../Controleur/controleur_licence.php" method="POST">
            <fieldset>
                <input type='hidden' name='mode' value='1'>
                <h1 class ="titre" align ="center"> CREATION D'UNE LICENCE</h1>
                <table border=0>
                <tr>

                    <label for="nom">Numéro:</label>
                    <input type="option"  name="numero"><br><br>
                    
                </tr>

                <tr>
                    <label for="categorie">Catégorie:</label>
                    <input type="text" name="categorie"><br><br>
                </tr>

                <tr>
                    <label for="annee_licence">Année de la licence:</label>
                    <input type="number"  name="annee_licence"><br><br>
                </tr>

                <tr>
                    <label for="status_licence">Status Licence:</label>
                    <input type="option" name="status_licence" placeholder="1: Valide  0: Permié"><br><br>
                </tr>

                <input type="submit" value="Ajouter">

                </table>
                </table>
                <ul>
                    <li><a href='vue_licence.php'>Retour au Menu Licence</a></li>
                </ul>
            </fieldset>
        </form>
    </body>
</html>