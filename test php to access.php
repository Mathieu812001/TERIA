<?php
// Chemin vers votre fichier Access (.accdb)
$dsn = "DRIVER={Microsoft Access Driver (*.mdb, *.accdb)};DBQ=C:\\path\\to\\LoginDatabase.accdb;";

// Connexion à la base de données Access via ODBC
$conn = odbc_connect($dsn, '', '');

if ($conn) {
    echo "Connexion réussie à la base de données Access !";
} else {
    echo "Erreur de connexion à la base de données Access : " . odbc_errormsg();
}

// Fermer la connexion à la base de données
odbc_close($conn);
?>
