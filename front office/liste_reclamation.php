<?php
include "../../controlleur/reclamationC.php";

$c = new ReclamationC();
$tab = $c->listReclamations();

?>

<center>
    <h1>List of reclamations</h1>
    <h2>
        <a href="add_reclamation.php">Add reclamation</a>
    </h2>
</center>
<table border="1" align="center" width="70%">
    <tr>
        <th>Id Reclamation</th>
        <th>Pseudo</th>
        <th>CIN</th>
        <th>Type</th>
        <th>Commentaire</th>
        <th>Update</th>
        <th>Delete</th>
    </tr>


    <?php
    foreach ($tab as $reclamation) {
    ?>
        <tr>
            <td><?= $reclamation['id_reclamation']; ?></td>
            <td><?= $reclamation['pseudo']; ?></td>
            <td><?= $reclamation['CIN']; ?></td>
            <td><?= $reclamation['type']; ?></td>
            <td><?= $reclamation['commentaire']; ?></td>
            <td>
                <a href="update_reclamation.php?id_reclamation=<?php echo $reclamation['id_reclamation']; ?>">Update</a>
            </td>
            <td align="center">
                <form method="POST" action="updateReclamation.php">
                    <input type="submit" name="update" value="Update">
                    <input type="hidden" value=<?PHP echo $reclamation['id_reclamation']; ?> name="id_reclamation">
                </form>
            </td>
            <td>
                <a href="delete_reclamation.php?id_reclamation=<?php echo $reclamation['id_reclamation']; ?>">Delete</a>
            </td>
        </tr>
    <?php
    }
    ?>
</table>
