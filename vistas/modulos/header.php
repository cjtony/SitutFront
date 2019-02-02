<!DOCTYPE html>
<html>
<head>
	<title>Tutorías</title>
	<!-- Estilos Bootstrap -->
	<link rel="stylesheet" type="text/css" href="../vistas/css/bootstrap.min.css">
	<!-- Estilos Animate -->
	<link rel="stylesheet" type="text/css" href="../vistas/css/animate.css">
	<!-- Estilos Personalizados -->
	<link rel="stylesheet" type="text/css" href="../vistas/css/estilos.css">
	<!-- Fuente de letra Google -->
	<link href="https://fonts.googleapis.com/css?family=Bitter|PT+Sans" rel="stylesheet">
	<!-- Iconos FontAwesome -->
	<!-- <script defer src="vistas/icons/svg-with-js/js/fontawesome-all.js"></script> -->
	<link rel="stylesheet" type="text/css" href="../vistas/css/fontawesome-all.css">
	<link rel="stylesheet" type="text/css" href="../vistas/datatables/jquery.dataTables.min.css">    
    <link href="../vistas/datatables/buttons.dataTables.min.css" rel="stylesheet"/>
    <link href="../vistas/datatables/responsive.dataTables.min.css" rel="stylesheet"/>
</head>
<body>
	<style type="text/css">
		body {
			background-color: #EEEEEE;
			/*background-color: #FAFAFA;*/
			/*background-color: #ECEFF1;*/
		}
		.colLet {
			color : #EEEEEE;
		}
		.bgNav {
			/*1B5E20*/
			background-color: #28a745;
		}
	</style>
<nav class="navbar navbar-expand-lg bgNav border-bottom">	
	  	<div class="container-fluid">
	  		<a class="navbar-brand">
	  			<img src="../vistas/img/situt2.png" width="300" alt="">
	  		</a>
	  		<button style="outline: none !important;" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
			    <span class="navbar-toggler-icon">
			    	<i class="fas fa-bars fa-2x" style="color:#eeeeee !important;"></i>
			    </span>
			</button>
			<a class="text-center pad30" style="color: #EEEEEE;">
	  			<h3 class="text-uppercase">
	  				Universidad tecnológica del sur del estado de méxico.
	  			</h3>
	  		</a>
	  		<div class="">
	  			 <div class="collapse navbar-collapse" id="navbarNavDropdown">
   					<ul class="navbar-nav">
   						<br>
      					<li class="nav-item dropdown text-center border rounded" style="margin-right: 5px;">
		        			<a style="font-size: 18px; padding: 10px;" class="hovLinkNav nav-link dropdown-toggle btn-light rounded" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		        				<i class="fas fa-user-circle fa-lg icoIni"></i>
		        				<span class="badge badge-success" style="font-size: 17px; padding: 5px;">Alumno : </span>
		         				<?php echo $datAlm->nombre_c_al; ?>
		        			</a>
		        			<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
		          				<a data-backdrop="false" data-toggle="modal" data-target="#confContAlm" class="dropdown-item aNav" href="#">
		          					<i class="fas fa-key fa-lg icoIni"></i> 
		          					Cambiar contraseña
		          				</a>
		          				<div class="dropdown-divider"></div>
		          				<a data-backdrop="false" data-toggle="modal" data-target="#confDatAlm" class="dropdown-item aNav" href="#">
		          					<i class="fas fa-user-cog fa-lg icoIni"></i>
		          					Cambiar datos
		          				</a>
		          				<div class="dropdown-divider"></div>
		          				<a data-backdrop="false" data-toggle="modal" data-target="#confFotPerf" class="dropdown-item aNav" href="#">
		          					<i class="fas fa-image fa-lg icoIni"></i>
		          					Cambiar foto de perfil
		          				</a>
		        			</div>
		      			</li>
		      			<br>
		      			<li class="nav-item text-center border rounded" style="margin-right: 5px;">
					        <a style="font-size: 18px; padding: 10px;" class="hovLinkNav nav-link btn-light text-danger rounded" href="../vistas/modulos/Logout.php">
					        	Salir
					        	<i class="fas fa-sign-out-alt fa-lg"></i>
					        </a>
					    </li>
		    		</ul>
		  		</div>
		  </div>
	  	</div>
	</nav>