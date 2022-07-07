<?php
	
	require "conexion/databaseMySQL.php";
	session_start();
	if($_POST){
		$usuario = $_POST['usuario'];
		$password = $_POST['password'];
		$sql = "SELECT * FROM users WHERE email='$usuario' and password='$password'";
		$resultado = $mysqli->query($sql);
		$num = $resultado->num_rows;

		if($num>0){
			$row = $resultado->fetch_assoc();
			$password_bd = $row['password'];
			$pass_c = sha1($password);
			
			if($password_bd){
				$_SESSION['email'] = $row['email'];
                $_SESSION['tipo_usuario'] = $row['tipo_usuario'];
				
				header("Location: inicio.php");
				
			} else {
			echo "La contraseña no coincide";
			}
			
			} else {
				echo "No existe usuario";
		}
	}
	
	
	
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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
        
                   <!-- Favicon  -->
                   <link rel="icon" href="img/LOGOPRO.svg">
           <!-- Button back the page-->
               <!-- Navbar -->
    <nav class="navbar navbar-expand-md navbar-dark navbar-custom fixed-top top-nav-collapse" style="padding-top: 25px;
    padding-bottom: 25px;">
        <!-- Text Logo - Use this if you don't have a graphic logo -->
        <!-- <a class="navbar-brand logo-text page-scroll" href="index.html">Aria</a> -->

        <!-- Image Logo -->
        <a class="navbar-brand logo-image" href="index.html"><img src="../images/LOGOPRO.svg" style="width: 54px
        " alt="alternative"></a>
        <!-- Mobile Menu Toggle Button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-awesome fas fa-bars"></span>
            <span class="navbar-toggler-awesome fas fa-times"></span>
        </button>
        <!-- end of mobile menu toggle button -->

 <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav ml-auto">
    
                
            </ul>
        </div>

    
    
        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav ml-auto">
              
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="../index.html">INICIO <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="../index.html">HISTORIA</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="../servicios.html">SERVICIOS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="../index.html">GALERÍA</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="../index.html">ACERCA DE NOSOTROS </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="../contacto.html">CONTACTO</a>
                </li>
            </ul>
         
        </div>
    </nav>
	</head>
    <body class="bg-primary ">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content login">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg" style="    margin-top: 10rem !important;">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">PROMASI</h3></div>
                                    <div class="card-body">
                                        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                            <div class="form-group">
											<label class="small mb-1" for="inputEmailAddress"></label>
											<input class="form-control py-4" id="inputEmailAddress" name="usuario" type="text" placeholder="Ingresa tu usuario" /></div>
                                            <div class="form-group"><label class="small mb-1" for="inputPassword"></label><input class="form-control py-4" id="inputPassword" name="password" type="password" placeholder="Ingresa tu contraseña" /></div>
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox"><input class="custom-control-input" id="rememberPasswordCheck" type="checkbox" /><label class="custom-control-label" for="rememberPasswordCheck">Recordar contraseña</label></div>
											</div >
                                            </div>
											<button type="submit" class="btn" style="background-color: #113448 ; color: #fff;  opacity: 0.5;">Ingresar</button></div>
										</form>
									</div>
								</div>
							</div>
					</div>
				
            <footer class="py-4 bg-light mt-auto">
                <div class="copyright" style="color: white;">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <p class="p-small">
                <a href="#" style="color: white !important;"
                  >Sus datos están protegidos con lo establecido en el articulo 11
                  de la Ley de Protección de Datos Personales en Posesión de
                  Sujetos Obligados del Estado de Jalisco.</a
                >
              </p>
              <p class="p-small">
                Copyright © 2021
                <a href="#" style="color: white !important;"
                  >PROMASI Profesionales en Mantenimiento y Servicios Industriales
                  S.A. de C.V.</a
                >
              </p>
            </div>
            <!-- end of col -->
          </div>
          <!-- enf of row -->
        </div>
        <!-- end of container -->
      </div>
				        </footer>

		</div>
		
		
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <!--<script src="js/scripts.js"></script>-->

	</body>
</html>
