<?php

class PaimentInscription{
		protected $codePaimentInscription; 
		protected $inscription_code;
		protected $moisPaimentInscription; 
		protected $datePaimentInscription; 
        protected $montantPaimentInscription;
	    
	

	 
	
	
	
	
	
	// setters and getters
	function getCodePaimentInscription() {
       return $this->codePaimentInscription;
    } 
	function setcodePaimentInscription($codePaimentInscription) {
        $this->codePaimentInscription= $codePaimentInscription;
    }
	
	
	
	function getDatePaimentInscription() {
       return $this->datePaimentInscription;
    } 
	function setDatePaimentInscription($datePaimentInscription) {
        $this->datePaimentInscription= $datePaimentInscription;
    }
	
	
	function getMontantPaimentInscription() {
       return $this->montantPaimentInscription;
    } 
	function setMontantPaimentInscription($montantPaimentInscription) {
        $this->montantPaimentInscription= $montantPaimentInscription;
    }
	function getMoisPaimentInscription() {
       return $this->moisPaimentInscription;
    } 
	function setMoisPaimentInscription($moisPaimentInscription) {
        $this->moisPaimentInscription= $moisPaimentInscription;
    }
	function getInscription_code() {
       return $this->inscription_code;
    } 
	function setInscription_code($inscription_code) {
        $this->inscription_code= $inscription_code;
    }
	
	
		
	// fonctions 
	function getAllPaimentInscription(){
		$cnx = new PDO('mysql:host=localhost;dbname=garderie', 'root', '');
		$req = $cnx->query("SELECT * FROM paimentInscription ,eleve,classe,inscription
		 
          where paimentInscription.inscription_code=inscription.codeInscription 
          and inscription.eleve_code=eleve.code
		  and inscription.classe_niveau=classe.niveau");
		$tab = $req->fetchALL(); 
		return $tab ; 
	}
	
	
	function getAlllistEleveNonPayee(){
		$cnx = new PDO('mysql:host=localhost;dbname=garderie', 'root', '');
		$req = $cnx->query("
		select  code ,  nom ,  prenom,parentCin from eleve where code not IN(
		SELECT eleve.code   FROM paimentInscription ,eleve, inscription ,classe
          where paimentInscription.inscription_code=inscription.codeInscription 
          and inscription.eleve_code=eleve.code
		  and inscription.classe_niveau=classe.niveau) ");
		   $tab = $req->fetchALL(); 
		    return $tab ; 
	}
	function getInfoPaiementInscription($codePaimentInscription){
		$cnx = new PDO('mysql:host=localhost;dbname=garderie', 'root', '');
		$req = $cnx->query("SELECT * FROM paimentInscription ,eleve,classe,inscription
		 
          where paimentInscription.inscription_code=inscription.codeInscription 
          and inscription.eleve_code=eleve.code
          and inscription.classe_niveau=classe.niveau		  
		  and paimentInscription.codePaimentInscription=  '".$codePaimentInscription."'  ");
		$tab = $req->fetch(); 
		return $tab ; 
	}
	
	
	
	function addPaimentInscription($e){
		$cnx = new PDO('mysql:host=localhost;dbname=garderie', 'root', '');
		$req = $cnx->exec(" INSERT INTO  `paimentInscription` ( `codePaimentInscription`,  `inscription_code` , `datePaimentInscription`, `montantPaimentInscription`, `moisPaimentInscription`) 
    VALUES ('".$e->getCodePaimentInscription()."', '".$e->getInscription_code()."', '".$e->getDatePaimentInscription()."',  '".$e->getMontantPaimentInscription()."', '".$e->getMoisPaimentInscription()."') "); 
		return $req ; 
	}
	
	
}


?>