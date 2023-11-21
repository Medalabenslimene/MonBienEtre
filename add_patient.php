<?php

include('../../controlleur/patientC.php');
include('../../modele/patient.php');

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
        !empty($_POST["nom"]) &&
        !empty($_POST["prenom"]) &&
        preg_match("/^[a-zA-Z ]*$/", $_POST["nom"]) &&  // Vérifie si le nom contient uniquement des lettres et des espaces
        preg_match("/^[a-zA-Z ]*$/", $_POST["prenom"]) &&  // Vérifie si le prénom contient uniquement des lettres et des espaces
        !empty($_POST["age"]) &&
        !empty($_POST["genre"]) &&
        !empty($_POST["email"]) &&
        !empty($_POST["password"]) &&
        !empty($_POST["telephone"])
    ) {
        $patient = new Patient();
        $patient->setValues(
            
            $_POST["nom"],
            $_POST["prenom"],
            $_POST["age"],
            $_POST["email"],
            $_POST["password"],
            $_POST["telephone"],
            $_POST["genre"]
        );

        $patientC->addPatient($patient);
        header('Location: liste_patient.php');
    } else {
        // Afficher un message d'erreur si les champs "nom" ou "prenom" sont vides ou invalides
        echo 'Erreur : Veuillez saisir un nom et un prénom valides.';
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="style2.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <title>Formulaire d'inscription du patient</title>
</head>
<body>
    <div class="container">
        <header class="text-center mt-4 mb-4">Inscription du patient</header>
        <form action="" method="POST">
            <div class="form">
                <div class="details personal">
                    <span class="title">Détails du patient</span>
                    <div class="fields">
                        <!-- Add your form fields for patient attributes -->
                        <div class="input-field">
                            <label><i class="uil uil-user"></i> Nom du patient</label>
                            <input class="form-control" type="text" name="nom" placeholder="Entrez le nom du patient" required>
                        </div>
                        <div class="input-field">
                            <label><i class="uil uil-user"></i> Prénom du patient</label>
                            <input class="form-control" type="text" name="prenom" placeholder="Entrez le prénom du patient" required>
                        </div>
                        <div class="input-field">
                            <label><i class="uil uil-age"></i> Âge</label>
                            <input class="form-control" type="number" name="age" placeholder="Entrez l'âge" required>
                        </div>
                        <div class="input-field">
                            <label><i class="uil uil-venus-mars"></i> Genre</label>
                            <select name="genre" required>
                                <option disabled selected><i class="uil uil-venus-mars"></i> Sélectionnez le genre</option>
                                <option value="Homme">Homme</option>
                                <option value="Femme">Femme</option>
                                <option value="Autre">Autre</option>
                            </select>
                        </div>
                        <div class="input-field">
                            <label><i class="uil uil-envelope"></i> Email</label>
                            <input type="email" name="email" placeholder="Entrer votre Email" required>
                        </div>
                        <div class="input-field">
                            <label><i class="uil uil-key-skeleton"></i> Mot de passe</label>
                            <input type="password" name="password" placeholder="Entrer votre Mot de passe" required>
                        </div>
                        <div class="input-field">
                            <label><i class="uil uil-phone"></i> Téléphone</label>
                            <input class="form-control" type="text" name="telephone" placeholder="Entrez le numéro de téléphone" required>
                        </div>
                        <!-- Add more fields as needed -->
                        <div class="submit-button">
                            <button class="btn btn-primary w-100 py-3" type="submit">S'inscrire</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>
</html>
