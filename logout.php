<?php
session_start();
unset($_SESSION['codeA']);
unset($_SESSION['nomA']);//supprimer le cariable nomA de la session
header('Location:login.php');

?>