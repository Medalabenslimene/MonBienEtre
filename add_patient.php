<?php

include('../../controlleur/patientC.php');
include('../../modele/patient.php');

// create patient
$patient = null;

// create an instance of the controller
$patientC = new PatientC();

if (
    isset($_POST["nom"]) &&
    isset($_POST["prenom"]) &&
    isset($_POST["telephone"]) &&
    isset($_POST["email"]) &&
    isset($_POST["genre"]) &&
    isset($_POST["heure_rdv"])
) {
    if (
        !empty($_POST["nom"]) &&
        !empty($_POST["prenom"]) &&
        !empty($_POST["telephone"]) &&
        !empty($_POST["email"]) &&
        !empty($_POST["genre"]) &&
        !empty($_POST["heure_rdv"])
    ) {
        echo 'start saving';
        $patient = new PATIENT();
        $patient->setValues(
            $_POST["nom"],
            $_POST["prenom"],
            $_POST["telephone"],
            $_POST["email"],
            $_POST["genre"],
            $_POST["heure_rdv"]
        );
        /*print_r($patient);
        return;*/
        $patientC->addPatient($patient);
        header('Location: liste_patient.php');
    } else {
        // Display an error message if fields are empty
        echo 'Erreur : Veuillez remplir tous les champs.';
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap.min.css" />
    <link rel="stylesheet" href="style2.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    
    <title> Ajout un patient </title>

</head>

<body>
<style>
        body {
            /* Set your background image and size */
            background-image: url('docteur1.jpg');
            background-size: cover;
            background-position: center;

            /* For modern browsers */
            background-color: rgba(255, 255, 255, 0.5);
            /* For older browsers */
            filter: alpha(opacity=50);
            /* Set your background image and size */
        background-image: url('docteur1.jpg');
        background-size: cover;
        background-position: center;
        /* For modern browsers */
        background-color: rgba(255, 255, 255, 0.5);
        /* For older browsers */
        filter: alpha(opacity=50);
    }

</style>
    <div class="container">
        <header class="text-center mt-4 mb-4">Ajout de patient </header>
        <form action="" method="POST" onsubmit="return validateForm()">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Détails du patient</h5>
                    <div class="form-group">
                        <label for="nom"><i class="uil uil-user"></i> Nom</label>
                        <input class="form-control" type="text" id="nom" name="nom" placeholder="Entrez le nom" required>
                    </div>
                    <div class="form-group">
                        <label for="prenom"><i class="uil uil-user"></i> Prenom</label>
                        <input class="form-control" type="text" id="prenom" name="prenom" placeholder="Entrez le prenom" required>
                    </div>
                    <div class="form-group">
                        <label for="telephone"><i class="uil uil-phone"></i> Telephone</label>
                        <input class="form-control" type="tel" id="telephone" name="telephone" placeholder="Entrez le telephone" required>
                    </div>
                    <div class="form-group">
                        <label for="email"><i class="uil uil-hospital"></i> Email</label>
                        <input class="form-control" type="text" id="email" name="email" placeholder="Entrez le email" required>
                    </div>
                    <div class="form-group">
                        <label for="genre"><i class="uil uil-calendar"></i> genre </label>
                        <input class="form-control" type="text" id="genre" name="genre" required>
                    </div>
                    <div class="form-group">
                        <label for="heure_rdv"><i class="uil uil-clock"></i> Heure_rdv</label>
                        <input class="form-control" type="time" id="heure_depart" name="heure_rdv" required>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary btn-block" type="submit">Ajouter le patient </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <script src="patient.js"></script>
</body>

</html>
