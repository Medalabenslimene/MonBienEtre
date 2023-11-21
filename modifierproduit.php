<?php
include_once '../Model/produit.php';
include_once '../Controller/produitC.php';

$error = "";

// create produit
$produit = null;

// create an instance of the controller
$produitC = new produitC();
if (
    isset($_POST["IDP"]) &&
    isset($_POST["typer"]) &&
    isset($_POST["nom"]) &&
    isset($_POST["prix"])
) {
    if (
        !empty($_POST["IDP"]) &&
        !empty($_POST['typer']) &&
        !empty($_POST["nom"]) &&
        !empty($_POST["prix"])
    ) {
        $produit = new produit(
            $_POST['IDP'],
            $_POST['typer'],
            $_POST['nom'],
            $_POST['prix']
        );
        $produitC->modifierproduit($produit, $_POST["IDP"]);
        header('location:afficherListeproduits.php');
    } else
        $error = "Missing information";
}
?>
























    <a style='         text-decoration: none;
                color: #fff;
                /* White color */
                background-color: #e74c3c;
                /* Red color */
                padding: 10px 15px;
                border-radius: 5px;
            ' href="afficherListeproduits.php">Retour à la liste des produits</a>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <?php
    if (isset($_POST['IDP'])) {
        $produit = $produitC->recupererproduit($_POST['IDP']);

    ?>

        <form name="myForm" action="" onsubmit="return validateForm()" method="POST">
            <style>
                input[type="submit"] {
                    background-color: #4CAF50;
                    /* Green color */
                    color: white;
                    padding: 10px 15px;
                    border: none;
                    border-radius: 5px;
                    cursor: pointer;
                }

                input[type="reset"] {
                    background-color: #e74c3c;
                    /* Green color */
                    color: white;
                    padding: 10px 15px;
                    border: none;
                    border-radius: 5px;
                    cursor: pointer;
                }

                /* Style for the "annuler" link */



                table {
                    background-color: white;
                    margin: 0 auto;
                    /* Centers the table horizontally */
                    width: 80%;
                    /* Sets the width of the table */
                    max-width: 800px;
                    /* Sets the maximum width of the table */
                    border-collapse: collapse;
                    /* Collapses the borders between table cells */
                }

                td {

                    padding: 10px;
                    /* Adds padding around the table cells */
                    text-align: left;
                    /* Aligns the text to the left */
                }

                label {
                    color: black;
                    font-weight: bold;
                    /* Makes the label text bold */
                }
            </style>
            <center>
                <h2>modifier votre produit</h2>
            </center>
            <table align="center">
                <tr>
                    <td>

                        </label>
                    </td>
                    <td><input type="text" name="IDP" id="IDP" value="<?php echo $produit['IDP']; ?>" hidden></td>
                </tr>
                <tr>
                    <td>

                        </label>
                    </td>
                    <td><input type="text" name="typer" id="typer" value="<?php echo $produit['typer']; ?>" hidden></td>
                </tr>

                <tr>
                    <td>
                        <label for="nom">nom de produit:
                        </label>
                    </td>
                    <td>
                        <input type="text" name="nom" value="<?php echo $produit['nom']; ?>" id="nom">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="prix">prix de produit:
                        </label>
                    </td>
                    <td>
                        <input type="number" name="prix" id="prix" value="<?php echo $produit['prix']; ?>">
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" value="Modifier">
                    </td>
                    <td>
                        <input type="reset" value="Annuler">
                    </td>
                </tr>
                <tr>

                    <td><input type="date" name="dater" id="dater" value="<?php echo $produit['dater']; ?>" hidden></td>
                </tr>
            </table>

        </form>
    <?php
    }
    ?>
</body>

</html>
<script type="text/javascript" src="script.js"></script>






















