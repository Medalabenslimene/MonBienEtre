<?php
include '../../controlleur/docteurC.php';

$docteurC = new docteurC();
$docteurC->deleteDocteur($_GET["id_docteur"]);
header('Location: liste_docteur.php');
?>