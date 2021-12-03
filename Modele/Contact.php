<?php
 class Contact {
     
	protected $codeMessage ; 
	protected $dateEnvoie ;
	protected $sujetMessage ;
	protected $contenuMessage ;
	protected $parent_code;
	
	
	
	public function getCodeMessage(){
		return $this->codeMessage;
	}

	public function setCodeMessage($codeMessage){
		$this->codeMessage = $codeMessage;
	}

	public function getDateEnvoie(){
		return $this->dateEnvoie;
	}

	public function setDateEnvoie($dateEnvoie){
		$this->dateEnvoie = $dateEnvoie;
	}

	public function getSujetMessage(){
		return $this->sujetMessage;
	}

	public function setSujetMessage($sujetMessage){
		$this->sujetMessage = $sujetMessage;
	}

	public function getContenuMessage(){
		return $this->contenuMessage;
	}

	public function setContenuMessage($contenuMessage){
		$this->contenuMessage = $contenuMessage;
	}

	public function getParent_code(){
		return $this->parent_code;
	}

	public function setParent_code($parent_code){
		$this->parent_code = $parent_code;
	}
	
	function getAllMessages(){
		$cnx = new PDO('mysql:host=localhost;dbname=garderie', 'root', '');
		$req = $cnx->query("SELECT * FROM contact, parent
						where parent.cinParent = contact.parent_code
						and   contact.dateEnvoie = date(now())");
		$tab = $req->fetchALL(); 
		return $tab ; 
	}
	
	function getNBRMessages(){
		$cnx = new PDO('mysql:host=localhost;dbname=garderie', 'root', '');
		$req = $cnx->query("SELECT count(*) as nbrM FROM contact where dateEnvoie = date(now())");
		$tab = $req->fetch(); 
		return $tab ; 
	}
	
}	

?>