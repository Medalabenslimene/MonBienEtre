<?php
include_once '../Controller/categorieC.php';

$categorieC = new categorieC();

$listecategorie = $categorieC->affichercatégorie('Idcategorie'); 
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recherche de produit par catégorie</title>
</head>
<body>
    <center>
        <h1>Recherche de produit par catégorie</h1>
    </center>

    <table class="my-table" border="1" align="center" id="categorie-table">
        <tr>
            <th>Nom</th>
        </tr>

        <?php
        foreach ($listecategorie as $categorie) {
            echo "<tr><td>" . $categorie['Nom'] . "</td></tr>";
        }
        ?>
    </table>

    <form method="POST" action="">
        <input type="submit" name="Search" value="Rechercher">
    </form>
</body>
</html>