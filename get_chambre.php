<?php
include 'connexion.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ZenHôtel Chambre</title>

    <!-- Font Awesome CDN Links -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    

    <!-- Custom CSS File Links -->
    <link rel="stylesheet" href="css/Reservation.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/About.css">
    <link rel="stylesheet" href="css/core-style.css">
    <link rel="stylesheet" href="Acceuil.css">
    <link rel="stylesheet" href="css/core-style.css">
    <link rel="stylesheet" href="Accueil.css">
    <link rel="stylesheet" href="css/Contact.css">
    <link rel="stylesheet" href="fonts/remixicon.css">
    <script src="Acceui.js"></script>

</head>

<body>
    <!-- Header Section -->
    <section class="header">
        <div class="flex">
            <a href="#home" class="logo"><img src="img/bg-img/Logo.png" alt="Logo" id="logo"></a>
           
        </div>
        <div class="dropdown">
    <button class="dropbtn">Menu</button>
    <div class="dropdown-content">
        <a href="index.html">Accueil</a>
        <a href="About.html">À propos</a>
        <a href="http://localhost/Souweba/php/get_chambre.php">Réservation</a>
        <a href="">Occupant</a>
        <a href="Contact.html">Contact</a>
    </div>
</div>
        <nav class="navbar">
            <a href="index.html">Acceuil</a>
            <a href="About.html">A Propos</a>
            <a href="#Reservation">Reservation</a>
            <a href="http://localhost/Souweba/php/get_Occupant.php">Occupant</a>
            <a href="Contact.html">Contact</a>
        </nav>
    </section>

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
    <section class="rooms">
        <div class="container grid-container">
            <?php
            $sql = "SELECT * FROM Chambres";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $image_path = "img/chambre" . $row["numero"] . ".jpg";
                    if (file_exists($image_path)) {
                        $image_url = $image_path;
                    } else {
                        $image_url = "img/bg-img/1.jpg"; // Une image par défaut si l'image n'existe pas
                    }
                    echo "<div class='card mb-4' id='test'>";
                    echo "<img class='card-img-top' src='" . $image_url . "' alt='Chambre'>";
                    echo "<div class='card-body'>";
                    echo "<h5 class='card-title'>Chambre " . $row["numero"] . "</h5>";
                    echo "<p class='card-text'>Nombre de lits: " . $row["nombre_lits"] . "</p>";
                    echo "<p class='card-text'>Prix: " . $row["prix"] . "€/nuit</p>";
                    echo "<p class='card-text'>Salle d'eau: " . $row["salle_eau"] . "</p>";
                    echo "<button class='btn btn-primary'>Voir les détails</button>";
                    echo "<button class='btn btn-secondary' id='chambres' onclick=\"location.href='reservartion.html'\" >Réserver maintenant</button>";
                    echo "</div>";
                    echo "</div>";
                    // Supprimé le bouton doublon
                    // echo "<button class='btn btn-secondary' id='chambres' onclick=\"location.href='submit_reservation.php'\">Réserver maintenant</button>";
                }
            } else {
                echo "0 résultats";
            }

            $conn->close();
            ?>
        </div>
    </section>
    <!-- Footer and Scripts -->
    <footer>
        <div class="footer-content">
            <div class="footer-section branding">
                <h1><img src="img/bg-img/Logo.png" alt="" width="95%" style="top: -154px;"></h1>
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
                <p>Telephone: +228 90 12 12 12</p>
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
    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" crossorigin="anonymous" integrity="sha384-oBqDVmMz4fnFO9gybBogGzOg6tv6k2L5z6Wf6bJZBlvYB1zWm1ER1LPaK7x9ITB1"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" crossorigin="anonymous" integrity="sha384-pZfHC6QpZrG0x2t+6J6J6p6p6J6J6p6p6J6J6p6p6J6p6p6J6p6p6J6p6p6J6p6p6J6p6p6J6p6p6J6p6p6J6p6p6J6p6p6J6p6p6J6p6J6p6J6p6J6p6p6J6p6p6J6p6J6p6p6J6p6p6p6J6J6J6J6J6J6J6J6J6J6J6p6J6J6J6p6J6p6J6p6J6p6p6J6p6J6p6J6J6p6J6J6J6J6J6J6J6J6J6p6J6p6J6p6J6J6p6p6p6J6J6J6p6J6J6J6J6J6p6J6p6J6J6p6J6p6p6p6J6J6J6p6J6J6J6p6J6J6J6J6J6p6p6p6J6p6J6J6p6J6J6J6J6p6J6p6J6J6p6J6p6J6J6p6J6J6p6J6J6p6J6J6J6J6J6J6J6p6p6p6p6J6p6p6"></script>
</body>
</html>
