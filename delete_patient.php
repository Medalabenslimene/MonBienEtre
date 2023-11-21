<?php

include '../../controlleur/patientC.php';

$patientC = new PatientC();

if (isset($_GET["id_patient"])) {
    $patientC->deletePatient($_GET["id_patient"]);
    header('Location: liste_patient.php');
} else {
    // Handle the case where id_patient is not set or invalid
    echo "Invalid request. Please provide a valid patient ID.";
}

?>
