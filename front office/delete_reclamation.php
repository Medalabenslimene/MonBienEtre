<?php
include '../../controlleur/reclamationC.php';

$reclamationC = new ReclamationC();

if (isset($_GET["id_reclamation"])) {
    $reclamationC->deleteReclamation($_GET["id_reclamation"]);
    header('Location:liste_reclamations.php');
} else {
    echo "ID de réclamation non spécifié.";
}
?>