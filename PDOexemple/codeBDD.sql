CREATE DATABASE ateliernfa021 CHARACTER SET 'utf8';
USE ateliernfa021;

CREATE TABLE Utilisateur (
	uti_nom VARCHAR(20) NOT NULL,
	uti_prenom VARCHAR(25) NOT NULL,
	uti_fonction VARCHAR(20) NOT NULL,
	uti_email VARCHAR(250) NOT NULL,
	uti_date DATE NOT NULL,
	uti_mot_de_passe VARCHAR(100) NOT NULL,
	PRIMARY KEY (uti_email))
	ENGINE=INNODB;

INSERT INTO Utilisateur (uti_nom, uti_prenom, uti_fonction, uti_email, uti_date, uti_mot_de_passe)
	VALUES ('Nom 1', 'prénom 1', 'fonction_1', 'email_1@yahoo.fr', '2018-01-01', 'abcdefgh');