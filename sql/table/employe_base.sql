/*
Table contenant les employés du logiciel
BDD: nw
crée par:Florian
crée le :17/11/2017
Modifiée le: 1 Decembre 2017 par Florian
*/

/*Suppression de la table si elle existe*/
DROP TABLE IF EXISTS employe;

 
/*  Creation des tables */
CREATE TABLE employe
(
	employeId int NOT NULL PRIMARY KEY,
	employePseudo varchar(30) NOT NULL,
	employeNom varchar(30),
	employePrenom varchar(30),
	employeMdp varchar(30) NOT NULL
);



/* Mise en ouvre des CIF */ 

