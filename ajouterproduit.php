<?php
include_once '../Model/produit.php';
include_once '../Controller/produitC.php';

$error = "";

// create produit
$produit = null;

// create an instance of the controller
$produitC = new produitC();
if (

    isset($_POST["typer"]) &&
    isset($_POST["nom"]) &&
    isset($_POST["prix"])
) {
    if (
        !empty($_POST['typer']) &&
        !empty($_POST["nom"]) &&
        !empty($_POST["prix"])
    ) {

        $produit = new produit(
            null,
            $_POST['typer'],
            $_POST['nom'],
            $_POST['prix']

        );
        $produitC->ajouterproduit($produit);
        echo "<script>";
        echo "alert('produit recu !');";
        echo "window.location.href = 'afficherListeproduits.php';";
        echo "</script>";
    } else
        $error = "Missing information";
}


?>



<body>
    <a style='            text-decoration: none;
            color: #fff;
            /* White color */
            background-color: #e74c3c;
            /* Red color */
            padding: 10px 15px;
            border-radius: 5px;' href="afficherListeproduits.php">Retour à la liste des produits</a>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>
  
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
        <center><h2>Ajouter produit</h2></center>

    <form id="myForm" name="myForm" action="" onsubmit="return validateForm()" method="POST">
        <table align="center">
            <tr>
                <td>
                    <label for="typer">type de produit :
                    </label>
                </td>
                <td> <select id="typer" name="typer" >
                        <option value="">--Choisir un type de produit--</option>
                        <option value="régime">régime</option>
                        <option value="maladie">maladie</option>
                        <option value="cosmetique">cosmetique</option>
                        <option value="autre">Autre</option>
                    </select> </td>
            </tr>

         
            <tr>
                <td>
                    <label for="nom">nom de produit:
                    </label>
                </td>
                <td>
                    <input type="text" name="nom" id="nom">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="prix">prix de produit :
                    </label>
                </td>
                <td>
                    <input type="number" name="prix" id="prix">
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" value="Envoyer">
                </td>
                <td>
                    <input type="reset" value="Annuler">
                </td>
            </tr>
            <tr>
           
           <td><input type="date" name="dater" id="dater" maxlength="20" hidden></td>
       </tr>
        </table>
    </form>
    <script type="text/javascript" src="script.js"></script>















