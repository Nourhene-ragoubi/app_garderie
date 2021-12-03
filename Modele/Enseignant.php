<?php

class Enseignant {
	
	protected $cinEnseignant ; 
	protected $nomEnseignant ; 
	protected $prenomEnseignant ; 
	protected $emailEnseignant ;
    protected $telephoneEnseignant ;
	protected  $adresseEnseignant;
	

	 
	
	// setters and getters
	function getCinEnseignant() {
       return $this->cinEnseignant;
    } 
	function setCinEnseignant($cinEnseignant) {
        $this->cinEnseignant= $cinEnseignant;
    }
	function getNomEnseignant() {
       return $this->nomEnseignant;
    } 
	function setNomEnseignant($nomEnseignant) {
        $this->nomEnseignant = $nomEnseignant;
    }	
	function getPrenomEnseignant() {
       return $this->prenomEnseignant;
    } 
	function setPrenomEnseignant($prenomEnseignant) {
        $this->prenomEnseignant = $prenomEnseignant;
    }	
	function getEmailEnseignant() {
       return $this->emailEnseignant;
    } 
	function setEmailEnseignant($emailEnseignant) {
        $this->emailEnseignant = $emailEnseignant;
    }	
	function getTelephoneEnseignant() {
       return $this->telephoneEnseignant;
    } 
	function setTelephoneEnseignant($telephoneEnseignant) {
        $this->telephoneEnseignant = $telephoneEnseignant;
    }
	function getAdresseEnseignant() {
       return $this->adresseEnseignant;
    } 
	function setAdresseEnseignant($adresseEnseignant) {
        $this->adresseEnseignant = $adresseEnseignant;
    }
	
		
	// fonctions 
	function getAllEnseignant(){
		$cnx = new PDO('mysql:host=localhost;dbname=garderie', 'root', '');
		$req = $cnx->query("SELECT * FROM enseignant");
		$tab = $req->fetchALL(); 
		return $tab ; 
	}
	
	function getEnseignantByCinEnseignant($cinEnseignant){
		$cnx = new PDO('mysql:host=localhost;dbname=garderie', 'root', '');
		$req = $cnx->query("SELECT * FROM enseignant where cinEnseignant=  '".$cinEnseignant."'  ");
		$tab = $req->fetch(); 
		return $tab ; 
	}
	
	function deleteEnseignant($cinEnseignant){
		$cnx = new PDO('mysql:host=localhost;dbname=garderie', 'root', '');
		$req = $cnx->exec("DELETE   FROM enseignant where cinEnseignant =  '".$cinEnseignant."'  "); 
		return $req ; 
	}
	
		function addEnseignant($e){
		$cnx = new PDO('mysql:host=localhost;dbname=garderie', 'root', '');
		$req = $cnx->exec(" INSERT INTO  `Enseignant` (`cinEnseignant`, `nomEnseignant`, `prenomEnseignant`, `emailEnseignant`,  `telephoneEnseignant`, `adresseEnseignant`) 
					VALUES ('".$e->getCinEnseignant()."', '".$e->getNomEnseignant()."', '".$e->getPrenomEnseignant()."', '".$e->getEmailEnseignant()."', '".$e->getTelephoneEnseignant()."', '".$e->getAdresseEnseignant()."') "); 
		return $req ; 
	}
	
	function editEnseignant($e){
		$cnx = new PDO('mysql:host=localhost;dbname=garderie', 'root', '');
		$req = $cnx->exec("  UPDATE `garderie`.`enseignant` SET 
			`cinEnseignant` = '".$e->getCinEnseignant()."', 
							`nomEnseignant` = '".$e->getNomEnseignant()."', 
							`prenomEnseignant` = '".$e->getPrenomEnseignant()."', 
							`emailEnseignant` = '".$e->getEmailEnseignant()."',
							`telephoneEnseignant` = '".$e->getTelephoneEnseignant()."' ,
							`adresseEnseignant` = '".$e->getAdresseEnseignant()."' 
							WHERE `enseignant`.`cinEnseignant` = '".$e->getCinEnseignant()."' "); 
		return $req ; 
	}
}


?>