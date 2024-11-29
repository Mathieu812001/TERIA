CREATE DATABASE nom_de_la_base_de_donnees;

USE nom_de_la_base_de_donnees;

CREATE TABLE utilisateurs (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    prenom VARCHAR(30) NOT NULL,
    nom VARCHAR(30) NOT NULL,
    email VARCHAR(50)
);
