<?php 


	if ($datAlm) {
		if ($datAlm->id_detgrupo != "") {
		$datGrpAlm = $alumno->datGrpAlm($_SESSION['keyAlm']);
		$cantJustTot = $alumno->cantTotJustif($_SESSION['keyAlm']);
		$cantAcJust = $alumno -> cantJustifAcept($_SESSION['keyAlm'], $datGrpAlm->cuatrimestre_g);
		$cantReJust = $alumno -> cantJustifRecha($_SESSION['keyAlm'], $datGrpAlm->cuatrimestre_g);
		$cantTotCut = $alumno -> cantJustifCuat($_SESSION['keyAlm'], $datGrpAlm->cuatrimestre_g);
		} 
	$valDatPer = $alumno -> cantDatPerVal($_SESSION['keyAlm']);
	$datEPer = $alumno -> datPerEditAlm($_SESSION['keyAlm']);
	$valTest = $alumno -> valTestIniAlm($_SESSION['keyAlm']);

?>

    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h1 class="text-left text-info" style="letter-spacing: 5px; font-weight: bold;">
                    <span class="badge badge-pill badge-info">
                        <i class="fas fa-terminal ml-2"></i>
                    </span>
                    Equipo de desarrollo.
                </h1>
                <div style="height: 5px; width: 600px; border-radius: 4px;" class="bg-info mt-3"></div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-lg-4 mt-4">
                <!-- SobreMi -->
                <div class="container py-4">
                    <div class="card rounded shadowCard" id="cardSh">
                        <img class="card-img-top" src="<?php echo SERVERURL; ?>vistas/img/iceland.jpg" alt="Card image cap">
                        <div class="text-center margen-avatar">
                            <img src="<?php echo SERVERURL; ?>vistas/img/icous.png" alt="" class="rounded-circle" width="100px">
                        </div>
                        <div class="card-body">
                        <h6 class="card-title text-center font-weight-bold col-text">
                            Marco Aguilar
                        </h6>
                        <p class="card-text text-center text-muted">
                            Programador y diseñador.
                        </p>
                        <hr style="height: 1px;" class="bg-info">
                        <div class="row mt-4 text-center">
                            <div class="col-sm-3">
                                <a href="https://web.facebook.com/MarcCJm" target="_blank">
                                    <i class="fab fa-facebook fa-lg text-info"></i>
                                </a>
                            </div>
                            <div class="col-sm-3">
                                <a href="https://cjtony.github.io/marc.github.io/" target="_blank">
                                    <i class="fas fa-globe fa-lg text-info"></i>
                                </a>
                            </div>
                            <div class="col-sm-3">
                                <a href="https://github.com/cjtony" target="_blank">
                                    <i class="fab fa-github fa-lg text-info"></i>
                                </a>
                            </div>
                            <div class="col-sm-3">
                                <a href="#" data-toggle="tooltip" data-placement="top" title="732-119-37-48" id="t1">
                                    <i class="fab fa-whatsapp fa-lg text-info"></i>
                                </a>
                            </div>
                        </div>
                        </div>
                    </div>
                </div><!-- SobreMi -->
            </div>
            <div class="col-md-4 col-lg-4 mt-4">
                <!-- SobreMi -->
                <div class="container py-4">
                    <div class="card rounded shadowCard" id="cardSh1">
                        <img class="card-img-top" src="<?php echo SERVERURL; ?>vistas/img/iceland.jpg" alt="Card image cap">
                        <div class="text-center margen-avatar">
                            <img src="<?php echo SERVERURL; ?>vistas/img/avatar-dhg.png" alt="" class="rounded-circle border" width="100px">
                        </div>
                        <div class="card-body">
                        <h6 class="card-title text-center font-weight-bold">
                            Mario Jaimes
                        </h6>
                        <p class="card-text text-center text-muted">
                            Lider de proyecto.
                        </p>
                        <hr style="height: 1px;" class="bg-info">
                        <div class="row text-center mt-4">
                            <div class="col-sm-3">
                                <a href="#">
                                    <i class="fab fa-facebook fa-lg text-info"></i>
                                </a>
                            </div>
                            <div class="col-sm-3">
                                <a href="#">
                                    <i class="fab fa-instagram fa-lg text-info"></i>
                                </a>
                            </div>
                            <div class="col-sm-3">
                                <a href="#">
                                    <i class="fab fa-twitter fa-lg text-info"></i>
                                </a>
                            </div>
                            <div class="col-sm-3">
                                <a href="#" data-toggle="tooltip" data-placement="top" title="722-115-52-65" id="t2">
                                    <i class="fab fa-whatsapp fa-lg text-info"></i>
                                </a>
                            </div>
                        </div>
                        </div>
                    </div>
                </div><!-- SobreMi -->
            </div>
            <div class="col-md-4 col-lg-4 mt-4">
                <!-- SobreMi -->
                <div class="container py-4">
                    <div class="card rounded shadowCard" id="cardSh2">
                        <img class="card-img-top" src="<?php echo SERVERURL; ?>vistas/img/iceland.jpg" alt="Card image cap">
                        <div class="text-center margen-avatar">
                            <img src="<?php echo SERVERURL; ?>vistas/img/avatar-dhg.png" alt="" class="rounded-circle border" width="100px">
                        </div>
                        <div class="card-body">
                        <h6 class="card-title text-center font-weight-bold">
                            Alex Solis
                        </h6>
                        <p class="card-text text-center text-muted">
                            Programador.
                        </p>
                        <hr style="height: 1px;" class="bg-info">
                        <div class="row text-center mt-4">
                            <div class="col-sm-3">
                                <a href="#">
                                    <i class="fab fa-facebook fa-lg text-info"></i>
                                </a>
                            </div>
                            <div class="col-sm-3">
                                <a href="#">
                                    <i class="fab fa-instagram fa-lg text-info"></i>
                                </a>
                            </div>
                            <div class="col-sm-3">
                                <a href="#">
                                    <i class="fab fa-twitter fa-lg text-info"></i>
                                </a>
                            </div>
                            <div class="col-sm-3">
                                <a href="#" data-toggle="tooltip" data-placement="top" title="722-428-56-95" id="t3">
                                    <i class="fab fa-whatsapp fa-lg text-info"></i>
                                </a>
                            </div>
                        </div>
                        </div>
                    </div>
                </div><!-- SobreMi -->
            </div>
            <div class="col-md-4 col-lg-2"></div>
            <div class="col-md-4 col-lg-4 mt-5">
                <!-- SobreMi -->
                <div class="container">
                    <div class="card rounded shadowCard" id="cardSh3">
                        <img class="card-img-top" src="<?php echo SERVERURL; ?>vistas/img/iceland.jpg" alt="Card image cap">
                        <div class="text-center margen-avatar">
                            <img src="<?php echo SERVERURL; ?>vistas/img/avatar-dhg.png" alt="" class="rounded-circle border" width="100px">
                        </div>
                        <div class="card-body">
                        <h6 class="card-title text-center font-weight-bold">
                            Brayan Vidal

                        </h6>
                        <p class="card-text text-center text-muted">
                            Analista.
                        </p>
                        <hr style="height: 1px;" class="bg-info">
                        <div class="row text-center mt-4">
                            <div class="col-sm-3">
                                <a href="#">
                                    <i class="fab fa-facebook fa-lg text-info"></i>
                                </a>
                            </div>
                            <div class="col-sm-3">
                                <a href="#">
                                    <i class="fab fa-instagram fa-lg text-info"></i>
                                </a>
                            </div>
                            <div class="col-sm-3">
                                <a href="#">
                                    <i class="fab fa-twitter fa-lg text-info"></i>
                                </a>
                            </div>
                            <div class="col-sm-3">
                                <a href="#" data-toggle="tooltip" data-placement="top" title="722-566-70-14" id="t4">
                                    <i class="fab fa-whatsapp fa-lg text-info"></i>
                                </a>
                            </div>
                        </div>
                        </div>
                    </div>
                </div><!-- SobreMi -->
            </div>
            <div class="col-md-4 col-lg-4 mt-5">
                <!-- SobreMi -->
                <div class="container">
                    <div class="card rounded shadowCard" id="cardSh4">
                        <img class="card-img-top" src="<?php echo SERVERURL; ?>vistas/img/iceland.jpg" alt="Card image cap">
                        <div class="text-center margen-avatar">
                            <img src="<?php echo SERVERURL; ?>vistas/img/usermal.png" alt="" class="rounded-circle" width="100px">
                        </div>
                        <div class="card-body">
                        <h6 class="card-title text-center font-weight-bold">
                            Guillermo Lopez
                        </h6>
                        <p class="card-text text-center text-muted">
                            Analista.
                        </p>
                        <hr style="height: 1px;" class="bg-info">
                        <div class="row text-center mt-4">
                            <div class="col-sm-3">
                                <a href="#">
                                    <i class="fab fa-facebook fa-lg text-info"></i>
                                </a>
                            </div>
                            <div class="col-sm-3">
                                <a href="#">
                                    <i class="fab fa-instagram fa-lg text-info"></i>
                                </a>
                            </div>
                            <div class="col-sm-3">
                                <a href="#">
                                    <i class="fab fa-twitter fa-lg text-info"></i>
                                </a>
                            </div>
                            <div class="col-sm-3">
                                <a href="#" data-toggle="tooltip" data-placement="top" title="726-100-04-84" id="t5">
                                    <i class="fab fa-whatsapp fa-lg text-info"></i>
                                </a>
                            </div>
                        </div>
                        </div>
                    </div>
                </div><!-- SobreMi -->
            </div>
        </div>
    </div>

    <script src="<?php echo SERVERURLALM; ?>alm/js/develop.js"></script>
    <script type="text/javascript">
    	$(function(){
    		$('#t1, #t2, #t3, #t4, #t5').tooltip();
    	});
    </script>
<?php

}