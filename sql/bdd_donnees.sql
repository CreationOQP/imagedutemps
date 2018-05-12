-- Insertion des données d'exemples --

-- Insertion des données de la table type de téléphone --
	INSERT INTO Type_telephone (typtel_nom, typtel_commentaire)
					VALUES ('Maison', 'Commentaire 1 type de téléphone'),
							('Bureau', 'Commentaire 2 type de téléphone'),
							('Mobile', 'Commentaire 3 type de téléphone'),
							('Décès', 'Commentaire 4 type de téléphone'),
							('Amant', 'Commentaire 5 type de téléphone'),
							('Maitresse', 'Commentaire 6 type de téléphone');

-- Insertion des téléphone --
	INSERT INTO Telephone (tel_numero, tel_typtel_id)
					VALUES ('Pas de numéro', 1),
						('01 00 00 00 02', 1),
						('01 00 00 00 03', 2),
						('01 00 00 00 04', 4),
						('06 00 00 00 05', 3),
						('01 00 00 00 06', 5),
						('01 00 00 00 07', 6),
						('01 00 00 00 08', 1),
						('01 00 00 00 09', 2),
						('01 00 00 00 10', 4),
						('06 00 00 00 11', 3),
						('01 00 00 00 12', 5),
						('01 00 00 00 13', 6),
						('06 00 00 00 14', 3),
						('01 00 00 00 15', 5),
						('01 00 00 00 16', 1),
						('01 00 00 00 17', 2),
						('01 00 00 00 18', 3),
						('01 00 00 00 19', 4),
						('01 00 00 00 20', 5);
	
-- insertion des données de l'état civil --
	INSERT INTO Etat_civil (etc_nom)
		VALUES ('Mme'),
			('Mlle'),
			('Mr'),
			('Sté');

-- Insertion des données de la table statut --
	INSERT INTO Statut (sta_nom, sta_commentaire)
			VALUES ('SARL', 'Commentaire sur le statut de la SARL'),
					('SAS', 'Commentaire sur le statut de la SAS'),
					('Mairie', 'Commentaire sur le statut mairie'),
					('Association', 'Commentaire sur le statut association'),
					('Particulier', 'Commentaire sur le statut particulier');
					
-- Insertion des données de la table Dénomination --
	INSERT INTO Denomination (dem_nom, dem_description, dem_commentaire, dem_sta_id)
		VALUES ('Particulier', NULL, NULL, 5),
				('Lit et Mixe', 'Description de la mairie de Lit et Mixe', 'Commentaire sur la mairie de Lit et Mixe', 3),
				('Lesperon', 'Description de la mairie de Lesperon', 'Commentaire sur la mairie de Lesperon', 3),
				('NALOPHOTO', 'Description sur association Nalophoto', 'Commentaire sur association Nalophoto', 4);
			
-- Inertion des données du publics, préfixe pub  --
	INSERT INTO Publics (pub_nom, pub_prenom, pub_date, pub_pseudo, pub_etc_id, pub_dem_id)
				VALUES ('DON_1', 'Prénom 1', '2018-01-01', 'Pseudo 1', 1, 1),
						('DON_2', 'Prénom 2', '2018-01-01', 'Pseudo 2', 2, 1),
						('DON_3', 'Prénom 3', '2018-01-01', 'Pseudo 3', 3, 1),
						('DON_4', 'Prénom 4', '2018-01-01', 'Pseudo 4', 4, 2),
						('DON_5', 'Prénom 5', '2018-01-01', 'Pseudo 5', 1, 3),
						('DON_6', 'Prénom 6', '2018-01-01', 'Pseudo 6', 2, 4),
						('DON_Z', 'Prénom Z', '2018-01-01', 'Pseudo 7', 3, 1),
						('Menbre_1', 'Prénom 7', '2018-01-01', 'Pseudo 8', 1, 1),
						('Menbre_2', 'Prénom 8', '2018-01-01', 'Pseudo 9', 2, 1),
						('Menbre_3', 'Prénom 9', '2018-01-01', 'Pseudo 10', 3, 1),
						('Menbre_4', 'Prénom 10', '2018-01-01', 'Pseudo 11', 1, 1),
						('Menbre_5', 'Prénom 11', '2018-01-01', 'Pseudo 12', 2, 1),
						('Menbre_6', 'Prénom 12', '2018-01-01', 'Pseudo 13', 3, 1),
						('Rédacteur_1', 'Prénom 13', '2018-01-01', 'Pseudo 14', 1, 1),
						('Rédacteur_2', 'Prénom 14', '2018-01-01', 'Pseudo 15', 2, 1),
						('Rédacteur_3', 'Prénom 15', '2018-01-01', 'Pseudo 16', 3, 1),
						('Rédacteur_4', 'Prénom 16', '2018-01-01', 'Pseudo 17', 3, 1),
						('Rédacteur_5', 'Prénom 18', '2018-01-01', 'Pseudo 18', 1, 1),
						('Rédacteur_6', 'Prénom 19', '2018-01-01', 'Pseudo 19', 2, 1),
						('Administrateur', 'Prénom 20', '2018-01-01', 'Pseudo 20', 3, 1);
	
-- Insertion des données des contacts, préfixe con --
	INSERT INTO Contact (con_tel_id, con_pub_id)
			VALUES (1, 20),
					(2, 19),
					(3, 18),
					(4, 17),
					(5, 16),
					(6, 15),
					(7, 14),
					(8, 13),
					(9, 12),
					(10, 11),
					(11, 10),
					(12, 9),
					(13, 8),
					(14, 7),
					(15, 6),
					(16, 5),
					(17, 4),
					(18, 3),
					(19, 2),
					(20, 1);
	
-- Insertion des données de la table qualité, préfixe qua --
	INSERT INTO Qualite (qua_nom, qua_description, qua_commentaire)
			VALUES ('Qualité 1', 'Description qualité 1', 'Commentaire qualité 1'),
					('Qualité 2', 'Description qualité 2', 'Commentaire qualité 2'),
					('Qualité 3', 'Description qualité 3', 'Commentaire qualité 3'),
					('Qualité 4', 'Description qualité 4', 'Commentaire qualité 4'),
					('Qualité 5', 'Description qualité 5', 'Commentaire qualité 5'),
					('Qualité 6', 'Description qualité 6', 'Commentaire qualité 6');
	
-- Insertion des données de la table évolution, préfixe evo --
-- Je rajoute un id à la table évolution car si un public souhaite revenir à une qualité précédente, il y aura un problème d'intégrité --
	INSERT INTO Evolution (evo_pub_id, evo_qua_id, evo_date, evo_commentaire)
				VALUES (1, 1, '2018-01-01', 'Commentaire évolution 1'),
						(2, 1, '2018-01-01', 'Commentaire évolution 2'),
						(3, 1, '2018-01-01', 'Commentaire évolution 3'),
						(4, 1, '2018-01-01', 'Commentaire évolution 4'),
						(5, 1, '2018-01-01', 'Commentaire évolution 5'),
						(6, 1, '2018-01-01', 'Commentaire évolution 6'),
						(7, 1, '2018-01-01', 'Commentaire évolution 7'),
						(8, 2, '2018-01-01', 'Commentaire évolution 8'),
						(9, 2, '2018-01-01', 'Commentaire évolution 9'),
						(10, 2, '2018-01-01', 'Commentaire évolution 10'),
						(11, 2, '2018-01-01', 'Commentaire évolution 11'),
						(12, 2, '2018-01-01', 'Commentaire évolution 12'),
						(13, 2, '2018-01-01', 'Commentaire évolution 13'),
						(14, 3, '2018-01-01', 'Commentaire évolution 14'),
						(15, 3, '2018-01-01', 'Commentaire évolution 15'),
						(16, 3, '2018-01-01', 'Commentaire évolution 16'),
						(17, 3, '2018-01-01', 'Commentaire évolution 17'),
						(18, 3, '2018-01-01', 'Commentaire évolution 18'),
						(19, 3, '2018-01-01', 'Commentaire évolution 19'),
						(20, 4, '2018-01-01', 'Commentaire évolution 20'),
						(4, 2, '2018-01-06', 'Le donateur 4 passe de la qualité 1 à la qualité 2. Commentaire évolution 21'),
						(5, 3, '2018-01-07', 'Le membre 5 passe de la qualité 2 à la qualité 3. Commentaire évolution 22'),
						(6, 3, '2018-01-08', 'Le membre 6 passe de la qualité 2 à la qualité 3. Commentaire évolution 23'),
						(2, 3, '2018-01-12', 'Le donateur 2 passe de la qualité 1 à la qualité 3. Commentaire évolution 24');

--  Insertion des données de la table des mots de passe --
	INSERT INTO Password (pwd_mot, pwd_pub_id, pwd_date)
				VALUES ('aa001', 1, '2018-01-01'),
						('aa002', 2, '2018-01-01'),
						('aa003', 3, '2018-01-01'),
						('aa004', 4, '2018-01-01'),
						('aa005', 5, '2018-01-01'),
						('aa006', 6, '2018-01-01'),
						('aa007', 7, '2018-01-01'),
						('aa008', 8, '2018-01-01'),
						('aa009', 9, '2018-01-01'),
						('aa010', 10, '2018-01-01'),
						('aa011', 11, '2018-01-01'),
						('aa012', 12, '2018-01-01'),
						('aa013', 13, '2018-01-01'),
						('aa014', 14, '2018-01-01'),
						('aa015', 15, '2018-01-01'),
						('aa016', 16, '2018-01-01'),
						('aa017', 17, '2018-01-01'),
						('aa018', 18, '2018-01-01'),
						('aa019', 19, '2018-01-01'),
						('aa020', 20, '2018-01-01');

-- Insertin des données da la table pays --
	INSERT INTO Pays (pay_code, pay_nom, pay_description, pay_commentaire)
			VALUES ('fr', 'France', 'Description France', 'Commentaire France'),
					('uk', 'Angleterre', 'Description Angleterre', 'Commentaire Angleterre'),
					('us', 'Etats Unis', 'Description Etats Unis', 'Commentaire Etat Unis'),
					('pl', 'Pologne', 'Description Pologne', 'Commentaire Pologne'),
					('hl', 'Hollande', 'Description Hollande', 'Commentaire Hollande');
						
-- Insertion des données dans la table code postal --
	INSERT INTO Code_postal (cp_code)
				VALUES (40170),
						(40100),
						(95820);
				
--  Insertion des données dans la table ville  --
	INSERT INTO Ville (vil_nom, vil_cp_id, vil_pay_code)
			VALUES ('Lit et Mixe', 1, 'fr'),
					('Saint Julien en Born', 1, 'fr'),
					('Uza', 1, 'fr'),
					('Dax', 2, 'fr'),
					('Bruyères-sur-Oise', 3, 'fr');

-- Insertion des données dans la table adresse --
	INSERT INTO Adresse (adr_lieu, adr_voirie, adr_mention, adr_vil_id, adr_pub_id)
		VALUES (NULL, '251, avenue du Marensin', NULL, 1, 1),
				('lieu 02', 'voirie 02', 'mention 02', 1, 2),
				('lieu 03', 'voirie 03', 'mention 03', 1, 3),
				('lieu 04', 'voirie 04', 'mention 04', 1, 4),
				(NULL, '25, place de la mairie', NULL, 2, 5),
				('lieu 06', 'voirie 06', 'mention 06', 2, 6),
				('lieu 07', 'voirie 07', 'mention 07', 2, 7),
				('lieu 08', 'voirie 08', 'mention 08', 2, 8),
				(NULL, 'route du lac', NULL, 3, 9),
				('lieu 10', 'voirie 10', 'mention 10', 3, 10),
				('lieu 11', 'voirie 11', 'mention 11', 3, 11),
				('lieu 12', 'voirie 12', 'mention 12', 3, 12),
				('Narosse', "30, rue d'Orthez", 'Cédex 15', 4, 13),
				('lieu 14', 'voirie 14', 'mention 14', 4, 14),
				('lieu 15', 'voirie 15', 'mention 15', 4, 15),
				('lieu 16', 'voirie 16', 'mention 16', 4, 16),
				(NULL, '12, square du Quercy', NULL, 5, 17),
				('lieu 18', 'voirie 18', 'mention 18', 5, 18),
				('lieu 19', 'voirie 19', 'mention 19', 5, 19),
				('lieu 20', 'voirie 20', 'mention 20', 5, 20);
	
-- Insertion des données dan la table dns_mail --
	INSERT INTO Dns_mail (dns_nom)
			VALUES ('yahoo.fr'),
					('gmail.com'),
					('orange.fr'),
					('laposte.net'),
					('sfr.fr'),
					('noelmarais.fr');

-- Insertion des données dans la table utilisateurs mail --
						INSERT INTO Utilisateur_mail (utm_nom, utm_dns_id, utm_pub_id)
											VALUES ('utilisateur mail 01', 1, 1),
													('utilisateur mail 02', 1, 2),
													('utilisateur mail 03', 1, 3),
													('utilisateur mail 04', 2, 4),
													('utilisateur mail 05', 2, 5),
													('utilisateur mail 06', 2, 6),
													('michele.le-brun', 3, 7),
													('utilisateur mail 08', 3, 8),
													('utilisateur mail 09', 3, 9),
													('utilisateur mail 10', 4, 10),
													('utilisateur mail 11', 4, 11),
													('utilisateur mail 12', 4, 12),
													('utilisateur mail 13', 5, 13),
													('utilisateur mail 14', 5, 14),
													('utilisateur mail 15', 5, 15),
													('contact', 6, 16),
													('utilisateur mail 17', 6, 17),
													('utilisateur mail 18', 6, 18),
													('utilisateur mail 19', 1, 19),
													('utilisateur mail 20', 2, 20);

-- Insertion des données dans la table époque --
	INSERT INTO Epoque (epo_annee, epo_description, epo_commentaire)
				VALUES (1900, 'description époque 1900', 'Commentaire époque 1900'),
						(2000, 'description époque 2000', 'Commentaire époque 2000'),
						(2100, 'description époque 2100', 'Commentaire époque 2100');

-- Insertion des données dans la table thème --
	INSERT INTO Theme (the_nom, the_description, the_commentaire)
			VALUES ('Thème 1', 'Description du thème 1', 'Commentaire du thème 1'),
					('Thème 2', 'Description du thème 2', 'Commentaire du thème 2'),
					('Thème 3', 'Description du thème 3', 'Commentaire du thème 3'),
					('Thème 4', 'Description du thème 4', 'Commentaire du thème 4'),
					('Thème 5', 'Description du thème 5', 'Commentaire du thème 5');
					
-- Insertion des données dans la table lieu --
	INSERT INTO Lieu (lie_nom, lie_description, lie_commentaire)
			VALUES ('lieu 1', 'Description du lieu 1', 'Commentaire du lieu 1'),
					('lieu 2', 'Description du lieu 2', 'Commentaire du lieu 2'),
					('lieu 3', 'Description du lieu 3', 'Commentaire du lieu 3'),
					('lieu 4', 'Description du lieu 4', 'Commentaire du lieu 4'),
					('lieu 5', 'Description du lieu 5', 'Commentaire du lieu 5');

-- Insertion des données dans la table type de diapo --
	INSERT INTO Type_diapo (typdia_nom, typdia_description, typdia_commentaire)
			VALUES ('type 1', 'Description du type 1', 'commentaire du type 1'),
					('type 2', 'Description du type 2', 'commentaire du type 2'),
					('type 3', 'Description du type 3', 'commentaire du type 3'),
					('type 4', 'Description du type 4', 'commentaire du type 4'),
					('type 5', 'Description du type 5', 'commentaire du type 5');

-- Insertion des données dans la table diapositive --
	INSERT INTO Diapositive (dia_publication, dia_date, dia_legend, dia_commentaire, dia_enregistrement dia_epo_annee, dia_the_id, dia_lie_id, dia_typdia_id, dia_pub_id)
			VALUES (0, '1918-01-01', 'Légende diapositive 1', 'Commentaire diapositive 1', '2018-03-25', 1900, 1, 5, 1, 1),
					(1, '1918-01-01', 'Légende diapositive 2', 'Commentaire diapositive 2', '2018-03-25', 1900, 1, 5, 1, 2),
					(1, '1918-01-01', 'Légende diapositive 3', 'Commentaire diapositive 3', '2018-03-25', 1900, 1, 5, 1, 3),
					(1, '1918-01-01', 'Légende diapositive 4', 'Commentaire diapositive 4', '2018-03-25', 1900, 1, 5, 1, 4),
					(1, '1918-01-01', 'Légende diapositive 5', 'Commentaire diapositive 5', '2018-03-25', 1900, 2, 4, 1, 5),
					(1, '1918-01-01', 'Légende diapositive 6', 'Commentaire diapositive 6', '2018-03-25', 1900, 2, 4, 1, 6),
					(1, '1918-01-01', 'Légende diapositive 7', 'Commentaire diapositive 7', '2018-03-25', 1900, 2, 4, 1, 7),
					(1, '1918-01-01', 'Légende diapositive 8', 'Commentaire diapositive 8', '2018-03-25', 1900, 2, 4, 1,1),
					(1, '1918-01-01', 'Légende diapositive 9', 'Commentaire diapositive 9', '2018-03-25', 1900, 3, 2, 1,2),
					(1, '1918-01-01', 'Légende diapositive 10', 'Commentaire diapositive 10', '2018-03-25', 1900, 3, 2, 1, 3),
					(1, '1918-01-01', 'Légende diapositive 11', 'Commentaire diapositive 11', '2018-03-25', 1900, 3, 2, 1, 4),
					(1, '1918-01-01', 'Légende diapositive 12', 'Commentaire diapositive 12', '2018-03-25', 1900, 3, 2, 1, 5),
					(1, '1918-01-01', 'Légende diapositive 13', 'Commentaire diapositive 13', '2018-03-25', 1900, 4, 3, 1, 6),
					(1, '1918-01-01', 'Légende diapositive 14', 'Commentaire diapositive 14', '2018-03-25', 1900, 4, 3, 1, 7),
					(1, '1918-01-01', 'Légende diapositive 15', 'Commentaire diapositive 15', '2018-03-25', 1900, 4, 3, 1, 1),
					(1, '1918-01-01', 'Légende diapositive 16', 'Commentaire diapositive 16', '2018-03-25', 1900, 4, 3, 1, 2),
					(1, '1918-01-01', 'Légende diapositive 17', 'Commentaire diapositive 17', '2018-03-25', 1900, 5, 1, 1, 3),
					(1, '1918-01-01', 'Légende diapositive 18', 'Commentaire diapositive 18', '2018-03-25', 1900, 5, 1, 1, 4),
					(1, '1918-01-01', 'Légende diapositive 19', 'Commentaire diapositive 19', '2018-03-25', 1900, 5, 1, 1, 5),
					(1, '1918-01-01', 'Légende diapositive 20', 'Commentaire diapositive 20', '2018-03-25', 1900, 5, 1, 1, 6),
					(1, '1918-01-01', 'Légende diapositive 21', 'Commentaire diapositive 21', '2018-03-25', 1900, 1, 5, 1, 7),
					(1, '1918-01-01', 'Légende diapositive 22', 'Commentaire diapositive 22', '2018-03-25', 1900, 1, 4, 1, 1),
					(1, '1918-01-01', 'Légende diapositive 23', 'Commentaire diapositive 23', '2018-03-25', 1900, 2, 3, 1, 2),
					(1, '1918-01-01', 'Légende diapositive 24', 'Commentaire diapositive 24', '2018-03-25', 1900, 2, 2, 1, 3),
					(1, '1918-01-01', 'Légende diapositive 25', 'Commentaire diapositive 25', '2018-03-25', 1900, 3, 1, 1, 4),
					(1, '1918-01-01', 'Légende diapositive 26', 'Commentaire diapositive 26', '2018-03-25', 1900, 3, 5, 1, 5),
					(1, '1918-01-01', 'Légende diapositive 27', 'Commentaire diapositive 27', '2018-03-25', 1900, 4, 4, 1, 6),
					(1, '1918-01-01', 'Légende diapositive 28', 'Commentaire diapositive 28', '2018-03-25', 1900, 4, 3, 1, 7),
					(1, '1918-01-01', 'Légende diapositive 29', 'Commentaire diapositive 29', '2018-03-25', 1900, 5, 2, 1, 1),
					(1, '2018-01-01', 'Légende diapositive 30', 'Commentaire diapositive 30', '2018-03-25', 2000, 1, 5, 1, 20),
					(1, '2018-01-01', 'Légende diapositive 31', 'Commentaire diapositive 31', '2018-03-25', 2000, 1, 5, 1, 20),
					(1, '2018-01-01', 'Légende diapositive 32', 'Commentaire diapositive 32', '2018-03-25', 2000, 1, 5, 1, 20),
					(1, '2018-01-01', 'Légende diapositive 33', 'Commentaire diapositive 33', '2018-03-25', 2000, 1, 5, 1, 20),
					(1, '2018-01-01', 'Légende diapositive 34', 'Commentaire diapositive 34', '2018-03-25', 2000, 2, 5, 1, 20),
					(1, '2018-01-01', 'Légende diapositive 35', 'Commentaire diapositive 35', '2018-03-25', 2000, 2, 4, 1, 20),
					(1, '2018-01-01', 'Légende diapositive 36', 'Commentaire diapositive 36', '2018-03-25', 2000, 2, 4, 1, 20),
					(1, '2018-01-01', 'Légende diapositive 37', 'Commentaire diapositive 37', '2018-03-25', 2000, 2, 4, 1, 20),
					(1, '2018-01-01', 'Légende diapositive 38', 'Commentaire diapositive 38', '2018-03-25', 2000, 3, 2, 1, 20),
					(1, '2018-01-01', 'Légende diapositive 39', 'Commentaire diapositive 39', '2018-03-25', 2000, 3, 2, 1, 20),
					(1, '2018-01-01', 'Légende diapositive 40', 'Commentaire diapositive 40', '2018-03-25', 2000, 3, 2, 1, 20),
					(1, '2018-01-01', 'Légende diapositive 41', 'Commentaire diapositive 41', '2018-03-25', 2000, 3, 2, 1, 20),
					(1, '2018-01-01', 'Légende diapositive 42', 'Commentaire diapositive 42', '2018-03-25', 2000, 4, 3, 1, 20),
					(1, '2018-01-01', 'Légende diapositive 43', 'Commentaire diapositive 43', '2018-03-25', 2000, 4, 3, 1, 20),
					(1, '2018-01-01', 'Légende diapositive 44', 'Commentaire diapositive 44', '2018-03-25', 2000, 4, 3, 1, 20),
					(1, '2018-01-01', 'Légende diapositive 45', 'Commentaire diapositive 45', '2018-03-25', 2000, 4, 3, 1, 20),
					(1, '2018-01-01', 'Légende diapositive 46', 'Commentaire diapositive 46', '2018-03-25', 2000, 5, 1, 1, 20),
					(1, '2018-01-01', 'Légende diapositive 47', 'Commentaire diapositive 47', '2018-03-25', 2000, 5, 1, 1, 20),
					(1, '2018-01-01', 'Légende diapositive 48', 'Commentaire diapositive 48', '2018-03-25', 2000, 5, 1, 1, 20),
					(1, '2018-01-01', 'Légende diapositive 49', 'Commentaire diapositive 49', '2018-03-25', 2000, 5, 1, 1, 20),
					(1, '2018-01-01', 'Légende diapositive 50', 'Commentaire diapositive 50', '2018-03-25', 2000, 1, 5, 1, 20),
					(1, '2018-01-01', 'Légende diapositive 51', 'Commentaire diapositive 51', '2018-03-25', 2000, 1, 4, 1, 20),
					(1, '2018-01-01', 'Légende diapositive 52', 'Commentaire diapositive 52', '2018-03-25', 2000, 1, 3, 1, 20),
					(1, '2018-01-01', 'Légende diapositive 53', 'Commentaire diapositive 53', '2018-03-25', 2000, 1, 2, 1, 20),
					(1, '2018-01-01', 'Légende diapositive 54', 'Commentaire diapositive 54', '2018-03-25', 2000, 1, 1, 1, 20),
					(1, '2018-01-01', 'Légende diapositive 55', 'Commentaire diapositive 55', '2018-03-25', 2000, 3, 5, 1, 20),
					(1, '2018-01-01', 'Légende diapositive 56', 'Commentaire diapositive 56', '2018-03-25', 2000, 4, 4, 1, 20),
					(1, '2018-01-01', 'Légende diapositive 57', 'Commentaire diapositive 57', '2018-03-25', 2000, 4, 3, 1, 20),
					(1, '2018-01-01', 'Légende diapositive 58', 'Commentaire diapositive 58', '2018-03-25', 2000, 5, 2, 1, 20),
					(1, '2018-01-01', 'Légende diapositive 59', 'Commentaire diapositive 59', '2018-03-25', 2000, 5, 1, 1, 20),
					(1, '2018-01-01', 'Légende diapositive 60', 'Commentaire diapositive 60', '2018-03-25', 1900, 5, 5, 1, 20),
					(1, '1918-01-01', 'Légende diapositive 61', 'Commentaire diapositive 61', '2018-03-25', 1900, 1, 1, 1, 20),
					(1, '1918-01-01', 'Légende diapositive 62', 'Commentaire diapositive 62', '2018-03-25', 1900, 1, 1, 1, 20),
					(1, '1918-01-01', 'Légende diapositive 63', 'Commentaire diapositive 63', '2018-03-25', 1900, 1, 1, 1, 20),
					(1, '1918-01-01', 'Légende diapositive 64', 'Commentaire diapositive 64', '2018-03-25', 1900, 1, 2, 1, 20),
					(1, '1918-01-01', 'Légende diapositive 65', 'Commentaire diapositive 65', '2018-03-25', 1900, 2, 2, 1, 20),
					(1, '1918-01-01', 'Légende diapositive 66', 'Commentaire diapositive 66', '2018-03-25', 1900, 2, 2, 1, 20),
					(1, '1918-01-01', 'Légende diapositive 67', 'Commentaire diapositive 67', '2018-03-25', 1900, 2, 3, 1, 20),
					(1, '1918-01-01', 'Légende diapositive 68', 'Commentaire diapositive 68', '2018-03-25', 1900, 2, 3, 1, 20),
					(1, '1918-01-01', 'Légende diapositive 69', 'Commentaire diapositive 69', '2018-03-25', 1900, 3, 3, 1, 20),
					(1, '1918-01-01', 'Légende diapositive 70', 'Commentaire diapositive 70', '2018-03-25', 1900, 3, 4, 1, 20),
					(1, '1918-01-01', 'Légende diapositive 71', 'Commentaire diapositive 71', '2018-03-25', 1900, 3, 4, 1, 20),
					(1, '1918-01-01', 'Légende diapositive 72', 'Commentaire diapositive 72', '2018-03-25', 1900, 3, 4, 1, 20),
					(1, '1918-01-01', 'Légende diapositive 73', 'Commentaire diapositive 73', '2018-03-25', 1900, 4, 5, 1, 20),
					(1, '1918-01-01', 'Légende diapositive 74', 'Commentaire diapositive 74', '2018-03-25', 1900, 4, 5, 1, 20),
					(1, '2018-01-01', 'Légende diapositive 75', 'Commentaire diapositive 75', '2018-03-25', 2000, 1, 1, 1, 20),
					(1, '2018-01-01', 'Légende diapositive 76', 'Commentaire diapositive 76', '2018-03-25', 2000, 1, 1, 1, 20),
					(1, '2018-01-01', 'Légende diapositive 77', 'Commentaire diapositive 77', '2018-03-25', 2000, 1, 1, 1, 20),
					(1, '2018-01-01', 'Légende diapositive 78', 'Commentaire diapositive 78', '2018-03-25', 2000, 1, 2, 1, 20),
					(1, '2018-01-01', 'Légende diapositive 79', 'Commentaire diapositive 79', '2018-03-25', 2000, 2, 2, 1, 20),
					(1, '2018-01-01', 'Légende diapositive 80', 'Commentaire diapositive 80', '2018-03-25', 2000, 2, 2, 1, 20),
					(1, '2018-01-01', 'Légende diapositive 81', 'Commentaire diapositive 81', '2018-03-25', 2000, 2, 3, 1, 20),
					(1, '2018-01-01', 'Légende diapositive 82', 'Commentaire diapositive 82', '2018-03-25', 2000, 2, 3, 1, 20),
					(1, '2018-01-01', 'Légende diapositive 84', 'Commentaire diapositive 83', '2018-03-25', 2000, 3, 3, 1, 20),
					(1, '2018-01-01', 'Légende diapositive 85', 'Commentaire diapositive 84', '2018-03-25', 2000, 3, 4, 1, 20),
					(1, '2018-01-01', 'Légende diapositive 85', 'Commentaire diapositive 85', '2018-03-25', 2000, 3, 4, 1, 20),
					(1, '2018-01-01', 'Légende diapositive 86', 'Commentaire diapositive 86', '2018-03-25', 2000, 3, 4, 1, 20),
					(1, '2018-01-01', 'Légende diapositive 87', 'Commentaire diapositive 87', '2018-03-25', 2000, 4, 5, 1, 20),
					(1, '2018-01-01', 'Légende diapositive 88', 'Commentaire diapositive 88', '2018-03-25', 2000, 4, 5, 1, 20),
					(1, '2018-01-01', 'Légende diapositive 89', 'Commentaire diapositive 89', '2018-03-25', 2000, 4, 5, 1, 20),
					(1, '2018-01-01', 'Légende diapositive 90', 'Commentaire diapositive 90', '2018-03-25', 2000, 4, 1, 1, 20);

					
-- Insertion des données dans la table scenario --
	INSERT INTO Scenario (sce_dia_id, sce_homologue_id, sce_ordre, sce_rang)
				VALUES (1, 30, 10, 1),
						(2, 31, 20, 1),
						(3, 32, 30, 1),
						(4, 33, 40, 1),
						(5, 34, 50, 1),
						(6, 35, 60, 1),
						(7, 36, 70, 1),
						(8, 37, 80, 1),
						(9, 38, 90, 1),
						(10, 39, 100, 1),
						(11, 40, 110, 1),
						(12, 41, 120, 1),
						(13, 42, 130, 1),
						(14, 43, 140, 1),
						(15, 44, 150, 1),
						(16, 45, 160, 1),
						(17, 46, 170, 1),
						(18, 47, 180, 1),
						(19, 48, 190, 1),
						(20, 49, 200, 1),
						(21, 50, 21, 1),
						(22, 51, 22, 1),
						(23, 52, 210, 1),
						(24, 53, 220, 1),
						(25, 54, 230, 1),
						(26, 55, 240, 1),
						(27, 56, 250, 1),
						(28, 57, 260, 1),
						(29, 58, 270, 1),
						(1, 59, 10, 2),
						(1, 60, 10, 3),
						(61, 75, 280, 1),
						(62, 76, 290, 1),
						(63, 77, 300, 1),
						(64, 78, 310, 1),
						(65, 79, 320, 1),
						(66, 80, 330, 1),
						(67, 81, 340, 1),
						(68, 82, 350, 1),
						(69, 83, 360, 1),
						(70, 84, 370, 1),
						(71, 85, 380, 1),
						(72, 86, 390, 1),
						(73, 87, 400, 1),
						(74, 88, 410, 1),
						(61, 89, 281, 2),
						(62, 90, 291, 2);