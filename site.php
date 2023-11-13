<?php
// animals.php

// Simulons une liste d'animaux
$animalsFile = 'animals.json';

function getAnimals() {
    global $animalsFile;
    $animalsData = file_get_contents($animalsFile);
    return json_decode($animalsData, true);
}

function addAnimal($species, $description) {
    $animals = getAnimals();
    $newAnimal = ['species' => $species, 'description' => $description];
    $animals[] = $newAnimal;
    file_put_contents($animalsFile, json_encode($animals));
}

// Exemple d'utilisation :
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    header('Content-Type: application/json');
    echo json_encode(getAnimals());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    addAnimal($data['species'], $data['description']);
    header('Content-Type: application/json');
    echo json_encode(getAnimals());
}
?>