<?php

class Eleve {
	
	protected $code ; 
	protected $nom ; 
	protected $prenom ; 
	protected $dateNaissance ;
    protected $parentCin ;

	protected $etatSante ;
	protected $ecole ;
	protected $matieres ;
	 
	
	// setters and getters
		public function getCode(){
		return $this->code;
	}

	public function setCode($code){
		$this->code = $code;
	}

	public function getNom(){
		return $this->nom;
	}

	public function setNom($nom){
		$this->nom = $nom;
	}

	public function getPrenom(){
		return $this->prenom;
	}

	public function setPrenom($prenom){
		$this->prenom = $prenom;
	}

	public function getDateNaissance(){
		return $this->dateNaissance;
	}

	public function setDateNaissance($dateNaissance){
		$this->dateNaissance = $dateNaissance;
	}

	public function getParentCin(){
		return $this->parentCin;
	}

	public function setParentCin($parentCin){
		$this->parentCin = $parentCin;
	}

	public function getEtatSante(){
		return $this->etatSante;
	}

	public function setEtatSante($etatSante){
		$this->etatSante = $etatSante;
	}

	public function getEcole(){
		return $this->ecole;
	}

	public function setEcole($ecole){
		$this->ecole = $ecole;
	}

	public function getMatieres(){
		return $this->matieres;
	}

	public function setMatieres($matieres){
		$this->matieres = $matieres;
	}
	
		
	// fonctions 
	function getAllEleve(){
		$cnx = new PDO('mysql:host=localhost;dbname=garderie', 'root', '');
		$req = $cnx->query("SELECT * FROM eleve, parent where eleve.parentCin = parent.cinParent");
		$tab = $req->fetchALL(); 
		return $tab ; 
	}
	
	function getEleveByCode($code){
		$cnx = new PDO('mysql:host=localhost;dbname=garderie', 'root', '');
		$req = $cnx->query("SELECT * FROM eleve where code=  '".$code."'  ");
		$tab = $req->fetch(); 
		return $tab ; 
	}
	
	function deleteEleve($code){
		$cnx = new PDO('mysql:host=localhost;dbname=garderie', 'root', '');
		$req = $cnx->exec("DELETE   FROM eleve where code =  '".$code."'  "); 
		return $req ; 
	}
	
	function addEleve($e){
		$cnx = new PDO('mysql:host=localhost;dbname=garderie', 'root', '');
		$req = $cnx->exec(" INSERT INTO  `eleve` ( `code`,`nom`, `prenom`, `dateNaissance`,  `parentCin`, `etatSante`, `ecole`, `matieres`) 
					VALUES ('".$e->getCode()."','".$e->getNom()."', '".$e->getPrenom()."', '".$e->getDateNaissance()."', '".$e->getParentCin()."', '".$e->getEtatSante()."', '".$e->getEcole()."', '".$e->getMatieres()."') "); 
		return $req ; 
	}
	
	function editEleve($e){
		$cnx = new PDO('mysql:host=localhost;dbname=garderie', 'root', '');
		$req = $cnx->exec("  UPDATE `garderie`.`eleve` SET 
							
							`etatSante` = '".$e->getEtatSante()."', 
							`matieres` = '".$e->getMatieres()."', 
							`ecole` = '".$e->getEcole()."' 
							  
							WHERE `eleve`.`code` = '".$e->getCode()."' "); 
		return $req ; 
	}
}


?>