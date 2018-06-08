/*affiche la listes des producteurs qui vont devoir venir livrer un points relai aujoud'hui*/
CREATE 	view vListeProducteurPourPointsDeVente AS
SELECT prenom, nom, role, lot.idLot as lot
FROM user
	INNER JOIN roleUtilisateur ON user.idRole = roleUtilisateur.idRole
	INNER JOIN producteur ON user.idUser = producteur.idUser
	INNER JOIN lot ON producteur.idProducteur = lot.idProducteur
	INNER JOIN ldc ON lot.idLot = ldc.idLot
	INNER JOIN commande ON ldc.idcommande = commande.idcommande
	INNER JOIN pointsDeVente ON commande.idPointsDeVente = pointsDeVente.idPointsDeVente 
WHERE  DATE(commande.momentDuRetraits) = "2018-04-01"
	AND pointsDeVente.idPointsDeVente = 0
ORDER BY nom,prenom;
	



/*Affiche la listes des clients que un producteur devra livrer dans un points relai à une date precise*/
CREATE 	view vControleListeClientProducteur AS
SELECT prenom, nom, role, nomPtsDeVente, nomProduit, nomVarietee, quantiteeCommander, uniteMesure, commande.idCommande, producteur.idProducteur
FROM user 
	INNER JOIN commande ON user.idUser = commande.idUser 
	INNER JOIN pointsDeVente ON commande.idPointsDeVente = pointsDeVente.idPointsDeVente
	INNER JOIN ldc ON commande.idCommande = ldc.idCommande
	INNER JOIN lot ON ldc.idLot = lot.idLot
	INNER JOIN variete ON lot.idVarietee = variete.idVarietee
	INNER JOIN produitVariete ON variete.idVarietee = produitVariete.idVarietee
	INNER JOIN produit ON produitVariete.idProduit = produit.idProduit
	INNER JOIN uniteMessure ON lot.idUniteMesure = uniteMessure.idUniteMesure 
	INNER JOIN roleUtilisateur ON user.idRole = roleUtilisateur.idRole
	INNER JOIN producteur On lot.idProducteur = producteur.idProducteur
	INNER JOIN user ON producteur.idUser = user.idUser
WHERE  DATE(commande.momentDuRetraits) = "2018-04-01"
	AND pointsDeVente.idPointsDeVente = 0
	AND roleUtilisateur.idRole = 2
ORDER BY nomProduit;



/*
SELECT prenom, nom, nomPtsDeVente, nomProduit, nomVarietee, quantiteeCommander
FROM user 
	INNER JOIN pointDeVentePrefere ON user.idUser = pointDeVentePrefere.idUser 
	INNER JOIN pointsDeVente ON pointDeVentePrefere.idPointsDeVente = pointsDeVente.idPointsDeVente
	INNER JOIN commande ON pointsDeVente.idPointsDeVente = commande.idPointsDeVente
	INNER JOIN ldc ON commande.idCommande = ldc.idCommande
	INNER JOIN lot ON ldc.idLot = lot.idLot
	INNER JOIN variete ON lot.idVarietee = variete.idVarietee
	INNER JOIN produitVariete ON variete.idVarietee = produitVariete.idVarietee
	INNER JOIN produit ON produitVariete.idProduit = produit.idProduit
WHERE commande.momentDuRetraits = DATE(NOW()); 




SELECT user.nom, user.prenom FROM user INNER JOIN roleUtilisateur ON user.idUser = roleUtilisateur.idUser WHERE roleUtilisateur.idRole = 1;*/



    QString txtReq="SELECT variete.valider,variete.idVarietee,variete.nomVarietee,variete.descriptionVarietee,produit.nomProduit FROM variete INNER JOIN produit ON variete.idProduit = produit.idProduit WHERE variete.valider=1 ORDER BY produit.nomProduit,variete.nomVarietee DESC";



SELECT produit.idCategorieProduit,nomCategorieProduit,commentaireCategorieProduit,count(produit.idCategorieProduit) AS nombreDeProduit  
FROM categorieProduit INNER JOIN produit ON categorieProduit.idCategorieProduit = produit.idCategorieProduit GROUP BY produit.idCategorieProduit




SELECT categorieProduit.nomCategorieProduit,count(produit.idProduit) AS nombreDeProduit  
FROM categorieProduit INNER JOIN produit ON categorieProduit.idCategorieProduit = produit.idCategorieProduit 
GROUP BY produit.idCategorieProduit;


SELECT categorieProduit.nomCategorieProduit,produit.idProduit,produit.nomProduit
FROM categorieProduit INNER JOIN produit ON categorieProduit.idCategorieProduit = produit.idCategorieProduit;
