<?php
	session_start();
	require 'conexion/databaseMySQL.php';
	
	
	
	$tipo_usuario = $_SESSION['tipo_usuario'];
	
	if($tipo_usuario == 1){
		$where = "";
		} else if($tipo_usuario == 2){
	}
	
	$sql = "SELECT * FROM users $where";
	$resultado = $mysqli->query($sql);


	$nombre = $_SESSION['name'];
	$tipo_usuario = $_SESSION['tipo_usuario'];
	

	$txtEmail=(isset($_POST['txtUsuario']))?$_POST['txtUsuario']:"";
	$txtPassword=(isset($_POST['txtPassword']))?$_POST['txtPassword']:"";
	$txtNombre=(isset($_POST['txtNombre']))?$_POST['txtNombre']:"";
	$txtTipoUsuario=(isset($_POST['txtTipoUsuario']))?$_POST['txtTipoUsuario']:"";

	
	
		$accion2=(isset($_POST['accion2']))?$_POST['accion2']:"";
	
		$error=array();
	
	  
	
		$accion2Agregar="";
		$accion2Modificar=$accion2Eliminar=$accion2Cancelar="disabled";
		$mostrarModal=false;
	
		   
	
		require 'conexion/databasePDO.php';
	
		switch ($accion2) {
			case 'btnAgregar':
	
			$sentencia=$conn->prepare("INSERT INTO users (name,email,password,tipo_usuario) 
			VALUES ('$txtNombre',' $txtEmail',$txtPassword', '$txtTipoUsuario') ");
			$sentencia->execute();

				header('Location: tabla.php');
	
				break;
	

			case 'btnEliminar':

				$sentencia=$conn->prepare("DELETE FROM users ");
				$sentencia->execute();
						
				header('Location: tabla.php');

			break;
	


			case 'Seleccionar':

				$accion2Agregar="disabled";
				$accion2Modificar=$accion2Eliminar=$accion2Cancelar="";
				
				
				$sentencia=$conn->prepare("SELECT * FROM users ");
				$sentencia->execute();			
				$empleado=$sentencia->fetch(PDO::FETCH_LAZY);
				
				$txtUsuario=$empleado['email'];
				$txtPassword=$empleado['password'];
				$txtNombre=$empleado['name'];
				$txtTipoUsuario=$empleado['tipo_usuario'];
			
				break;	
	}
	
	
	$sentencia=$conn->prepare("SELECT * FROM `users` WHERE 1");
	$sentencia->execute();
	$listEmpleados=$sentencia->fetchAll(PDO::FETCH_ASSOC);
	




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
                            <li class="breadcrumb-item active">Control de Usuarios</li>
						</ol>
						<form action="" method="post" enctype="multipart/form-data">
       			        <br>
      				   <input type="hidden" name="txtIDUS" value="<?php echo $txtIDUS; ?>" id="txtIDUS" required>
						 
          <div class="row">
		  <div class="form-group col-md-4">	  
                    </div>

                <div class="form-group col-md-4">
                    <label for="">Usuario:</label>
                    <input required="required" type="text" name="txtUsuario" class="form-control" 
					<?php echo (isset($error['usuario']))?"is-invalid":"";?> 
					value="<?php echo $txtEmail; ?>" id="txtUsuario">
                    <div class="invalid-feedback">
                    <?php echo (isset($error['usuario']))?$error['usuario']:"";?>
                    </div>
                    <br>
                    </div>  

					<div class="form-group col-md-4">	  
                    </div>

					<div class="form-group col-md-4">	  
                    </div>

					<div class="form-group col-md-4">
                      <label for="">Contraseña:</label> 
                      <input required="required" type="text" name="txtPassword" class="form-control" 
					  <?php echo (isset($error['password']))?"is-invalid":"";?> 
					  value="<?php echo $txtPassword; ?>" id="txtPassword" >
                      <div class="invalid-feedback">
                      <?php echo (isset($error['password']))?$error['password']:"";?>
                      </div>
                      <br>
                    </div>
					
					<div class="form-group col-md-4">	  
                    </div>

					<div class="form-group col-md-4">	  
                    </div>

					<div class="form-group col-md-4">
                      <label for="">Nombre:</label> 
                      <input required="required" type="text" name="txtNombre" class="form-control" 
					  <?php echo (isset($error['nombre']))?"is-invalid":"";?> 
					  value="<?php echo $txtNombre; ?>" id="txtNombre" >
                      <div class="invalid-feedback">
                      <?php echo (isset($error['nombre']))?$error['nombre']:"";?>
                      </div>
                      <br>
                    </div>
					
					<div class="form-group col-md-4">	  
                    </div>

					<div class="form-group col-md-4">	  
                    </div>

 					<div class="form-group col-md-4">
                      <label for="">Tipo de usuario:</label> 
                      <input required="required" type="text" name="txtTipoUsuario" class="form-control" 
					  <?php echo (isset($error['txtTipoUsuario']))?"is-invalid":"";?> 
					  value="<?php echo $txtTipoUsuario; ?>" id="txtTipoUsuario" >
                      <div class="invalid-feedback">
                      <?php echo (isset($error['tipo_usuario']))?$error['tipo_usuario']:"";?>
                      </div>
                      <br>
                    </div>

					<div class="form-group col-md-4">	  
                    </div>
						
						<div class="col-md-5">
						</div>
						<div class="col-md-2">
                            <button value="btnAgregar" <?php echo $accion2Agregar; ?> class="btn btn-success" type="submit" name="accion2" >&nbsp; &nbsp; Agregar &nbsp; &nbsp;</button>
						</div>
						  <div class="form-group col-md-12">	
						  <br>  
                    	</div>
                	 </form>
                </div>   
						<div class="card mb-4">
							<div class="card-header">
								<i class="fas fa-table mr-1"></i>Usuarios existentes</div>
							<div class="card-body">
								<div class="table-responsive">
									<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
										<thead>
											<tr>
												<th>Usuario</th>
												<th>Password</th>
												<th>Nombre</th>
												<th>Tipo Usuario</th>
												<th>Acciones</th>
											</tr>
										</thead>
										<tbody>
											<?php foreach($listEmpleados as $empleado){ ?>	
												<tr>
													<td><?php echo $empleado['email']; ?></td>
													<td><?php echo $empleado['password']; ?></td>
													<td><?php echo $empleado['name']; ?></td>
													<td><?php echo $empleado['tipo_usuario']; ?></td>
													<td>
													<form action="" method="post">
														<input type="hidden" name="txtIDUS" value="">
                                            		    <button value="btnEliminar" type="submit" name="accion2" class="btn btn-danger">
														<i class="fas fa-trash-alt"></i>
														</button>
													</form>
													</td>
												</tr>
											<?php } ?>
										</tbody>
									</table>
								</div>
							</div>
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

    <!-- jQuery, Popper.js, Bootstrap JS -->
    <script src="jquery/jquery-3.3.1.min.js"></script>
    <!--<script src="popper/popper.min.js"></script>-->
    <script src="bootstrap/js/bootstrap.min.js"></script>
      
    <!-- datatables JS -->
    <script type="text/javascript" src="datatables/datatables.min.js"></script>    
     
    <!-- para usar botones en datatables JS -->  
    <script src="datatables/Buttons-1.5.6/js/dataTables.buttons.min.js"></script>  
    <script src="datatables/JSZip-2.5.0/jszip.min.js"></script>    
    <!--
    <script src="datatables/pdfmake-0.1.36/pdfmake.min.js"></script>    
    <script src="datatables/pdfmake-0.1.36/vfs_fonts.js"></script>
                                        -->
    <script src="datatables/Buttons-1.5.6/js/buttons.html5.min.js"></script>
     
    <!-- código JS propìo-->    
    <script type="text/javascript" src="main.js"></script>  

		<script src="js/scripts.js"></script>
		
        
	</body>
</html>
