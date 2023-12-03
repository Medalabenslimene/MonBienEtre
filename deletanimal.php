<?php
include '../Controller/animals.php';

$AnimalC = new AnimalC();

// Ensure 'id' is set and is a numeric value
if (isset($_GET["id"]) && is_numeric($_GET["id"])) {
    $id = $_GET["id"];

    // Delete the animal
    $AnimalC->deleteAnimal($id);

    // Redirect to the list page
    header('Location: listanimals.php');
} else {
    // Handle invalid or missing 'id' parameter
    echo 'Invalid or missing animal ID';
}