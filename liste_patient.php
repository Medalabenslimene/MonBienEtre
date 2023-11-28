<?php
include "../../controlleur/patientC.php";

$c = new PatientC();
$tab = $c->listPatient();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap.min.css" />
    <link rel="stylesheet" href="style2.css" />
    <link rel="stylesheet" href="style.css" />
    <title>Liste des patients</title> 
    
</head>
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
    .container {
    background-color: white;
    border-radius: 40px;
    height: 500px; /* Hauteur du carré */
    padding: 20px; /* Ajuster le padding selon la taille du carré */
    box-shadow: 01px 1px rgba(1, 1, 0.1, 0.1);
}

.custom-table { 

    width: 50%;
    margin-top: 40px;
    margin-right: 75px; 
    margin-right: 100px; /* Marge à droite du tableau */
}

.custom-link {
    color: #fff;
}

</style>
<body>
    <div class="container mt-5 center-content">
        <h1 class="text-center">Liste des patients</h1>
        <h2 class="text-center">
            <a href="add_patient.php" class="btn btn-primary">New patient</a>
        </h2>

        <table class="table custom-table">
            <thead class="thead-dark">
                <tr>
                    <th>Id_patient</th>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>Telephone</th>
                    <th>Email</th>
                    <th>genre</th>
                    <th>Heure_rdv</th>
                    <th>Update</th>
                    <th>Delete</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($tab as $patient) : ?>
                    <tr>
                        <td><?= $patient['id_patient']; ?></td>
                        <td><?= $patient['nom']; ?></td>
                        <td><?= $patient['prenom']; ?></td>
                        <td><?= $patient['telephone']; ?></td>
                        <td><?= $patient['email']; ?></td>
                        <td><?= $patient['genre']; ?></td>
                        <td><?= $patient['heure_rdv']; ?></td>
                        <td>
                            <a href="update_patient.php?id_patient=<?= $patient['id_patient']; ?>"
                                class="btn btn-primary custom-link">Update</a>
                        </td>
                        <td>
                            <a href="delete_patient.php?id_patient=<?= $patient['id_patient']; ?>"
                                class="btn btn-primary custom-link">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Include Bootstrap scripts (jQuery and Popper.js) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
