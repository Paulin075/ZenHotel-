<?php
include 'connexion.php';
echo "Début du script PHP"; // Message de débogage
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $type = $_POST['type']; // Adulte ou Enfant
    $date_arrivee = $_POST['date_arrivee'];
    $date_depart = $_POST['date_depart'];
    $chambre_id = $_POST['chambre_id'];

    // Insérer la personne dans la table Personnes
    $sql_personne = "INSERT INTO personnes (nom, prenom, type_personne) VALUES (?, ?, ?)";
    $stmt_personne = $conn->prepare($sql_personne);
    $stmt_personne->bind_param("sss", $nom, $prenom, $type);

    if ($stmt_personne->execute()) {
        $personne_id = $stmt_personne->insert_id;

        // Insérer la personne dans la table Occupants
        $sql_occupant = "INSERT INTO occupants (personne_id) VALUES (?)";
        $stmt_occupant = $conn->prepare($sql_occupant);
        $stmt_occupant->bind_param("i", $personne_id);
        
        if ($stmt_occupant->execute()) {
            // Insérer la réservation dans la table Reservations
            $sql_reservation = "INSERT INTO reservations (chambre_id, personne_id, date_arrivee, date_depart) VALUES (?, ?, ?, ?)";
            $stmt_reservation = $conn->prepare($sql_reservation);
            $stmt_reservation->bind_param("iiss", $chambre_id, $personne_id, $date_arrivee, $date_depart);
            
            if ($stmt_reservation->execute()) {
                header("location: reservartion.html");
                exit();
            } else {
                echo "Erreur: " . $stmt_reservation->error;
            }

            $stmt_reservation->close();
        } else {
            echo "Erreur: " . $stmt_occupant->error;
        }

        $stmt_occupant->close();
    } else {
        echo "Erreur: " . $stmt_personne->error;
    }

    $stmt_personne->close();
}

$conn->close();
?>
