<?php include('Modele/Enseignant.php');
$e = new Enseignant(); 
$data = $e->getEnseignantByCinEnseignant($_GET['idd']); 
if(isset($_POST['action']) & $_POST['action']=='Valider'){

$e->setNomEnseignant($_POST['nomEnseignant']); 
$e->setPrenomEnseignant($_POST['prenomEnseignant']);
$e->setEmailEnseignant($_POST['emailEnseignant']);  
 $e->setTelephoneEnseignant($_POST['telephoneEnseignant']); 
$e->setAdresseEnseignant($_POST['adresseEnseignant']);

$e->setCinEnseignant($_POST['cinEnseignant']); 
$res = $e->EditEnseignant($e); 
if($res){
	header('Location:listeEnseignant.php?msg=2');
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
								<li class="breadcrumb-item active" aria-current="page">Modifier Enseignant</li>
							</ol>
						</div>
						<div class="row row-deck">
							<div class="col-lg-12">
								<form  method="post" class="card" action="EditEnseignant.php">
									<div class="card-header">
										<h3 class="card-title">Modifier Enseignant</h3>
									</div>
									<div class="card-body">
										<div class="form-group">
											<label class="form-label">Cin</label>
											<input type="number" disabled class="form-control" name="cinEnseignant" value="<?php echo $data['cinEnseignant']; ?>" placeholder="number">
										</div> 
										
										<div class="form-group">
											<label class="form-label">Nom</label>
											<input type="text" class="form-control" disabled  name="nomEnseignant" value="<?php echo $data['nomEnseignant']; ?>" placeholder="text">
										</div> 
										<div class="form-group">
											<label class="form-label">Prénom</label>
											<input type="text" class="form-control" disabled name="prenomEnseignant" value="<?php echo $data['prenomEnseignant']; ?>" placeholder="text">
										</div>
										<div class="form-group">
											<label class="form-label">Email</label>
											<input type="email" class="form-control"pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="E-mail invalide, il doit contenir @ et . " name="emailEnseignant" value="<?php echo $data['emailEnseignant']; ?>" placeholder="email">
										</div>
										<div class="form-group">
											<label class="form-label">Telephone</label>
											<input type="text" class="form-control" pattern="[0-9]{8}" title="8 chiffres" name="telephoneEnseignant" value="<?php echo $data['telephoneEnseignant']; ?>" placeholder="number">
										</div>
										<div class="form-group">
											<label class="form-label">Adresse</label>
											<input type="text" class="form-control" maxlength="50" name="adresseEnseignant" value="<?php echo $data['adresseEnseignant']; ?>" placeholder="text">
										</div>
										

									

										

										
										<div class="box_footer">
											<button type="submit" name="action" class="btn btn-primary ml-auto">Annuler</button>
											<button type="submit" name="action" value="Valider" class="btn btn-primary ml-auto">Valider</button>
										</div>
									
									
				
												</div>
											</div>
										</div>
									</div>
									
								</form>
							</div>

<?php include("footer.php");; ?>
  