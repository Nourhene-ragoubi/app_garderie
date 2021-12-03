<?php

class Evenement {
	
	protected $codeEvenement ; 
	protected $titreEvenement ; 
	protected $dateEvenement; 
	protected $descriptionEvenement;
	protected $montantParticipation;
	
	
	

	 
	
	// setters and getters
	
	function getCodeEvenement() {
       return $this->codeEvenement;
    } 
	function setCodeEvenement($codeEvenement) {
        $this->codeEvenement= $codeEvenement;
    }
	function getTitreEvenement() {
       return $this->titreEvenement;
    } 
	function setTitreEvenement($titreEvenement) {
        $this->titreEvenement= $titreEvenement;
    }	
	function getDateEvenement() {
       return $this->dateEvenement;
    } 
	function setDateEvenement($dateEvenement) {
        $this->dateEvenement = $dateEvenement;
    }	
	function getDescriptionEvenement() {
       return $this->descriptionEvenement;
    } 
	function setDescriptionEvenement($descriptionEvenement) {
        $this->descriptionEvenement= $descriptionEvenement;
    }	
		function getMontantParticipation() {
       return $this->montantParticipation;
    } 
	function setMontantParticipation($montantParticipation) {
        $this->montantParticipation= $montantParticipation;
    }	
	
	// fonctions 
	function getAllEvenement(){
		$cnx = new PDO('mysql:host=localhost;dbname=garderie', 'root', '');
		$req = $cnx->query("SELECT * FROM evenement");
		$tab = $req->fetchALL(); 
		return $tab ; 
	}
	
	function getEvenementByCodeEvenement($codeEvenement){
		$cnx = new PDO('mysql:host=localhost;dbname=garderie', 'root', '');
		$req = $cnx->query("SELECT * FROM evenement where codeEvenement=  '".$codeEvenement."'  ");
		$tab = $req->fetch(); 
		return $tab ; 
	}
	function getEvenementByDateEvenement($dateEvenement){
		$cnx = new PDO('mysql:host=localhost;dbname=garderie', 'root', '');
		$req = $cnx->query("SELECT * FROM evenement where dateEvenement=  '".$dateEvenement."'  ");
		$tab = $req->fetch(); 
		return $tab ; 
	}
	
	function deleteEvenement($codeEvenement){
		$cnx = new PDO('mysql:host=localhost;dbname=garderie', 'root', '');
		$req = $cnx->exec("DELETE   FROM evenement where codeEvenement =  '".$codeEvenement."'  "); 
		return $req ; 
	}
	
	function addEvenement($e){
		$cnx = new PDO('mysql:host=localhost;dbname=garderie', 'root', '');
		$req = $cnx->exec(" INSERT INTO  `evenement` (`codeEvenement`, `titreEvenement`, `dateEvenement`, `descriptionEvenement`, `montantParticipation`) 
					VALUES ('".$e->getCodeEvenement()."', '".$e->getTitreEvenement()."', '".$e->getDateEvenement()."', '".$e->getDescriptionEvenement()."', '".$e->getMontantParticipation()."') "); 
		return $req ; 
	}
	
	function editEvenement($e){
		$cnx = new PDO('mysql:host=localhost;dbname=garderie', 'root', '');
		$req = $cnx->exec("  UPDATE `garderie`.`evenement` SET 
		                     `codeEvenement` = '".$e->getCodeEvenement()."', 
							`titreEvenement` = '".$e->getTitreEvenement()."', 
							`dateEvenement` = '".$e->getDateEvenement()."', 
							`descriptionEvenement` = '".$e->getDescriptionEvenement()."' ,
							`montantParticipation` = '".$e->getMontantParticipation()."' 
							
							WHERE `evenement`.`codeEvenement` = '".$e->getCodeEvenement()."' "); 
		return $req ; 
	}
}


?>