create database if not exists wasfati;

use wasfati;

CREATE TABLE IF NOT EXISTS Categorie (
	categorieID int AUTO_INCREMENT Not Null PRIMARY KEY,
    titre varchar(25) UNIQUE
);

CREATE TABLE IF NOT EXISTS ModeCuisson (
	modeID int AUTO_INCREMENT NOT null PRIMARY KEY,
    titre varchar(25)
);

CREATE TABLE IF NOT EXISTS Saison (
	saisonID int AUTO_INCREMENT NOT null PRIMARY KEY,
    titre varchar(25)
);

CREATE TABLE IF NOT EXISTS Fete (
	feteID int AUTO_INCREMENT NOT null PRIMARY KEY,
    titre varchar(25)
);

CREATE TABLE IF NOT EXISTS News (
	newsID int AUTO_INCREMENT NOT null PRIMARY KEY,
    titre varchar(100),
    description text,
    imgPath varchar(255),
    videoPath varchar(255)
);

CREATE TABLE IF NOT EXISTS Utilisateur (
	userID int AUTO_INCREMENT NOT null PRIMARY KEY,
    email varchar(100) UNIQUE,
    mdp varchar(100),
    prenom varchar(50),
    nom varchar(50),
    dateNaissance date,
    sexe varchar(10),
    state boolean
);

CREATE TABLE IF NOT EXISTS Admin (
	adminID int AUTO_INCREMENT NOT null PRIMARY KEY,
    email varchar(100) UNIQUE,
    mdp varchar(100)
);

CREATE TABLE IF NOT EXISTS Params (
	paramID int AUTO_INCREMENT NOT null PRIMARY KEY,
    cle varchar(100),
    valeur varchar(100)
);

CREATE TABLE IF NOT EXISTS Recette (
	recetteID int AUTO_INCREMENT NOT null PRIMARY KEY,
    titre varchar(50),
    description text,
    imgPath varchar(255),
    videoPath varchar(255),
    difficulte varchar(25),
    state boolean,
    tempsPreparation int,
    tempsRepo int,
    tempsCuisson int,
    calories int,
    categorieID int,
    userID int,
    healthy boolean,
    FOREIGN KEY (categorieID) REFERENCES Categorie(categorieID),
    FOREIGN KEY (userID) REFERENCES Utilisateur(userID)
);

CREATE TABLE If NOT EXISTS Etape(
	recetteID int,
    etape int,
    instruction text,
    PRIMARY KEY (recetteID,etape),
    FOREIGN KEY (recetteID) REFERENCES Recette(recetteID)
);

CREATE TABLE IF NOT EXISTS FeteRecette(
	recetteID int,
    feteID int,
    PRIMARY KEY (recetteID,feteID),
    FOREIGN KEY (recetteID) REFERENCES Recette(recetteID),
    FOREIGN KEY (feteID) REFERENCES Fete(feteID)  
);

CREATE TABLE If NOT EXISTS Ingredient (
	ingredientID int AUTO_INCREMENT not null primary key,
    title varchar(50),
    imgPath varchar(255),
    healthy boolean,
    originSaison int,
    FOREIGN key (originSaison) REFERENCES Saison(saisonID)
);

CREATE TABLE IF NOT EXISTS InfoNutritionnelle(
	infoID int AUTO_INCREMENT not null PRIMARY KEY,
    titre varchar(50),
    description text,
    ingredientID int,
    FOREIGN KEY (ingredientID) REFERENCES Ingredient(ingredientID)
);

CREATE TABLE IF NOT EXISTS DispoIngredient(
	ingredientID int,
    saisonID int,
    PRIMARY KEY (ingredientID,saisonID),
    FOREIGN KEY (ingredientID) REFERENCES Ingredient(ingredientID),
    FOREIGN KEY (saisonID) REFERENCES Saison(saisonID)  
);

CREATE TABLE IF NOT EXISTS RecetteSaison(
	recetteID int,
    saisonID int,
    PRIMARY KEY (recetteID,saisonID),
    FOREIGN KEY (recetteID) REFERENCES recette(recetteID),
    FOREIGN KEY (saisonID) REFERENCES Saison(saisonID)  
);

CREATE TABLE IF NOT EXISTS Composent(
	recetteID int,
    ingredientID int,
    modeID int,
    quantite varchar(25),
    PRIMARY key(recetteID,ingredientID),
    FOREIGN Key (ingredientID) REFERENCES Ingredient(ingredientID),
    FOREIGN key( recetteID) REFERENCES Recette(recetteID),
    FOREIGN KEY (modeID) REFERENCES ModeCuisson(modeID)
);

CREATE TABLE IF NOT EXISTS NewsPage(
	id int AUTO_INCREMENT NOT null PRIMARY KEY,
    newsID int,
    recetteID int,
    url varchar(255),
    FOREIGN key (newsID) REFERENCES News(newsID),
    FOREIGN KEY (recetteID) REFERENCES recette(recetteID)
);

CREATE TABLE IF NOT EXISTS Diaporama(
	id int AUTO_INCREMENT NOT null PRIMARY KEY,
    newsID int,
    recetteID int,
    url varchar(255),
    FOREIGN key (newsID) REFERENCES News(newsID),
    FOREIGN KEY (recetteID) REFERENCES recette(recetteID)
);

CREATE TABLE IF NOT EXISTS RecetteFav(
	recetteID int,
    userID int,
    rate int,
    PRIMARY KEY (recetteID,userID),
    FOREIGN KEY (recetteID) REFERENCES recette(recetteID),
    FOREIGN KEY (userID) REFERENCES utilisateur(userID)
);