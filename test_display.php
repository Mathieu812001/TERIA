<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "teria_db";

// Connexion à MySQL
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Échec de la connexion : " . $conn->connect_error);
}

// Requête pour récupérer les données
$sql = "SELECT id, email, password FROM users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Afficher les données
    while($row = $result->fetch_assoc()) {
        echo "ID: " . $row["id"]. " - Email: " . $row["email"]. " - Password: " . $row["password"]. "<br>";
    }
} else {
    echo "Aucun résultat trouvé.";
}

$conn->close();
?>
