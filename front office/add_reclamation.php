<?php
include '../../controlleur/reclamationC.php';
include '../../modele/reclamation.php';

$reclamation = null;
$reclamationC = new ReclamationC();

if (
    isset($_POST["pseudo"]) &&
    isset($_POST["cin"]) &&
    isset($_POST["type"]) &&
    isset($_POST["commentaire"])
) {
    if (
        !empty($_POST['pseudo']) &&
        !empty($_POST["cin"]) &&
        !empty($_POST["type"]) &&
        !empty($_POST["commentaire"])
    ) {
        $reclamation = new Reclamation(
            null,
            $_POST['pseudo'],
            $_POST['cin'],
            $_POST['type'],
            $_POST['commentaire']
        );

        $reclamationC->addReclamation($reclamation);
        // Redirige vers une autre page après l'ajout (décommentez la ligne suivante si nécessaire)
        // header('Location: liste_reclamation.php');
    }
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reclamation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background: linear-gradient(to bottom, rgba(173, 216, 230, 0.5) 0%, rgba(255, 255, 255, 0.5) 100%), url("reclamdoct.png");
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: scroll;
            background-size: cover;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }

        /* Navigation Menu Styles */
        nav {
            background-color: rgba(0, 0, 0, 0.5);
            padding: 10px;
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
            text-align: center;
        }

        nav a {
            color: white;
            text-decoration: none;
            font-weight: bold;
            margin-right: 15px;
            padding: 10px;
            display: inline-block;
        }

        /* Page Content Styles */
        .container {
            text-align: left;
            width: 80%;
            max-width: 600px;
            padding: 20px;
            background: rgba(255, 255, 255, 0.8);
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            margin-top: 56px; /* Adjusted to account for the fixed navbar */
        }

        form {
            text-align: left;
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            box-sizing: border-box;
        }

        input[type="submit"],
        input[type="reset"],
        button {
            width: 100%;
            background-color: #4CAF50;
            color: white;
            padding: 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-bottom: 10px;
            display: inline-block;
            box-sizing: border-box;
        }

        input[type="submit"]:hover,
        input[type="reset"]:hover,
        button:hover {
            background-color: #45a049;
        }

        button {
            width: 100%;
            margin-bottom: 10px;
        }

        .back-link {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #4CAF50;
            text-decoration: none;
            font-size: 18px;
        }
    </style>
</head>

<body>
    <!-- Navigation Menu -->
    <nav>
        <a href="#">About</a>
        <a href="#">Services</a>
        <a href="#">Reclamation</a>
        <a href="#">Login</a>
    </nav>

    <!-- Page Content -->
    <div class="container">
        <form action="" method="POST" name="F" onsubmit="return verif()">
            <table>
                <tr>
                    <td><label for="pseudo">Pseudo :</label></td>
                    <td>
                        <input type="text" id="pseudo" name="pseudo" />
                    </td>
                </tr>
                <tr>
                    <td><label for="cin">CIN :</label></td>
                    <td>
                        <input type="number" id="cin" name="cin" />
                    </td>
                </tr>
                <tr>
                    <td><label for="type">Type :</label></td>
                    <td>
                        <input type="text" id="type" name="type" />
                    </td>
                </tr>
                <tr>
                    <td><label for="commentaire">Commentaire :</label></td>
                    <td>
                        <input type="text" id="commentaire" name="commentaire" />
                    </td>
                </tr>
                <td>
                    <input type="submit" value="Save">
                    <input type="reset" value="Supprimer">
                    <button type="button" onclick="consulterReclamation()">Consulter Réclamation</button>
                </td>
            </table>
        </form>
        <a href="liste_reclamation.php" class="back-link">Back to list </a>
    </div>

    <!-- Bootstrap core JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Your existing JavaScript functions
        function resetForm() {
            document.querySelector('form').reset();
        }

        function consulterReclamation() {
            window.location.href = 'consultreclam.php';
        }

        function isAlpha(ch) {
            ch = ch.toUpperCase();
            for (i = 0; i < ch.length; i++)
                if ((ch.charAt(i) < 'A') || (ch.charAt(i) > 'Z'))
                    return false;
            return true;
        }

        function verif() {
            c = F.cin.value;
            p = F.pseudo.value;
            if ((p.length == 0) || (!isAlpha(p)) && (!isNaN(p))) {
                alert("Le pseudo est vide ou contient des caractères non alphabétiques !");
                return false;
            }

            if (c.length !== 8 || (c.charAt(0) !== "0" && c.charAt(0) !== "1")) {
                alert("Veuillez vérifier votre CIN !");
                return false;
            }

            if (F.type.value.trim() === "") {
                alert("Veuillez sélectionner un type de réclamation");
                return false;
            }
        }
    </script>
</body>

</html>
