<?php
// Connexion à la base de données Microsoft Access
$dsn = "Driver={Microsoft Access Driver (*.mdb, *.accdb)};Dbq=C:\\chemin\\vers\\votre_base_de_donnees.accdb;";
$conn = odbc_connect($dsn, '', '');

if (!$conn) {
    die("Erreur de connexion à Access : " . odbc_errormsg());
}

// Vérification si le formulaire d'inscription a été soumis
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $mot_de_passe = $_POST['mot_de_passe'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];

    // Vérification si l'email est déjà utilisé
    $query_check = "SELECT * FROM utilisateurs WHERE email = ?";
    $stmt_check = odbc_prepare($conn, $query_check);
    odbc_execute($stmt_check, array($email));

    if (odbc_fetch_array($stmt_check)) {
        // Si l'email existe déjà, on renvoie un message d'erreur
        $message = "Erreur : cet email est déjà utilisé.";
    } else {
        // Sinon, on insère le nouvel utilisateur dans la base de données
        $query_insert = "INSERT INTO utilisateurs (email, mot_de_passe, nom, prenom) VALUES (?, ?, ?, ?)";
        $stmt_insert = odbc_prepare($conn, $query_insert);

        if (odbc_execute($stmt_insert, array($email, $mot_de_passe, $nom, $prenom))) {
            // Inscription réussie
            $message = "Inscription réussie ! Bienvenue, " . htmlspecialchars($prenom) . " " . htmlspecialchars($nom) . " !";
        } else {
            // Erreur lors de l'insertion
            $message = "Erreur : l'inscription a échoué.";
        }
    }

    // Redirection vers la page HTML avec un message de succès ou d'erreur
    header("Location: index.html?message=" . urlencode($message));
    exit();
}
?>
