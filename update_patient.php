<?php
include '../../controlleur/patientC.php';
include '../../modele/patient.php';

// Create a patient
$patient = null;

// Create an instance of the controller
$patientC = new patientC();

// Check if the form has been submitted
if (isset($_POST["submit"])) {
    // Check for the presence of required fields
    if (
        isset($_POST["nom"]) &&
        isset($_POST["prenom"]) &&
        isset($_POST["telephone"]) &&
        isset($_POST["email"]) &&
        isset($_POST["genre"]) &&
        isset($_POST["heure_rdv"])
    ) {
        // Check that required fields are not empty
        if (
            !empty($_POST["nom"]) &&
            !empty($_POST["prenom"]) &&
            !empty($_POST["telephone"]) &&
            !empty($_POST["email"]) &&
            !empty($_POST["genre"]) &&
            !empty($_POST["heure_rdv"])
        ) {
            // Use the correct parameter names when creating the patient object
            $patient = new patient();
            $patient->setValues(
                $_POST["nom"],
                $_POST["prenom"],
                $_POST["telephone"],
                $_POST["email"],
                $_POST["genre"],
                $_POST["heure_rdv"]
            );

            // Update the patient in the database
            $patientC->updatepatient($patient, $_POST['id_patient']);

            // Redirect to the list of patient after the update
            header('Location: liste_patient.php');
        }
    }
}

// Retrieve patient data from the database
if (isset($_GET['id_patient'])) {
    $oldPatient = $patientC->showPatient($_GET['id_patient']);
} else {
    // Handle the case where the patient ID is not specified
    echo "ID du patient non spécifié.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Patient</title>

    <!-- Add links to Bootstrap CSS files -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h3 class="mb-0">Update Patient</h3>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST">
                            <input type="hidden" name="id_patient" value="<?php echo $_GET['id_patient']; ?>">
                            <div class="text-center mt-3">
                                <a href="liste_patient.php" class="btn btn-secondary">Back to list</a>
                            </div>
                            <div class="form-group">
                                <label for="nom">Nom:</label>
                                <input type="text" class="form-control" id="nom" name="nom" value="<?php echo isset($_POST['nom']) ? $_POST['nom'] : $oldPatient['nom']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="prenom">Codele:</label>
                                <input type="text" class="form-control" id="prenom" name="prenom" value="<?php echo isset($_POST['prenom']) ? $_POST['prenom'] : $oldPatient['prenom']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="telephone">Telephone:</label>
                                <input type="tel" class="form-control" id="telephone" name="telephone" value="<?php echo isset($_POST['telephone']) ? $_POST['telephone'] : $oldPatient['telephone']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="text" class="form-control" id="email" name="email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : $oldPatient['email']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="genre">genre:</label>
                                <input type="text" class="form-control" id="genre" name="genre" value="<?php echo isset($_POST['genre']) ? $_POST['genre'] : $oldPatient['genre']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="heure_rdv">Heure_rdv:</label>
                                <input type="time" class="form-control" id="heure_rdv" name="heure_rdv" value="<?php echo isset($_POST['heure_rdv']) ? $_POST['heure_rdv'] : $oldPatient['heure_rdv']; ?>">
                            </div>
                            <button type="submit" class="btn btn-primary" name="submit">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Add links to Bootstrap JavaScript files (if needed) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="patient.js"></script>
</body>

</html>