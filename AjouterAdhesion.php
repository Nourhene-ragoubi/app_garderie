<?php include('Modele/Adhesion.php');
include('Modele/Eleve.php');
include('Modele/Club.php');
$e = new Adhesion();
$p = new Eleve();
$c = new Club();
$tab = $e->getAllAdhesion(); 
$tabE = $p->getAllEleve(); 
$tabC = $c->getAllClub();
if(isset($_POST['action']) & $_POST['action']=='Valider' ){
$test = $e->getAdhesionByClubEleve($_POST['eleve_code'],$_POST['club_code']); 
if($test){
	header('Location:AjouterAdhesion.php?error=1');	
}else {
$montant = $c->getClubByCodeClub($_POST['club_code']);
$e->setCodeAdhesion($_POST['codeAdhesion']); 
$e->setDateAdhesion($_POST['dateAdhesion']); 
$e->setEleve_code($_POST['eleve_code']); 
$e->setClub_code($_POST['club_code']); 

$res = $e->addAdhesion($e); 
if($res){
	
	header('Location:AjouterPaimentAdhesion.php?code='.$_POST['eleve_code'].
	'&codeClub='.$_POST['club_code'].
	
	'&montantClub='.$montant['montantAdhesion']);
}
}}
include("header.php");
?>

			<div class="app-content  my-3 my-md-5">
					<div class="side-app">
						<div class="page-header">
							<h4 class="page-title">Gestion Adhesion</h4>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#">Gestion  Adhesion</a></li>
								<li class="breadcrumb-item active" aria-current="page">Ajouter  Adhesion</li>
							</ol>
						</div>
						<div class="row row-deck">
							<div class="col-lg-12">
								<form   method="post" action="AjouterAdhesion.php" class="card">
									<div class="card-header">
										<h3 class="card-title">Ajouter  Adhesion</h3>
									</div>
									<div class="card-body" >
									<?php if(isset($_GET['error']) & $_GET['error']=='1') { ?>
											<div class="alert alert-danger" role="alert">
												<strong>Adhésion  Existe déja .  </strong>
											</div>
									<?php  } ?>
										 <div class="form-group ">
											<label class="form-label">Eleve</label>
											<select class="form-control select2 custom-select" name="eleve_code"  data-placeholder="Choose one" required>
												<option label="Choose one" value=""> Selectionner eleve</option>
												<?php foreach($tabE as $t){ ?> 
															<option value="<?php echo $t['code']; ?>"><?php echo $t['parentCin']; ?> <?php echo $t['nom']; ?> <?php echo $t['prenom']; ?></option> 
												<?php   }  ?> 
											</select>
										</div>
										<div class="form-group ">
											<label class="form-label">Club</label>
											<select class="form-control select2 custom-select" name="club_code"  data-placeholder="Choose one" required>
												<option label="Choose one" value=""> Selectionner club</option>
												<?php foreach($tabC as $t){ ?> 
															<option value="<?php echo $t['codeClub']; ?>"><?php echo $t['nomClub'];; ?></option> 
												<?php   }  ?> 
											</select>
										</div>

                                        <div class="form-group">
											<label class="form-label">Date</label>
											<input type="date" required onkeydown="return false" class="form-control"  name="dateAdhesion" placeholder="text">
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
  