-- Insertion des données d'exemples --

-- Insertion des données de la table type de téléphone --
	INSERT INTO Type_telephone (typtel_nom, typtel_commentaire)
					VALUES ('Maison', 'Commentaire sur la maison du téléphone'),
							('Bureau', 'Commentaire sur le bureau du téléphone'),
							('Mobile', 'Commentaire sur le mobile téléphone'),
							('Décès', 'Commentaire sur le décès du téléphone'),
							('Amant', 'Commentaire sur l\'amant du téléphone'),
							('Maitresse', 'Commentaire sur la maîtresse du téléphone');


	
-- insertion des données de l'état civil --
	INSERT INTO Etat_civil (etc_nom)
		VALUES ('Mme'),
			('Mr'),
			('Sté');

-- Insertion des données de la table statut --
	INSERT INTO Statut (sta_nom, sta_commentaire)
			VALUES('SARL', 'Commentaire sur le statut de la SARL'),
					('SAS', 'Commentaire sur le statut de la SAS'),
					('Mairie', 'Commentaire sur le statut mairie'),
					('Association', 'Commentaire sur le statut association'),
					('Particulier', 'Commentaire sur le statut particulier');
					
-- Insertion des données de la table Dénomination --
	INSERT INTO Denomination (den_nom, den_description, den_commentaire, den_sta_id)
		VALUES ('Particulier', NULL, NULL, 5);
				
-- Insertion des données de la table qualité, préfixe qua --
	INSERT INTO Qualite (qua_nom, qua_description, qua_commentaire)
			VALUES ('Public', 'Description public', 'Commentaire public'),
					('Donateur', 'Description donateur', 'Commentaire donateur'),
					('Membre', 'Description membre', 'Commentaire membre'),
					('Rédacteur', 'Description rédacteur', 'Commentaire rédacteur'),
					('Administrateur', 'Description administrateur', 'Commentaire administrateur'),
					('Webmaster', 'Description webmaster', 'Commentaire webmaster');
	
-- Insertin des données da la table pays --
	INSERT INTO Pays (pay_code, pay_nom, pay_description, pay_commentaire)
			VALUES ('fr', 'France', 'Description France', 'Commentaire France'),
					('uk', 'Angleterre', 'Description Angleterre', 'Commentaire Angleterre'),
					('us', 'Etats Unis', 'Description Etats Unis', 'Commentaire Etat Unis'),
					('pl', 'Pologne', 'Description Pologne', 'Commentaire Pologne'),
					('hl', 'Hollande', 'Description Hollande', 'Commentaire Hollande');
						

				
--  Insertion des données dans la table ville  --
	INSERT INTO Ville (vil_nom, vil_cp_id, vil_pay_code)
			VALUES ('Lit et Mixe', 1, 'fr'),
					('Saint Julien en Born', 1, 'fr'),
					('Uza', 1, 'fr'),
					('Dax', 2, 'fr'),
					('Bruyères-sur-Oise', 3, 'fr');
	
-- Insertion des données dan la table dns_mail --
	INSERT INTO Dns_mail (dns_nom)
			VALUES ('yahoo.fr'),
					('gmail.com'),
					('orange.fr'),
					('laposte.net'),
					('sfr.fr'),
					('noelmarais.fr');

-- Insertion des données dans la table époque --
	INSERT INTO Epoque (epo_annee, epo_description, epo_commentaire)
				VALUES (1900, 'description époque 1900', 'Commentaire époque 1900'),
						(2000, 'description époque 2000', 'Commentaire époque 2000');
					
-- Insertion des données dans la table type de diapo --
	INSERT INTO Type_diapo (typdia_nom, typdia_description, typdia_commentaire)
			VALUES ('Photo', 'Description du type photo', 'Seuls les format jpg et png sont autorisés, avec une préférence pour "jpg"'),
					('Document', 'Description du type document', 'Seuls les formats PDF sont autorisés');