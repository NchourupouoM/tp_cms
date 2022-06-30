Drop TABLE IF  EXISTS Activites;
CREATE TABLE Activites (
    id_activite  int NOT NULL auto_increment,
    nom_activite  varchar(50) NOT NULL,
    description_activite  mediumtext NOT NULL,
    photo      varchar(50)   NULL,

    PRIMARY KEY (id_activite)

);
Drop TABLE IF  EXISTS annonces;
CREATE TABLE annonces (
    id_annonce int NOT NULL auto_increment,
    titre_annonce varchar(50) ,
    Description_annonce mediumtext  ,

    PRIMARY KEY (id_annonce)
);
Drop TABLE IF  EXISTS conseil_muni;
CREATE TABLE conseil_muni(
    id_cons int NOT NULL auto_increment,
    nom_cons varchar(50)  ,
    nom_membre varchar(50) ,
    poste varchar(50), 
    PRIMARY KEY (id_cons)
);
Drop TABLE IF  EXISTS personnel;
CREATE TABLE personnel(
    id_personnel int NOT NULL auto_increment,
    nom varchar(250) ,
    parcours mediumtext  ,
    poste varchar(250) ,
    PRIMARY KEY (id_personnel)
);
Drop TABLE IF  EXISTS projets;
CREATE TABLE projets(
    id_projet int NOT NULL auto_increment,
    nom_projet varchar(50)  ,
    description_projet mediumtext  ,
    etat_projet varchar(250) ,
    PRIMARY KEY (id_projet)
);
Drop TABLE IF  EXISTS publicites;
CREATE TABLE publicites (
    id_pub int NOT NULL auto_increment,
    titre_pub varchar(50) ,
    description mediumtext ,
    photo varchar(250) NULL ,
    PRIMARY KEY (id_pub)
);
Drop TABLE IF  EXISTS site_touristiques;
CREATE TABLE site_touristiques(
    id_site int NOT NULL auto_increment,
    nom_site varchar(50),
    description_site mediumtext NOT NULL ,
    photo varchar(250) NULL ,
    PRIMARY KEY (id_site)
);
