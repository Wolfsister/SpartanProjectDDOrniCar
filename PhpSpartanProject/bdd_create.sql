CREATE TABLE user (
	idUser INTEGER NOT NULL AUTO_INCREMENT,
	nom Varchar(45) NOT NULL,
	prenom Varchar(45) NOT NULL,
	pseudo Varchar(45) NOT NULL,
        motdepasse Varchar(100) NOT NULL,
        email Varchar(100) NOT NULL,
	idVoiture INTEGER NOT NULL,
	photo Varchar(100) NOT NULL,
	note INTEGER,
	solde INTEGER NOT NULL,
	anneenaissance INTEGER,
        admin INTEGER NOT NULL, 
	PRIMARY KEY(idUser)
);

CREATE TABLE trajet (
	idTrajet INTEGER NOT NULL AUTO_INCREMENT, 
	idConducteur INTEGER NOT NULL,
	villeDepart Varchar(45) NOT NULL,
	villeArrivee VarChar(45) NOT NULL,
	prix INTEGER NOT NULL,
	anneeMoisJour DATE NOT NULL, -- Format YYYY-MM-DD
	heure INTEGER NOT NULL,
 	minute INTEGER NOT NULL, 
	PRIMARY KEY(idTrajet),
	FOREIGN KEY(idConducteur)
		REFERENCES user(idUser)
			ON DELETE CASCADE
			ON UPDATE RESTRICT
);		
	

CREATE TABLE passager (
	idPassager INTEGER NOT NULL,
	idTrajet INTEGER NOT NULL,
	PRIMARY KEY(idPassager, idTrajet),
	FOREIGN KEY(idPassager)
		REFERENCES user(idUser)
      			ON DELETE CASCADE
     			ON UPDATE RESTRICT,
  	FOREIGN KEY(idTrajet)
   		REFERENCES trajet(idTrajet)
     			ON DELETE CASCADE
     			ON UPDATE RESTRICT
);


CREATE TABLE avis (
	idDonneur INTEGER NOT NULL,
	idReceveur INTEGER NOT NULL,
	idTrajet INTEGER NOT NULL,
	note INTEGER NOT NULL,
	PRIMARY KEY(idDonneur, idReceveur, idTrajet),
	FOREIGN KEY(idDonneur)
		REFERENCES user(idUser)
      			ON DELETE CASCADE
     			ON UPDATE RESTRICT,
  	FOREIGN KEY(idReceveur)
   		REFERENCES user(idUser)
     			ON DELETE CASCADE
     			ON UPDATE RESTRICT,
	FOREIGN KEY(idTrajet)
   		REFERENCES trajet(idTrajet)
     			ON DELETE CASCADE
     			ON UPDATE RESTRICT
);

CREATE TABLE voiture (
	idVoiture INTEGER NOT NULL,
	idPossesseur INTEGER NOT NULL,
	marque Varchar(45) NOT NULL,
        modele VarChar(45) NOT NULL,
        couleur VarChar(45) NOT NULL,
        image VarChar(100),
        annee INTEGER NOT NULL,
	PRIMARY KEY(idVoiture),	
  	FOREIGN KEY(idPossesseur)
   		REFERENCES user(idUser)
     			ON DELETE CASCADE
     			ON UPDATE RESTRICT
);

ALTER TABLE `user` ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`idVoiture`) REFERENCES `bddprovisoire`.`voiture`(`idVoiture`) ON DELETE CASCADE ON UPDATE RESTRICT; 

--Debut code pour essayer update idVoiture de user
ALTER TABLE `user` DROP FOREIGN KEY `user_ibfk_1`;
UPDATE user SET idVoiture="102" WHERE idUser="5";
ALTER TABLE `user` ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`idVoiture`) REFERENCES `bddprovisoire`.`voiture`(`idVoiture`) ON DELETE CASCADE ON UPDATE RESTRICT;


-- ALTER TABLE `avis` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
-- ALTER TABLE `passager` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
-- ALTER TABLE `trajet` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
-- ALTER TABLE `user` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
-- ALTER TABLE `voiture` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci; 