<?php

class Club {
	protected $codeClub ; 
	protected $nomClub ; 
	protected $animateurClub ; 
	protected $descriptionClub ; 
	protected $montantAdhesion ;
   

	 
	
	// setters and getters
	 function getCodeClub() {
       return $this->codeClub;
    } 
	function setCodeClub($codeClub) {
        $this->codeClub= $codeClub;
    }
   function getNomClub() {
       return $this->nomClub;
    } 
	function setNomClub($nomClub) {
        $this->nomClub= $nomClub;
    }
	function getAnimateurClub() {
       return $this->animateurClub;
    } 
	function setAnimateurClub($animateurClub) {
        $this->animateurClub= $animateurClub;
    }	
	function getDescriptionClub() {
       return $this->descriptionClub;
    } 
	function setDescriptionClub($descriptionClub) {
        $this->descriptionClub = $descriptionClub;
    }	
	function getMontantAdhesion() {
       return $this->montantAdhesion;
    } 
	function setMontantAdhesion($montantAdhesion) {
        $this->montantAdhesion = $montantAdhesion;
    }	
	
	
	
	
	// fonctions 
	function getAllClub(){
		$cnx = new PDO('mysql:host=localhost;dbname=garderie', 'root', '');
		$req = $cnx->query("SELECT * FROM club");
		$tab = $req->fetchALL(); 
		return $tab ; 
	}
	function getLastClub(){
		$cnx = new PDO('mysql:host=localhost;dbname=garderie', 'root', '');
		$req = $cnx->query("SELECT * FROM  club 
		
			ORDER BY codeClub DESC LIMIT 1");
		$tab = $req->fetch(); 
		return $tab ; 
	}
	
	
	function getClubByCodeClub($codeClub){
		$cnx = new PDO('mysql:host=localhost;dbname=garderie', 'root', '');
		$req = $cnx->query("SELECT * FROM club where codeClub=  '".$codeClub."'  ");
		$tab = $req->fetch(); 
		return $tab ; 
	}
	function getClubByNomClub($nomClub){
		$cnx = new PDO('mysql:host=localhost;dbname=garderie', 'root', '');
		$req = $cnx->query("SELECT * FROM club where nomClub=  '".$nomClub."'  ");
		$tab = $req->fetch(); 
		return $tab ; 
	}
	
	
	function deleteClub($codeClub){
		$cnx = new PDO('mysql:host=localhost;dbname=garderie', 'root', '');
		$req = $cnx->exec("DELETE   FROM club where codeClub =  '".$codeClub."'  "); 
		return $req ; 
	}
	
	function addClub($e){
		$cnx = new PDO('mysql:host=localhost;dbname=garderie', 'root', '');
		$req = $cnx->exec(" INSERT INTO  `club` (`nomClub`, `animateurClub`, `descriptionClub`,  `montantAdhesion`) 
					VALUES ('".$e->getNomClub()."', '".$e->getAnimateurClub()."', '".$e->getDescriptionClub()."', '".$e->getMontantAdhesion()."') "); 
		return $req ; 
	}
	
	function editClub($e){
		$cnx = new PDO('mysql:host=localhost;dbname=garderie', 'root', '');
		$req = $cnx->exec("  UPDATE `garderie`.`club` SET 
		                 
		                     `nomClub` = '".$e->getNomClub()."', 
							`animateurClub` = '".$e->getAnimateurClub()."', 
							`descriptionClub` = '".$e->getDescriptionClub()."', 
							`montantAdhesion` = '".$e->getMontantAdhesion()."'
							
						
					WHERE `club`.`codeClub` = '".$e->getCodeClub()."' "); 
		return $req ; 
	}
}


?>