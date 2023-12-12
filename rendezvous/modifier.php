<?php
include 'configgg.php';

$servername = "localhost";
$username = "root";
$password = "";
$database = "rdv";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fonction pour afficher le formulaire de modification
function afficherFormulaireModification($conn, $id_rdv) {
    // Récupérer les données du rendez-vous à modifier
    $req = "SELECT * FROM rdv WHERE id_rdv = $id_rdv";
    $result = $conn->query($req);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $specialite = $row['specialite'];
        $date = $row['date'];
        $heure = $row['heure'];
        $description = $row['description'];
        $id_user = $row['id_user'];

        // Afficher le formulaire de modification avec le style
        echo "<!DOCTYPE html>
              <html lang='en'>
              <head>
                <meta charset='UTF-8'>
                <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                <title>Modifier le RDV</title>
                <style>
                  body {
                      font-family: Arial, sans-serif;
                      background-color: #f0f0f0;
                      margin: 20px;
                  }
                  form {
                      max-width: 500px;
                      margin: 0 auto;
                      background-color: #fff;
                      padding: 20px;
                      border: 1px solid #ddd;
                      border-radius: 5px;
                      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                  }
                  label {
                      display: block;
                      margin-bottom: 8px;
                  }
                  input[type='text'],
                  input[type='date'],
                  input[type='time'],
                  textarea {
                      width: 100%;
                      padding: 8px;
                      margin-bottom: 16px;
                      box-sizing: border-box;
                  }
                  input[type='submit'] {
                      background-color: #4caf50;
                      color: white;
                      padding: 10px 15px;
                      border: none;
                      border-radius: 5px;
                      cursor: pointer;
                  }
                  input[type='submit']:hover {
                      background-color: #45a049;
                  }
                </style>
              </head>
              <body>";

        echo "<h2>Modifier le rendez-vous :</h2>";
        echo "<form action='' method='post'>
                <label for='specialite'>Spécialité:</label>
                <input type='text' name='specialite' value='$specialite' required><br>

                <label for='date'>Date:</label>
                <input type='date' name='date' value='$date' required><br>

                <label for='heure'>Heure:</label>
                <input type='time' name='heure' value='$heure' required><br>

                <label for='description'>Description:</label>
                <textarea name='description' required>$description</textarea><br>

                <label for='id_user'>ID Utilisateur:</label>
                <input type='text' name='id_user' value='$id_user' required><br>

                <input type='hidden' name='id_rdv' value='$id_rdv'>
                <input type='submit' name='modifier' value='Modifier'>
            </form>";

        // Vérifier si le formulaire de modification est soumis
        if (isset($_POST['modifier'])) {
            // Récupérer les nouvelles données du formulaire
            $new_specialite = $_POST['specialite'];
            $new_date = $_POST['date'];
            $new_heure = $_POST['heure'];
            $new_description = $_POST['description'];
            $new_id_user = $_POST['id_user'];
            $id_rdv = $_POST['id_rdv'];

            // SQL query pour mettre à jour le rendez-vous
            $update_req = "UPDATE rdv 
                           SET specialite='$new_specialite', date='$new_date', heure='$new_heure', 
                               description='$new_description', id_user='$new_id_user' 
                           WHERE id_rdv=$id_rdv";

            // Exécuter la requête de mise à jour
            $update_result = $conn->query($update_req);

            if ($update_result) {
                echo "<p>Rendez-vous modifié avec succès.</p>";
                // Vous pouvez rediriger l'utilisateur ou afficher un message approprié ici
            } else {
                echo "<p>Erreur lors de la modification du rendez-vous : " . $conn->error . "</p>";
            }
        }

        echo "</body>
              </html>";
    }
}

// Vérifier si l'action de modification est demandée
if (isset($_GET['action']) && $_GET['action'] == 'modifier' && isset($_GET['id'])) {
    // Afficher le formulaire de modification
    afficherFormulaireModification($conn, $_GET['id']);
} else {
    echo "<p>Aucun rendez-vous sélectionné pour la modification.</p>";
}

// Close connection
$conn->close();
?>
