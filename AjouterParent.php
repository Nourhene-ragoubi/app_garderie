<?php include('Modele/Parent.php');
$e = new Parentt();
$tab = $e->getAllParent(); 

if(isset($_POST['action']) & $_POST['action']=='Valider' ){
$test = $e->getParentByCinParent($_POST['cinParent']); 
if($test){
	header('Location:AjouterParent.php?error=1');	
}else {
$e->setCinParent($_POST['cinParent']); 
$e->setNomParent($_POST['nomParent']); 
$e->setPrenomParent($_POST['prenomParent']); 
$e->setEmailParent($_POST['emailParent']); 
$e->setTelephoneParent($_POST['telephoneParent']); 
$e->setAdresseParent($_POST['adresseParent']); 
$e->setFonctionPere($_POST['fonctionPere']); 
$e->setFonctionMere($_POST['fonctionMere']); 
$e->setTelephoneMere($_POST['telephoneMere']); 
$e->setNomMere($_POST['nomMere']); 
$e->setPrenomMere($_POST['prenomMere']); 
$res = $e->addParent($e); 
if($res){
	header('Location:AjoutEleve.php?nom='.$_POST['nomParent'].'&cinParent='.$_POST['cinParent']);
}
}
}
include("header.php");
?>
			<div class="app-content  my-3 my-md-5">
					<div class="side-app">
						<div class="page-header">
							<h4 class="page-title">Gestion Parent</h4>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#">Gestion Parent</a></li>
								<li class="breadcrumb-item active" aria-current="page">Ajouter Parent</li>
							</ol>
						</div>
						<div class="row row-deck">
							<div class="col-lg-12">
								<form   method="post"  action="AjouterParent.php" class="card" >
									<div class="card-header">
										<h3 class="card-title">Ajouter Parent</h3>
									</div>
									<div class="card-body" >
									<?php if(isset($_GET['error']) & $_GET['error']=='1') { ?>
											<div class="alert alert-danger" role="alert">
												<strong> Parent   </strong> <strong> existe déja.</strong>
											</div>
									<?php  } ?>
										<div class="form-group">
											<label class="form-label">Cin Pére/Mére</label>
											<input type="text" class="form-control"   pattern="[0-9]{8}" title="8 chiffres" name="cinParent"  required >
										</div> 
										
										<div class="form-group">
											<label class="form-label">Nom Pére</label>
											<input type="text" class="form-control" maxlength="25" title="le nom du père doit contenir uniquement des lettres" pattern="[A-Za-z]{3,}" name="nomParent" placeholder="text" required>
										
										</div> 
										<div class="form-group">
											<label class="form-label">Prénom Pére</label>
											<input type="text" class="form-control" maxlength="30" title="le prénom du père doit contenir uniquement des lettres" pattern="[A-Za-z]{3,}" name="prenomParent" placeholder="text" required>
										</div>
										<div class="form-group">
											<label class="form-label">Email Pére/Mére</label>
											<input type="email" class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="E-mail invalide, il doit contenir @ et . " name="emailParent" placeholder="email" required>
										</div>
										<div class="form-group">
											<label class="form-label">Téléphone Pere</label>
											<input type="text" class="form-control" pattern="[0-9]{8}" title="8 chiffres" name="telephoneParent" placeholder="number" required>
										</div>
										<div class="form-group">
											<label class="form-label">Adresse</label>
											<input type="text" class="form-control" maxlength="40" name="adresseParent" placeholder="text" required>
										</div>
										
										
										<div class="form-group">
											<label class="form-label">Fonction Mére</label>
											<input type="text" class="form-control" maxlength="30" title="le fonction du mére doit contenir uniquement des lettres" pattern="[A-Za-z]{3,}" name="fonctionMere" placeholder="text" required>
										</div>
										<div class="form-group">
											<label class="form-label">Fonction Pére</label>
											<input type="text" class="form-control"  maxlength="30"title="le fonction du père doit contenir uniquement des lettres" pattern="[A-Za-z]{3,}" name="fonctionPere" placeholder="text" required>
										</div>
										<div class="form-group">
											<label class="form-label">Nom Mére</label>
											<input type="text" class="form-control" maxlength="30" title="le nom du mère doit contenir uniquement des lettres" pattern="[A-Za-z]{3,}" name="nomMere" placeholder="text" required>
										</div>
										<div class="form-group">
											<label class="form-label">Prénom Mére</label>
											<input type="text" class="form-control" maxlength="30" title="le prénom du mère doit contenir uniquement des lettres" pattern="[A-Za-z]{3,}" name="prenomMere" placeholder="text" required>
										</div>
										<div class="form-group">
											<label class="form-label">Téléphone Mére</label>
											<input type="text" class="form-control" pattern="[0-9]{8}" title="8 chiffres" name="telephoneMere" placeholder="text" required>
										</div>

									

										

										
										<div class="box_footer">
											<button type="reset"   class="btn btn-primary ml-auto">Annuler</button>
											<button type="submit"  name="action" value="Valider" class="btn btn-primary ml-auto"><i class="fa fa-check"></i>Valider</button>
										</div>
									
									
				
												</div>
											</div>
										</div>
									</div>
									
								</form>
							

<?php include("footer.php");; ?>
  