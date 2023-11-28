<?php
include "../Controller/animals.php";
$c = new Animal();
$tab = $c->listanimals();

?>

<center>
    <h1>List of Animals</h1>
    <h2>
        <a href="addanimal.php">Add Animal</a>
    </h2>
</center>
<body>
  <div class="/View/sb-admin-2.css "></div>
  <table border="1" align="center" width="70%">
    <tr>
        <th>L'id de l'nimal</th>
        <th>N'om de l'nimal</th>
        <th>L'espece de l'animal</th>
        <th>Tratité ou pas</th>
        <th>Update</th>
        <th>Delete</th>
    </tr>


    <?php
    foreach ($tab as $Animal) {
    ?>
        <tr>
            <td><?= $Animal['id']; ?></td>
            <td><?= $Animal['name']; ?></td>
            <td><?= $Animal['species']; ?></td>
            <td><?= $Animal['treatable']; ?></td>
            <td>
                <a href="updateanimal.php=<?php echo $Animal['id']; ?>">Update1</a>
            </td>
            <td align="center">
                <form method="POST" action="updateanimal.php">
                    <input type="submit" name="update" value="Update">
                    <input type="hidden" value=<?PHP echo $Animal['id']; ?> id="id">
                </form>
            </td>
            <td>
                <a href="deleteanimal.php?idJoueur=<?php echo $Animal['id']; ?>">Delete</a>
            </td>
        </tr>
    <?php
    }
    ?>
  </table>
</body>