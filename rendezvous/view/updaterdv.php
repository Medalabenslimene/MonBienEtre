<?php
include '../controller/appoint.php';
include '../model/rdvv.php';

// create client
$rdv = null;
// create an instance of the controller
$rdvC = new RDVC();

if (
    isset($_POST["specialite"]) &&
    isset($_POST["date"]) &&
    isset($_POST["heure"]) &&
    isset($_POST["description"]) &&
    isset($_POST["id_user"]) &&
    isset($_POST["idRdv"])
) {
    if (
        !empty($_POST['specialite']) &&
        !empty($_POST["date"]) &&
        !empty($_POST["heure"]) &&
        !empty($_POST["description"]) &&
        !empty($_POST["id_user"]) &&
        !empty($_POST["idRdv"])
    ) {
        $rdv = new RDV(
            $_POST['idRdv'], // Use the provided ID for updating
            $_POST['specialite'],
            $_POST['date'],
            $_POST['heure'],
            $_POST['description'],
            $_POST['id_user']
        );

        $rdvC->updateRDV($rdv);

        header('Location: listrdv.php');
        exit;
    }
}

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RDV Display</title>
</head>

<body>
    <button><a href="listRDV.php">Back to list</a></button>
    <hr>

    <?php
    if (isset($_GET['idRdv'])) {
        $oldRdv = $rdvC->showRDV($_GET['idRdv']);
    ?>

        <form action="" method="POST"> 
            <table>
                <tr>
                    <td><label for="idRdv">ID RDV :</label></td>
                    <td>
                        <input type="text" id="idRdv" name="idRdv" value="<?php echo $_GET['idRdv'] ?>" readonly />
                    </td>
                </tr>
    
                <td>
                    <input type="submit" value="Save">
                </td>
                <td>
                    <input type="reset" value="Reset">
                </td>
            </table>
        </form>
    <?php
    }
    ?>
</body>

</html>
