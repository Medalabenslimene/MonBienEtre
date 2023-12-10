<?php
include '../../controlleur/reclamationC.php';
include '../../modele/reclamation.php';

// Créer une instance du contrôleur
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

        header('Location:consulreclam.php');
        exit();
    }
}

if (isset($_GET['id_reclamation'])) {
    $oldReclamation = $reclamationC->showReclamation($_GET['id_reclamation']);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reclamation Update</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            overflow: hidden;
        }

        h2 {
            color: #333;
        }

        form {
            margin-top: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            box-sizing: border-box;
        }

        input[type="submit"],
        input[type="reset"] {
            width: 49%;
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            box-sizing: border-box;
        }

        input[type="submit"]:hover,
        input[type="reset"]:hover {
            background-color: #45a049;
        }

        .back-link {
            display: block;
            margin-top: 20px;
            color: #4CAF50;
            text-decoration: none;
            font-size: 18px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Modifier la Réclamation</h2>
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
                <tr>
                    <td>
                        <input type="submit" value="Save">
                    </td>
                    <td>
                        <input type="reset" value="Reset">
                    </td>
                </tr>
            </table>
        </form>
        <a href="liste_reclamations.php" class="back-link">Retour à la liste </a>
    </div>
</body>

</html>
