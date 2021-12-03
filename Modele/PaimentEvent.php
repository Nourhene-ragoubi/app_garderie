<?php

class PaimentEvent{
		protected $codePaimentEvent; 
		protected $inscriptionEvent_code; 
		protected $datePaimentEvent; 
	    protected $montantPaimentEvent;
	    
	

	 
	
	
	
	
	
	// setters and getters
	function getCodePaimentEvent() {
       return $this->codePaimentEvent;
    } 
	function setcodePaimentEvent($codePaimentEvent) {
        $this->codePaimentEvent= $codePaimentEvent;
    }
	
	
	function getInscriptionEvent_code() {
       return $this->inscriptionEvent_code;
    } 
	function setInscriptionEvent_code($inscriptionEvent_code) {
        $this->inscriptionEvent_code= $inscriptionEvent_code;
    }
	function getDatePaimentEvent() {
       return $this->datePaimentEvent;
    } 
	function setDatePaimentEvent($datePaimentEvent) {
        $this->datePaimentEvent= $datePaimentEvent;
    }
	
	
	function getMontantPaimentEvent() {
       return $this->montantPaimentEvent;
    } 
	function setMontantPaimentEvent($montantPaimentEvent) {
        $this->montantPaimentEvent= $montantPaimentEvent;
    }
	
	
		
	// fonctions 
	function getAllPaimentEvent(){
		$cnx = new PDO('mysql:host=localhost;dbname=garderie', 'root', '');
		$req = $cnx->query("SELECT * FROM paimentEvent ,eleve,inscriptionEvent, evenement
		 
          where paimentEvent.inscriptionEvent_code=inscriptionEvent.codeInscriptionEvent 
          and inscriptionEvent.eleve_code=eleve.code
          and inscriptionEvent.evenement_code=evenement.codeEvenement");
		$tab = $req->fetchALL(); 
		return $tab ; 
	}
	
	function getInfoPaiementEvent($codePaimentEvent){
		$cnx = new PDO('mysql:host=localhost;dbname=garderie', 'root', '');
		$req = $cnx->query("SELECT * FROM paimentEvent ,eleve,inscriptionEvent, evenement
		  where paimentEvent.inscriptionEvent_code=inscriptionEvent.codeInscriptionEvent 
          and inscriptionEvent.eleve_code=eleve.code
          and inscriptionEvent.evenement_code=evenement.codeEvenement
		  and paimentEvent.codePaimentEvent=  '".$codePaimentEvent."'  ");
		$tab = $req->fetch(); 
		return $tab ; 
	}
	
	
	function addPaimentEvent($e){
		$cnx = new PDO('mysql:host=localhost;dbname=garderie', 'root', '');
		$req = $cnx->exec(" INSERT INTO  `paimentEvent` ( `codePaimentEvent`,  `inscriptionEvent_code` , `datePaimentEvent`, `montantpaimentEvent`) 
    VALUES ('".$e->getCodePaimentEvent()."', '".$e->getInscriptionEvent_code()."', '".$e->getDatePaimentEvent()."',  '".$e->getMontantPaimentEvent()."') "); 
		return $req ; 
	}
	function deletePaimentEvent($codePaimentEvent){
		$cnx = new PDO('mysql:host=localhost;dbname=garderie', 'root', '');
		$req = $cnx->exec("DELETE   FROM paimentEvent where
		codePaimentEvent =  '".$codePaimentEvent."'  "); 
		return $req ; 
	}
	
	
}


?>