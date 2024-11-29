$sql = "INSERT INTO users (email, password) VALUES ('test@example.com', '123456')";
if ($conn->query($sql) === TRUE) {
    echo "Nouvel enregistrement créé avec succès";
} else {
    echo "Erreur : " . $sql . "<br>" . $conn->error;
}
