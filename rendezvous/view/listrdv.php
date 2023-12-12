<?php
include "../controller/appoint.php";
$c = new RDVC();
$tab = $c->listRDVs();
?>

<html> 
    <head> 
    <style>
h1{
  font-size: 30px;
  color: #fff;
  text-transform: uppercase;
  font-weight: 300;
  text-align: center;
  margin-bottom: 15px;
}
table{
  width:100%;
  table-layout: fixed;
}
.tbl-header{
  background-color: rgba(255,255,255,0.3);
 }
.tbl-content{
  height:300px;
  overflow-x:auto;
  margin-top: 0px;
  border: 1px solid rgba(255,255,255,0.3);
}
th{
  padding: 20px 15px;
  text-align: left;
  font-weight: 500;
  font-size: 12px;
  color: #fff;
  text-transform: uppercase;
}
td{
  padding: 15px;
  text-align: left;
  vertical-align:middle;
  font-weight: 300;
  font-size: 12px;
  color: #fff;
  border-bottom: solid 1px rgba(255,255,255,0.1);
}


/* demo styles */

@import url(https://fonts.googleapis.com/css?family=Roboto:400,500,300,700);
body{
  background: -webkit-linear-gradient(left, #25c481, #25b7c4);
  background: linear-gradient(to right, #25c481, #25b7c4);
  font-family: 'Roboto', sans-serif;
}
section{
  margin: 50px;
}


</style>

<center>
    <h1>Liste des rendez-vous</h1>
    <h2>
        <a href="rdv.php">Ajouter un rendez-vous</a>
    </h2>
</center>
<div class="tbl-header">
    <table cellpadding="0" cellspacing="0" border="0">
      <thead>
    <tr>
        <th>ID Rendez-vous</th>
        <th>Spécialité</th>
        <th>Date</th>
        <th>Heure</th>
        <th>Description</th>
        <th>ID Utilisateur</th>
        <th>Modifier</th>
        <th>Supprimer</th>
    </tr>
    <?php
foreach ($tab as $rdv) {
    ?>
    <tr>
        <td><?= isset($rdv['id_Rdv']) ? $rdv['id_Rdv'] : ''; ?></td>
        <td><?= isset($rdv['specialite']) ? $rdv['specialite'] : ''; ?></td>
        <td><?= isset($rdv['date']) ? $rdv['date'] : ''; ?></td>
        <td><?= isset($rdv['heure']) ? $rdv['heure'] : ''; ?></td>
        <td><?= isset($rdv['description']) ? $rdv['description'] : ''; ?></td>
        <td><?= isset($rdv['id_User']) ? $rdv['id_User'] : ''; ?></td>
        <td>
            <a href="updateRDV.php?idRdv=<?php echo isset($rdv['id_Rdv']) ? $rdv['id_Rdv'] : ''; ?>">Modifier</a>
        </td>
        <td align="center">
            <form method="POST" action="deleteRDV.php">
                <input type="submit" name="delete" value="Supprimer">
                <input type="hidden" value=<?PHP echo isset($rdv['id_Rdv']) ? $rdv['id_Rdv'] : ''; ?> name="idRdv">
            </form>
        </td>
    </tr>
<?php
}

?>