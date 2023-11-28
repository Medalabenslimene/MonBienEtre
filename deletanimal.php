<?php
include '../Controller/animals.php';
$AniamlC = new AnimalC();
$AnimalC->deleteAnimal($_GET['id']);
header('Location:listanimals.php');