<?php
include 'connexion.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ZenHôtel Occupant</title>
    <!-- Custom CSS File Links -->
    <link rel="stylesheet" href="css/Acceuil.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="Acceuil.css">
    <link rel="stylesheet" href="css/core-style.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/About.css">
    <link rel="stylesheet" href="css/Contact.css">
    <link rel="stylesheet" href="fonts/remixicon.css">
    <script src="Acceui.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        h2, h3 {
            color: #0056b3;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        table th, table td {
            border: 1px solid #ddd;
            text-align: left;
            padding: 8px;
        }
        table th {
            background-color: #007bff;
            color: white;
        }
        .container {
            margin: 20px;
        }
        .section {
            margin-bottom: 40px;
        }
    </style>
    <style>
.section {
    text-align: center;
}

button[type="submit"] {
    background-color: green;
    color: white;
    font-size: 1.5em;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: transform 0.3s;
}

button[type="submit"]:hover {
    transform: scale(1.1);
}
</style>

</head>
<body>
<!-- Header Section -->
    <section class="header">
        <div class="flex">
            <a href="#home" class="logo"><img src="img/bg-img/Logo.png" alt="Logo" id="logo"></a>
           
        </div>

        <nav class="navbar">
            <a href="index.html">Accueil</a>
            <a href="About.html">A propos</a>
            <a href="http://localhost/Souweba/php/get_chambre.php">Reservation</a>
            <a href="http://localhost/Souweba/php/get_Occupant.php">Occupant</a>
            <a href="Contact.html">Contact</a>
        </nav>
    </section>
    <div class="dropdown">
    <button class="dropbtn">Menu</button>
    <div class="dropdown-content">
        <a href="index.html">Accueil</a>
        <a href="About.html">À propos</a>
        <a href="http://localhost/Souweba/php/get_chambre.php">Réservation</a>
        <a href="http://localhost/Souweba/php/get_Occupant.php">Occupant</a>
        <a href="Contact.html">Contact</a>
    </div>
</div>
    <br>

<!-- Banner Section -->
<div class="banner">
  <div class="content">
    <h2>Réservez votre séjour sur ZenHôtel</h2>
    <p>1 480 086 chambres dans le monde vous attendent !</p>
    <form action="http://localhost/Souweba/php/get_chambre.php" method="get">
      <label for="emplacement">Emplacement :</label>
      <input type="text" id="emplacement" placeholder="Où allez-vous ?">
      <label for="arrivée">Arrivée :</label>
      <input type="date" id="arrivée">
      <label for="départ">Départ :</label>
      <input type="date" id="départ">
      <label for="invités">Invités :</label>
      <input type="number" id="invités" min="1" value="1">
      <button type="submit">Rechercher</button>
    </form>
  </div>
</div>
    <div class="container">
        <!-- Section Occupants -->
        <div class="section">
            <h2>Occupants</h2>
            <h3>Adultes</h3>
            <table>
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                </tr>
                <?php
                $sql = "SELECT nom, prenom FROM personnes WHERE type_personne = 'adulte'";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr><td>{$row['nom']}</td><td>{$row['prenom']}</td></tr>";
                    }
                } else {
                    echo "<tr><td colspan='2'>Aucun adulte trouvé</td></tr>";
                }
                ?>
            </table>
            <h3>Enfants</h3>
            <table>
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                </tr>
                <?php
                $sql = "SELECT nom, prenom FROM personnes WHERE type_personne = 'enfant'";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr><td>{$row['nom']}</td><td>{$row['prenom']}</td></tr>";
                    }
                } else {
                    echo "<tr><td colspan='2'>Aucun enfant trouvé</td></tr>";
                }
                ?>
            </table>
        </div>

        <!-- Section Personnel -->
        <div class="section">
            <h2>Personnel</h2>
            <table>
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Rôle</th>
                </tr>
                <?php
                $sql = "SELECT nom, prenom, role FROM employes";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr><td>{$row['nom']}</td><td>{$row['prenom']}</td><td>{$row['role']}</td></tr>";
                    }
                } else {
                    echo "<tr><td colspan='3'>Aucun membre du personnel trouvé</td></tr>";
                }
                ?>
            </table>
        </div>

        <!-- Réservations Section -->
        <div class="section">
            <h2>Réservations</h2>
            <table>
                <thead>
                    <tr>
                        <th>Chambre</th>
                        <th>Occupant</th>
                        <th>Date d'arrivée</th>
                        <th>Date de départ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT chambres.numero, personnes.nom, reservations.date_arrivee, reservations.date_depart 
                            FROM reservations 
                            JOIN chambres ON chambres.chambre_id = reservations.chambre_id 
                            JOIN personnes ON personnes.personne_id = reservations.personne_id";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>
                                <td>{$row['numero']}</td>
                                <td>{$row['nom']}</td>
                                <td>{$row['date_arrivee']}</td>
                                <td>{$row['date_depart']}</td>
                            </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='4'>Aucun résultat</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <!-- Chiffre d'affaires Section -->
        <div class="section">
    <h2>Chiffre d'affaires</h2>
    <form method="post">
        <label for="start-date">Date de début:</label>
        <input type="date" id="start-date" name="start-date" required><br>
        <label for="end-date">Date de fin:</label>
        <input type="date" id="end-date" name="end-date" required><br>
        <button type="submit">Calculer</button>
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $start_date = $_POST['start-date'];
        $end_date = $_POST['end-date'];
        $sql = "SELECT SUM(DATEDIFF(reservations.date_depart, reservations.date_arrivee) * chambres.prix) AS chiffre_affaires 
                FROM reservations 
                JOIN chambres ON chambres.chambre_id = reservations.chambre_id 
                WHERE reservations.date_arrivee >= ? AND reservations.date_depart <= ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $start_date, $end_date);
        $stmt->execute();
        $stmt->bind_result($chiffre_affaires);
        $stmt->fetch();
        echo "<h3>Chiffre d'affaires du $start_date au $end_date : {$chiffre_affaires} €</h3>";
        $stmt->close();
    }
    ?>
</div>

    </div>
    <footer>
        <div class="footer-content">
            <div class="footer-section branding">
                <h1><img src="img/bg-img/Logo.png" alt="" width="95%" top="-154px"></h1>
                <p>&copy; 2025 Tous droits réservés | Ce modèle est réalisé avec ♡ par le groupe 7.</p>
                <div class="social-icons">
                    <a href="#"><i class="ri-facebook-fill"></i></a>
                    <a href="#"><i class="ri-twitter-fill"></i></a>
                    <a href="#"><i class="ri-global-fill"></i></a>
                    <a href="#"><i class="ri-behance-fill"></i></a>
                </div>
            </div>
            <div class="footer-section quick-links">
                <h2>Liens rapides</h2>
                <ul>
                    <li><a href="About.html">A propos de ZenHôtel</a></li>
                    <li><a href="http://localhost/Souweba/php/get_chambre.php">Vos chambres</a></li>
                    <li><a href="index.html">Accueil</a></li>
                    <li><a href="Contact.html">Contact</a></li>
                </ul>
            </div>
            <div class="footer-section reservations">
                <h2>Reservations</h2>
                <p>Telephone:+228 90 12 12 12</p>
                <p>Skype: ZenHôtel</p>
                <p>Email: ZenHôtel@gmail.com</p>
            </div>
            <div class="footer-section location">
                <h2>Notre Localisation</h2>
                <p>Agoe Lome en face d'avedji</p>
                <form>
                    <input type="email" placeholder="Votre Address Email ">
                    <button type="submit"><i class="ri-send-plane-fill"></i></button>
                </form>
            </div>
        </div>
    </footer>
    <script src="Acceui.js"></script>
</body>
</html>
