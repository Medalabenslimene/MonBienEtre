<?php
include "../controller/appoint.php";
$rdvC = new RDVC();
if (isset($_GET["idRdv"])) {
    $rdvC->deleteRDV($_GET["idRdv"]);
    header('Location: list_rdv.php');
} else {
    echo "ID Rendez-vous non spécifié.";
}
?>