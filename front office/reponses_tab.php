<?php
// reponses_tab.php

// Include necessary files and initialize objects as needed
include '../../controlleur/reclamationC.php';
include '../../modele/reclamation.php';

$reclamationC = new ReclamationC();

// Check if an ID is provided in the query string
if (isset($_GET['id_reclamation'])) {
    $id_reclamation = $_GET['id_reclamation'];

    // Fetch responses for the specified reclamation ID from the database
    $responses = $reclamationC->getReponsesByReclamationId($id_reclamation);

    // Display the responses in a table
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <title>Réponses</title>
        <style>
            body {
                background-image: url('docteur1.png');
                background-size: cover;
                background-repeat: no-repeat;
            }
        </style>
        <!-- Add your styles or scripts if needed -->
    </head>
    <body>
        <h2>Réponses pour la Réclamation ID <?= $id_reclamation ?></h2>
        <table border="1">
            <thead>
                <tr>
                    <th>ID Réponse</th>
                    <th>Contenu</th>
                    <!-- Add other columns as needed -->
                </tr>
            </thead>
            <tbody>
                <?php foreach ($responses as $response) : ?>
                    <tr>
                        <td><?= $response['id_response']; ?></td>
                        <td><?= $response['content']; ?></td>
                        <!-- Add other columns as needed -->
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </body>
    </html>
    <?php
} else {
    // Redirect to the main page if no ID is provided
    header('Location: consultreclam.php');
    exit;
}

// Function to obtain responses by reclamation ID from the database
function obtenirReponsesParIdReclamation($id_reclamation, $reclamationC) {
    // Implement your query to fetch responses based on the reclamation ID
    // Replace the following example with your actual database query
    $responses = $reclamationC->getReponsesByReclamationId($id_reclamation);

    return $responses;
}
?>
