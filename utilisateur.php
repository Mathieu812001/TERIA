<?php
// Connexion à la base de données Access
$database_path = 'C:/path/to/utilisateurs.accdb'; // Remplace par le chemin vers ta base de données Access
$connection_string = "DRIVER={Microsoft Access Driver (*.mdb, *.accdb)};DBQ=$database_path;";

$conn = odbc_connect($connection_string, '', '');

if (!$conn) {
    die("Erreur de connexion à la base de données Access.");
}

// Récupérer les données du formulaire
$email = $_POST['email'];
$mot_de_passe = $_POST['mot_de_passe'];
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];

// Préparer et exécuter la requête SQL pour insérer les données
$sql = "INSERT INTO utilisateurs (email, mot_de_passe, nom, prenom) VALUES ('$email', '$mot_de_passe', '$nom', '$prenom')";
$result = odbc_exec($conn, $sql);

if ($result) {
    echo "Utilisateur enregistré avec succès.";
} else {
    echo "Erreur lors de l'enregistrement de l'utilisateur.";
}

// Fermer la connexion à la base de données
odbc_close($conn);
?>
