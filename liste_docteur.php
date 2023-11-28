<?php
include "../../controlleur/docteurC.php";

$c = new DocteurC();
$tab = $c->listDocteur();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap.min.css" />
    <link rel="stylesheet" href="style2.css" />
    <link rel="stylesheet" href="style.css" />
    <title>Liste des docteur</title> 
    
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
        <h1 class="text-center">Liste des docteurs</h1>
        <h2 class="text-center">
            <a href="add_docteur.php" class="btn btn-primary">New docteur</a>
        </h2>

        <table class="table custom-table">
            <thead class="thead-dark">
                <tr>
                    <th>Id docteur</th>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>Telephone</th>
                    <th>Email</th>
                    <th>specialite</th>
                    <th>Heure_depart</th>
                    <th>Update</th>
                    <th>Delete</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($tab as $docteur) : ?>
                    <tr>
                        <td><?= $docteur['id_docteur']; ?></td>
                        <td><?= $docteur['nom']; ?></td>
                        <td><?= $docteur['prenom']; ?></td>
                        <td><?= $docteur['telephone']; ?></td>
                        <td><?= $docteur['email']; ?></td>
                        <td><?= $docteur['specialite']; ?></td>
                        <td><?= $docteur['heure_depart']; ?></td>
                        <td>
                            <a href="update_docteur.php?id_docteur=<?= $docteur['id_docteur']; ?>"
                                class="btn btn-primary custom-link">Update</a>
                        </td>
                        <td>
                            <a href="delete_docteur.php?id_docteur=<?= $docteur['id_docteur']; ?>"
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
