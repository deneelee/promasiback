<?php
	session_start();
	require 'conexion/databaseMySQL.php';
	

	
	$tipo_usuario = $_SESSION['tipo_usuario'];
	
	if($tipo_usuario == 1){
		$where = "";
		} else if($tipo_usuario == 3){
		
	}
	
	$sql = "SELECT * FROM users $where";
	$resultado = $mysqli->query($sql);

	$nombre = $_SESSION['nombre'];
	$tipo_usuario = $_SESSION['tipo_usuario'];
	

	

?>

<!DOCTYPE html>
<html lang="en">
    <head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
		<meta name="description" content="" />
		<meta name="author" content="" />
		<title>PROMASI</title>
		<link href="css/styles.css" rel="stylesheet" />
		<link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
		<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
		
		        <!-- Favicon  -->
        <link rel="icon" href="images/LOGOPRO.svg">
        <!-- Button back the page-->
        
	</head>
	<body class="sb-nav-fixed">
		<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
		<a class="navbar-brand">Sistema Web</a><button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
            <ul class="navbar-nav ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $nombre; ?><i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    <?php if($tipo_usuario == 1 ) { ?>
                        <a class="dropdown-item" href="tabla.php">Configuración</a>
                        <?php } ?>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="logout.php">Salir</a>
					</div>
				</li>
			</ul>
		</nav>

        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">

                        <?php if($tipo_usuario == 1 ) { ?>
                          <a class="nav-link" href="inicio.php"> 
                              <div class="sb-nav-link-icon">
                                <i class="fas fa-tools fa-2x"></i>
                              </div>PROMASI</a>

                                <div class="sb-sidenav-menu-heading">Nuevo Registro</div>
                                    <div class="sb-nav-link-icon">
                                         <a class="nav-link" href="principal.php">
                                             <div class="sb-nav-link-icon">
                                                   <i class="far fa-clipboard fa-lg"></i>
                                            </div>Registro de empleado</a>
						                          	</div>
                                        

                                             <div class="sb-nav-link-icon">
                                                <a class="nav-link" href="cotizaciones.php">
                                                  <div class="sb-nav-link-icon">
                                                    <i class="fa fa-calculator fa-lg" ></i>
                                                  </div>Cotizaciones</a>
                                                </div>
                               

                                                <div class="sb-sidenav-menu-heading">Configuración</div>
                                                    <div class="sb-nav-link-icon">
                                                        <a class="nav-link" href="tabla.php">
                                                            <div class="sb-nav-link-icon">
                                                          <i class="fa fa-user-circle fa-lg"></i>
                                                      </div>Usuarios</a>
						                           	            </div>
                                                   <?php } ?>


                         <?php if($tipo_usuario == 3 ) { ?>
                          <a class="nav-link" href="inicio.php"> 
                              <div class="sb-nav-link-icon">
                                <i class="fas fa-tools fa-2x"></i>
                              </div>PROMASI</a>

                                <div class="sb-sidenav-menu-heading">Nuevo Registro</div>
                                    <div class="sb-nav-link-icon">
                                       
                                             <div class="sb-nav-link-icon">
                                                <a class="nav-link" href="cotizaciones.php">
                                                  <div class="sb-nav-link-icon">
                                                    <i class="fa fa-calculator fa-lg" ></i>
                                                  </div>Cotizaciones</a>
                                                </div>
                               
                                                   <?php } ?>


                        <?php if($tipo_usuario == 2 ) { ?>
                          <a class="nav-link" href="inicio.php"> 
                              <div class="sb-nav-link-icon">
                                <i class="fas fa-tools fa-2x"></i>
                              </div>PROMASI</a>

                                <div class="sb-sidenav-menu-heading">Nuevo Registro</div>
                                    <div class="sb-nav-link-icon">
                                         <a class="nav-link" href="principal.php">
                                             <div class="sb-nav-link-icon">
                                                   <i class="far fa-clipboard fa-lg"></i>
                                            </div>Registro de empleado</a>
						                          	</div>
                                      <?php } ?>


                    					            </div>
                  				            </nav>
			                          </div>


            <div id="layoutSidenav_content">
				<main>
					<div class="container-fluid">
					<h1><br></h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Cotizaciones</li>
						</ol>

        


	<div class="card mb-4">
		<div class="card-header">
         <div id="layoutError">
            <div id="layoutError_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-6">
                                <div class="text-center mt-4">
                                    <h1 class="display-1">404</h1>
                                    <p class="lead">Error en la página</p>
                                    <p>Módulo en construcción.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
		</div>

					</main>
					<footer class="py-4 bg-light mt-auto">
						<div class="container-fluid">
						<div class="d-flex align-items-center justify-content-between small">
						<div class="text-muted">Copyright &copy; 2021 PROMASI Profesionales en Mantenimiento y Servicios Industriales S.A. de C.V</div>
                      <div>
					</div>
				</footer>
			</div>
		</div>
		<script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
		<script src="js/scripts.js"></script>
		<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
		<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
		<script src="assets/demo/datatables-demo.js"></script>
	</body>
</html>

        
