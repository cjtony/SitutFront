<?php 

	$alumno = new Alumno();
	$datAlm = $alumno->userAlmDet($_SESSION['keyAlm']);
	if ($datAlm) {
		if ($datAlm->id_detgrupo != "") {
		$datGrpAlm = $alumno->datGrpAlm($_SESSION['keyAlm']);
		}
?>
	<style type="text/css">
		div .list-group .active {
			background:#fff!important;
			color: black;
			outline: none;
			list-style: none;
			text-decoration: none;
			border-color: #28a745!important;
		}
		.ocult {
			display: none;
		}
		.margen-avatar{
        	margin-top:-50px;
    	}
    	.shDC {
    		-webkit-box-shadow: 0px 0px 2px 0px rgba(0,0,0,0.75);
			-moz-box-shadow: 0px 0px 2px 0px rgba(0,0,0,0.75);
			box-shadow: 0px 0px 2px 0px rgba(0,0,0,0.75);
    	}
	</style>
	<div class="container-fluid mt-4">
		<div class="row">
			<div class="col-md-4 col-lg-3">
				<!-- SobreMi -->
                <div class="container py-5">
                    <div class="card shDC">
                        <img class="card-img-top" src="<?php echo SERVERURL; ?>vistas/img/iceland.jpg" alt="Card image cap">
                        <div class="text-center margen-avatar">
                        	<?php 
								if ($datAlm -> foto_perf_alm == "" && $datAlm -> sexo_al == "Masculino") {
									echo "<img src='".SERVERURL."vistas/img/usermal.png' class='rounded-circle' width='100px'>";
								} else if ($datAlm -> foto_perf_alm != "" && $datAlm -> sexo_al == "Masculino") {
							?>
								<img src="../Arch/perfil/<?php echo $datAlm->foto_perf_alm ?>" class="rounded-circle" width="100px">
							<?php
								} else if ($datAlm -> foto_perf_alm == "" && $datAlm -> sexo_al == "Femenino") {
									echo "<img src='".SERVERURL."vistas/img/userfem.png' class='rounded-circle' width='100px'>";
								} else if ($datAlm -> foto_perf_alm != "" && $datAlm -> sexo_al == "Femenino") {
							?>
								<img src="../Arch/perfil/<?php echo $datAlm->foto_perf_alm ?>" class="rounded-circle" width="100px"">
							<?php
								} else {
									echo "<img src='../vistas/img/icous.png' class='rounded-circle' width='100px'>";
								}
							?>
                        </div>
                        <div class="card-body text-center">
                        <h6 class="card-title font-weight-bold">
                        	<?php echo $datAlm -> nombre_c_al; ?>
                        </h6>
                        <h6 class=" text-left mt-4">
							<i class="fas fa-id-card-alt fa-lg icoIni"></i>
							<?php echo $datAlm -> matricula_al; ?>
						</h6>
						<h6 class=" text-left mt-3">
							<i class="fas fa-envelope fa-lg icoIni"></i>
							<?php echo $datAlm -> correo_al; ?>
						</h6>
						<h6 class=" text-left mt-3">
							<i class="fas fa-phone fa-lg icoIni"></i>
							<?php echo $datAlm -> telefono_al; ?>
						</h6>
                        </div>
                    </div>
                </div><!-- SobreMi -->
                <div class="container">
                    <!-- Comentarios -->
                    <div class="card">
                        <div class="card-header text-center">
                            Frase Celebre
                        </div>
                        <div class="card-body">
                            <blockquote class="blockquote mb-0">
                            <p class="font-italic text-info">
                            	<b>"</b> Todo el mundo tiene talento, solo es cuestión de moverse hasta descubrirlo. <b>"</b>
                            </p>
                            <footer class="blockquote-footer"><cite title="Source Title">George Lucas</cite></footer>
                            </blockquote>
                        </div>
                    </div><!-- Comentarios -->
                </div>
			</div>
			<div class="col-sm-12 col-md-12 col-lg-9">
				<nav aria-label="breadcrumb">
				  	<ol class="breadcrumb">
				    	<li class="breadcrumb-item"><a href="<?php echo SERVERURLALM; ?>Home/">Inicio</a></li>
				    	<li class="breadcrumb-item active" aria-current="page">
				    		<i class="fas fa-file-alt ml-2 mr-2"></i>
				    		Justificantes solicitados
				    	</li>
				  	</ol>
				</nav>
				<br>
				<div class="row">
		      		<div class="col-sm-12 col-md-12 col-lg-6 text-center">
		      			<ul class="list-group">
						  <li class="list-group-item d-flex justify-content-between align-items-center">
						    Totales
						    <span class="badge badge-dark badge-pill" id="justCantTot">
						    </span>
						  </li>
						  <li class="list-group-item d-flex justify-content-between align-items-center">
						    En este cuatrimestre
						    <span class="badge badge-pill badge-info" id="justCantCut">
						    </span>
						  </li>
						</ul>
		      		</div>
		      		<div class="col-sm-12 col-md-12 col-lg-6 text-center">
		      			<ul class="list-group">
						  <li class="list-group-item d-flex justify-content-between align-items-center">
						    Aceptados
						    <span class="badge badge-primary badge-pill" id="justCantAcept">
						    </span>
						  </li>
						  <li class="list-group-item d-flex justify-content-between align-items-center">
						    No aceptados
						    <span class="badge badge-danger badge-pill" id="justCantRech">
						    </span>
						  </li>
						</ul>
		      		</div>
		      	</div>
				
				<div class="row pad30">
					<?php 
						$dbc = Connect::getDB();
						$stmt = $dbc -> prepare("SELECT COUNT(jus.id_justificante) AS 'CantJus', jus.cuatrimestre_justif FROM 
							justificantes jus INNER JOIN alumnos alm ON alm.id_alumno = jus.id_alumno
							WHERE alm.id_alumno = :keyAlm GROUP BY jus.cuatrimestre_justif ORDER BY jus.cuatrimestre_justif");
						$stmt -> bindParam("keyAlm", $_SESSION['keyAlm'], PDO::PARAM_INT);
						$stmt -> execute();
						$filStmt = $stmt -> rowCount();
						if ($filStmt >= 1) {
							while ($res = $stmt -> fetch(PDO::FETCH_OBJ)) {
								if ($res->cuatrimestre_justif == $datGrpAlm->cuatrimestre_g) {
						?>
							<div class="col-sm-12 col-md-6 col-lg-4">
								<div class="card pad10 shDC" style="">
									<div class=" card-body">
										<div class="card-title mb-4">
											<div class="text-right mb-4">
												<span class="text-right badge-primary badge font-weight-normal" >Actual</span>
											</div>
											<h6 class="text-center">
												Cuatrimestre : 
												<?php echo $res->cuatrimestre_justif; ?>
											</h6>
										</div>
										<hr style="height: 2px;" class="bg-primary rounded">
										<div class="card-text mt-4">
											<h6 class="text-center">
												<i class="fas fa-file-alt fa-lg icoIni text-primary"></i>
												Justificantes : 
												<span style="font-size: 18px;" class="font-weight-normal badge badge-pill badge-primary">
													<?php echo $res->CantJus; ?>	
												</span>	
											</h6>
										</div>
									</div>
								</div>
							</div>
						<?php
								} else {
						?>
							<div class="col-sm-4">
								<div class="card pad10 cardShadow rounded">
									<div class=" card-body">
										<div class="card-title mb-4">
											<h4 class="text-center">
												<!-- <i class="fas fa-university fa-lg icoIni text-success"></i> -->
												Cuatrimestre : 
												<?php echo $res->cuatrimestre_justif; ?>
											</h4>
										</div>
										<hr style="height: 2px;" class="bg-success rounded cardShadow">
										<div class="card-text mt-4">
											<h5 class="text-center">
												<i class="fas fa-file-alt fa-lg icoIni text-success"></i>
												Justificantes : 
												<span style="font-size: 20px;" class="font-weight-normal badge badge-pill badge-success">
													<?php echo $res->CantJus; ?>	
												</span>	
											</h5>
										</div>
									</div>
								</div>
							</div>
						<?php
								}
							}
						} else {
							echo "no hay";
						}
					?>	
				</div>
			</div>
		</div>
	</div>

    <script src="<?php echo SERVERURLALM; ?>alm/js/justif.js"></script>
    
<?php
	} else {
		header("Location:".SERVERURLALM."alm/Logout.php");
	}
	  

