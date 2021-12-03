<?php

class PaimentAdhesion{
		protected $codePaimentAdhesion; 
		
		
		protected $adhesion_code; 
		protected $datePaimentAdhesion; 
	
		protected $montantPaimentAdhesion;
	    
	

	 
	
	
	
	
	
	// setters and getters
	function getCodePaimentAdhesion() {
       return $this->codePaimentAdhesion;
    } 
	function setcodePaimentAdhesion($codePaimentAdhesion) {
        $this->codePaimentAdhesion= $codePaimentAdhesion;
    }
	
	
	function getAdhesion_code() {
       return $this->adhesion_code;
    } 
	function setAdhesion_code($adhesion_code) {
        $this->adhesion_code= $adhesion_code;
    }
	function getDatePaimentAdhesion() {
       return $this->datePaimentAdhesion;
    } 
	function setDatePaimentAdhesion($datePaimentAdhesion) {
        $this->datePaimentAdhesion= $datePaimentAdhesion;
    }
	
	
	function getMontantPaimentAdhesion() {
       return $this->montantPaimentAdhesion;
    } 
	function setMontantPaimentAdhesion($montantPaimentAdhesion) {
        $this->montantPaimentAdhesion= $montantPaimentAdhesion;
    }
	
	
		
	// fonctions 
	function getAllPaimentAdhesion(){
		$cnx = new PDO('mysql:host=localhost;dbname=garderie', 'root', '');
		$req = $cnx->query("SELECT * FROM paimentAdhesion ,eleve,adhesion, club
		 
          where paimentAdhesion.adhesion_code=adhesion.codeAdhesion 
          and adhesion.eleve_code=eleve.code
          and adhesion.club_code=club.codeClub");
		$tab = $req->fetchALL(); 
		return $tab ; 
	}
	
	function getInfoPaiementAdhesion($codePaimentAdhesion){
		$cnx = new PDO('mysql:host=localhost;dbname=garderie', 'root', '');
		$req = $cnx->query("SELECT * FROM paimentAdhesion ,eleve,adhesion, club
		  where paimentAdhesion.adhesion_code=adhesion.codeAdhesion 
          and adhesion.eleve_code=eleve.code
          and adhesion.club_code=club.codeClub 
		  and paimentAdhesion.codePaimentAdhesion=  '".$codePaimentAdhesion."'  ");
		$tab = $req->fetch(); 
		return $tab ; 
	}
	
	
	function addPaimentAdhesion($e){
		$cnx = new PDO('mysql:host=localhost;dbname=garderie', 'root', '');
		$req = $cnx->exec(" INSERT INTO  `paimentAdhesion` ( `codePaimentAdhesion`,  `adhesion_code` , `datePaimentAdhesion`, `montantpaimentAdhesion`) 
    VALUES ('".$e->getCodePaimentAdhesion()."', '".$e->getAdhesion_code()."', '".$e->getDatePaimentAdhesion()."',  '".$e->getMontantPaimentAdhesion()."') "); 
		return $req ; 
	}
	
	
}


?>