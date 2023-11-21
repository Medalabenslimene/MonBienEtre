<?php

include '../../controlleur/DoctorC.php';
include '../../modele/Doctor.php';

// Create doctor
$doctor = null;

// Create an instance of the controller
$doctorC = new DoctorC();

if (
    isset($_POST["nom"]) &&
    isset($_POST["prenom"]) &&
    isset($_POST["telephone"]) &&
    isset($_POST["adresse"]) &&
    isset($_POST["email"]) &&
    isset($_POST["password"]) &&
    isset($_POST["specialite"])
) {
    if (
        !empty($_POST['nom']) &&
        !empty($_POST["prenom"]) &&
        !empty($_POST["telephone"]) &&
        !empty($_POST["adresse"]) &&
        !empty($_POST["email"]) &&
        !empty($_POST["password"]) &&
        !empty($_POST["specialite"])
    ) {
        // Use the correct parameter names when creating the Doctor object
        $doctor = new Doctor();
        $doctor->setValues(
            $_POST['nom'],
            $_POST['prenom'],
            $_POST['telephone'],
            $_POST['adresse'],
            $_POST['email'],
            $_POST['password'],
            $_POST['specialite']
        );

        // Update should use $_GET['id_docteur'] instead of $_GET['id']
        $doctorC->updateDoctor($doctor, $_GET['id_docteur']);

        header('Location: liste_doctor.php');
    }
}

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Doctor Information</title>
</head>

<body>
    <button><a href="liste_doctor.php">Back to list</a></button>
    <hr>

    <?php
    if (isset($_GET['id_docteur'])) {
        $oldDoctor = $doctorC->showDoctor($_GET['id_docteur']);
    ?>

        <form action="" method="POST">
            <table>
                <tr>
                    <td><label for="nom">Nom :</label></td>
                    <td>
                        <input type="text" id="nom" name="nom" value="<?php echo $oldDoctor['nom'] ?>" />
                    </td>
                </tr>
                <tr>
                    <td><label for="prenom">Prenom :</label></td>
                    <td>
                        <input type="text" id="prenom" name="prenom" value="<?php echo $oldDoctor['prenom'] ?>" />
                    </td>
                </tr>
                <tr>
                    <td><label for="telephone">Telephone :</label></td>
                    <td>
                        <input type="text" id="telephone" name="telephone" value="<?php echo $oldDoctor['telephone'] ?>" />
                    </td>
                </tr>
                <tr>
                    <td><label for="adresse">Adresse :</label></td>
                    <td>
                        <input type="text" id="adresse" name="adresse" value="<?php echo $oldDoctor['adresse'] ?>" />
                    </td>
                </tr>
                <tr>
                    <td><label for="email">Email :</label></td>
                    <td>
                        <input type="text" id="email" name="email" value="<?php echo $oldDoctor['email'] ?>" />
                    </td>
                </tr>
                <tr>
                    <td><label for="password">Password :</label></td>
                    <td>
                        <input type="password" id="password" name="password" value="<?php echo $oldDoctor['password'] ?>" />
                    </td>
                </tr>
                <tr>
                    <td><label for="specialite">Specialite :</label></td>
                    <td>
                        <input type="text" id="specialite" name="specialite" value="<?php echo $oldDoctor['specialite'] ?>" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" value="Save">
                    </td>
                </tr>
            </table>
        </form>
    <?php
    }
    ?>
</body>

</html>
