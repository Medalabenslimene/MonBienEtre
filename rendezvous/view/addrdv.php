<?php
include '../controller/appoint.php'; // Assurez-vous d'importer votre fichier de contrôleur approprié
include '../model/rdvv.php'; // Assurez-vous d'importer votre modèle approprié

$rdv = null;
$rdvC = new RDVC(); // Assurez-vous d'instancier la classe correcte

if (
    isset($_POST["specialite"]) &&
    isset($_POST["date"]) &&
    isset($_POST["heure"]) &&
    isset($_POST["description"]) &&
    isset($_POST["id_user"])
) {
    if (
        !empty($_POST['specialite']) &&
        !empty($_POST["date"]) &&
        !empty($_POST["heure"]) &&
        !empty($_POST["description"]) &&
        !empty($_POST["id_user"])
    ) {
        $rdv = new RDV(
            null,
            $_POST['specialite'],
            $_POST['date'],
            $_POST['heure'],
            $_POST['description'],
            $_POST['id_user']
        );
        $rdvC->addRDV($rdv); // Assurez-vous que votre contrôleur a une méthode addRDV
        header('Location: listrdv.php');
    }
}
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rendez-vous</title>
</head>

<body>
    <a href="listrdv.php">Back to list</a>
    <hr>

    <form action="" method="POST">
        <table>
            <tr>
                <td><label for="specialite">Spécialité :</label></td>
                <td>
                    <input type="text" id="specialite" name="specialite" />
                </td>
            </tr>
            <tr>
                <td><label for="date">Date :</label></td>
                <td>
                    <input type="text" id="date" name="date" />
                </td>
            </tr>
            <tr>
                <td><label for="heure">Heure :</label></td>
                <td>
                    <input type="text" id="heure" name="heure" />
                </td>
            </tr>
            <tr>
                <td><label for="description">Description :</label></td>
                <td>
                    <input type="text" id="description" name="description" />
                </td>
            </tr>
            <tr>
                <td><label for="id_user">ID Utilisateur :</label></td>
                <td>
                    <input type="text" id="id_user" name="id_user" />
                </td>
            </tr>

            <td>
                <input type="submit" value="Save">
            </td>
            <td>
                <input type="reset" value="Reset">
            </td>
        </table>
    </form>
</body>

</html>


