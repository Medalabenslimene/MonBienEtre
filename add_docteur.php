<?php

include('../../controlleur/doctorC.php');
include('../../modele/docteur.php');

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
        !empty($_POST["nom"]) &&
        !empty($_POST["prenom"]) &&
        preg_match("/^[a-zA-Z ]*$/", $_POST["nom"]) &&  // Vérifie si le nom contient uniquement des lettres et des espaces
        preg_match("/^[a-zA-Z ]*$/", $_POST["prenom"]) &&  // Vérifie si le prénom contient uniquement des lettres et des espaces
        !empty($_POST["telephone"]) &&
        !empty($_POST["adresse"]) &&
        !empty($_POST["email"]) &&
        !empty($_POST["password"]) &&
        !empty($_POST["specialite"])
    ) {
        $doctor = new Doctor();
        $doctor->setValues(
            $_POST["nom"],
            $_POST["prenom"],
            $_POST["telephone"],
            $_POST["adresse"],
            $_POST["email"],
            $_POST["password"],
            $_POST["specialite"]
        );

        $doctorC->addDoctor($doctor);
        header('Location: liste_docteur.php');
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
    <title>Formulaire d'inscription du docteur</title>
</head>
<body>
    <div class="container">
        <header class="text-center mt-4 mb-4">Inscription du docteur</header>
        <form action="" method="POST">
            <div class="form">
                <div class="details personal">
                    <span class="title">Détails du docteur</span>
                    <div class="fields">
                        <!-- Add your form fields for doctor attributes -->
                        <div class="input-field">
                            <label><i class="uil uil-user"></i> Nom du docteur</label>
                            <input class="form-control" type="text" name="nom" placeholder="Entrez le nom du docteur" required>
                        </div>
                        <div class="input-field">
                            <label><i class="uil uil-user"></i> Prénom du docteur</label>
                            <input class="form-control" type="text" name="prenom" placeholder="Entrez le prénom du docteur" required>
                        </div>
                        <div class="input-field">
                            <label><i class="uil uil-phone"></i> Téléphone</label>
                            <input class="form-control" type="tel" name="telephone" placeholder="Entrez le numéro de téléphone" required>
                        </div>
                        <div class="input-field">
                            <label><i class="uil uil-home"></i> Adresse</label>
                            <input class="form-control" type="text" name="adresse" placeholder="Entrez l'adresse" required>
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
                            <label><i class="uil uil-medkit"></i> Spécialité</label>
                            <input class="form-control" type="text" name="specialite" placeholder="Entrez la spécialité" required>
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
