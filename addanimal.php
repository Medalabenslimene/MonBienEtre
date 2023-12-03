<?php
include '../Controller/animals.php';
include '../Model/Animal.php';

// create an instance of the controller
$AnimalC = new AnimalC();

if (
    isset($_POST["name1"]) &&
    isset($_POST["species"]) &&
    isset($_POST["treatable"])
) {
    if (
        !empty($_POST['name1']) &&
        !empty($_POST["species"]) &&
        !empty($_POST["treatable"])
    ) {
        $Animal = new Animal(
            null,
            $_POST['name1'],
            $_POST['species'],
            $_POST['treatable']
        );
        $AnimalC->addAnimal($Animal);
        header('Location:../View/Animal.php');
    }
}
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="View/style.css">
    <link href="style.css" rel="stylesheet" />
    <title>Animals </title>
</head>

<body>
    <ul class="navbar-nav ms-auto my-2 my-lg-0">
        <a href="Animal.php">Home</a>
    <u1/>

    <form action="" method="POST" onsubmit="return validateForm();">
        <table>
            <tr>
                <td><label for="nom">Nom :</label></td>
                <td>
                    <input type="text" id="nom" name="name1" />
                </td>
            </tr>
            <tr>
                <td><label for="Species">Species :</label></td>
                <td>
                  <select id="species" name="species">
                    <option value="dog">Dog</option>
                    <option value="cat">Cat</option>
                    <option value="horse">Horse</option>
                    <option value="mouse">Mouse</option>
                    <!-- Add more options as needed -->
                  </select>
                </td>
            </tr>
            <tr>
                <td><label for="treatable">Treatable:</label></td>
                <td>
                    <input type="text" id="treatable" name="treatable">
                </td>
            </tr>
            <td>
                <input type="submit" value="Save">
            </td>
            <td>
                <input type="reset" value="Reset">
            </td>
        </table>
    </form>

    <script>
        function validateForm() {
            var treatableInput = document.getElementById('treatable');
            var treatableValue = treatableInput.value.toLowerCase();

            if (treatableValue !== 'yes' && treatableValue !== 'no') {
                alert('Invalid treatable value. Please enter \'yes\' or \'no\'.');
                return false; // Prevent form submission
            }

            return true; // Allow form submission
        }
    </script>
</body>