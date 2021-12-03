<?php

class Parentt {
     
	protected $cinParent ; 
	protected $nomParent ; 
	protected $prenomParent ; 
	protected $emailParent ;
    protected $telephoneParent;
	protected $adresseParent;
	protected $fonctionPere;
	protected $fonctionMere;
	protected $telephoneMere;
	protected $nomMere;
	protected $prenomMere;

	 
	
	// setters and getters
		

	public function getCinParent(){
		return $this->cinParent;
	}

	public function setCinParent($cinParent){
		$this->cinParent = $cinParent;
	}

	public function getNomParent(){
		return $this->nomParent;
	}

	public function setNomParent($nomParent){
		$this->nomParent = $nomParent;
	}

	public function getPrenomParent(){
		return $this->prenomParent;
	}

	public function setPrenomParent($prenomParent){
		$this->prenomParent = $prenomParent;
	}

	public function getEmailParent(){
		return $this->emailParent;
	}

	public function setEmailParent($emailParent){
		$this->emailParent = $emailParent;
	}

	public function getTelephoneParent(){
		return $this->telephoneParent;
	}

	public function setTelephoneParent($telephoneParent){
		$this->telephoneParent = $telephoneParent;
	}

	public function getAdresseParent(){
		return $this->adresseParent;
	}

	public function setAdresseParent($adresseParent){
		$this->adresseParent = $adresseParent;
	}

	public function getFonctionPere(){
		return $this->fonctionPere;
	}

	public function setFonctionPere($fonctionPere){
		$this->fonctionPere = $fonctionPere;
	}

	public function getFonctionMere(){
		return $this->fonctionMere;
	}

	public function setFonctionMere($fonctionMere){
		$this->fonctionMere = $fonctionMere;
	}

	public function getTelephoneMere(){
		return $this->telephoneMere;
	}

	public function setTelephoneMere($telephoneMere){
		$this->telephoneMere = $telephoneMere;
	}

	public function getNomMere(){
		return $this->nomMere;
	}

	public function setNomMere($nomMere){
		$this->nomMere = $nomMere;
	}

	public function getPrenomMere(){
		return $this->prenomMere;
	}

	public function setPrenomMere($prenomMere){
		$this->prenomMere = $prenomMere;
	}
	// fonctions 
	function getAllParent(){
		$cnx = new PDO('mysql:host=localhost;dbname=garderie', 'root', '');
		$req = $cnx->query("SELECT * FROM parent");
		$tab = $req->fetchALL(); 
		return $tab ; 
	}
	
	function getParentByCinParent($cinParent){
		$cnx = new PDO('mysql:host=localhost;dbname=garderie', 'root', '');
		$req = $cnx->query("SELECT * FROM parent where cinParent=  '".$cinParent."'  ");
		$tab = $req->fetch(); 
		return $tab ; 
	}
	
	function deleteParent($cinParent){
		$cnx = new PDO('mysql:host=localhost;dbname=garderie', 'root', '');
		$req = $cnx->exec("DELETE   FROM parent where cinParent =  '".$cinParent."'  "); 
		return $req ; 
	}
	
	function addParent($e){
		$cnx = new PDO('mysql:host=localhost;dbname=garderie', 'root', '');
		$req = $cnx->exec(" INSERT INTO  `parent` (`cinParent`, `nomParent`, `prenomParent`, `emailParent`,  `telephoneParent`, `adresseParent`,
		`fonctionMere`, `fonctionPere`, `nomMere`, `prenomMere`, `telephoneMere`) 
		VALUES ('".$e->getCinParent()."', '".$e->getNomParent()."', '".$e->getPrenomParent()."', '".$e->getEmailParent()."', '".$e->getTelephoneParent()."', '".$e->getAdresseParent()."', '".$e->getFonctionMere()."', '".$e->getFonctionPere()."', '".$e->getNomMere()."', '".$e->getPrenomMere()."', '".$e->getTelephoneMere()."') "); 
		return $req ; 
	}
	
	function editParent($e){
		$cnx = new PDO('mysql:host=localhost;dbname=garderie', 'root', '');
		$req = $cnx->exec("  UPDATE `garderie`.`parent` SET 
		                    
							`emailParent` = '".$e->getEmailParent()."', 
							`telephoneParent` = '".$e->getTelephoneParent()."',
`telephoneMere` = '".$e->getTelephoneMere()."',
`fonctionMere` = '".$e->getFonctionMere()."',
`fonctionPere` = '".$e->getFonctionPere()."',
						
						
							
							`adresseParent` = '".$e->getAdresseParent()."' 
							WHERE `parent`.`cinParent` = '".$e->getCinParent()."' "); 
		return $req ; 
	}
}


?>