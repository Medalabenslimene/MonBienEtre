<?php

include '../../controlleur/reclamationC.php';
include '../../modele/reclamation.php';

// create reclamation
$reclamation = null;
// create an instance of the controller
$reclamationC = new ReclamationC();

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
        
        $reclamationC->updateReclamation($reclamation, $_GET['id_reclamation']);

        header('Location:liste_reclamations.php');
    }
}

?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reclamation Display</title>
</head>

<body>
    <button><a href="liste_reclamations.php">Back to list</a></button>
    <hr>

    <?php
    if (isset($_GET['id_reclamation'])) {
        $oldReclamation = $reclamationC->showReclamation($_GET['id_reclamation']);
        
    ?>

        <form action="" method="POST">
            <table>
                <tr>
                    <td><label for="id_reclamation">Id Reclamation :</label></td>
                    <td>
                        <input type="text" id="id_reclamation" name="id_reclamation" value="<?php echo $_GET['id_reclamation'] ?>" readonly />
                    </td>
                </tr>
                <tr>
                    <td><label for="pseudo">Pseudo :</label></td>
                    <td>
                        <input type="text" id="pseudo" name="pseudo" value="<?php echo $oldReclamation['pseudo'] ?>" />
                    </td>
                </tr>
                <tr>
                    <td><label for="cin">CIN :</label></td>
                    <td>
                        <input type="text" id="cin" name="cin" value="<?php echo $oldReclamation['CIN'] ?>" />
                    </td>
                </tr>
                <tr>
                    <td><label for="type">Type :</label></td>
                    <td>
                        <input type="text" id="type" name="type" value="<?php echo $oldReclamation['type'] ?>" />
                    </td>
                </tr>
                <tr>
                    <td><label for="commentaire">Commentaire :</label></td>
                    <td>
                        <input type="text" id="commentaire" name="commentaire" value="<?php echo $oldReclamation['commentaire'] ?>" />
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
    <?php
    }
    ?>
</body>

</html>
