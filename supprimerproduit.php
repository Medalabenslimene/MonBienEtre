<?php
	include '../Controller/produitC.php';
	$produitC=new produitC();
	$produitC->supprimerproduit($_GET["IDP"]);
	header('location:afficherListeproduits.php');
?>