<?php

class Admin {
	
	protected $id; 
	protected $nom ; 
	protected $prenom ;
	protected $login ;
    protected $motPasse ;
	

	 
	
	// setters and getters
	function getId() {
       return $this->id;
    } 
	function setId($id) {
        $this->id= $id;
    }
	function getNom() {
       return $this->nom;
    } 
	function setNom($nom) {
        $this->nom = $nom;
    }	
	function getPrenom() {
       return $this->prenom;
    } 
	function setPrenom($prenom) {
        $this->prenom = $prenom;
    }	
	function getMotPasse() {
       return $this->motPasse;
    } 
	function setMotPasse($motPasse) {
        $this->motPasse = $motPasse;
    }	
	function getLogin() {
       return $this->login;
    } 
	function setLogin($login) {
        $this->login = $login;
    }
	
		
	// fonctions 
	function connexionAdmin($login,$motPasse){
		$cnx = new PDO('mysql:host=localhost;dbname=garderie', 'root', '');
		$req = $cnx->query("SELECT * FROM admin where login=  '".$login."' and  motPasse= '".$motPasse."'" );
		$tab = $req->fetch(); 
		return $tab ; 
	}
	
	
	
	
	
	
}


?>