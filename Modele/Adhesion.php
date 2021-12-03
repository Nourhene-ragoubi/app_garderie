<?php

class Adhesion{
		protected $codeAdhesion; 
	    protected $dateAdhesion; 
	 
	   protected $eleve_code ; 
       protected $club_code ;
	   
	

	 
	
	// setters and getters
	function getCodeAdhesion() {
       return $this->codeAdhesion;
    } 
	function setCodeAdhesion($codeAdhesion) {
        $this->codeAdhesion= $codeAdhesion;
    }
	function getDateAdhesion() {
       return $this->dateAdhesion;
    } 
	function setDateAdhesion($dateAdhesion) {
        $this->dateAdhesion= $dateAdhesion;
    }
	
	function getEleve_code() {
       return $this->eleve_code;
    } 
	function setEleve_code($eleve_code) {
        $this->eleve_code = $eleve_code;
    }	
	function getClub_code() {
       return $this->club_code;
    } 
	function setClub_code($club_code) {
        $this->club_code = $club_code;
    }	
	
	
		
	// fonctions 
	function getAllAdhesion(){
		$cnx = new PDO('mysql:host=localhost;dbname=garderie', 'root', '');
		$req = $cnx->query("SELECT * FROM adhesion, eleve , club where adhesion.eleve_code= eleve.code and adhesion.club_code=club.codeClub");
		$tab = $req->fetchALL(); 
		return $tab ; 
	}
	
	function getAdhesionByClubEleve($eleve_code, $club_code){
		$cnx = new PDO('mysql:host=localhost;dbname=garderie', 'root', '');
		$req = $cnx->query("SELECT distinct codeAdhesion FROM adhesion
		where adhesion.eleve_code= '".$eleve_code."' 
		and adhesion.club_code= '".$club_code."' ");
		$tab = $req->fetch(); 
		return $tab ; 
	}
	
	function getLastAdhesion(){
		$cnx = new PDO('mysql:host=localhost;dbname=garderie', 'root', '');
		$req = $cnx->query("SELECT * FROM adhesion, eleve , club 
			where adhesion.eleve_code= eleve.code 
			and adhesion.club_code=club.codeClub
			ORDER BY codeAdhesion DESC LIMIT 1");
		$tab = $req->fetch(); 
		return $tab ; 
	}
	
	function getAdhesionByCodeAdhesion($codeAdhesion){
		$cnx = new PDO('mysql:host=localhost;dbname=garderie', 'root', '');
		$req = $cnx->query("SELECT * FROM adhesion where codeAdhesion=  '".$codeAdhesion."'  ");
		$tab = $req->fetch(); 
		return $tab ; 
	}
	
	function deleteAdhesion($codeAdhesion){
		$cnx = new PDO('mysql:host=localhost;dbname=garderie', 'root', '');
		$req = $cnx->exec("DELETE   FROM adhesion where codeAdhesion =  '".$codeAdhesion."'  "); 
		return $req ; 
	}
	
	function addAdhesion($e){
		$cnx = new PDO('mysql:host=localhost;dbname=garderie', 'root', '');
		$req = $cnx->exec(" INSERT INTO  `adhesion` ( `codeAdhesion`, `dateAdhesion`, `eleve_code`,  `club_code`) 
					VALUES ('".$e->getCodeAdhesion()."', '".$e->getDateAdhesion()."', '".$e->getEleve_code()."', '".$e->getClub_code()."') "); 
		return $req ; 
	}
	
	
}


?>