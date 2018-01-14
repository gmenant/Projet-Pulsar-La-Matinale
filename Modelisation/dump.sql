#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: emissions
#------------------------------------------------------------

CREATE TABLE emissions(
        date_diff   Date ,
        id_emission int (11) Auto_increment  NOT NULL ,
        PRIMARY KEY (id_emission )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: contenu
#------------------------------------------------------------

CREATE TABLE contenu(
        id_contenu     int (11) Auto_increment  NOT NULL ,
        titre          Varchar (25) ,
        texte          Varchar (600) ,
        id_chroniqueur Int ,
        id_emission    Int ,
        PRIMARY KEY (id_contenu )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: fichier
#------------------------------------------------------------

CREATE TABLE fichier(
        id_fichier      int (11) Auto_increment  NOT NULL ,
        adresse_fichier Varchar (50) ,
        nom_fichier     Varchar (25) ,
        id_contenu      Int ,
        PRIMARY KEY (id_fichier )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: chroniqueur
#------------------------------------------------------------

CREATE TABLE chroniqueur(
        id_chroniqueur int (11) Auto_increment  NOT NULL ,
        nom            Varchar (25) ,
        prenom         Varchar (25) ,
        annee_diff     Varchar (25) ,
        password       Varchar (25) ,
        PRIMARY KEY (id_chroniqueur )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: diffuse
#------------------------------------------------------------

CREATE TABLE diffuse(
        id_emission    Int NOT NULL ,
        id_chroniqueur Int NOT NULL ,
        PRIMARY KEY (id_emission ,id_chroniqueur )
)ENGINE=InnoDB;

ALTER TABLE contenu ADD CONSTRAINT FK_contenu_id_chroniqueur FOREIGN KEY (id_chroniqueur) REFERENCES chroniqueur(id_chroniqueur);
ALTER TABLE contenu ADD CONSTRAINT FK_contenu_id_emission FOREIGN KEY (id_emission) REFERENCES emissions(id_emission);
ALTER TABLE fichier ADD CONSTRAINT FK_fichier_id_contenu FOREIGN KEY (id_contenu) REFERENCES contenu(id_contenu);
ALTER TABLE diffuse ADD CONSTRAINT FK_diffuse_id_emission FOREIGN KEY (id_emission) REFERENCES emissions(id_emission);
ALTER TABLE diffuse ADD CONSTRAINT FK_diffuse_id_chroniqueur FOREIGN KEY (id_chroniqueur) REFERENCES chroniqueur(id_chroniqueur);
