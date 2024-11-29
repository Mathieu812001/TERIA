CREATE DATABASE ma_base_de_donnees;
USE ma_base_de_donnees;
CREATE TABLE utilisateurs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100),
    email VARCHAR(100)
);
