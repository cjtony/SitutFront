<?php 
 
	$alumno = new Alumno();
	$codigo = explode('/', $_GET['view']);
	$valEnc = $codigo[1];
	$datAlm = $alumno->userAlmDet($_SESSION['keyAlm']);
	if ($datAlm) {
		$valTest = $alumno -> valTestIniAlm($_SESSION['keyAlm']);
		$testVal = $alumno -> validDatEnc($_SESSION['keyAlm'], base64_decode($valEnc));
		if ($testVal) {
?>

	<style type="text/css">
		.ocult {
			display: none;
		}
		.colM {
			color: #28a745;
		}
		.colM:hover {
			color: #fff;
			background: #28a745;
			transition: 1s;
		}
		.shDC {
    		-webkit-box-shadow: 0px 0px 2px 0px rgba(0,0,0,0.75);
			-moz-box-shadow: 0px 0px 2px 0px rgba(0,0,0,0.75);
			box-shadow: 0px 0px 2px 0px rgba(0,0,0,0.75);
    	}
    	.margen-avatar{
        	margin-top:-50px;
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
			<form class="col-md-8 col-lg-9 pad10" method="POST" id="formEditEnc" name="formEditEnc" autocomplete="off">
				<nav aria-label="breadcrumb">
				  	<ol class="breadcrumb">
				    	<li class="breadcrumb-item"><a href="<?php echo SERVERURLALM; ?>Home/">Inicio</a></li>
				    	<li class="breadcrumb-item active" aria-current="page">
				    		<i class="fas fa-edit ml-2 mr-2"></i>
				    		Editar encuesta
				    	</li>
				  	</ol>
				</nav>
				<input type="hidden" class="form-control" value="<?php echo base64_encode($testVal->id_enctestalm) ?>" name="clvTest">
				<div id="mostDat1">
					<!-- <hr style="height: 5px;" class="rounded bg-primary"><br> -->
					<div class="text-center mt-4">
						<h4 class="text-center text-info">Datos SocioEconomicos</h4>
					</div>
					<hr style="height: 5px;" class="rounded bg-info">
					<br>
					<?php include "modTest/DatSocioEconomicosEdit.php"; ?>
					<div class="row" id="contBtn1Val">
						<div class="col-sm-2"></div>
							<div class="col-sm-8 text-center">
								<button class="btn btn-primary btn-md" type="button" id="btnV1">
									Validar datos <i class="fas fa-check-circle icoPri fa-lg"></i>
								</button>
							</div>
						<div class="col-sm-2"></div>
					</div>
				</div>
				<div id="mostDat2" class="ocult">
					<div class="text-center" id="prb1">
						<h4 class="text-center text-info">Datos Personales</h4>
					</div>
					<hr style="height: 5px;" class="rounded bg-info">
					<br>
					<?php include "modTest/DatPersonalesEdit.php"; ?>
					<div class="row" id="contBtn2Val">
						<div class="col-sm-2"></div>
							<div class="col-sm-8 text-center">
								<button class="btn btn-primary btn-md" type="button" id="btnV2">
									Validar datos <i class="fas fa-check-circle icoPri fa-lg"></i>
								</button>
							</div>
						<div class="col-sm-2"></div>
					</div>
				</div>
				<div id="mostDat3" class="ocult">
					<div class="text-center">
						<h4 class="text-center text-info">Datos Academicos</h4>
					</div>
					<hr style="height: 5px;" class="rounded bg-info">
					<br>
					<?php include "modTest/DatAcademicosEdit.php"; ?>
					<div class="row">
						<div class="col-sm-2"></div>
							<div class="col-sm-8 text-center mb-4">
								<button class="btn btn-primary btn-md" type="submit" id="btnV3">
									Guardar datos <i class="fas fa-check-circle icoPri fa-lg"></i>
								</button>
							</div>
						<div class="col-sm-2"></div>
					</div>
				</div>
			</form>
			<div class="col-sm-2"></div>
		</div>
	</div>

	<div class="modal fade bgModal" data-backdrop="false" id="valdat" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	  <div class="modal-dialog modal-dialog-centered" role="document">
	    <div class="modal-content">
	    	<!-- <div class="modal-header">
		        <h2 class="modal-title text-center">Un momento porfavor...</h2>
		    </div> -->
		    <br>
		    <h2 class="text-center pad10">Un momento porfavor...</h2>
	      	<div class="modal-body">
	        	<div class="text-center">
	        		<img width="300" src="<?php echo SERVERURL; ?>vistas/img/load5.gif" class="img-fluid">
	        		<br>
	        		<span class="lead" id="textdat">Validando datos...</span>
	        	</div>
	      	</div>
	    </div>
	  </div>
	</div>

    <script src="<?php echo SERVERURLALM; ?>alm//js/testEdit.js"></script>
    <script src="<?php echo SERVERURLALM; ?>alm//js/validTest.js"></script>
<?php
		} else {
			header("Location:".SERVERURLALM."alm/Logout.php");
		}
	} else {
		header("Location:".SERVERURLALM."alm/Logout.php");
	}


