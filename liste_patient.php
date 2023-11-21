<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_liste.css"> <!-- Link to your CSS file -->
    <title>Liste des Patients</title>
</head>
<body>
    <?php
    include "../../controlleur/patientC.php"; // Assuming you have a PatientC class
    $patientC = new PatientC();
    $patients = $patientC->listPatients();
    ?>

    <h2>Liste des Patients</h2>
    
<style>
  table {
    border-collapse: collapse;
    width: 100%;
  }

  th {
    font-weight: bold;
    color: darkblue;
  }

  th:nth-child(8) {
    color: darkblue;
  }

  th:nth-child(9) {
    color: red;
  }
</style>

    <table>
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Âge</th>
                <th> genre</th>
                <th>Email</th>
                <th>Mot de passe</th>
                <th>Téléphone</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($patients as $patient): ?>
                <tr>
                    <td><?php echo $patient['nom']; ?></td>
                    <td><?php echo $patient['prenom']; ?></td>
                    <td><?php echo $patient['age']; ?></td>
                    <td><?php echo $patient['genre']; ?></td>
                    <td><?php echo $patient['email']; ?></td>
                    <td><?php echo $patient['password']; ?></td>
                    <td><?php echo $patient['telephone']; ?></td>
                    <td>
                        <a href="update_patient.php?id_patient=<?php echo $patient['id_patient']; ?>">Update</a>
                    </td>
                    <td>
                        <a href="delete_patient.php?id_patient=<?php echo $patient['id_patient']; ?>">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table> 


    <script>
  function validateForm() {
    var ageInput = document.getElementById("age");
    var genreInput = document.getElementById("genre");
    var emailInput = document.getElementById("email");
    var passwordInput = document.getElementById("password");
    var telephoneInput = document.getElementById("telephone");

    var age = ageInput.value.trim();
    var genre = genreInput.value.trim();
    var email = emailInput.value.trim();
    var password = passwordInput.value.trim();
    var telephone = telephoneInput.value.trim();

    var ageRegex = /^\d{1,4}$/; // Numérique et jusqu'à 4 chiffres
    var genreOptions = ['femme', 'homme', 'animal', 'autre'];
    var passwordLength = password.length <= 10;
    var phoneRegex = /^\d{1,11}$/; // Numérique et jusqu'à 11 chiffres

    if (!ageRegex.test(age)) {
      alert("L'âge doit être numérique et ne pas dépasser 4 chiffres !");
      return false;
    }

    if (!genreOptions.includes(genre)) {
      alert("Veuillez choisir un genre parmi les options disponibles !");
      return false;
    }

    if (!email.includes("@")) {
      alert("Veuillez saisir une adresse e-mail valide !");
      return false;
    }

    if (!passwordLength) {
      alert("Le mot de passe ne doit pas dépasser 10 caractères !");
      return false;
    }

    if (!phoneRegex.test(telephone)) {
      alert("Le numéro de téléphone doit être numérique et ne pas dépasser 11 chiffres !");
      return false;
    }

    return true;
  }
</script>






</body>
</html>
