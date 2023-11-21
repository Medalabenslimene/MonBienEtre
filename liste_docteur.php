<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_liste.css"> <!-- Link to your CSS file -->
    <title>Liste des Docteurs</title>
</head>
<body>
    <?php
    include "../../controlleur/doctorC.php"; // Assuming you have a DoctorC class
    $doctorC = new DoctorC();
    $doctors = $doctorC->listDoctors();
    ?>

    <h2>Liste des Docteurs</h2>
   // css 
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
                <th>Téléphone</th>
                <th>Adresse</th>
                <th>Email</th>
                <th>Mot de passe</th>
                <th><select id="specialite" name="specialite" required>
      <option value="">Sélectionner une spécialité</option>
      <option value="dentiste">dentiste</option>
      <option value="médecin généraliste">médecin généraliste</option>
      <option value="pédiatre">pédiatre</option></select><br><br></th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($doctors as $doctor): ?>
                <tr>
                    <td><?php echo $doctor['nom']; ?></td>
                    <td><?php echo $doctor['prenom']; ?></td>
                    <td><?php echo $doctor['telephone']; ?></td>
                    <td><?php echo $doctor['adresse']; ?></td>
                    <td><?php echo $doctor['email']; ?></td>
                    <td><?php echo $doctor['password']; ?></td>
                    <td><?php echo $doctor['specialite']; ?></td>
                    <td>
                        <a href="update_docteur.php?id_docteur=<?php echo $doctor['id_docteur']; ?>">Update</a>
                    </td>
                    <td>
                        <a href="delete_docteur.php?id_docteur=<?php echo $doctor['id_docteur']; ?>">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table> 
    
<script>
  function validateForm() {
    var telephoneInput = document.getElementById("telephone");
    var adresseInput = document.getElementById("adresse");
    var emailInput = document.getElementById("email");
    var passwordInput = document.getElementById("password");
    var specialiteInput = document.getElementById("specialite");

    var telephone = telephoneInput.value.trim();
    var adresse = adresseInput.value.trim();
    var email = emailInput.value.trim();
    var password = passwordInput.value.trim();
    var specialite = specialiteInput.value.trim();

    var phoneRegex = /^\d{1,11}$/; // Numérique et jusqu'à 11 chiffres
    var addressRegex = /^[A-Za-z0-9\s]+$/; // Chaine de caractères et numériques
    var emailRegex = /@/; // Vérification basique d'email (contient @)
    var passwordLength = password.length <= 10;

    if (!phoneRegex.test(telephone)) {
      alert("Le numéro de téléphone doit être numérique et ne pas dépasser 11 chiffres !");
      return false;
    }

    if (!addressRegex.test(adresse)) {
      alert("L'adresse doit être une combinaison de caractères et de chiffres !");
      return false;
    }

    if (!emailRegex.test(email)) {
      alert("Veuillez saisir une adresse e-mail valide !");
      return false;
    }

    if (!passwordLength) {
      alert("Le mot de passe ne doit pas dépasser 10 caractères !");
      return false;
    }

    if (specialite === "") {
      alert("Veuillez choisir une spécialité !");
      return false;
    }

    return true;
  }
</script> 
</body>
</html>
