<?php
include_once '../Controller/categorieC.php';

$categorieC = new CategorieC();

$error = "";

if (isset($_POST["Nom"])) {
    // Assurez-vous que vous utilisez le bon nom de variable, changez "$post" en "$_POST"
    $nomCategorie = $_POST["Nom"];

    // Créez une instance de la classe Categorie avec le nom fourni
    $categorie = new Categorie(null, $nomCategorie); //variable pour mettre tous les fonctions

    // Utilisez la méthode ajoutercategorie pour ajouter la catégorie
    $categorieC->ajoutercategorie($categorie);

    echo "<script>";
    echo "alert('Catégorie ajoutée !');";
    echo "window.location.href = 'afficherListecategorie.php';";
    echo "</script>";
} else {
    $error = "Information manquante";
}
?> 
