<?php

class Inscription{
		protected $codeInscription; 
	    protected $anneeScolaire ; 
		 protected $montantInscription ; 
	 
	   protected $eleve_code ; 
       protected $classe_niveau ;
	

	 
	
	// setters and getters
	function getCodeInscription() {
       return $this->codeInscription;
    } 
	function setCodeInscription($codeInscription) {
        $this->codeInscription= $codeInscription;
    }
	function getMontantInscription() {
       return $this->montantInscription;
    } 
	function setMontantInscription($montantInscription) {
        $this->montantInscription= $montantInscription;
    }
	function getAnneeScolaire() {
       return $this->anneeScolaire;
    } 
	function setAnneeScolaire($anneeScolaire) {
        $this->anneeScolaire= $anneeScolaire;
    }
	function getClasse_niveau() {
       return $this->classe_niveau;
    } 
	function setClasse_niveau($classe_niveau) {
        $this->classe_niveau = $classe_niveau;
    }	
	function getEleve_code() {
       return $this->eleve_code;
    } 
	function setEleve_code($eleve_code) {
        $this->eleve_code = $eleve_code;
    }	
	
	
		
	// fonctions 
	function getAllInscription(){
		$cnx = new PDO('mysql:host=localhost;dbname=garderie', 'root', '');
		$req = $cnx->query("SELECT * FROM inscription, eleve , classe
		where inscription.eleve_code= eleve.code 
		and inscription.classe_niveau=classe.niveau");
		$tab = $req->fetchALL(); 
		return $tab ; 
	}
	function getInscriptionByClasseEleve($classe, $eleve){
		$cnx = new PDO('mysql:host=localhost;dbname=garderie', 'root', '');
		$req = $cnx->query("SELECT distinct codeInscription FROM inscription
		where inscription.eleve_code= '".$eleve."' 
		and inscription.classe_niveau= '".$classe."' ");
		$tab = $req->fetch(); 
		return $tab ; 
	}
	function getInscriptionByClasseElevee($eleve_code,$classe_niveau){
		$cnx = new PDO('mysql:host=localhost;dbname=garderie', 'root', '');
		$req = $cnx->query("SELECT distinct codeInscription FROM inscription
		where inscription.eleve_code= '".$eleve_code."' 
		and inscription.classe_niveau= '".$classe_niveau."' ");
		$tab = $req->fetch(); 
		return $tab ; 
	}
	function getLastInscription(){
		$cnx = new PDO('mysql:host=localhost;dbname=garderie', 'root', '');
		$req = $cnx->query("SELECT * FROM inscription, eleve , classe 
			where inscription.eleve_code= eleve.code 
			and inscription.classe_niveau=classe.niveau
			ORDER BY codeInscription DESC LIMIT 1");
		$tab = $req->fetch(); 
		return $tab ; 
	}
	
	function getInscriptionByCodeInscription($codeInscription){
		$cnx = new PDO('mysql:host=localhost;dbname=garderie', 'root', '');
		$req = $cnx->query("SELECT * FROM inscription where codeInscription=  '".$codeInscription."'  ");
		$tab = $req->fetch(); 
		return $tab ; 
	}
	
	function deleteInscription($codeInscription){
		$cnx = new PDO('mysql:host=localhost;dbname=garderie', 'root', '');
		$req = $cnx->exec("DELETE   FROM inscription where codeInscription =  '".$codeInscription."'  "); 
		return $req ; 
	}
	
	function addInscription($e){
		$cnx = new PDO('mysql:host=localhost;dbname=garderie', 'root', '');
		$req = $cnx->exec("  INSERT INTO  `inscription` (`anneeScolaire`, `eleve_code`, `classe_niveau`, `montantInscription`) 
		VALUES ('".$e->getAnneeScolaire()."', '".$e->getEleve_code()."', '".$e->getClasse_niveau()."', '".$e->getMontantInscription()."') "); 
		return $req ; 
	}
 
}


?>