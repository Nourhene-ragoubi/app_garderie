<?php
session_start();
if(!(isset($_SESSION['codeA']))){
	header('Location:login.php');
}
include('Modele/Contact.php');
$c = new Contact();
$nbr= $c->getNBRMessages();
$tabM = $c->getAllMessages();
?>

<!doctype html>
<html lang="en" dir="ltr">
	
<!-- Mirrored from www.spruko.com/demo/adminor/Leftmenu-Icon-LightSidebar/empty.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 02 Mar 2019 11:45:52 GMT -->
<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="msapplication-TileColor" content="#0061da">
		<meta name="theme-color" content="#1643a3">
		<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"/>
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="mobile-web-app-capable" content="yes">
		<meta name="HandheldFriendly" content="True">
		<meta name="MobileOptimized" content="320">
		<link rel="icon" href="https://www.spruko.com/demo/
		
		
		/favicon.ico" type="image/x-icon"/>
		<link rel="shortcut icon" type="image/x-icon" href="https://www.spruko.com/demo//favicon.ico" />

		<!-- Title -->
		<title>Menu principale</title>
		<link rel="stylesheet" href="assets/fonts/fonts/font-awesome.min.css">

		<!-- Font family -->
		<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">

		<!-- Sidemenu Css -->
		<link href="assets/plugins/toggle-sidebar/sidemenu.css" rel="stylesheet" />

		<!-- Dashboard Css -->
		<link href="assets/css/left-menu.css" rel="stylesheet" />

		<!-- c3.js Charts Plugin -->
		<link href="assets/plugins/charts-c3/c3-chart.css" rel="stylesheet" />
		
		<!-- Data table css -->
		<link href="assets/plugins/datatable/dataTables.bootstrap4.min.css" rel="stylesheet" />

		
		<!-- Custom scroll bar css-->
		<link href="assets/plugins/scroll-bar/jquery.mCustomScrollbar.css" rel="stylesheet" />

		<!---Font icons-->
		<link href="assets/css/icons.css" rel="stylesheet" />

	</head>
	<body class="app sidebar-mini">
		<div id="global-loader" ></div>
		<div class="page" >
			<div class="page-main">
				<div class="app-header header py-1 d-flex">
					<div class="container-fluid">
						<div class="d-flex">
							<a class="header-brand" href="menuPrincipale.php">
								<img src="assets/images/kkkkkk.png" class="header-brand-img" alt="adminor logo">
							</a>
							<a aria-label="Hide Sidebar" class="app-sidebar__toggle" data-toggle="sidebar" href="#"></a>
							<div class="d-flex order-lg-2 ml-auto header-right-icons header-search-icon">
								<div class="p-2">
									<form class="input-icon ">
										<div class="input-icon-addon">
											<i class="fa fa-search"></i>
										</div>
										<input type="search" class="form-control header-search" placeholder="Search&hellip;" tabindex="1">
									</form>
								</div>

								<div class="dropdown d-none d-md-flex" >
									<a  class="nav-link icon full-screen-link nav-link-bg">
										<i class="fa fa-expand"  id="fullscreen-button"></i>
									</a>
								</div>

								<div class="dropdown d-none d-md-flex">
									<a class="nav-link icon" data-toggle="dropdown">
										
										
									</a>
									<div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
										
									
										
										<div class="dropdown-divider"></div>
										
									</div>
								</div>
								<div class="dropdown d-none d-md-flex">
									<a class="nav-link icon text-center" data-toggle="dropdown">
										<i class="icon icon-speech"></i>
										<span class=" nav-unread badge badge-info badge-pill"><?php echo $nbr['nbrM']; ?></span>
									</a>
									<div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
										<a href="#" class="dropdown-item text-center"></a>
										<div class="dropdown-divider"></div>
										<?php foreach($tabM as $m){ ?>
										<a href="#" class="dropdown-item d-flex pb-3">
											<span class="avatar brround mr-3 align-self-center cover-image" data-image-src="assets/images/faces/male/41.jpg"></span>
											<div>
												<strong><?php echo $m['nomParent']; ?></strong> : <?php echo $m['sujetMessage']; ?>
												<div class="small text-muted"><?php echo $m['dateEnvoie']; ?></div>
											</div>
										</a>
										<?php } ?>
										<div class="dropdown-divider"></div>
										<a href="listeMessages.php" class="dropdown-item text-center">Voir tous les messages</a>
									</div>
								</div>
								<div class="dropdown d-none d-md-flex ">
									
									<div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
										<ul class="drop-icon-wrap p-1">
											
											
										</ul>
										<div class="dropdown-divider"></div>
										<a href="#" class="dropdown-item text-center">View all</a>
									</div>
								</div>
								<div class="dropdown text-center selector">
									<a href="#" class="nav-link leading-none" data-toggle="dropdown">
										<span class="avatar avatar-sm brround cover-image" data-image-src="assets/images/faces/female/25.jpg"></span>
									</a>
									<div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow ">
										<div class="text-center">

											<p>
								<?php echo $_SESSION['nomA']; ?>
							</p>
											<span class="text-center user-semi-title text-dark">administrateur</span>
											<div class="dropdown-divider"></div>
										</div>
										
										
										
										
										<a class="dropdown-item" href="login.html">
										<a href="logout.php">	<i class="dropdown-icon mdi  mdi-logout-variant"></i> Déconnexion
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- Sidebar menu-->
				<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
				<aside class="app-sidebar">
					<div class="app-sidebar__user">
						<div class="dropdown user-pro-body">
							<div>
								<img src="assets/images/faces/female/25.jpg" alt="user-img" class="avatar avatar-md brround">
							</div>
							<div class="user-info">
								<div class="mb-2">
								<a href="#" class="" data-toggle="" aria-haspopup="true" aria-expanded="false"> <span class="font-weight-semibold text-white">Ragoubi Nourhene</span>  </a>
								<br><span class="text-gray">Administration</span>
								</div>
							</div>
						</div>
					</div>
					<ul class="side-menu">
					<li class="slide">
							<a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fa fa-desktop"></i><span class="side-menu__label">Gestion Parent</span><i class="angle fa fa-angle-right"></i></a>
							<ul class="slide-menu">
								<li><a class="slide-item" href="AjouterParent.php">Ajouter Parent</a></li>
								<li><a class="slide-item" href="ListParent.php">Liste Parent</a></li>
								<li><a class="slide-item" href="listeEleve.php">Liste Eleve</a></li>
								
							</ul>
						</li>
						
						<li class="slide">
							<a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fa fa-desktop"></i><span class="side-menu__label">Gestion Inscription</span><i class="angle fa fa-angle-right"></i></a>
							<ul class="slide-menu">
								<li><a class="slide-item" href="AjouterInscription.php">Ajouter Inscription</a></li>
								<li><a class="slide-item" href="ListInscription.php">List Inscription</a></li>
								<li><a class="slide-item" href="AjouterPaimentInscription.php">Ajouter Paiement Inscription</a></li>
								<li><a class="slide-item" href="ListInscriptionP.php">List Paiement Inscription</a></li>
								<li><a class="slide-item" href="ListEleveNonPaiment.php">Liste Eleve non Payée</a></li>
							</ul>
						</li>
						<li class="slide">
							<a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fa fa-desktop"></i><span class="side-menu__label">Gestion Club</span><i class="angle fa fa-angle-right"></i></a>
							<ul class="slide-menu">
								<li><a class="slide-item" href="AjouterClub.php">Ajouter Club</a></li>
								<li><a class="slide-item" href="ListClub.php">Liste Club</a></li>
								<li><a class="slide-item" href="ListActivite.php">Liste Activité</a></li>
								
								
							</ul>
						</li>
						
						<li class="slide">
							<a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fa fa-desktop"></i><span class="side-menu__label">Gestion Adhésion</span><i class="angle fa fa-angle-right"></i></a>
							<ul class="slide-menu">
								<li><a class="slide-item" href="AjouterAdhesion.php">Ajouter Adhésion</a></li>
								<li><a class="slide-item" href="ListAdhesion.php">Liste Adhésion</a></li>
								<li><a class="slide-item" href="ListAdhesionP.php">Liste Paiement Adhésion</a></li>
								
								
							</ul>
						</li>
						<li class="slide">
							<a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fa fa-desktop"></i><span class="side-menu__label">Gestion Enseignant</span><i class="angle fa fa-angle-right"></i></a>
							<ul class="slide-menu">
								<li><a class="slide-item" href="AjouterEnseignant.php">Ajouter Enseignant</a></li>
								<li><a class="slide-item" href="listeEnseignant.php">Liste Enseignant</a></li>
								
								
							</ul>
						</li>
						<li class="slide">
							<a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fa fa-desktop"></i><span class="side-menu__label">Gestion Classe</span><i class="angle fa fa-angle-right"></i></a>
							<ul class="slide-menu">
								<li><a class="slide-item" href="AjouterClasse.php">Ajouter Classe</a></li>
								<li><a class="slide-item" href="ListClasse.php">Liste Classe</a></li>
								
								
							</ul>
						</li>
						
						<li class="slide">
							<a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fa fa-desktop"></i><span class="side-menu__label">Gestion Evénement</span><i class="angle fa fa-angle-right"></i></a>
							<ul class="slide-menu">
								<li><a class="slide-item" href="AjouterEvenement.php">Ajouter Evénement</a></li>
								<li><a class="slide-item" href="ListEvenement.php">Liste Evénement</a></li>
	
								
							</ul>
						</li>
						<li class="slide">
							<a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fa fa-desktop"></i><span class="side-menu__label">Inscription Evénement</span><i class="angle fa fa-angle-right"></i></a>
							<ul class="slide-menu">
								<li><a class="slide-item" href="AjouterInscriptionEvent.php">Ajouter Inscription Evénement</a></li>
								<li><a class="slide-item" href="ListInscriptionEvent.php">Liste Inscription Evénement</a></li>
									<li><a class="slide-item" href="ListEventP.php">Liste Paiement Evénement</a></li>
								
							</ul>
						</li>
						
						
						
						
						
					</ul>	
					
			</aside>
		


		

			