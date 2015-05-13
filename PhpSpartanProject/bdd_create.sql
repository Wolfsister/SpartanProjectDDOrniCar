CREATE TABLE user (
	idUser INTEGER NOT NULL AUTO_INCREMENT,
	nom Varchar(45) NOT NULL,
	prenom Varchar(45) NOT NULL,
	pseudo Varchar(45) NOT NULL,
        motdepasse Varchar(100) NOT NULL,
        email Varchar(100) NOT NULL,
	idVoiture INTEGER,
	photo Varchar(100) NOT NULL,
	note INTEGER,
	solde INTEGER NOT NULL,
	age INTEGER,
        admin INTEGER NOT NULL, 
	PRIMARY KEY(idUser)
);

CREATE TABLE trajet (
	idTrajet INTEGER NOT NULL AUTO_INCREMENT, 
	idConducteur INTEGER NOT NULL,
	villeDepart Varchar(45) NOT NULL,
	villeArrivee VarChar(45) NOT NULL,
	prix INTEGER NOT NULL,
	anneeMoisJour DATE NOT NULL,
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