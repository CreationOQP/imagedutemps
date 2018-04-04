-- Suppression des tables dans l'ordre inverse de la création --

-- DROP TABLE Diapositive; --
/* DROP TABLE Type_diapo;
DROP TABLE Lieu;
DROP TABLE theme;
DROP TABLE Fournisseur;
DROP TABLE Utilisateur_mail;
DROP TABLE Dns_mail;
DROP TABLE Adresse;
DROP TABLE Ville;
DROP TABLE Code_postal;
DROP TABLE Evolution;
DROP TABLE Qualite;
DROP TABLE Publics;
DROP TABLE Etat_civil;
DROP TABLE Telephone;
DROP TABLE Type_telephone; */
drop database imagedutemps;
--  ------------------------------------
--  Création de la base de donnée test
--  ------------------------------------
CREATE DATABASE imagedutemps CHARACTER SET 'utf8';
USE imagedutemps;

-- Création des tables, chaque nom des champs est précédé du préfixe de la table qui se compose des trois premières lettres du nom de la table --

-- Création de la table type téléphone, préfixe typtel --
	CREATE TABLE Type_telephone (
		typtel_id INT UNSIGNED NOT NULL AUTO_INCREMENT,
		typtel_nom VARCHAR(20) NOT NULL,
		typtel_commentaire TEXT,
		PRIMARY KEY (typtel_id))
		ENGINE=INNODB;
		
-- Création de la table telephone. préfixe tel. --
	CREATE TABLE Telephone (
		tel_id INT UNSIGNED NOT NULL AUTO_INCREMENT,
		tel_numero VARCHAR(15) NOT NULL,
		tel_typtel_id INT UNSIGNED NOT NULL,
		CONSTRAINT fk_tel_typetel FOREIGN KEY (tel_typtel_id) REFERENCES Type_telephone(typtel_id),
		PRIMARY KEY (tel_id)
		)
		ENGINE=INNODB;
		
-- Création de la table Etat civil, préfixe etc --
	CREATE TABLE Etat_civil (
		etc_id INT UNSIGNED NOT NULL AUTO_INCREMENT,
		etc_nom VARCHAR(5) NOT NULL,
		PRIMARY KEY (etc_id)
		)
		ENGINE=INNODB;
		
-- Création de la table Statut (statut juridique). Préfixe sta --
	CREATE TABLE Statut (
		sta_id INT UNSIGNED NOT NULL AUTO_INCREMENT,
		sta_nom VARCHAR(15) NOT NULL,
		sta_commentaire TEXT,
		PRIMARY KEY (sta_id)
		)
		ENGINE=INNODB;
		
-- Création de la table Dénomination. Préfixe dem --
	CREATE TABLE Denomination (
		dem_id INT UNSIGNED NOT NULL AUTO_INCREMENT,
		dem_nom VARCHAR(40) NOT NULL,
		dem_description TEXT,
		dem_commentaire TEXT,
		dem_sta_id  INT UNSIGNED NOT NULL,
		CONSTRAINT fk_dem_sta FOREIGN KEY (dem_sta_id) REFERENCES Statut(sta_id),
		PRIMARY KEY (dem_id)
		)
		ENGINE=INNODB;
		
-- Création de la table publics. préfixe pub  --
	CREATE TABLE Publics (
		pub_id INT UNSIGNED NOT NULL AUTO_INCREMENT,
		pub_nom VARCHAR(20) NOT NULL,
		pub_prenom VARCHAR(20),
		pub_date DATE,
		pub_pseudo VARCHAR(10) NOT NULL UNIQUE,
		pub_etc_id INT UNSIGNED NOT NULL,
		pub_dem_id INT UNSIGNED NOT NULL,
		CONSTRAINT fk_pub_etc FOREIGN KEY (pub_etc_id) REFERENCES Etat_civil(etc_id),
		CONSTRAINT fk_pub_dem FOREIGN KEY (pub_dem_id) REFERENCES Denomination(dem_id),
		PRIMARY KEY (pub_id)
		)
		ENGINE=INNODB;

-- création de la table contact, préfixe con --
	CREATE TABLE Contact (
		con_tel_id INT NOT NULL,
		con_pub_id INT NOT NULL,
		PRIMARY KEY (con_tel_id, con_pub_id));
		
		
-- Création de la table qualité, préfixe qua --
	CREATE TABLE Qualite (
		qua_id INT UNSIGNED NOT NULL AUTO_INCREMENT,
		qua_nom VARCHAR(20) NOT NULL,
		qua_description TEXT,
		qua_commentaire TEXT,
		PRIMARY KEY (qua_id))
		ENGINE=INNODB;

-- Création de la table évolution, préfixe evo --
-- Je rajoute un champ d'ID à la table car si un public désire revenir à une qualité déjà exercé, il y aura un problème d'intégrité. -- 
	CREATE TABLE Evolution (
		evo_id INT UNSIGNED NOT NULL AUTO_INCREMENT,
		evo_pub_id INT UNSIGNED NOT NULL,
		evo_qua_id INT UNSIGNED NOT NULL,
		evo_date DATE NOT NULL,
		evo_commentaire TEXT,
		PRIMARY KEY (evo_id),
		CONSTRAINT fk_evo_pub FOREIGN KEY (evo_pub_id) REFERENCES Publics(pub_id),
		CONSTRAINT fk_evo_qua FOREIGN KEY (evo_qua_id) REFERENCES Qualite(qua_id))
		ENGINE=INNODB;

-- Création de la table Password, préfixe pwd --
	CREATE TABLE Password (
		pwd_id INT UNSIGNED NOT NULL AUTO_INCREMENT,
		pwd_mot CHAR(5) UNIQUE,
		pwd_pub_id INT UNSIGNED NOT NULL,
		pwd_date DATE NOT NULL,
		PRIMARY KEY (pwd_id),
		CONSTRAINT fk_pwd_pub FOREIGN KEY (pwd_pub_id) REFERENCES Publics(pub_id))
		ENGINE=INNODB;

-- Création de la table Pays, préfixe pay --
	CREATE TABLE Pays (
		pay_code char(3) NOT NULL,
		pay_nom VARCHAR(25),
		pay_description TEXT,
		pay_commentaire TEXT,
		PRIMARY KEY (pay_code))
		ENGINE=INNODB;
		
-- Création de la table code postale, préfixe cp --
	CREATE TABLE Code_postal (
		cp_id INT UNSIGNED NOT NULL AUTO_INCREMENT,
		cp_code INT NOT NULL,
		PRIMARY KEY (cp_id))
		ENGINE=INNODB;

-- Création de la table ville, préfixe vil --
	CREATE TABLE Ville (
		vil_id INT UNSIGNED NOT NULL AUTO_INCREMENT,
		vil_nom VARCHAR(25),
		vil_cp_id INT UNSIGNED NOT NULL,
		vil_pay_code CHAR(3) NOT NULL,
		PRIMARY KEY (vil_id),
		CONSTRAINT fk_vil_cp FOREIGN KEY (vil_cp_id) REFERENCES Code_postal(cp_id),
		CONSTRAINT fk_vil_pay FOREIGN KEY (vil_pay_code) REFERENCES PAYS(pay_code))
		ENGINE=INNODB;
		
-- Création de la table adresse, préfixe adr --
	CREATE TABLE Adresse (
		adr_id INT UNSIGNED NOT NULL AUTO_INCREMENT,
		adr_denomination VARCHAR(20),
		adr_destinataire VARCHAR(20),
		adr_lieu VARCHAR(30),
		adr_voirie VARCHAR(30),
		adr_mention VARCHAR(20),
		adr_vil_id INT UNSIGNED NOT NULL,
		adr_pub_id INT UNSIGNED NOT NULL,
		PRIMARY KEY (adr_id),
		CONSTRAINT fk_adr_vil FOREIGN KEY (adr_vil_id) REFERENCES Ville(vil_id),
		CONSTRAINT fk_adr_pub FOREIGN KEY (adr_pub_id) REFERENCES Publics(pub_id))
		ENGINE=INNODB;

-- création de la table dns_mail, préfixe dns --
	CREATE TABLE dns_mail (
		dns_id INT UNSIGNED NOT NULL AUTO_INCREMENT,
		dns_nom VARCHAR(20),
		PRIMARY KEY (dns_id))
		ENGINE=INNODB;

-- Création de la table utilisateur mail, préfixe utm --
	CREATE TABLE Utilisateur_mail (
		utm_id INT UNSIGNED NOT NULL AUTO_INCREMENT,
		utm_nom VARCHAR(250) NOT NULL,
		utm_dns_id INT UNSIGNED NOT NULL,
		utm_pub_id INT UNSIGNED NOT NULL,
		PRIMARY KEY (utm_id),
		CONSTRAINT fk_utm_id FOREIGN KEY (utm_dns_id) REFERENCES dns_mail(dns_id),
		CONSTRAINT fk_utm_pub FOREIGN KEY (utm_pub_id) REFERENCES Publics(pub_id))
		ENGINE=INNODB;

-- Création de la table époque, préfixe epo --
	CREATE TABLE Epoque (
		epo_annee INT UNSIGNED NOT NULL AUTO_INCREMENT,
		epo_description TEXT,
		epo_commentaire TEXT,
		PRIMARY KEY (epo_annee))
		ENGINE=INNODB;
		
-- Création de la table thème, préfixe the --
	CREATE TABLE Theme (
		the_id INT UNSIGNED NOT NULL AUTO_INCREMENT,
		the_nom VARCHAR(30) NOT NULL,
		the_description TEXT,
		the_commentaire TEXT,
		PRIMARY KEY (the_id))
		ENGINE=INNODB;
		
-- Création de la table lieu, préfixe lie --
	CREATE TABLE Lieu (
		lie_id INT UNSIGNED NOT NULL AUTO_INCREMENT,
		lie_nom VARCHAR(35) NOT NULL,
		lie_description TEXT,
		lie_commentaire TEXT,
		PRIMARY KEY (lie_id))
		ENGINE=INNODB;
		
-- Création de la table type de diapo, préfixe typdia --
	CREATE TABLE Type_diapo (
		typdia_id INT UNSIGNED NOT NULL AUTO_INCREMENT,
		typdia_nom VARCHAR(10) NOT NULL,
		typdia_description TEXT,
		typdia_commentaire TEXT,
		PRIMARY KEY (typdia_id))
		ENGINE=INNODB;
		
-- création de la table diapositive, préfixe dia. --
	CREATE TABLE Diapositive (
		dia_id INT UNSIGNED NOT NULL AUTO_INCREMENT,
		dia_publication BOOLEAN,
		dia_creation DATE,
		dia_legend VARCHAR(250),
		dia_commentaire TEXT,
		dia_epo_annee INT UNSIGNED NOT NULL,
		dia_the_id INT UNSIGNED NOT NULL,
		dia_lie_id INT UNSIGNED NOT NULL,
		dia_typdia_id INT UNSIGNED NOT NULL,
		dia_pub_id INT UNSIGNED NOT NULL,
		PRIMARY KEY (dia_id),
		CONSTRAINT fk_dia_epo FOREIGN KEY (dia_epo_annee) REFERENCES Epoque(epo_annee),
		CONSTRAINT fk_dia_the FOREIGN KEY (dia_the_id) REFERENCES Theme(the_id),
		CONSTRAINT fk_dia_lie FOREIGN KEY (dia_lie_id) REFERENCES Lieu(lie_id),
		CONSTRAINT fk_dia_typdia FOREIGN KEY (dia_typdia_id) REFERENCES Type_diapo(typdia_id),
		CONSTRAINT fk_dia_pub FOREIGN KEY (dia_pub_id) REFERENCES Publics(pub_id))
		ENGINE=INNODB;
		
-- Création de la table scénario, préfixe sce --
	CREATE TABLE Scenario (
		sce_dia_id INT NOT NULL,
		sce_homologue_id INT NOT NULL,
		sce_ordre INT UNSIGNED,
		sce_rang CHAR(2),
		PRIMARY KEY (sce_dia_id, sce_homologue_id))
		ENGINE=INNODB;

-- Création de la table connexion, préfixe con --
	CREATE TABLE Connexion (
		con_id INT UNSIGNED NOT NULL AUTO_INCREMENT,
		con_date DATETIME,
		con_dure TIME,
		PRIMARY KEY (con_id))
		ENGINE=INNODB;
		
-- Création de la table forumBillets préfixe forb --
	CREATE TABLE ForumBillet (
		forb_id INT UNSIGNED NOT NULL AUTO_INCREMENT,
		forb_titre VARCHAR(250),
		forb_contenu TEXT,
		forb_date DATETIME,
		forb_commentaire TEXT,
		forb_publication BOOLEAN,
		forb_pub_id INT UNSIGNED NOT NULL,
		forb_the_id INT UNSIGNED NOT NULL,
		forb_lie_id INT UNSIGNED NOT NULL,
		PRIMARY KEY (forb_id),
		CONSTRAINT fk_forb_pub FOREIGN KEY (forb_pub_id) REFERENCES Publics(pub_id),
		CONSTRAINT fk_forb_the FOREIGN KEY (forb_the_id) REFERENCES Theme(the_id),
		CONSTRAINT fk_forb_lie FOREIGN KEY (forb_lie_id) REFERENCES Lieu(lie_id))
		ENGINE=INNODB;
		
-- Création de la table forumDiscussion préfixe frod --
	CREATE TABLE ForumDiscussion (
		ford_id INT UNSIGNED NOT NULL AUTO_INCREMENT,
		ford_discussion TEXT,
		ford_date DATETIME,
		ford_commentaire TEXT,
		ford_publication BOOLEAN,
		ford_pub_id INT UNSIGNED NOT NULL,
		ford_forb_id INT UNSIGNED NOT NULL,
		PRIMARY KEY (ford_id),
		CONSTRAINT fk_ford_pub FOREIGN KEY (ford_pub_id) REFERENCES Publics(pub_id),
		CONSTRAINT fk_ford_forb FOREIGN KEY (ford_forb_id) REFERENCES ForumBillet(forb_id))
		ENGINE=INNODB;

-- Création de la table messageContact préfixe mco --
	CREATE TABLE MessageContact (
		mco_id INT UNSIGNED NOT NULL AUTO_INCREMENT,
		mco_prenom VARCHAR(30),
		mco_nom VARCHAR(30),
		mco_association VARCHAR(75),
		mco_email VARCHAR(250),
		mco_sujet TEXT,
		mco_date DATETIME,
		mco_commentaire TEXT,
		PRIMARY KEY (mco_id))
		ENGINE=INNODB;
		
-- Création de la table étoile, préfixe eto --
	CREATE TABLE Etoile (
		eto_id INT UNSIGNED NOT NULL AUTO_INCREMENT,
		eto_1 INT,
		eto_2 INT,
		et0_3 INT,
		eto_4 INT,
		eto_5 INT,
		eto_ip VARCHAR(12),
		eto_commentaires TEXT,
		PRIMARY KEY(eto_id))
		ENGINE=INNODB;