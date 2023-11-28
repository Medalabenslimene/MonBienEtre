
<?php
include '../Controller/animals.php';
include '../Model/Animal.php';

// create client
$Animal = null;

// create an instance of the controller
$AnimalC = new Animal();
if (
    isset($_POST["name"]) &&
    isset($_POST["species"]) &&
    isset($_POST["treatable"]) 
) {
    if (
        !empty($_POST['name']) &&
        !empty($_POST["species"]) &&
        !empty($_POST["treatable"]) 
    ) {
        $Animal = new Animal(
            null,
            $_POST['name'],
            $_POST['species'],
            $_POST['treatable'],
        );
        $animals->addJoueur($animal);
        header('Location:/View/listanimals.php');
    }
}


?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/View/Cssfile.css">
    <title>Animals </title>
</head>

<body>
    <a href="listanimals.php">Back to list </a>
    <hr>

    <form action="" method="POST">
        <table>
             <tr>
                <td><label for="id">Id de l'animal :</label></td>
                <td>
                    <input type="text" id="id" name="id" />
                </td>
            </tr>
            <tr>
                <td><label for="nom">Nom :</label></td>
                <td>
                    <input type="text" id="nom" name="nom" />
                </td>
            </tr>
            <tr>
                <td><label for="Species">Prénom :</label></td>
                <td>
                    <input type="text" id="prenom" name="prenom" />
                </td>
            </tr>
            <tr>
                
                <label for="treatable">Treatable:</label>
                <input type="text" id="treatable" name="treatable"><br>
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