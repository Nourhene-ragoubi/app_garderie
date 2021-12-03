<?php

class Classe {
	
	protected $niveau ; 
	protected $enseignant_cin; 
	

	 
	
	// setters and getters
	function getNiveau() {
       return $this->niveau;
    } 
	function setNiveau($niveau) {
        $this->niveau= $niveau;
    }
	function getEnseignant_cin() {
       return $this->enseignant_cin;
    } 
	function setEnseignant_cin($enseignant_cin) {
        $this->enseignant_cin = $enseignant_cin;
    }	
	
		
	// fonctions 
	function getAllClasse(){
		$cnx = new PDO('mysql:host=localhost;dbname=garderie', 'root', '');
		$req = $cnx->query("SELECT * FROM classe, enseignant where classe.enseignant_cin = enseignant.cinEnseignant");
		$tab = $req->fetchALL(); 
		return $tab ; 
	}
	
	function getClasseByNiveau($niveau){
		$cnx = new PDO('mysql:host=localhost;dbname=garderie', 'root', '');
		$req = $cnx->query("SELECT * FROM classe where niveau=  '".$niveau."'  ");
		$tab = $req->fetch(); 
		return $tab ; 
	}
	
	function deleteClasse($niveau){
		$cnx = new PDO('mysql:host=localhost;dbname=garderie', 'root', '');
		$req = $cnx->exec("DELETE   FROM classe where niveau =  '".$niveau."'  "); 
		return $req ; 
	}
	
	function addClasse($e){
		$cnx = new PDO('mysql:host=localhost;dbname=garderie', 'root', '');
		$req = $cnx->exec(" INSERT INTO  `classe` ( `niveau`, `enseignant_cin`) 
					VALUES ('".$e->getNiveau()."', '".$e->getEnseignant_cin()."') "); 
		return $req ; 
	}
	
	function editClasse($e){
		$cnx = new PDO('mysql:host=localhost;dbname=garderie', 'root', '');
		$req = $cnx->exec("  UPDATE `garderie`.`classe` SET 
							`niveau` = '".$e->getNiveau()."', 
							`enseignant_cin` = '".$e->getEnseignant_cin()."' 
							
							WHERE `classe`.`niveau` = '".$e->getNiveau()."' "); 
		return $req ; 
	}
}


?>