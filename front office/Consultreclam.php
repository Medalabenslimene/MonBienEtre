<?php
include '../../controlleur/reclamationC.php';
include '../../modele/reclamation.php';

$reclamationC = new ReclamationC();

// Supprimer la réclamation si l'action de suppression est déclenchée
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['supprimer'])) {
    $idReclamationASupprimer = $_POST['id_reclamation'];

    // Utilisez votre fonction de suppression de réclamation ici
    $reclamationC->supprimerReclamation($idReclamationASupprimer);

    // Redirige vers la page de consultation des réclamations après la suppression
    header('Location: consultreclam.php');
    exit;
}

// Traitement de l'envoi de réponse
if (isset($_POST['envoyer_reponse'])) {
    $id_reclamation = $_POST['id_reclamation'];
    $reponse = $_POST['reponse'];

    // Effectuez ici le traitement de la réponse, par exemple, en l'insérant dans la base de données.
    // Vous pouvez utiliser les variables $id_reclamation et $reponse pour cela.

    // Une fois le traitement effectué, vous pouvez rediriger l'utilisateur ou afficher un message de confirmation.
    // Exemple : header("Location: consultreclam.php?success=1");

    // Ajoutez ceci pour vérifier les valeurs
    echo "ID Réclamation: $id_reclamation, Réponse: $reponse";
}

// Récupère la liste des réclamations
$listeReclamations = $reclamationC->listReclamations();
function obtenirReponseParIdReclamation($id_reclamation) {
    // Implémentez votre requête pour récupérer la réponse en fonction de id_reclamation
    // Remplacez cela par le résultat réel de votre requête SQL
    $response = ""; // Remplacez cela par le résultat de votre requête

    return $response;
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulter Réclamation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            overflow: hidden;
        }

        h2 {
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        td {
            background-color: #fff;
        }

        .actions {
            display: flex;
        }

        .actions form {
            margin-right: 5px;
        }

        button {
            padding: 8px;
            border: none;
            cursor: pointer;
            border-radius: 3px;
            transition: background-color 0.3s;
        }

        .modifier-btn {
            background-color: #4CAF50;
            color: #fff;
        }

        .supprimer-btn {
            background-color: #d9534f;
            color: #fff;
        }

        .back-link {
            display: block;
            margin-top: 20px;
            color: #4CAF50;
            text-decoration: none;
            
            font-size: 18px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Liste des Réclamations</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Pseudo</th>
                    <th>CIN</th>
                    <th>Type</th>
                    <th>Commentaire</th>
                    <th>Actions</th>
                    <th> Réponses </th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($listeReclamations as $reclamation) : ?>
                    <tr>
                        <td><?= $reclamation['id_reclamation']; ?></td>
                        <td><?= $reclamation['pseudo']; ?></td>
                        <td><?= $reclamation['CIN']; ?></td>
                        <td><?= $reclamation['type']; ?></td>
                        <td><?= $reclamation['commentaire']; ?></td>
                        <td class="actions">
                            <form action="updateX.php" method="GET">
                                <input type="hidden" name="id_reclamation" value="<?php echo $reclamation['id_reclamation']; ?>">
                                <button type="submit" class="modifier-btn">Modifier</button>
                            </form>
                            <form action="consultreclam.php" method="POST">
                                <input type="hidden" name="id_reclamation" value="<?php echo $reclamation['id_reclamation']; ?>">
                                <button type="submit" name="supprimer" class="supprimer-btn">Supprimer</button>
                            </form>
                        </td>
                        <td>
                        <form action="reponses_tab.php" method="GET">
    <input type="hidden" name="id_reclamation" value="<?php echo $reclamation['id_reclamation']; ?>">
    <button type="submit" name="show_reponses" class="reponse-btn">Réponses</button>
</form>


    <?php
    // Affiche la réponse associée s'il y en a une
    $reponse = obtenirReponseParIdReclamation($reclamation['id_reclamation']);
    if ($reponse) {
        echo "<div>Réponse : $reponse</div>";
    }
    ?>
</td>

                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <a href="liste_reclamation.php" class="back-link">Retour à la liste </a>
    </div>
</body>

</html>
