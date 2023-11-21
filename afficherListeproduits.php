<?php
include_once '../Controller/produitC.php';

$produitC = new produitC();
$listeproduits = $produitC->afficherproduits();


?>



    <body>
        <a style='  text-decoration: none;
            color: #fff;
            /* White color */
            background-color: #e74c3c;
            /* Red color */
            padding: 10px 15px;
            border-radius: 5px;' href="ajouterproduit.php">Ajouter une produit</a>
        <center>
            <h1>Liste des produits</h1>
        </center>

        <table class="my-table" border="1" align="center" id="produit-table">
            <tr>

                <th>Type</th>
                <th>Date</th>
                <th>nom</th>
                <th>prix</th>
                <th>Actions</th>

            </tr>
            <?php foreach ($listeproduits as $produit) { 
                          ?>
                <tr>

                    <td><?php echo $produit['typer']; ?></td>
                    <td><?php echo $produit['dater']; ?></td>
                    <td><?php echo $produit['nom']; ?></td>
                    <td><?php echo $produit['prix']; ?></td>
             



                 
                    <td>
                        <form method="POST" action="modifierproduit.php">
                            <input type="submit" name="Modifier" value="Modifier">
                            <input type="hidden" value=<?PHP echo $produit['IDP']; ?> name="IDP">
                        </form>



                        <a style='  text-decoration: none;
            color: #fff;
            /* White color */
            background-color: #e74c3c;
            /* Red color */
            padding: 10px 15px;
            border-radius: 5px;' href="supprimerproduit.php?IDP=<?php echo $produit['IDP']; ?>">supprimer</a>



                </tr>
            <?php } ?>
        </table>


        <style>
            .my-table {
                background-color: white;
                border-collapse: collapse;
                width: 100%;
                font-size: 1em;
                font-family: Arial, sans-serif;
                color: #333;
            }

            .my-table th,
            .my-table td {
                padding: 0.5em;
                border: 1px solid #ccc;
            }

            .my-table th {
                background-color: #f7f7f7;
                text-align: left;
                font-weight: bold;
            }

            .my-table td {
                text-align: left;
            }

            .my-table td form {
                display: inline-block;
            }

            input[type="submit"] {
                background-color: #4CAF50;
                /* Green color */
                color: white;
                padding: 10px 15px;
                border: none;
                border-radius: 5px;
                cursor: pointer;
            }

            /* Style for the "annuler" link */
         
        </style>

























