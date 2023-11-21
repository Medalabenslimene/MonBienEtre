<?php

include '../../controlleur/PatientC.php';
include '../../modele/patient.php';

// Create patient
$patient = null;

// Create an instance of the controller
$patientC = new PatientC();

if (
    isset($_POST["nom"]) &&
    isset($_POST["prenom"]) &&
    isset($_POST["age"]) &&
    isset($_POST["genre"]) &&
    isset($_POST["email"]) &&
    isset($_POST["password"]) &&
    isset($_POST["telephone"])
) {
    if (
        !empty($_POST['nom']) &&
        !empty($_POST["prenom"]) &&
        !empty($_POST["age"]) &&
        !empty($_POST["genre"]) &&
        !empty($_POST["email"]) &&
        !empty($_POST["password"]) &&
        !empty($_POST["telephone"])
    ) {
        // Use the correct parameter names when creating the Patient object
        $patient = new Patient();
        $patient->setValues(
            $_POST['nom'],
            $_POST['prenom'],
            $_POST['age'],
            $_POST['genre'],
            $_POST['email'],
            $_POST['password'],
            $_POST['telephone']
        );

        // Update should use $_GET['id_patient'] instead of $_GET['id']
        $patientC->updatePatient($patient, $_GET['id_patient']);

        header('Location: liste_patient.php');
    }
}

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Patient Information</title>
</head>

<body>
    <button><a href="liste_patient.php">Back to list</a></button>
    <hr>

    <?php
    if (isset($_GET['id_patient'])) {
        $oldPatient = $patientC->showPatient($_GET['id_patient']);
    ?>

        <form action="" method="POST">
            
            <table>
                <tr>
                    <td><label for="nom">Nom :</label></td>
                    <td>
                        <input type="text" id="nom" name="nom" value="<?php echo $oldPatient['nom'] ?>" />
                    </td>
                </tr>
                <tr>
                    <td><label for="prenom">Prenom :</label></td>
                    <td>
                        <input type="text" id="prenom" name="prenom" value="<?php echo $oldPatient['prenom'] ?>" />
                    </td>
                </tr>
                <tr>
                    <td><label for="age">Age :</label></td>
                    <td>
                        <input type="text" id="age" name="age" value="<?php echo $oldPatient['age'] ?>" />
                    </td>
                </tr>
                <tr>
                    <td><label for="genre">Genre :</label></td>
                    <td>
                        <input type="text" id="genre" name="genre" value="<?php echo $oldPatient['genre'] ?>" />
                    </td>
                </tr>
                <tr>
                    <td><label for="email">Email :</label></td>
                    <td>
                        <input type="text" id="email" name="email" value="<?php echo $oldPatient['email'] ?>" />
                    </td>
                </tr>
                <tr>
                    <td><label for="password">Password :</label></td>
                    <td>
                        <input type="password" id="password" name="password" value="<?php echo $oldPatient['password'] ?>" />
                    </td>
                </tr>
                <tr>
                    <td><label for="telephone">Telephone :</label></td>
                    <td>
                        <input type="text" id="telephone" name="telephone" value="<?php echo $oldPatient['telephone'] ?>" />
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
