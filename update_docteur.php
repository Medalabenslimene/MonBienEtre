<?php
include '../../controlleur/docteurC.php';
include '../../modele/docteur.php';

// Create a docteur
$docteur = null;

// Create an instance of the controller
$docteurC = new docteurC();

// Check if the form has been submitted
if (isset($_POST["submit"])) {
    // Check for the presence of required fields
    if (
        isset($_POST["nom"]) &&
        isset($_POST["prenom"]) &&
        isset($_POST["telephone"]) &&
        isset($_POST["email"]) &&
        isset($_POST["specialite"]) &&
        isset($_POST["heure_depart"])
    ) {
        // Check that required fields are not empty
        if (
            !empty($_POST["nom"]) &&
            !empty($_POST["prenom"]) &&
            !empty($_POST["telephone"]) &&
            !empty($_POST["email"]) &&
            !empty($_POST["specialite"]) &&
            !empty($_POST["heure_depart"])
        ) {
            // Use the correct parameter names when creating the docteur object
            $docteur = new docteur();
            $docteur->setValues(
                $_POST["nom"],
                $_POST["prenom"],
                $_POST["telephone"],
                $_POST["email"],
                $_POST["specialite"],
                $_POST["heure_depart"]
            );

            // Update the docteur in the database
            $docteurC->updateDocteur($docteur, $_POST['id_docteur']);

            // Redirect to the list of docteur after the update
            header('Location: liste_docteur.php');
        }
    }
}

// Retrieve docteur data from the database
if (isset($_GET['id_docteur'])) {
    $oldDocteur = $docteurC->showDocteur($_GET['id_docteur']);
} else {
    // Handle the case where the docteur ID is not specified
    echo "ID du docteur non spécifié.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Docteur</title>

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
                        <h3 class="mb-0">Update Docteur</h3>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST">
                            <input type="hidden" name="id_docteur" value="<?php echo $_GET['id_docteur']; ?>">
                            <div class="text-center mt-3">
                                <a href="liste_docteur.php" class="btn btn-secondary">Back to list</a>
                            </div>
                            <div class="form-group">
                                <label for="nom">Nom:</label>
                                <input type="text" class="form-control" id="nom" name="nom" value="<?php echo isset($_POST['nom']) ? $_POST['nom'] : $oldDocteur['nom']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="prenom">Codele:</label>
                                <input type="text" class="form-control" id="prenom" name="prenom" value="<?php echo isset($_POST['prenom']) ? $_POST['prenom'] : $oldDocteur['prenom']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="telephone">Telephone:</label>
                                <input type="tel" class="form-control" id="telephone" name="telephone" value="<?php echo isset($_POST['telephone']) ? $_POST['telephone'] : $oldDocteur['telephone']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="text" class="form-control" id="email" name="email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : $oldDocteur['email']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="specialite">Specialite:</label>
                                <input type="text" class="form-control" id="specialite" name="specialite" value="<?php echo isset($_POST['specialite']) ? $_POST['specialite'] : $oldDocteur['specialite']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="heure_depart">Heure_depart:</label>
                                <input type="time" class="form-control" id="heure_depart" name="heure_depart" value="<?php echo isset($_POST['heure_depart']) ? $_POST['heure_depart'] : $oldDocteur['heure_depart']; ?>">
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
    <script src="docteur.js"></script>
</body>

</html>