/*
table de la bdd de new word
BDD: nw
crée par:Florian
crée le :06/04/2017
Modifié le: 08/06/2018 par Florian
*/

DROP database nw;
CREATE database nw;
use nw;


/*Creation des tables*/
CREATE TABLE `ville`(`ville` VARCHAR(200),`codePostal` VARCHAR(5),primary key(`ville`));

CREATE TABLE `mdpQuestion`(`idQuestion` INTEGER,`questionSecrete` VARCHAR(360),primary key(`idQuestion`));

CREATE TABLE `uniteMessure`(`idUniteMesure` INTEGER,`uniteMesure` VARCHAR(25),primary key(`idUniteMesure`));

CREATE TABLE `categorieProduit`(`idCategorieProduit` INTEGER,`nomCategorieProduit` VARCHAR(25),`tva` VARCHAR(4),`commentaireCategorieProduit` VARCHAR(500),primary key(`idCategorieProduit`));

CREATE TABLE `roleUtilisateur`(`idRole` INTEGER,`role` VARCHAR(25),primary key(`idRole`));

CREATE TABLE `typeDeProduction`(`idTypeProduction` INTEGER,`nomTypeProduction` VARCHAR(25),primary key(`idTypeProduction`));

CREATE TABLE `jourSemaine`(`idJour` INTEGER,`jour` VARCHAR(25),primary key(`idJour`));

CREATE TABLE `employe`(`employeId` INTEGER,`employePseudo` VARCHAR(30),`employeNom` VARCHAR(30),`employePrenom` VARCHAR(30),`employeMdp` VARCHAR(30),primary key(`employeId`));

CREATE TABLE `activitePointsDeRetraits`(`numeroactivitePointsDeRetraits` INTEGER,`libelleactivitePointsDeRetraits` VARCHAR(25),primary key(`numeroactivitePointsDeRetraits`));

CREATE TABLE `produit`(`idProduit` INTEGER,`nomProduit` VARCHAR(50),`valider` BOOL,`imageProduit` VARCHAR(500),`idCategorieProduit` INTEGER NOT NULL, foreign key (`idCategorieProduit`) references categorieProduit(`idCategorieProduit`),primary key(`idProduit`));

CREATE TABLE `user`(`idUser` INTEGER,`prenom` VARCHAR(30),`nom` VARCHAR(30),`photoProfil` VARCHAR(500),`motDePasse` VARCHAR(50),`numeroTelephone` VARCHAR(50),`adresse1` VARCHAR(200),`validationCompte` BIT,`adresseIp` VARCHAR(15),`nbTentativeConnection` INTEGER,`dateInscription` DATETIME,`idCompteFacebook` INTEGER,`idCompteGoogle` INTEGER,`reponseSecrete` VARCHAR(300),`pseudo` VARCHAR(50),`mail` VARCHAR(100),`dateDeNaissance` DATE,`codePostal` VARCHAR(5),`ville` VARCHAR(50),`adresse2` VARCHAR(200),`numeroRue` INTEGER,`idQuestion` INTEGER NOT NULL,`idRole` INTEGER NOT NULL, foreign key (`idQuestion`) references mdpQuestion(`idQuestion`), foreign key (`idRole`) references roleUtilisateur(`idRole`),primary key(`idUser`));

CREATE TABLE `variete`(`idVarietee` INTEGER,`nomVarietee` VARCHAR(30),`descriptionVarietee` VARCHAR(200),`photo` VARCHAR(300),`valider` BOOL,`dureeDeVie` INTEGER,`idProduit` INTEGER NOT NULL, foreign key (`idProduit`) references produit(`idProduit`),primary key(`idVarietee`));

CREATE TABLE `producteur`(`idProducteur` INTEGER,`Description` VARCHAR(500),`idUser` INTEGER NOT NULL, foreign key (`idUser`) references user(`idUser`),primary key(`idProducteur`));

CREATE TABLE `pointsDeVente`(`idPointsDeVente` INTEGER,`NomPtsDeVente` VARCHAR(100),`information` VARCHAR(500),`numeroactivitePointsDeRetraits` INTEGER NOT NULL, foreign key (`numeroactivitePointsDeRetraits`) references activitePointsDeRetraits(`numeroactivitePointsDeRetraits`),primary key(`idPointsDeVente`));

CREATE TABLE `pointDeVentePrefere`(`idPointsDeVente` INTEGER NOT NULL,`idUser` INTEGER NOT NULL, foreign key (`idPointsDeVente`) references pointsDeVente(`idPointsDeVente`), foreign key (`idUser`) references user(`idUser`),primary key(`idPointsDeVente`,`idUser`));

CREATE TABLE `PointOuJeVends`(`idPointsDeVente` INTEGER NOT NULL,`idProducteur` INTEGER NOT NULL, foreign key (`idPointsDeVente`) references pointsDeVente(`idPointsDeVente`), foreign key (`idProducteur`) references producteur(`idProducteur`),primary key(`idPointsDeVente`,`idProducteur`));

CREATE TABLE `Vacance`(`numeroVacance` INTEGER,`dateDebut` DATE,`dateFin` DATE,`idPointsDeVente` INTEGER NOT NULL, foreign key (`idPointsDeVente`) references pointsDeVente(`idPointsDeVente`),primary key(`numeroVacance`));

CREATE TABLE `lieuxDeProduction`(`idParcelle` INTEGER,`photoParcelle` VARCHAR(360),`latitude` VARCHAR(50),`longitude` VARCHAR(50),`commune` VARCHAR(500),`numero` INTEGER,`idProducteur` INTEGER NOT NULL, foreign key (`idProducteur`) references producteur(`idProducteur`),primary key(`idParcelle`));

CREATE TABLE `lot`(`idLot` INTEGER,`quantiteeAchat` FLOAT,`dateRecolte` DATETIME,`quantiteeTotalMisEnVente` FLOAT,`prixLot` FLOAT,`idVarietee` INTEGER NOT NULL,`idUniteMesure` INTEGER NOT NULL,`idParcelle` INTEGER NOT NULL,`idProducteur` INTEGER NOT NULL, foreign key (`idVarietee`) references variete(`idVarietee`), foreign key (`idUniteMesure`) references uniteMessure(`idUniteMesure`), foreign key (`idParcelle`) references lieuxDeProduction(`idParcelle`), foreign key (`idProducteur`) references producteur(`idProducteur`),primary key(`idLot`));

CREATE TABLE `ouverture`(`idOuverture` INTEGER,`heureOuverture` TIME,`heureFermeture` TIME,`idPointsDeVente` INTEGER NOT NULL, foreign key (`idPointsDeVente`) references pointsDeVente(`idPointsDeVente`),primary key(`idOuverture`));

CREATE TABLE `commande`(`idcommande` INTEGER,`momentDuRetraits` DATETIME,`commandePasserLe` DATETIME,`idUser` INTEGER NOT NULL,`idPointsDeVente` INTEGER NOT NULL, foreign key (`idUser`) references user(`idUser`), foreign key (`idPointsDeVente`) references pointsDeVente(`idPointsDeVente`),primary key(`idcommande`));

CREATE TABLE `ldc`(`quantiteeCommander` INTEGER,`verificationProducteur` BOOL,`quantiteeRecusDuProducteur` INTEGER,`verificationDistributeur` BOOL,`quantiteeRecusDuDistributeur` INTEGER,`verificationClient` BOOL,`idLot` INTEGER NOT NULL,`idcommande` INTEGER NOT NULL, foreign key (`idLot`) references lot(`idLot`), foreign key (`idcommande`) references commande(`idcommande`),primary key(`idLot`,`idcommande`));

CREATE TABLE `parcelleVarieter`(`idParcelle` INTEGER NOT NULL,`idVarietee` INTEGER NOT NULL, foreign key (`idParcelle`) references lieuxDeProduction(`idParcelle`), foreign key (`idVarietee`) references variete(`idVarietee`),primary key(`idParcelle`,`idVarietee`));

CREATE TABLE `JourDouverture`(`idJour` INTEGER NOT NULL,`idOuverture` INTEGER NOT NULL, foreign key (`idJour`) references jourSemaine(`idJour`), foreign key (`idOuverture`) references ouverture(`idOuverture`),primary key(`idJour`,`idOuverture`));

CREATE TABLE `controlePoroduit`(`validation` BOOL,`dateValidation` DATE,`idParcelle` INTEGER NOT NULL,`idTypeProduction` INTEGER NOT NULL, foreign key (`idParcelle`) references lieuxDeProduction(`idParcelle`), foreign key (`idTypeProduction`) references typeDeProduction(`idTypeProduction`),primary key(`idParcelle`,`idTypeProduction`));


source newWord_data.sql;