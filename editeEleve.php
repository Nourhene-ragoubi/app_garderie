<?php include('Modele/Eleve.php');
 include('Modele/Parent.php');
$e = new Eleve();
$p = new Parentt();
$tab = $p->getAllParent(); 

$data = $e->getEleveByCode($_GET['idd']);
if(isset($_POST['action']) & $_POST['action']=='Valider'){
$e->setNom($_POST['nom']); 
$e->setPrenom($_POST['prenom']); 
$e->setDateNaissance($_POST['dateNaissance']); 
$e->setParentCin($_POST['parent_cin']);
$e->setCode($_POST['code']);
$e->setEtatSante($_POST['etatSante']);
$e->setEcole($_POST['ecole']);
$e->setMatieres($_POST['matieres']);
$res = $e->editEleve($e); 
if($res){
	header('Location:listeEleve.php?msg=2');
}

							  
						
}
include("header.php");


?>
			<div class="app-content  my-3 my-md-5">
					<div class="side-app">
						<div class="page-header">
							<h4 class="page-title">Gestion Eleve</h4>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#">Gestion Eleve</a></li>
								<li class="breadcrumb-item active" aria-current="page">Gestion Eleve</li>
							</ol>
						</div>
						
						<div class="row row-deck">
							<div class="col-lg-12">
								<form  method="post" class="card" action="editeEleve.php">
									<div class="card-header">
										<h3 class="card-title">Modifier Eleve</h3>
									</div>
									<div class="card-body">
									<input type="hidden"   name="code"  value="<?php echo $data['code']; ?>" >
									<div class="form-group">
											<label class="form-label">Cin Parent</label>
											<input type="text" class="form-control" disabled name="nom" value="<?php echo $data['parentCin']; ?>" placeholder="text">
										</div>
						            <div class="form-group">
											<label class="form-label">Nom</label>
											<input type="text" class="form-control" disabled name="nom" value="<?php echo $data['nom']; ?>" placeholder="text">
										</div>
										

										<div class="form-group">
											<label class="form-label">Prénom</label>
											<input type="text" class="form-control" disabled name="prenom"  value="<?php echo $data['prenom']; ?>"placeholder="text">
										</div>
										<div class="form-group">
											<label class="form-label">Date de naissance</label>
											<input type="date" class="form-control"  onkeydown="return false" disabled name="dateNaissance" value="<?php echo $data['dateNaissance']; ?>" placeholder="text">
										</div>
										
										 <div class="form-group">
											<label class="form-label">Etat de santé <span class="form-label-small ml-3"></span></label>
											<textarea class="form-control"  maxlength="50" title="L'etat de santé du l'éleve doit contenir uniquement des lettres" pattern="[A-Za-z]{3,}" name="etatSante" rows="4" placeholder="text here.."> <?php echo $data['etatSante']; ?></textarea>
										</div>
										<div class="form-group">
											<label class="form-label">Les matieres à réviser <span class="form-label-small ml-3"></span></label>
											<textarea class="form-control"  maxlength="30" title="La liste des matiéres doit contenir uniquement des lettres" pattern="[A-Za-z]{3,}"name="matieres" rows="4" placeholder="text here.."> <?php echo $data['matieres']; ?></textarea>
										</div>
										<div class="form-group">
											<label class="form-label">Ecole</label>
											<input type="text" class="form-control"value="<?php echo $data['ecole']; ?>" maxlength="25" title="L'école doit contenir uniquement des lettres" pattern="[A-Za-z]{3,}"name="ecole" placeholder="text">
										</div>


									

										

										
										<div class="box_footer">
										
											<button type="submit" class="btn btn-primary ml-auto">Annuler</button>
											<button type="submit" name="action" value="Valider" class="btn btn-primary ml-auto">Enregistrer</button>
										</div>
									
									
				
												</div>
											</div>
										</div>
									</div>
									
								</form>
							</div>

<?php include("footer.php");; ?>
  