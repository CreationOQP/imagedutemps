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
/* drop database imagedutemps; */
--  ------------------------------------
--  Création de la base de donnée test
--  ------------------------------------
/* CREATE DATABASE imagedutemps CHARACTER SET 'utf8';
USE imagedutemps; */

-- Création des tables, chaque nom des champs est précédé du préfixe de la table qui se compose des trois premières lettres du nom de la table --

-- Création de la table type téléphone, préfixe typtel --
	CREATE TABLE Type_telephone (							-- A_001
		typtel_id INT UNSIGNED NOT NULL AUTO_INCREMENT,		-- A_001_01
		typtel_nom VARCHAR(20) NOT NULL,					-- A_001_02
		typtel_commentaire TEXT,							-- A_001_03
		PRIMARY KEY (typtel_id))
		ENGINE=INNODB;
		
-- Création de la table telephone. préfixe tel. --
	CREATE TABLE Telephone (								-- A_002_
		tel_id INT UNSIGNED NOT NULL AUTO_INCREMENT,		-- A_002_01
		tel_numero VARCHAR(15) NOT NULL,					-- A_002_02
		tel_typtel_id INT UNSIGNED NOT NULL,				-- A_002_03
		PRIMARY KEY (tel_id)
		)
		ENGINE=INNODB;
		
-- Création de la table Etat civil, préfixe etc --
	CREATE TABLE Etat_civil (								-- A_003_
		etc_id INT UNSIGNED NOT NULL AUTO_INCREMENT,		-- A_003_01
		etc_nom VARCHAR(5) NOT NULL,						-- A_003_02
		PRIMARY KEY (etc_id)
		)
		ENGINE=INNODB;
		
-- Création de la table Statut (statut juridique). Préfixe sta --
	CREATE TABLE Statut (									-- A_004_
		sta_id INT UNSIGNED NOT NULL AUTO_INCREMENT,		-- A_004_01
		sta_nom VARCHAR(15) NOT NULL,						-- A_004_02
		sta_commentaire TEXT,								-- A_004_03
		PRIMARY KEY (sta_id)
		)
		ENGINE=INNODB;
		
-- Création de la table Dénomination. Préfixe dem --
	CREATE TABLE Denomination (								-- A_005_
		dem_id INT UNSIGNED NOT NULL AUTO_INCREMENT,		-- A_005_01
		dem_nom VARCHAR(40) NOT NULL,						-- A_005_02
		dem_description TEXT,								-- A_005_03
		dem_commentaire TEXT,								-- A_005_04
		dem_sta_id  INT UNSIGNED NOT NULL,					-- A_005_05
		PRIMARY KEY (dem_id)
		)
		ENGINE=INNODB;
		
-- Création de la table publics. préfixe pub  --
	CREATE TABLE Publics (									-- A_006_
		pub_id INT UNSIGNED NOT NULL AUTO_INCREMENT,		-- A_006_01
		pub_nom VARCHAR(20) NOT NULL,						-- A_006_02
		pub_prenom VARCHAR(20),								-- A_006_03
		pub_date DATE,										-- A_006_04
		pub_pseudo VARCHAR(10) NOT NULL UNIQUE,				-- A_006_05
		pub_etc_id INT UNSIGNED NOT NULL,					-- A_006_06
		pub_dem_id INT UNSIGNED NOT NULL,					-- A_006_07
		PRIMARY KEY (pub_id)
		)
		ENGINE=INNODB;

-- création de la table contact, préfixe con --
	CREATE TABLE Contact (									-- A_007_
		con_tel_id INT NOT NULL,							-- A_007_01
		con_pub_id INT NOT NULL,							-- A_007_02
		PRIMARY KEY (con_tel_id, con_pub_id))
		ENGINE=INNODB;
		
		
-- Création de la table qualité, préfixe qua --
	CREATE TABLE Qualite (									-- A_008_
		qua_id INT UNSIGNED NOT NULL AUTO_INCREMENT,		-- A_008_01
		qua_nom VARCHAR(20) NOT NULL,						-- A_008_02
		qua_description TEXT,								-- A_008_03
		qua_commentaire TEXT,								-- A_008_04
		PRIMARY KEY (qua_id))
		ENGINE=INNODB;

-- Création de la table évolution, préfixe evo --
-- Je rajoute un champ d'ID à la table car si un public désire revenir à une qualité déjà exercé, il y aura un problème d'intégrité. -- 
	CREATE TABLE Evolution (								-- A_009_
		evo_id INT UNSIGNED NOT NULL AUTO_INCREMENT,		-- A_009_01
		evo_pub_id INT UNSIGNED NOT NULL,					-- A_009_02
		evo_qua_id INT UNSIGNED NOT NULL,					-- A_009_03
		evo_date DATE NOT NULL,								-- A_009_04
		evo_commentaire TEXT,								-- A_009_05
		PRIMARY KEY (evo_id))
		ENGINE=INNODB;

-- Création de la table Password, préfixe pwd --
	CREATE TABLE Password (									-- A_010_
		pwd_id INT UNSIGNED NOT NULL AUTO_INCREMENT,		-- A_010_01
		pwd_mot CHAR(5) UNIQUE,								-- A_010_02
		pwd_pub_id INT UNSIGNED NOT NULL,					-- A_010_03
		pwd_date DATE NOT NULL,								-- A_010_04
		PRIMARY KEY (pwd_id))
		ENGINE=INNODB;

-- Création de la table Pays, préfixe pay --
	CREATE TABLE Pays (										-- A_011_
		pay_code char(3) NOT NULL,							-- A_011_01
		pay_nom VARCHAR(25),								-- A_011_02
		pay_description TEXT,								-- A_011_03
		pay_commentaire TEXT,								-- A_011_04
		PRIMARY KEY (pay_code))
		ENGINE=INNODB;
		
-- Création de la table code postale, préfixe cp --
	CREATE TABLE Code_postal (								-- A_012_
		cp_id INT UNSIGNED NOT NULL AUTO_INCREMENT,			-- A_012_01
		cp_code INT NOT NULL,								-- A_012_02
		PRIMARY KEY (cp_id))								-- A_012_03
		ENGINE=INNODB;										-- A_012_04

-- Création de la table ville, préfixe vil --
	CREATE TABLE Ville (									-- A_013_
		vil_id INT UNSIGNED NOT NULL AUTO_INCREMENT,		-- A_013_01
		vil_nom VARCHAR(25),								-- A_013_02
		vil_cp_id INT UNSIGNED NOT NULL,					-- A_013_03
		vil_pay_code CHAR(3) NOT NULL,						-- A_013_04
		PRIMARY KEY (vil_id))
		ENGINE=INNODB;
		
-- Création de la table adresse, préfixe adr --
	CREATE TABLE Adresse (									-- A_014_
		adr_id INT UNSIGNED NOT NULL AUTO_INCREMENT,		-- A_014_01
		adr_denomination VARCHAR(20),						-- A_014_02
		adr_destinataire VARCHAR(20),						-- A_014_03
		adr_lieu VARCHAR(30),								-- A_014_04
		adr_voirie VARCHAR(30),								-- A_014_05
		adr_mention VARCHAR(20),							-- A_014_06
		adr_vil_id INT UNSIGNED NOT NULL,					-- A_014_07
		adr_pub_id INT UNSIGNED NOT NULL,					-- A_014_08
		PRIMARY KEY (adr_id))
		ENGINE=INNODB;

-- création de la table dns_mail, préfixe dns --
	CREATE TABLE Dns_mail (									-- A_015_
		dns_id INT UNSIGNED NOT NULL AUTO_INCREMENT,		-- A_015_01
		dns_nom VARCHAR(20),								-- A_015_02
		PRIMARY KEY (dns_id))
		ENGINE=INNODB;

-- Création de la table utilisateur mail, préfixe utm --
	CREATE TABLE Utilisateur_mail (							-- A_016_
		utm_id INT UNSIGNED NOT NULL AUTO_INCREMENT,		-- A_016_01
		utm_nom VARCHAR(250) NOT NULL,						-- A_016_02
		utm_dns_id INT UNSIGNED NOT NULL,					-- A_016_03
		utm_pub_id INT UNSIGNED NOT NULL,					-- A_016_04
		PRIMARY KEY (utm_id))
		ENGINE=INNODB;

-- Création de la table époque, préfixe epo --
	CREATE TABLE Epoque (									-- A_017_
		epo_annee INT UNSIGNED NOT NULL AUTO_INCREMENT,		-- A_017_01
		epo_description TEXT,								-- A_017_02
		epo_commentaire TEXT,								-- A_017_03
		PRIMARY KEY (epo_annee))
		ENGINE=INNODB;
		
-- Création de la table thème, préfixe the --
	CREATE TABLE Theme (									-- A_018_
		the_id INT UNSIGNED NOT NULL AUTO_INCREMENT,		-- A_018_01
		the_nom VARCHAR(30) NOT NULL,						-- A_018_02
		the_description TEXT,								-- A_018_03
		the_commentaire TEXT,								-- A_018_04
		PRIMARY KEY (the_id))
		ENGINE=INNODB;
		
-- Création de la table lieu, préfixe lie --
	CREATE TABLE Lieu (										-- A_019_
		lie_id INT UNSIGNED NOT NULL AUTO_INCREMENT,		-- A_019_01
		lie_nom VARCHAR(35) NOT NULL,						-- A_019_02
		lie_description TEXT,								-- A_019_03
		lie_commentaire TEXT,								-- A_019_04
		PRIMARY KEY (lie_id))
		ENGINE=INNODB;
		
-- Création de la table type de diapo, préfixe typdia --
	CREATE TABLE Type_diapo (								-- A_020_
		typdia_id INT UNSIGNED NOT NULL AUTO_INCREMENT,		-- A_020_01
		typdia_nom VARCHAR(10) NOT NULL,					-- A_020_02
		typdia_description TEXT,							-- A_020_03
		typdia_commentaire TEXT,							-- A_020_04
		PRIMARY KEY (typdia_id))
		ENGINE=INNODB;
		
-- création de la table diapositive, préfixe dia. --
	CREATE TABLE Diapositive (								-- A_021_
		dia_id INT UNSIGNED NOT NULL AUTO_INCREMENT,		-- A_021_01
		dia_publication BOOLEAN,							-- A_021_02
		dia_creation DATE,									-- A_021_03
		dia_legend VARCHAR(250),							-- A_021_04
		dia_commentaire TEXT,								-- A_021_05
		dia_epo_annee INT UNSIGNED NOT NULL,				-- A_021_06
		dia_the_id INT UNSIGNED NOT NULL,					-- A_021_07
		dia_lie_id INT UNSIGNED NOT NULL,					-- A_021_08
		dia_typdia_id INT UNSIGNED NOT NULL,				-- A_021_09
		dia_pub_id INT UNSIGNED NOT NULL,					-- A_021_10
		PRIMARY KEY (dia_id))
		ENGINE=INNODB;
		
-- Création de la table scénario, préfixe sce --
	CREATE TABLE Scenario (									-- A_022_
		sce_dia_id INT NOT NULL,							-- A_022_01
		sce_homologue_id INT NOT NULL,						-- A_022_02
		sce_ordre INT UNSIGNED,								-- A_022_03
		sce_rang CHAR(2),									-- A_022_04
		PRIMARY KEY (sce_dia_id, sce_homologue_id))
		ENGINE=INNODB;

-- Création de la table connexion, préfixe con --
	CREATE TABLE Connexion (								-- A_023_
		con_id INT UNSIGNED NOT NULL AUTO_INCREMENT,		-- A_023_01
		con_date DATETIME,									-- A_023_02
		con_dure TIME,										-- A_023_03
		PRIMARY KEY (con_id))
		ENGINE=INNODB;
		
-- Création de la table forumBillets préfixe forb --
	CREATE TABLE ForumBillet (								-- A_024_
		forb_id INT UNSIGNED NOT NULL AUTO_INCREMENT,		-- A_024_01
		forb_titre VARCHAR(250),							-- A_024_02
		forb_contenu TEXT,									-- A_024_03
		forb_date DATETIME,									-- A_024_04
		forb_commentaire TEXT,								-- A_024_05
		forb_publication BOOLEAN,							-- A_024_06
		forb_pub_id INT UNSIGNED NOT NULL,					-- A_024_07
		forb_the_id INT UNSIGNED NOT NULL,					-- A_024_08
		forb_lie_id INT UNSIGNED NOT NULL,					-- A_024_09
		PRIMARY KEY (forb_id))
		ENGINE=INNODB;
		
-- Création de la table forumDiscussion préfixe frod --
	CREATE TABLE ForumDiscussion (							-- A_025_
		ford_id INT UNSIGNED NOT NULL AUTO_INCREMENT,		-- A_025_01
		ford_discussion TEXT,								-- A_025_02
		ford_date DATETIME,									-- A_025_03
		ford_commentaire TEXT,								-- A_025_04
		ford_publication BOOLEAN,							-- A_025_05
		ford_pub_id INT UNSIGNED NOT NULL,					-- A_025_06
		ford_forb_id INT UNSIGNED NOT NULL,					-- A_025_07
		PRIMARY KEY (ford_id))
		ENGINE=INNODB;

-- Création de la table messageContact préfixe mco --
	CREATE TABLE MessageContact (							-- A_026_
		mco_id INT UNSIGNED NOT NULL AUTO_INCREMENT,		-- A_026_01
		mco_prenom VARCHAR(30),								-- A_026_02
		mco_nom VARCHAR(30),								-- A_026_03
		mco_association VARCHAR(75),						-- A_026_04
		mco_email VARCHAR(250),								-- A_026_05
		mco_sujet TEXT,										-- A_026_06
		mco_date DATETIME,									-- A_026_07
		mco_commentaire TEXT,								-- A_026_08
		PRIMARY KEY (mco_id))
		ENGINE=INNODB;
		
-- Création de la table étoile, préfixe eto --
	CREATE TABLE Etoile (									-- A_027_
		eto_id INT UNSIGNED NOT NULL AUTO_INCREMENT,		-- A_027_01
		eto_1 INT,											-- A_027_02
		eto_2 INT,											-- A_027_03
		et0_3 INT,											-- A_027_04
		eto_4 INT,											-- A_027_05
		eto_5 INT,											-- A_027_06
		eto_ip VARCHAR(12),									-- A_027_07
		eto_commentaires TEXT,								-- A_027_08
		PRIMARY KEY(eto_id))
		ENGINE=INNODB;
		
--  Définition des contraintes de clés étrangères --
	
ALTER TABLE Telephone
	ADD (CONSTRAINT fk_tel_typetel FOREIGN KEY (tel_typtel_id) REFERENCES Type_telephone(typtel_id));
ALTER TABLE Denomination
	ADD (CONSTRAINT fk_dem_sta FOREIGN KEY (dem_sta_id) REFERENCES Statut(sta_id));
ALTER TABLE Publics
	ADD (CONSTRAINT fk_pub_etc FOREIGN KEY (pub_etc_id) REFERENCES Etat_civil(etc_id));
ALTER TABLE  Publics
	ADD (CONSTRAINT fk_pub_dem FOREIGN KEY (pub_dem_id) REFERENCES Denomination(dem_id));
ALTER TABLE Evolution
	ADD (CONSTRAINT fk_evo_pub FOREIGN KEY (evo_pub_id) REFERENCES Publics(pub_id));
ALTER TABLE Evolution
	ADD (CONSTRAINT fk_evo_qua FOREIGN KEY (evo_qua_id) REFERENCES Qualite(qua_id));
ALTER TABLE Password
	ADD (CONSTRAINT fk_pwd_pub FOREIGN KEY (pwd_pub_id) REFERENCES Publics(pub_id));
ALTER TABLE Ville
	ADD (CONSTRAINT fk_vil_cp FOREIGN KEY (vil_cp_id) REFERENCES Code_postal(cp_id));
ALTER TABLE Ville
	ADD (CONSTRAINT fk_vil_pay FOREIGN KEY (vil_pay_code) REFERENCES Pays(pay_code));
ALTER TABLE Adresse
	ADD (CONSTRAINT fk_adr_vil FOREIGN KEY (adr_vil_id) REFERENCES Ville(vil_id));	
ALTER TABLE Adresse
	ADD (CONSTRAINT fk_adr_pub FOREIGN KEY (adr_pub_id) REFERENCES Publics(pub_id));
ALTER TABLE Utilisateur_mail
	ADD (CONSTRAINT fk_utm_id FOREIGN KEY (utm_dns_id) REFERENCES Dns_mail(dns_id));	
ALTER TABLE Utilisateur_mail
	ADD (CONSTRAINT fk_utm_pub FOREIGN KEY (utm_pub_id) REFERENCES Publics(pub_id));	
ALTER TABLE Diapositive
	ADD (CONSTRAINT fk_dia_epo FOREIGN KEY (dia_epo_annee) REFERENCES Epoque(epo_annee));
ALTER TABLE Diapositive
	ADD (CONSTRAINT fk_dia_the FOREIGN KEY (dia_the_id) REFERENCES Theme(the_id));
ALTER TABLE Diapositive
	ADD (CONSTRAINT fk_dia_lie FOREIGN KEY (dia_lie_id) REFERENCES Lieu(lie_id));
ALTER TABLE Diapositive
	ADD (CONSTRAINT fk_dia_typdia FOREIGN KEY (dia_typdia_id) REFERENCES Type_diapo(typdia_id));
ALTER TABLE Diapositive
	ADD (CONSTRAINT fk_dia_pub FOREIGN KEY (dia_pub_id) REFERENCES Publics(pub_id));	
ALTER TABLE ForumBillet
	ADD (CONSTRAINT fk_forb_pub FOREIGN KEY (forb_pub_id) REFERENCES Publics(pub_id));
ALTER TABLE ForumBillet
	ADD (CONSTRAINT fk_forb_the FOREIGN KEY (forb_the_id) REFERENCES Theme(the_id));
ALTER TABLE ForumBillet
	ADD (CONSTRAINT fk_forb_lie FOREIGN KEY (forb_lie_id) REFERENCES Lieu(lie_id));	
ALTER TABLE ForumDiscussion
	ADD (CONSTRAINT fk_ford_pub FOREIGN KEY (ford_pub_id) REFERENCES Publics(pub_id));
ALTER TABLE ForumDiscussion
	ADD (CONSTRAINT fk_ford_forb FOREIGN KEY (ford_forb_id) REFERENCES ForumBillet(forb_id));