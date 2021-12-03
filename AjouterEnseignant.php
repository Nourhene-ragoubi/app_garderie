<?php include('Modele/Enseignant.php');
$e = new Enseignant();
$tab = $e->getAllEnseignant(); 
if(isset($_POST['action']) & $_POST['action']=='Valider' ){
$test = $e->getEnseignantByCinEnseignant($_POST['cinEnseignant']); 
if($test){
	header('Location:AjouterEnseignant.php?error=1');	
}else {
$e->setCinEnseignant($_POST['cinEnseignant']); 
$e->setNomEnseignant($_POST['nomEnseignant']); 
$e->setPrenomEnseignant($_POST['prenomEnseignant']); 
$e->setEmailEnseignant($_POST['emailEnseignant']); 
$e->setTelephoneEnseignant($_POST['telephoneEnseignant']); 
$e->setAdresseEnseignant($_POST['adresseEnseignant']); 
$res = $e->addEnseignant($e); 
if($res){
	header('Location:listeEnseignant.php?msg=1');
}
}
}
include("header.php");
?>
			<div class="app-content  my-3 my-md-5">
					<div class="side-app">
						<div class="page-header">
							<h4 class="page-title">Gestion Enseignant</h4>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#">Gestion Enseignant</a></li>
								<li class="breadcrumb-item active" aria-current="page">Ajouter Enseignant</li>
							</ol>
						</div>
						<div class="row row-deck">
							<div class="col-lg-12"> 
								<form   method="post" action="AjouterEnseignant.php" class="card">
									<div class="card-header">
										<h3 class="card-title">Ajouter Enseignant</h3>
									</div> 
									<div class="card-body" >
									<?php if(isset($_GET['error']) & $_GET['error']=='1') { ?>
											<div class="alert alert-danger" role="alert">
												<strong>Enseignant</strong>Existe déja .
											</div>
									<?php  } ?>
									
										<div class="form-group">
											<label class="form-label">Cin</label>
											<input type="text" class="form-control" pattern="[0-9]{8}" title="8 chiffres"name="cinEnseignant" placeholder="number">
										</div> 
										
										<div class="form-group">
											<label class="form-label">Nom</label>
											<input type="text" class="form-control" maxlength="30" title="le nom doit contenir uniquement des lettres" pattern="[A-Za-z]{3,}" name="nomEnseignant" placeholder="text" required>
										</div> 
										<div class="form-group">
											<label class="form-label">Prénom</label>
											<input type="text" class="form-control" maxlength="30" title="le prénom doit contenir uniquement des lettres" pattern="[A-Za-z]{3,}" name="prenomEnseignant" placeholder="text" required>
										</div>
										<div class="form-group">
											<label class="form-label">Email</label>
											<input type="email" class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="E-mail invalide, il doit contenir @ et . " name="emailEnseignant" placeholder="email">
										</div>
										<div class="form-group">
											<label class="form-label">Telephone</label>
											<input type="text" class="form-control"  pattern="[0-9]{8}" title="8 chiffres" name="telephoneEnseignant" placeholder="number">
										</div>
										<div class="form-group">
											<label class="form-label">Adresse</label>
											<input type="text" class="form-control" maxlength="50"   name="adresseEnseignant" placeholder="text">
										</div>
										

									

										

										
										<div class="box_footer">
											<button type="reset"   class="btn btn-primary ml-auto">Annuler</button>
											<button type="submit" name="action" value="Valider" class="btn btn-primary ml-auto"><i class="fa fa-check"></i>Valider</button>
										</div>
									
									
				
												</div>
											</div>
										</div>
									</div>
									
								</form>
							

<?php include("footer.php");; ?>
  