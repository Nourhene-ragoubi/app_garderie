<!doctype html>
<html lang="en" dir="ltr">
  
<!-- Mirrored from www.spruko.com/demo/adminor/Leftmenu-Icon-LightSidebar/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 02 Mar 2019 11:44:57 GMT -->
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
		<link rel="icon" href="https://www.spruko.com/demo/adminor/favicon.ico" type="image/x-icon"/>
		<link rel="shortcut icon" type="image/x-icon" href="https://www.spruko.com/demo/adminor/favicon.ico" />

		<!-- Title -->
		<title>login</title>
		<link rel="stylesheet" href="assets/fonts/fonts/font-awesome.min.css">

		<!-- Font Family -->
		<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">

		<!-- Sidemenu Css -->
		<link href="assets/plugins/toggle-sidebar/sidemenu.css" rel="stylesheet" />

		<!-- Dashboard Css -->
		<link href="assets/css/left-menu.css" rel="stylesheet" />

		<!-- c3.js Charts Plugin -->
		<link href="assets/plugins/charts-c3/c3-chart.css" rel="stylesheet" />

		<!-- Custom scroll bar css-->
		<link href="assets/plugins/scroll-bar/jquery.mCustomScrollbar.css" rel="stylesheet" />

		<!---Font icons-->
		<link href="assets/css/icons.css" rel="stylesheet" />

	</head>
	<body>
		<div  class="login-img">
			<div id="global-loader"></div>
			<div class="page">
				<div class="page-single">
					<div class="container">
						<div class="row authentication">
							<div class="col col-login mx-auto">
								
								<form class="card"action="verifUser.php" method="post">
								<?php  if(isset($_GET['erreur']) & $_GET['erreur']=='1'){ ?>
										<div class="alert alert-danger" role="alert">
											Erreur !  verifier vos coordonnées
											<button class="close" aria-label="Close" type="button" data-dismiss="alert">
												<span aria-hidden="true">×</span>
											</button>
										</div>
						<?php } ?>
									<div class="card-body p-6 ">
										<div class="card-title text-center">veuillez saisir votre login et mot de passe</div>
										<div class="input-icon form-group wrap-input">
											<span class="input-icon-addon search-icon">
												<i class="mdi mdi-account"></i>
											</span>
											<input type="text" class="form-control" name="email" placeholder="Email"required >
										</div>
										<div class="input-icon form-group wrap-input">
											<span class="input-icon-addon search-icon">
												<i class="zmdi zmdi-lock"></i>
											</span>
											<input type="password" class="form-control mb-0" name="password"id="exampleInputPassword1" placeholder="motPasse"required>
											
										</div>
										<div class="form-group mt-5">
											<label class="custom-control custom-checkbox">
												<input type="checkbox" class="custom-control-input" />
												
											</label>
										</div>
										<div class="form-footer">
											<button type="submit" class="btn btn-primary btn-block">Se Connecter</button>
										</div>
										
										<div class="flex-c-m text-center mt-5">
											

											

											
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Dashboard js -->
		<script src="assets/js/vendors/jquery-3.2.1.min.js"></script>
		<script src="assets/js/vendors/bootstrap.bundle.min.js"></script>
		<script src="assets/js/vendors/jquery.sparkline.min.js"></script>
		<script src="assets/js/vendors/selectize.min.js"></script>
		<script src="assets/js/vendors/jquery.tablesorter.min.js"></script>
		<script src="assets/js/vendors/circle-progress.min.js"></script>
		<script src="assets/plugins/rating/jquery.rating-stars.js"></script>

		<!-- Fullside-menu Js-->
		<script src="assets/plugins/toggle-sidebar/sidemenu.js"></script>


		<!-- Custom scroll bar Js-->
		<script src="assets/plugins/scroll-bar/jquery.mCustomScrollbar.concat.min.js"></script>

		<!-- Custom Js-->
		<script src="assets/js/custom.js"></script>
	</body>

<!-- Mirrored from www.spruko.com/demo/adminor/Leftmenu-Icon-LightSidebar/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 02 Mar 2019 11:44:57 GMT -->
</html>
