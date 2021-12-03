<?php

class Activite {
	
	protected $codeActivite ; 
	protected $nomActivite ; 
	protected $descriptionActivite ; 
	
    protected $club_code;
	

	 
	
	// setters and getters
	
	function getcodeActivite() {
       return $this->codeActivite;
    } 
	function setCodeActivite($codeActivite) {
        $this->codeActivite= $codeActivite;
    }
	function getNomActivite() {
       return $this->nomActivite;
    } 
	function setNomActivite($nomActivite) {
        $this->nomActivite = $nomActivite;
    }	
	function getDescriptionActivite() {
       return $this->descriptionActivite;
    } 
	function setDescriptionActivite($descriptionActivite) {
        $this->descriptionActivite = $descriptionActivite;
    }	
	
	function getClub_code() {
       return $this->club_code;
    } 
	function setClub_code($club_code) {
        $this->club_code = $club_code;
    }
	
	// fonctions 
	function getAllActivite(){
		$cnx = new PDO('mysql:host=localhost;dbname=garderie', 'root', '');
		$req = $cnx->query("SELECT * FROM activite, club where activite.club_code = club.codeClub");
		$tab = $req->fetchALL(); 
		return $tab ; 
	}
	
	function getActiviteByCodeActivite($codeActivite){
		$cnx = new PDO('mysql:host=localhost;dbname=garderie', 'root', '');
		$req = $cnx->query("SELECT * FROM Activite where codeActivite=  '".$codeActivite."'  ");
		$tab = $req->fetch(); 
		return $tab ; 
	}
	
	function getActiviteByNomActivite($nomActivite){
		$cnx = new PDO('mysql:host=localhost;dbname=garderie', 'root', '');
		$req = $cnx->query("SELECT * FROM Activite where nomActivite=  '".$nomActivite."'  ");
		$tab = $req->fetch(); 
		return $tab ; 
	}
	
	function deleteActivite($codeActivite){
		$cnx = new PDO('mysql:host=localhost;dbname=garderie', 'root', '');
		$req = $cnx->exec("DELETE   FROM Activite where codeActivite =  '".$codeActivite."'  "); 
		return $req ; 
	}
	
	function addActivite($e){
		$cnx = new PDO('mysql:host=localhost;dbname=garderie', 'root', '');
		$req = $cnx->exec(" INSERT INTO  `Activite` ( `nomActivite`, `descriptionActivite`,   `club_code`) 
					VALUES ('".$e->getNomActivite()."', '".$e->getDescriptionActivite()."',  '".$e->getClub_code()."') "); 
		return $req ; 
	}
	
	function editActivite($e){
		$cnx = new PDO('mysql:host=localhost;dbname=garderie', 'root', '');
		$req = $cnx->exec("  UPDATE `garderie`.`activite` SET 
							`nomActivite` = '".$e->getNomActivite()."', 
							`descriptionActivite` = '".$e->getDescriptionActivite()."', 
							 
						
							
							`club_code` = '".$e->getClub_code()."' 
							WHERE `Activite`.`codeActivite` = '".$e->getCodeActivite()."' "); 
		return $req ; 
	}
}


?>