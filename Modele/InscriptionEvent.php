<?php

class InscriptionEvent{
	   protected $codeInscriptionEvent; 
	 
	   protected $evenement_code ; 
	   protected $eleve_code ; 
	   protected $dateInscriptionEvent ; 
     
	

	 
	
	// setters and getters
	function getCodeInscriptionEvent() {
       return $this->codeInscriptionEvent;
    } 
	function setCodeInscriptionEvent($codeInscriptionEvent) {
        $this->codeInscriptionEvent= $codeInscriptionEvent;
    }
	function getEvenement_code() {
       return $this->evenement_code;
    } 
	function setEvenement_code($evenement_code) {
        $this->evenement_code= $evenement_code;
    }
	function getEleve_code() {
       return $this->eleve_code;
    } 
	function setEleve_code($eleve_code) {
        $this->eleve_code = $eleve_code;
    }	
	function getDateInscriptionEvent() {
       return $this->dateInscriptionEvent;
    } 
	function setDateInscriptionEvent($dateInscriptionEvent) {
        $this->dateInscriptionEvent = $dateInscriptionEvent;
    }	
	
	
		
	// fonctions 
	function getAllInscriptionEvent(){
		$cnx = new PDO('mysql:host=localhost;dbname=garderie', 'root', '');
		$req = $cnx->query("SELECT * FROM inscriptionevent, eleve , evenement where inscriptionEvent.evenement_code= codeEvenement and inscriptionEvent.eleve_code=code");
		$tab = $req->fetchALL(); 
		return $tab ; 
	}
	function getInscriptionEventByEvenementEleve($evenement, $eleve){
		$cnx = new PDO('mysql:host=localhost;dbname=garderie', 'root', '');
		$req = $cnx->query("SELECT distinct codeInscriptionEvent FROM inscriptionEvent  where inscriptionEvent.eleve_code= '".$eleve."' and inscriptionEvent.evenement_code= '".$evenement."' ");
		$tab = $req->fetch(); 
		return $tab ; 
	}
	function getInscriptionEventByEvenementElevee($eleve_code, $evenement_code){
		$cnx = new PDO('mysql:host=localhost;dbname=garderie', 'root', '');
		$req = $cnx->query("SELECT distinct codeInscriptionEvent FROM inscriptionEvent 
		where inscriptionEvent.eleve_code= '".$eleve_code."' 
		and inscriptionEvent.evenement_code= '".$evenement_code."' ");
		$tab = $req->fetch(); 
		return $tab ; 
	}
	function getLastInscriptionEvent(){
		$cnx = new PDO('mysql:host=localhost;dbname=garderie', 'root', '');
		$req = $cnx->query("SELECT * FROM inscriptionEvent, eleve , evenement 
			where inscriptionEvent.eleve_code= eleve.code 
			and inscriptionEvent.evenement_code=evenement.codeEvenement
			ORDER BY codeEvenement DESC LIMIT 1");
		$tab = $req->fetch(); 
		return $tab ; 
	}
	
	function getInscriptionByCodeInscriptionEvent($codeInscriptionEvent){
		$cnx = new PDO('mysql:host=localhost;dbname=garderie', 'root', '');
		$req = $cnx->query("SELECT * FROM inscriptionevent where codeInscriptionEvent=  '".$codeInscriptionEvent."'  ");
		$tab = $req->fetch(); 
		return $tab ; 
	}
	
	function deleteinscriptionEvent($codeInscriptionEvent){
		$cnx = new PDO('mysql:host=localhost;dbname=garderie', 'root', '');
		$req = $cnx->exec("DELETE   FROM inscriptionevent where codeInscriptionEvent =  '".$codeInscriptionEvent."'  "); 
		return $req ; 
	}
	
	function addInscriptionEvent($e){
		$cnx = new PDO('mysql:host=localhost;dbname=garderie', 'root', '');
		$req = $cnx->exec(" INSERT INTO  `inscriptionevent` ( `codeInscriptionEvent`, `evenement_code`, `eleve_code`,  `dateInscriptionEvent`) 
					VALUES ('".$e->getCodeInscriptionEvent()."', '".$e->getEvenement_code()."', '".$e->getEleve_code()."', '".$e->getDateInscriptionEvent()."') "); 
		return $req ; 
	}
	
	function editEleve($e){
		$cnx = new PDO('mysql:host=localhost;dbname=garderie', 'root', '');
		$req = $cnx->exec("  UPDATE `garderie`.`inscriptionevent` SET 
							
							
							
							`dateInscriptionEvent` = '".$e->getdateInscriptionEvent()."' 
							WHERE `inscriptionEvent`.`codeInscriptionEvent` = '".$e->getCodeInscriptionEvent()."' "); 
		return $req ; 
	}
}


?>