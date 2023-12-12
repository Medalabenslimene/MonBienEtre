<?php
include 'config.php';


// Vérifier si le formulaire d'ajout est soumis
if (isset($_POST['ajouter'])) {
    // Get data from the form
    $specialite = $_POST['specialite'];
    $date = $_POST['date'];
    $heure = $_POST['heure'];
    $description = $_POST['description'];
    $id_user = $_POST['id_user'];

    // Call the function to add a new appointment
    ajouterRDV($conn, $specialite, $date, $heure, $description, $id_user);
}

// Vérifier si le formulaire de modification est soumis
if (isset($_POST['modifier'])) {
    // Récupérer les données du formulaire de modification
    $new_date = $_POST['new_date'];
    $id_rdv = $_POST['id_rdv'];

    // Call the function to update the appointment
    modifierRDV($conn, $new_date, $id_rdv);
}

// Vérifier si le formulaire de suppression est soumis
if (isset($_POST['supprimer'])) {
    // Récupérer l'ID du rendez-vous à supprimer
    $id_rdv = $_POST['id_rdv'];

    // Call the function to delete the appointment
    supprimerRDV($conn, $id_rdv);
}

// Fonction pour ajouter un nouveau RDV
function ajouterRDV($conn, $specialite, $date, $heure, $description, $id_user) {
    $insert_req = "INSERT INTO rdv (id_rdv, specialite,date, heure, description, id_user) VALUES ($id_rdv, '$specialite', '$date', '$heure', '$description', '$id_user')";

    $insert_result = $conn->query($insert_req);

    if ($insert_result) {
        echo "Rendez-vous ajouté avec succès.";
    } else {
        echo "Erreur lors de l'ajout du rendez-vous : " . $conn->error . "<br>";
        echo "Requête d'insertion : " . $insert_req;
    }
}


// Fonction pour modifier un RDV
// Fonction pour modifier un RDV avec date et heure
function modifierRDV($conn, $new_datetime, $id_rdv) {
    // Convertir le format de la date et heure pour correspondre à votre base de données
    $new_datetime_formatted = date("Y-m-d H:i:s", strtotime($new_datetime));

    $update_req = "UPDATE rdv SET date_heure='$new_datetime_formatted' WHERE id_rdv=$id_rdv";

    $update_result = $conn->query($update_req);

    if ($update_result) {
        echo "Rendez-vous modifié avec succès.";
    } else {
        echo "Erreur lors de la modification du rendez-vous : " . $conn->error;
    }
}


// Fonction pour supprimer un RDV
function supprimerRDV($conn, $id_rdv) {
    $delete_req = "DELETE FROM rdv WHERE id_rdv=$id_rdv";

    $delete_result = $conn->query($delete_req);

    if ($delete_result) {
        echo "Rendez-vous supprimé avec succès.";
    } else {
        echo "Erreur lors de la suppression du rendez-vous : " . $conn->error;
    }
}

// Fonction pour afficher la liste des RDV triés par date
function afficherListeRDV($conn) {
    $req = "SELECT id_rdv, specialite, date, heure, description, id_user FROM rdv ORDER BY date ASC";

    $result = $conn->query($req);

    if ($result) {
        if ($result->num_rows > 0) {
            echo "<!DOCTYPE html>
                  <html lang='en'>
                  <head>
                    <meta charset='UTF-8'>
                    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                    <title>Liste des RDV</title>
                    <style>
                      body {
                          font-family: Arial, sans-serif;
                          background-color: #f0f0f0;
                      }
                      table {
                          max-width: 800px;
                          margin: 20px auto;
                          padding: 15px;
                          background-color: #fff;
                          border: 1px solid #ddd;
                          border-radius: 5px;
                          border-collapse: collapse;
                      }
                      th, td {
                          padding: 10px;
                          border: 1px solid #ddd;
                          text-align: left;
                      }
                      th {
                          background-color: #4caf50;
                          color: white;
                      }
                      .action-buttons {
                          display: flex;
                          gap: 5px;
                      }
                    </style>
                  </head>
                  <body>";

            echo "<h2>Liste des rendez-vous triés par date :</h2>";
            echo "<table>
                    <tr>
                        <th>ID</th>
                        <th>Spécialité</th>
                        <th>Date</th>
                        <th>Heure</th>
                        <th>Description</th>
                        <th>ID Utilisateur</th>
                        <th>Action</th>
                    </tr>";

            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row["id_rdv"] . "</td>
                        <td>" . $row["specialite"] . "</td>
                        <td>" . $row["date"] . "</td>
                        <td>" . $row["heure"] . "</td>
                        <td>" . $row["description"] . "</td>
                        <td>" . $row["id_user"] . "</td>
                        <td class='action-buttons'>
                            <form action='' method='post'>
                                <input type='hidden' name='id_rdv' value='" . $row["id_rdv"] . "'>
                                <input type='date' name='new_date' required>
                                 <br>
      <label for='new_time'>Nouvelle heure :</label>
      <input type='time' name='new_time' required>
      <br>
                                <input type='submit' name='modifier' value='Modifier'>
                            </form>
                            <form action='' method='post'>
                                <input type='hidden' name='id_rdv' value='" . $row["id_rdv"] . "'>
                                <input type='submit' name='supprimer' value='Supprimer'>
                            </form>
                        </td>
                    </tr>";
            }

            echo "</table>";

            echo "</body>
                  </html>";
        } else {
            echo "Aucun rendez-vous trouvé.";
        }
    } else {
        echo "Erreur lors de la récupération des rendez-vous : " . $conn->error;
    }
}

// Appeler la fonction pour afficher la liste des RDV triés par date
afficherListeRDV($conn);

// Close connection
$conn->close();
?>