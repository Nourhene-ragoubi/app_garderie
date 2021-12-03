
<?php
session_start();
include('Modele/admin.php');
$a = new Admin();
// recuperation
$mail = $_POST['email']; 
$pass = $_POST['password'];
$res = $a->connexionAdmin($mail, $pass); 
if($res){
	$_SESSION['codeA'] = $res['id'] ;
	$_SESSION['nomA'] = $res['nom'].' '.$res['prenom'] ;	
	header('Location:menuPrincipale.php');
}else {
	header('Location:login.php?erreur=1');
}
?>





