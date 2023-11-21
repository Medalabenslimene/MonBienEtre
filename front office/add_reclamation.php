<?php

include '../../controlleur/reclamationC.php';
include '../../modele/reclamation.php';

// create reclamation
$reclamation = null;

// create an instance of the controller
if (
    isset($_POST["pseudo"]) &&
    isset($_POST["cin"]) &&
    isset($_POST["type"]) &&
    isset($_POST["commentaire"])
    ) {
        if (
            !empty($_POST['pseudo']) &&
            !empty($_POST["cin"]) &&
            !empty($_POST["type"]) &&
            !empty($_POST["commentaire"])
            ) {
                $reclamation = new Reclamation(
                    null,
                    $_POST['pseudo'],
                    $_POST['cin'],
                    $_POST['type'],
                    $_POST['commentaire']
                );
        var_dump($reclamation);
        $reclamationC = new ReclamationC();
        $reclamationC->addReclamation($reclamation);
        //header('Location:liste_reclamation.php');
    }
}

?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reclamation</title>
</head>

<body>
    <a href="liste_reclamation.php">Back to list </a>
    <hr>

    <form action="" method="POST">
        <table>
            <tr>
                <td><label for="pseudo">Pseudo :</label></td>
                <td>
                    <input type="text" id="pseudo" name="pseudo" />
                </td>
            </tr>
            <tr>
                <td><label for="cin">CIN :</label></td>
                <td>
                    <input type="number" id="cin" name="cin" />
                </td>
            </tr>
            <tr>
                <td><label for="type">Type :</label></td>
                <td>
                    <input type="text" id="type" name="type" />
                </td>
            </tr>
            <tr>
                <td><label for="commentaire">Commentaire :</label></td>
                <td>
                    <input type="text" id="commentaire" name="commentaire" />
                </td>
            </tr>

            <td>
                <input type="submit" value="Save">
            </td>
           
        </table>
    </form>
</body>

</html>
