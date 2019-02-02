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
								<img src="<?php echo SERVERURLALM; ?>Arch/perfil/<?php echo $datAlm->foto_perf_alm ?>" class="rounded-circle" width="100px">
							<?php
								} else if ($datAlm -> foto_perf_alm == "" && $datAlm -> sexo_al == "Femenino") {
									echo "<img src='".SERVERURL."vistas/img/userfem.png' class='rounded-circle' width='100px'>";
								} else if ($datAlm -> foto_perf_alm != "" && $datAlm -> sexo_al == "Femenino") {
							?>
								<img src="<?php echo SERVERURLALM; ?>Arch/perfil/<?php echo $datAlm->foto_perf_alm ?>" class="rounded-circle" width="100px"">
							<?php
								} else {
									echo "<img src='".SERVERURL."vistas/img/icous.png' class='rounded-circle' width='100px'>";
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
			<div class="col-md-8 col-lg-9">
				<div class="text-center bg-primary p-1" style="border-radius: 8px;">
					<h4 class="text-center text-white mt-3">
						Tutorías Personales Solicitadas
					</h4>
				</div>
				<div class="row pad30">
					<?php 
						$dbc = Connect::getDB();
						$stmt = $dbc -> prepare("SELECT * FROM tut_personales tut INNER JOIN 
							alumnos alm ON alm.id_alumno = tut.id_alumno
							WHERE alm.id_alumno = :keyAlm ORDER BY tut.fecha_reg_obs DESC");
						$stmt -> bindParam("keyAlm", $_SESSION['keyAlm'], PDO::PARAM_INT);
						$stmt -> execute();
						$filStmt = $stmt -> rowCount();
						if ($filStmt > 0) {
							while ($res = $stmt -> fetch(PDO::FETCH_OBJ)) {
					?>
							<div class="col-sm-12 col-lg-6">
								<div class="card pad10 cardShadow rounded">
									<div class=" card-body">
										<div class="card-title mb-4">
											<div class="text-left mb-1">
												<?php 
													if ($res->estado_tut == 1) {
												?>
													<span class="text-right badge-primary badge font-weight-normal">Aceptada</span>
												<?php		
													} else {
												?>		
													<span class="text-right badge-danger badge font-weight-normal">Sin Aceptar</span>
												<?php
													}
												?>
											</div>
											<div class="text-right mb-3">
												<?php 
													if ($res->prioridad_tut == "Alta") {
												?>
													<span class="text-right badge-danger badge font-weight-normal">Prioridad : <?php echo $res->prioridad_tut; ?></span>
												<?php
													}
												?>
												<?php 
													if ($res->prioridad_tut == "Media") {
												?>
													<span class="text-right badge-warning badge font-weight-normal">Prioridad : <?php echo $res->prioridad_tut; ?></span>
												<?php
													}
												?>
												<?php 
													if ($res->prioridad_tut == "Baja") {
												?>
													<span class="text-right badge-primary badge font-weight-normal">Prioridad : <?php echo $res->prioridad_tut; ?></span>
												<?php
													}
												?>
											</div>
											<h5 class="text-center">
												Razones : 
												<?php echo $res->razones_tut; ?>
											</h5>
										</div>
										<hr style="height: 2px;" class="bg-info rounded cardShadow">
										<div class="card-text mt-4">
											<h6 class="text-center">
												<i class="fas fa-calendar fa-lg icoIni text-primary"></i>
												Fecha de solicitud : 
												<span class="font-weight-normal badge badge-pill badge-primary">
													<?php echo $res->fecha_reg_obs; ?>	
												</span>	
											</h6>
											<hr style="height: 2px;" class="bg-info rounded cardShadow">
											<h6 class="text-left mt-3">
												<i class="fas fa-calendar-check fa-lg icoIni text-primary">
												</i>
												Fecha de cita :
												<?php 
													if ($res->fecha_cita_tut != "" && $res->fecha_cita_tut != "0000-00-00") {
												?>
													<span class="font-weight-normal badge badge-pill badge-primary">
														<?php echo $res->fecha_cita_tut; ?>	
													</span>	
												<?php
													} else {
												?>
													<span class="font-weight-normal badge badge-pill badge-warning text-gray-dark">
														Sin definir	
													</span>	
												<?php		
													}
												?>
											</h6>
											<h6 class="text-left mt-3">
												<i class="fas fa-clock fa-lg icoIni text-primary">
												</i>
												Hora de la cita :
												<?php 
													if ($res->hora_cit_tut != "" && $res->hora_cit_tut != "00:00:00") {
												?>
													<span class="font-weight-normal badge badge-pill badge-primary">
														<?php echo $res->hora_cit_tut; ?>	
													</span>	
												<?php
													} else {
												?>
													<span class="font-weight-normal badge badge-pill badge-warning text-gray-dark">
														Sin definir	
													</span>	
												<?php		
													}
												?>
											</h6>
										</div>
									</div>
								</div>
								<br>
							</div>
					<?php
							}
						} else {
					?>
					
					<?php		
						}
					?>
				</div>
			</div>
		</div>
	</div>
    <script src="<?php echo SERVERURLALM; ?>alm/js/grpAlm.js"></script>
    <script src="<?php echo SERVERURLALM; ?>alm/js/tutAlm.js"></script>
<?php
	} else {
		header("Location:".SERVERURLALM."alm/Logout.php");
	}
	  