<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Création d'une Equipe</title>
</head>
<body>
    <form action="../controleur/controleur_equipe.php" method="POST">
        <input type='hidden' name='mode' value='1'>
        <table border=0>
            <tr>
                <td align="left" colspan="2"><h1>Formulaire de création d'une equipe</h1></td>
            </tr>
            <tr>
                <td align="left">Nom de l'equipe :</td>
                <td align="left"><input type="text" name="nom" placeholder="Nom"></td>
            </tr>
            <tr>
                <td align="left">Année de Création :</td>
                <td align="left"><input type="text" name="anneeCreation" placeholder="Année de création"></td>
            </tr>
        </table>
        <table border=0>
                <tr>
                    <td align="right" colspan="2" >
                        <input type="submit" value="Ajouter">
                    </td>
                </tr>
        </table>
    </form>
</body>
</html>