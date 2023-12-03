<?php
include "../Controller/animals.php";
$c = new AnimalC();
$tab = $c->listanimals();

?>
<a href="Animal.php">Home</a>
 <link href="style.css" rel="stylesheet" />
<center>
    <h1>List of Animals</h1>
    <h2>
        <a href="addanimal.php">Add Animal</a>
    </h2>
</center>
<body>
  <table border="1" align="center" width="70%">
    <tr>
        <th>L'id de l'nimal</th>
        <th>Nom de l'animal</th>
        <th>L'espece de l'animal</th>
        <th>Vacciné ou pas</th>
        <th>Update</th>
        <th>Delete</th>
    </tr>


    <?php
    foreach ($tab as $c){
    ?>
        <tr>
            <td><?= $c['id']; ?></td>
            <td><?= $c['name1']; ?></td>
            <td><?= $c['species']; ?></td>
            <td><?= $c['treatable']; ?></td>
            <td align="center">

                <a href="updateanimal.php?id=<?php echo $c['id']; ?>">Update</a>
            </td>
            <td align="center">

                <a href="deletanimal.php?id=<?php echo $c['id']; ?>">Delete</a>
            </td>
        </tr>

    <?php
    }
    ?>
  </table>
</body>