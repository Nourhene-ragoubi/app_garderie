<?php include('Modele/Eleve.php');
 include('Modele/Parent.php');
$e = new Eleve();
$p = new Parentt();
$tab = $p->getAllParent(); 
if(isset($_POST['action']) & $_POST['action']=='Valider' ){

$e->setNom($_POST['nom']); 
$e->setPrenom($_POST['prenom']); 
$e->setDateNaissance($_POST['dateNaissance']); 
$e->setParentCin($_POST['parentCin']);

$e->setEtatSante($_POST['etatSante']);
$e->setEcole($_POST['ecole']);
$e->setMatieres($_POST['matieres']);
$res = $e->addEleve($e); 
if($res){
	header('Location:listeEleve.php?msg=1');
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
								<li class="breadcrumb-item active" aria-current="page">Ajouter Eleve</li>
							</ol>
						</div>
						<div class="row row-deck">
							<div class="col-lg-12">
								<form   method="post" action="AjoutEleve.php" class="card">
									<div class="card-header">
										<h3 class="card-title">Ajouter Eleve</h3>
									</div>
									<div class="card-body" >
										<input type="hidden" class="form-control" name="nom" value="<?php echo $_GET['nom']; ?>"    >
										<input type="hidden" class="form-control" name="parentCin" value="<?php echo $_GET['cinParent']; ?>"    >
										<div class="form-group">
											<label class="form-label">Cin Parent</label>
											<input type="text" class="form-control" disabled value="<?php echo $_GET['cinParent']; ?>"   placeholder="text" required>
										</div> 
										<div class="form-group">
											<label class="form-label">Nom</label>
											<input type="text" class="form-control" disabled value="<?php echo $_GET['nom']; ?>"   placeholder="text" required>
										</div> 
										<div class="form-group">
											<label class="form-label">Prénom</label>
											<input type="text" class="form-control" maxlength="30" title="le prénom doit contenir uniquement des lettres" pattern="[A-Za-z]{3,}" name="prenom" placeholder="text" required>
										</div>
										<div class="form-group">
											<label class="form-label">Date de naissance</label>
											<input type="date" class="form-control" onkeydown="return false" name="dateNaissance" placeholder="text">
										</div>
										 <div class="form-group">
											<label class="form-label">Etat de santé <span class="form-label-small ml-3"></span></label>
											<textarea class="form-control" maxlength="50" title="L'etat de santé du l'éleve doit contenir uniquement des lettres" pattern="[A-Za-z]{3,}" name="etatSante" rows="4" placeholder="text here.." required></textarea>
										</div>
										<div class="form-group">
											<label class="form-label">Les matieres à réviser <span class="form-label-small ml-3"></span></label>
											<textarea class="form-control" maxlength="30" title="La liste des matiéres doit contenir uniquement des lettres" pattern="[A-Za-z]{3,}"name="matieres" rows="4" placeholder="text here.." required></textarea>
										</div>
										<div class="form-group">
											<label class="form-label">Ecole</label>
											<input type="text" class="form-control" maxlength="25" title="L'école doit contenir uniquement des lettres" pattern="[A-Za-z]{3,}"name="ecole" placeholder="text" required>
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
  