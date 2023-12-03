<?php

include '../Controller/animals.php';
include '../Model/Animal.php';

// create client
$Animal = null;
// create an instance of the controller
$AnimalC= new AnimalC();


if (

    isset($_POST["name1"]) &&
    isset($_POST["species"]) &&
    isset($_POST["treatable"]) 
    ) {
        if (
        !empty($_POST['name1']) &&
        !empty($_POST["species"]) &&
        !empty($_POST["treatable"]) 
    ) {
        /* foreach ($_POST as $key => $value) {
            echo "Key: $key, Value: $value<br>";
        } */
        $Animal = new Animal(
            null,
            $_POST['name1'],
            $_POST['species'],
            $_POST['treatable'],
        );
        var_dump($Animal);
        
        $AnimalC->updateanimal($Animal, $_GET['id']);
        header('Location:listanimals.php');
    }
}