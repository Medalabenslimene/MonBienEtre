<?php

include '../../controlleur/doctorC.php';

$doctorC = new DoctorC();

if (isset($_GET["id_docteur"])) {
    $doctorC ->deleteDoctor($_GET["id_docteur"]);
    header('Location: liste_docteur.php');
} else {
    // Handle the case where id-docteur is not set or invalid
    echo "Invalid request. Please provide a valid docteur ID.";
}

?>
