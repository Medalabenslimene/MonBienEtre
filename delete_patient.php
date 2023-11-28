<?php
include '../../controlleur/patientC.php';

$patientC = new patientC();
$patientC->deletePatient($_GET["id_patient"]);
header('Location: liste_patient.php');
?>