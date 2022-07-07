<?php
	
	session_start();
	require 'conexion/databaseMySQL.php';
	
	

	$tipo_usuario = $_SESSION['tipo_usuario'];
	
	if($tipo_usuario == 1){
		$where = "";
		} else if($tipo_usuario == 2){
	
	}
	
	$sql = "SELECT * FROM users ";
	$resultado = $mysqli->query($sql);

	$nombre = $_SESSION['name'];
	$tipo_usuario = $_SESSION['tipo_usuario'];
	
	
    
$txtID=(isset($_POST['txtID']))?$_POST['txtID']:"";
$txtNSS=(isset($_POST['txtNSS']))?$_POST['txtNSS']:"";
$txtOcupacion=(isset($_POST['txtOcupacion']))?$_POST['txtOcupacion']:"";
$txtNombre=(isset($_POST['txtNombre']))?$_POST['txtNombre']:"";
$txtApellidoP=(isset($_POST['txtApellidoP']))?$_POST['txtApellidoP']:"";
$txtApellidoM=(isset($_POST['txtApellidoM']))?$_POST['txtApellidoM']:"";
$txtCalle=(isset($_POST['txtCalle']))?$_POST['txtCalle']:"";
$txtNumero=(isset($_POST['txtNumero']))?$_POST['txtNumero']:"";
$txtCP=(isset($_POST['txtCP']))?$_POST['txtCP']:"";
$txtColonia=(isset($_POST['txtColonia']))?$_POST['txtColonia']:"";
$txtCiudad=(isset($_POST['txtCiudad']))?$_POST['txtCiudad']:"";
$txtEstado=(isset($_POST['txtEstado']))?$_POST['txtEstado']:"";
$txtRFC=(isset($_POST['txtRFC']))?$_POST['txtRFC']:"";
$txtLuYFeDNac=(isset($_POST['txtLuYFeDNac']))?$_POST['txtLuYFeDNac']:"";
$txtCurp=(isset($_POST['txtCurp']))?$_POST['txtCurp']:"";
$txtEmail=(isset($_POST['txtEmail']))?$_POST['txtEmail']:"";
$txtTelefono=(isset($_POST['txtTelefono']))?$_POST['txtTelefono']:"";
$txtNombreD=(isset($_POST['txtNombreD']))?$_POST['txtNombreD']:"";
$txtEdadD=(isset($_POST['txtEdadD']))?$_POST['txtEdadD']:"";
$txtParentescoD=(isset($_POST['txtParentescoD']))?$_POST['txtParentescoD']:"";
$txtOcupacionD=(isset($_POST['txtOcupacionD']))?$_POST['txtOcupacionD']:"";
$txtDireccionD=(isset($_POST['txtDireccionD']))?$_POST['txtDireccionD']:"";
$txtNombreP=(isset($_POST['txtNombreP']))?$_POST['txtNombreP']:"";
$txtEdadP=(isset($_POST['txtEdadP']))?$_POST['txtEdadP']:"";
$txtParentescoP=(isset($_POST['txtParentescoP']))?$_POST['txtParentescoP']:"";
$txtOcupacionP=(isset($_POST['txtOcupacionP']))?$_POST['txtOcupacionP']:"";
$txtDireccionP=(isset($_POST['txtDireccionP']))?$_POST['txtDireccionP']:"";
$txtNombreO=(isset($_POST['txtNombreO']))?$_POST['txtNombreO']:"";
$txtEdadO=(isset($_POST['txtEdadO']))?$_POST['txtEdadO']:"";
$txtParentescoO=(isset($_POST['txtParentescoO']))?$_POST['txtParentescoO']:"";
$txtOcupacionO=(isset($_POST['txtOcupacionO']))?$_POST['txtOcupacionO']:"";
$txtDireccionO=(isset($_POST['txtDireccionO']))?$_POST['txtDireccionO']:"";
$txtNombreI=(isset($_POST['txtNombreI']))?$_POST['txtNombreI']:"";
$txtEdadI=(isset($_POST['txtEdadI']))?$_POST['txtEdadI']:"";
$txtParentescoI=(isset($_POST['txtParentescoI']))?$_POST['txtParentescoI']:"";
$txtOcupacionI=(isset($_POST['txtOcupacionI']))?$_POST['txtOcupacionI']:"";
$txtDireccionI=(isset($_POST['txtDireccionI']))?$_POST['txtDireccionI']:"";
$txtNombreM=(isset($_POST['txtNombreM']))?$_POST['txtNombreM']:"";
$txtEdadM=(isset($_POST['txtEdadM']))?$_POST['txtEdadM']:"";
$txtParentescoM=(isset($_POST['txtParentescoM']))?$_POST['txtParentescoM']:"";
$txtOcupacionM=(isset($_POST['txtOcupacionM']))?$_POST['txtOcupacionM']:"";
$txtDireccionM=(isset($_POST['txtDireccionM']))?$_POST['txtDireccionM']:"";
$txtObservaciones=(isset($_POST['txtObservaciones']))?$_POST['txtObservaciones']:"";

$txtFoto=(isset($_FILES['txtFoto']["name"]))?$_FILES['txtFoto']:"";





	$accion=(isset($_POST['accion']))?$_POST['accion']:"";

	$error=array();

  

	$accionAgregar="";
  $accionModificar=$accionCancelar="disabled";
  $mostrarModal=false;

	require 'conexion/databasePDO.php';

	switch ($accion) {
		case 'btnAgregar':

      $Fecha = new DateTime();
			$nombreArchivo=($txtFoto!="")?$Fecha->getTimestamp()."_".$_FILES["txtFoto"]["name"]:"";

			$tmpFoto=$_FILES["txtFoto"]["tmp_name"];

			if ($tmpFoto!="") {
				
				move_uploaded_file($tmpFoto,"Imagenes/".$nombreArchivo);
			}
				$foto2=$nombreArchivo;
				

        $sentencia=$conn->prepare("INSERT INTO empleados (NSS,Ocupacion,Nombre,ApellidoP,ApellidoM,Calle,Numero,CP,Colonia,Ciudad,Estado,RFC,LuYFeDNac,Curp,Email,Telefono,NombreD,EdadD,ParentescoD,OcupacionD,DireccionD,NombreP,EdadP,ParentescoP,OcupacionP,DireccionP,NombreO,EdadO,ParentescoO,OcupacionO,DireccionO,NombreI,EdadI,ParentescoI,OcupacionI,DireccionI,NombreM,EdadM,ParentescoM,OcupacionM,DireccionM,Observaciones,Foto) 
        VALUES ('$txtNSS','$txtOcupacion','$txtNombre','$txtApellidoP','$txtApellidoM','$txtCalle','$txtNumero','$txtCP','$txtColonia','$txtCiudad','$txtEstado','$txtRFC','$txtLuYFeDNac','$txtCurp','$txtEmail','$txtTelefono','$txtNombreD','$txtEdadD','$txtParentescoD','$txtOcupacionD','$txtDireccionD','$txtNombreP','$txtEdadP','$txtParentescoP','$txtOcupacionP','$txtDireccionP','$txtNombreO','$txtEdadO','$txtParentescoO','$txtOcupacionO','$txtDireccionO','$txtNombreI','$txtEdadI','$txtParentescoI','$txtOcupacionI','$txtDireccionI','$txtNombreM','$txtEdadM','$txtParentescoM','$txtOcupacionM','$txtDireccionM','$txtObservaciones','$foto2') ");
        $sentencia->execute();
			
			header('Location: principal.php');

			break;

		case 'btnModificar':

		$sentencia=$conn->prepare("UPDATE empleados SET 
			NSS='$txtNSS',
			Ocupacion='$txtOcupacion',
			Nombre='$txtNombre',
			ApellidoP='$txtApellidoP',
			ApellidoM='$txtApellidoM',
			Calle='$txtCalle',
			Numero='$txtNumero',
			CP='$txtCP',
			Colonia='$txtColonia',
			Ciudad='$txtCiudad',
			Estado='$txtEstado',
			RFC='$txtRFC',
			LuYFeDNac='$txtLuYFeDNac',
			Curp='$txtCurp',
			Email='$txtEmail',
			Telefono='$txtTelefono', 
			NombreD='$txtNombreD',
			EdadD='$txtEdadD',
			ParentescoD='$txtParentescoD', 
			OcupacionD='$txtOcupacionD',
			DireccionD='$txtDireccionD', 
      NombreP='$txtNombreP',
			EdadP='$txtEdadP',
			ParentescoP='$txtParentescoP', 
			OcupacionP='$txtOcupacionP',
			DireccionP='$txtDireccionP', 
      NombreO='$txtNombreO',
			EdadO='$txtEdadO',
			ParentescoO='$txtParentescoO', 
			OcupacionO='$txtOcupacionO',
			DireccionO='$txtDireccionO', 
      NombreI='$txtNombreI',
			EdadI='$txtEdadI',
			ParentescoI='$txtParentescoI', 
			OcupacionI='$txtOcupacionI',
			DireccionI='$txtDireccionI', 
      NombreM='$txtNombreM',
			EdadM='$txtEdadM',
			ParentescoM='$txtParentescoM', 
			OcupacionM='$txtOcupacionM',
			DireccionM='$txtDireccionM', 
			Observaciones='$txtObservaciones'
			WHERE ID ='$txtID'");
			$sentencia->execute();
			
			

      $Fecha = new DateTime();
			$nombreArchivo=($txtFoto!="")?$Fecha->getTimestamp()."_".$_FILES["txtFoto"]["name"]:"imagen.jpg";

			$tmpFoto=$_FILES["txtFoto"]["tmp_name"];

			if ($tmpFoto!="") {
				
				move_uploaded_file($tmpFoto,"Imagenes/".$nombreArchivo);

					$sentencia=$conn->prepare("SELECT Foto FROM empleados WHERE ID ='$txtID'");
					$sentencia->execute();			
					$empleado=$sentencia->fetch(PDO::FETCH_LAZY);
					

					if (isset($empleado['Foto'])) {
						if (file_exists("Imagenes/".$empleado['Foto'])) {
							if ($item['Foto']!="imagen.jpg") {
							
							unlink("Imagenes/".$empleado['Foto']);
							}
						}
					}


					$sentencia=$conn->prepare("UPDATE empleados SET 
					Foto = '$nombreArchivo'  
					WHERE ID ='$txtID'");
					$sentencia->execute();
			}
				    $foto2=$nombreArchivo;

			header('Location: principal.php');

			break;



		case 'btnEliminar':

			$sentencia=$conn->prepare("SELECT Foto FROM empleados WHERE ID = '$txtID'");
			$sentencia->execute();	
			$empleado=$sentencia->fetch(PDO::FETCH_LAZY);
		

			if (isset($empleado['Foto'])&&($item['Foto']!="imagen.jpg")) {
				if (file_exists("Imagenes/".$empleado['Foto'])) {
					unlink("Imagenes/".$empleado['Foto']);
				}
			}

			$sentencia=$conn->prepare("DELETE FROM empleados WHERE ID = '$txtID'");
			$sentencia->execute();

			header('Location: principal.php');
			break;

		case 'btnCancelar':
			header('Location: principal.php');
			break;		

		case 'Seleccionar':

			$accionAgregar="disabled";
			$accionModificar=$accionCancelar="";
			
			$sentencia=$conn->prepare("SELECT * FROM empleados WHERE ID = '$txtID'");
			$sentencia->execute();			
			$empleado=$sentencia->fetch(PDO::FETCH_LAZY);

			$txtID=$empleado['ID'];
			$txtNSS=$empleado['NSS'];
			$txtOcupacion=$empleado['Ocupacion'];
			$txtNombre=$empleado['Nombre'];
			$txtApellidoP=$empleado['ApellidoP'];
			$txtApellidoM=$empleado['ApellidoM'];
			$txtCalle=$empleado['Calle'];
			$txtNumero=$empleado['Numero'];
			$txtCP=$empleado['CP'];
			$txtColonia=$empleado['Colonia'];
			$txtCiudad=$empleado['Ciudad'];
			$txtEstado=$empleado['Estado'];
			$txtRFC=$empleado['RFC'];
			$txtLuYFeDNac=$empleado['LuYFeDNac'];
			$txtCurp=$empleado['Curp'];
			$txtEmail=$empleado['Email'];

			$txtTelefono=$empleado['Telefono'];
			$txtNombreD=$empleado['NombreD'];
			$txtEdadD=$empleado['EdadD'];
			$txtParentescoD=$empleado['ParentescoD'];
			$txtOcupacionD=$empleado['OcupacionD'];
			$txtDireccionD=$empleado['DireccionD'];
      $txtNombreP=$empleado['NombreP'];
			$txtEdadP=$empleado['EdadP'];
			$txtParentescoP=$empleado['ParentescoP'];
			$txtOcupacionP=$empleado['OcupacionP'];
			$txtDireccionP=$empleado['DireccionP'];
      $txtNombreO=$empleado['NombreO'];
			$txtEdadO=$empleado['EdadO'];

			$txtParentescoO=$empleado['ParentescoO'];
			$txtOcupacionO=$empleado['OcupacionO'];
			$txtDireccionO=$empleado['DireccionO'];
      $txtNombreI=$empleado['NombreI'];
			$txtEdadI=$empleado['EdadI'];
			$txtParentescoI=$empleado['ParentescoI'];
			$txtOcupacionI=$empleado['OcupacionI'];
			$txtDireccionI=$empleado['DireccionI'];
      $txtNombreM=$empleado['NombreM'];
      
			$txtEdadM=$empleado['EdadM'];
			$txtParentescoM=$empleado['ParentescoM'];
			$txtOcupacionM=$empleado['OcupacionM'];
			$txtDireccionM=$empleado['DireccionM'];
      $txtObservaciones=$empleado['Observaciones'];
			$txtFoto=$empleado['Foto'];

			break;	
}


$sentencia=$conn->prepare("SELECT * FROM empleados WHERE 1");
$sentencia->execute();
$listEmpleados=$sentencia->fetchAll(PDO::FETCH_ASSOC);




?>

<!DOCTYPE html>
<html lang="es">
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
            <a class="navbar-brand" >Sistema Web</a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#">
              <i class="fas fa-bars"></i></button>
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

                                                    
                                                <div class="sb-sidenav-menu-heading">Sitio Web</div>
                                                    <div class="sb-nav-link-icon">
                                                        <a class="nav-link" href="../index.html">
                                                            <div class="sb-nav-link-icon">
                                                          <i class="fa fa-user-circle fa-lg"></i>
                                                      </div>PROMASI</a>
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
                            <li class="breadcrumb-item active">Registro +</li>
						            </ol>
                        
        
        <form action="" method="post" enctype="multipart/form-data">
               <br>
         <input type="hidden" name="txtID" value="<?php echo $txtID; ?>" placeholder="" id="txtID" required>
                    
          <div class="row">
              
                <div class="form-group col-md-4">
                    <label for="">NSS:</label>
                      <input required="required" title="Por favor ingrese número de seguro social con 11 digitos, en caso de contener cero al principio agregar ' ." type="text" name="txtNSS" class="form-control" minlength="11" maxlength="11"
                    <?php echo (isset($error['NSS']))?"is-invalid":"";?> value="<?php echo $txtNSS; ?>" placeholder="Ejemplo:  '04122222227" id="txtNSS">
                    <div class="invalid-feedback">
                    <?php echo (isset($error['NSS']))?$error['NSS']:"";?>
                    </div>
                    
                    <br>
                    </div>  

                    <div class="form-group col-md-4">
                      <label for="">Ocupación:</label> 
                      <input title="Aquí debe colocar la ocupación." required="required" type="text" name="txtOcupacion" class="form-control" 
                      <?php echo (isset($error['Ocupacion']))?"is-invalid":"";?> value="<?php echo $txtOcupacion; ?>" placeholder="Ejemplo:  AYUDANTE GENERAL" id="txtOcupacion" >
                      <div class="invalid-feedback">
                      <?php echo (isset($error['Ocupacion']))?$error['Ocupacion']:"";?>
                      </div>
                      <br>
                    </div>
                  
                    <div class="form-group col-md-4">
                      <label for="">Foto:</label>
                        <?php if($txtFoto!=""){?>
                        </br>
                        <img class="img-thumbnail rounded mx-auto d-block " width="200px" src="Imagenes/<?php echo $txtFoto; ?>" />
                        </br>
                        </br>
                        <?php }?>
                        <input type="file" accept="image/'" name="txtFoto" class="form-control" value="<?php echo $txtFoto; ?>" id="txtFoto" >
                        <br>
                    </div> 

                    <div class="form-group col-md-4">
                      <label for="">Nombre:</label>
                      <input title="Aquí debe de colocar el o los nombre (s)." required="required"  type="text" name="txtNombre" class="form-control" 
                      <?php echo (isset($error['Nombre']))?"is-invalid":"";?> value="<?php echo $txtNombre; ?>" id="txtNombre" >
                      <div class="invalid-feedback">
                      <?php echo (isset($error['Nombre']))?$error['Nombre']:"";?></div>
                      <br>
                    </div>


                    <div class="form-group col-md-4">
                      <label for="">Apellido Paterno:</label>
                      <input title="Aquí debe de colocar el apellido paterno." required="required"  type="text" name="txtApellidoP" class="form-control" 
                      <?php echo (isset($error['ApellidoP']))?"is-invalid":"";?> value="<?php echo $txtApellidoP; ?>" id="txtApellidoP" >
                      <div class="invalid-feedback"><?php echo (isset($error['ApellidoP']))?$error['ApellidoP']:"";?></div>
                      <br>
                    </div>
                  
             
                    <div class="form-group col-md-4">
                      <label for="">Apellido Materno:</label>
                      <input title="Aquí debe de colocar el apellido materno." required="required"  type="text" name="txtApellidoM" class="form-control" 
                      <?php echo (isset($error['ApellidoM']))?"is-invalid":"";?> value="<?php echo $txtApellidoM; ?>" id="txtApellidoM" >
                      <div class="invalid-feedback"><?php echo (isset($error['ApellidoM']))?$error['ApellidoM']:"";?></div>
                      <br>
                    </div>
          
                    <div class="form-group col-md-3">
                      <label for="">Calle:</label>
                      <input title="Aquí debe de colocar la dirección." required="required" type="text" name="txtCalle" class="form-control" 
                      <?php echo (isset($error['Calle']))?"is-invalid":"";?> value="<?php echo $txtCalle; ?>" id="txtCalle" >
                      <div class="invalid-feedback"><?php echo (isset($error['Calle']))?$error['Calle']:"";?></div>
                      <br>
                    </div>
          
                    <div class="form-group col-md-1">
                      <label for="">Número:</label>
                      <input title="Colocar número de vivienda." required="required"  type="text" name="txtNumero" class="form-control" 
                      <?php echo (isset($error['Numero']))?"is-invalid":"";?> value="<?php echo $txtNumero; ?>" placeholder="" id="txtNumero" >
                      <div class="invalid-feedback"><?php echo (isset($error['Numero']))?$error['Numero']:"";?></div>
                      <br>
                    </div>
                   
                    <div class="form-group col-md-2">					
                    <label for=""><a href="https://www.correosdemexico.gob.mx/SSLServicios/ConsultaCP/Descarga.aspx" target="_blank">C.P.:</a></label>
                      <input title="Colocar código postal, favor de verificar en  SEPOMEX. De click en C.P.: para ir a la página" required="required"  type="text" name="txtCP" class="form-control" 
                      <?php echo (isset($error['CP']))?"is-invalid":"";?> value="<?php echo $txtCP; ?>" placeholder="" id="txtCP" >
                      <div class="invalid-feedback"><?php echo (isset($error['CP']))?$error['CP']:"";?></div>
                      <br>
                    </div>
          
                    <div class="form-group col-md-2">	
                    <label for=""><a href="https://www.correosdemexico.gob.mx/SSLServicios/ConsultaCP/Descarga.aspx" target="_blank">Colonia:</a></label>
                      <input title="Colocar la Colonia si la desconoce puede dar click en Colonia: para consultarla en la página SEPOMEX." required="required"  type="text" name="txtColonia" class="form-control" 
                      <?php echo (isset($error['Colonia']))?"is-invalid":"";?> value="<?php echo $txtColonia; ?>" placeholder="" id="txtColonia" >
                      <div class="invalid-feedback"><?php echo (isset($error['Colonia']))?$error['Colonia']:"";?></div>
                      <br>
                    </div>

                    <div class="form-group col-md-2">	
                    <label for="">Ciudad:</label>
                      <input title="Colocar la ciudad a la que pertenece su colonia, si la desconoce puede dar click en Ciuada: para consultarla." required="required" type="text" name="txtCiudad" class="form-control" 
                      <?php echo (isset($error['Ciudad']))?"is-invalid":"";?> value="<?php echo $txtCiudad; ?>" placeholder="" id="txtCiudad" >
                      <div class="invalid-feedback"><?php echo (isset($error['Ciudad']))?$error['Ciudad']:"";?></div>
                      <br>
                    </div> 

                    <div class="form-group col-md-2">	
                      <label for="">Estado:</label>
                      <input title="Colocar el Estado donde vive." required="required" type="text" name="txtEstado" class="form-control" <?php echo (isset($error['Estado']))?"is-invalid":"";?> value="<?php echo $txtEstado; ?>" placeholder="" id="txtEstado" >
                      <div class="invalid-feedback"><?php echo (isset($error['Estado']))?$error['Estado']:"";?></div>
                      <br>
                    </div>
                    
                    <div class="form-group col-md-4">	          
                      <label for=""><a href="https://www.sat.gob.mx/tramites/operacion/28753/obten-tu-rfc-con-la-clave-unica-de-registro-de-poblacion-curp" target="_blank">RFC:</a></label>
                      <input maxlength="35" title="Colocar su RFC con homoclave del SAT, si la desconoce puede consultarlo o tramitarlo al darle click en RFC: "required="required" type="text" name="txtRFC" class="form-control" 
                      <?php echo (isset($error['RFC']))?"is-invalid":"";?> value="<?php echo $txtRFC; ?>" id="txtRFC" >
                      <div class="invalid-feedback"><?php echo (isset($error['RFC']))?$error['RFC']:"";?></div>
                      <br>
                    </div>      

                    <div class="form-group col-md-2">	  
                    <br>
                    </div>

                    <div class="form-group col-md-6">	          
                      <label for="">Lugar y fecha de nacimiento:</label>
                      <input title="Colocar el estado de la república en el que nació y colocar su fecha de nacimiento con el formato." required="required"  type="text" name="txtLuYFeDNac" class="form-control" 
                      <?php echo (isset($error['LuYFeDNac']))?"is-invalid":"";?> value="<?php echo $txtLuYFeDNac; ?>" placeholder="xxxxxx, dd/mm/aaaa" id="txtLuYFeDNac" >
                      <div class="invalid-feedback"><?php echo (isset($error['LuYFeDNac']))?$error['LuYFeDNac']:"";?></div>
                      <br>
                    </div>   

                    <div class="form-group col-md-3">	                
                    <label for=""><a href="https://www.gob.mx/curp/" target="_blank"> CURP:</a></label>  
                      <input minlength="18" maxlength="18" title="Favor de ingresar su CURP a 18 caracteres, si la desconoce puede dar click en CURP: para consultarla." required="required"  type="text" name="txtCurp" class="form-control" 
                      <?php echo (isset($error['Curp']))?"is-invalid":"";?> value="<?php echo $txtCurp; ?>" placeholder="" id="txtCurp" >
                      <div class="invalid-feedback"><?php echo (isset($error['Curp']))?$error['Curp']:"";?></div>
                      <br>
                    </div>                    
                    
                    <div class="form-group col-md-1">	  
                    <br>
                    </div>

                    <div class="form-group col-md-4">	
                      <label for="">Email:</label>
                      <input required="required" type="email" name="txtEmail" class="form-control" 
                      <?php echo (isset($error['Email']))?"is-invalid":"";?> value="<?php echo $txtEmail; ?>" placeholder="" id="txtEmail" >
                      <div class="invalid-feedback"><?php echo (isset($error['Email']))?$error['Email']:"";?></div>
                      <br>
                    </div>                           

                    <div class="form-group col-md-1">	  
                    <br>
                    </div>

                    <div class="form-group col-md-3">	
                      <label for="">Teléfono:</label>
                      <input title="Escribir número de teléfono con clave lada a 10 digitos." required="required"  type="text" name="txtTelefono" class="form-control" 
                      <?php echo (isset($error['Telefono']))?"is-invalid":"";?> value="<?php echo $txtTelefono; ?>"  placeholder="Ejemplo:  3312345678" id="txtTelefono" >
                      <div class="invalid-feedback"><?php echo (isset($error['Telefono']))?$error['Telefono']:"";?></div>
                      <br>
                    </div>       
                    
                    <div class="form-group col-md-12">	  
                    <hr>
                    </div>


                    <div class="form-group col-md-12">	  
                    <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Datos familiares (Padres, Hermanos, Esposa (o)): </li>
						            </ol>  
                    </div>

                 
                    
                      <div class="form-group col-md-2">	 
                      <label for="">Nombre:</label>
                      <input type="text" name="txtNombreD" class="form-control"
                      <?php echo (isset($error['NombreD']))?"is-invalid":"";?> value="<?php echo $txtNombreD; ?>" id="txtNombreD" >
                      <div class="invalid-feedback"><?php echo (isset($error['NombreD']))?$error['NombreD']:"";?></div>
                      <br>
                      </div>

                      <div class="form-group col-md-1">	
                      <label for="">Edad:</label>
                      <input type="text" name="txtEdadD" class="form-control" 
                      <?php echo (isset($error['EdadD']))?"is-invalid":"";?> value="<?php echo $txtEdadD; ?>" id="txtEdadD" >
                      <div class="invalid-feedback"><?php echo (isset($error['EdadD']))?$error['EdadD']:"";?></div>
                      <br>
                      </div>


                      <div class="form-group col-md-2">
                      <label for="">Parentesco:</label>
                      <input type="text" name="txtParentescoD" class="form-control" 
                      <?php echo (isset($error['ParentescoD']))?"is-invalid":"";?> value="<?php echo $txtParentescoD; ?>"  id="txtParentescoD" >
                      <div class="invalid-feedback"><?php echo (isset($error['ParentescoD']))?$error['ParentescoD']:"";?></div>
                      <br>
                      </div>


                      <div class="form-group col-md-2">
                      <label for="">Ocupación:</label>
                      <input type="text" name="txtOcupacionD" class="form-control" 
                      <?php echo (isset($error['OcupacionD']))?"is-invalid":"";?> value="<?php echo $txtOcupacionD; ?>" placeholder="" id="txtOcupacionD" >
                      <div class="invalid-feedback"><?php echo (isset($error['OcupacionD']))?$error['OcupacionD']:"";?></div>
                      <br>
                      </div>

                      <div class="form-group col-md-5"> 
                      <label for="">Dirección:</label>
                      <input type="text" name="txtDireccionD" class="form-control" 
                      <?php echo (isset($error['DireccionD']))?"is-invalid":"";?> value="<?php echo $txtDireccionD; ?>" placeholder="" id="txtDireccionD" >
                      <div class="invalid-feedback"><?php echo (isset($error['DireccionD']))?$error['DireccionD']:"";?></div>
                      <br>
                      </div>   	


                      <div class="form-group col-md-2">
                      <input type="text" name="txtNombreP" class="form-control" 
                      <?php echo (isset($error['NombreP']))?"is-invalid":"";?> value="<?php echo $txtNombreP; ?>" id="txtNombreP" >
                      <div class="invalid-feedback"><?php echo (isset($error['NombreP']))?$error['NombreP']:"";?></div>
                      <br>
                      </div>   	

                      <div class="form-group col-md-1">	
                      <input type="text" name="txtEdadP" class="form-control" 
                      <?php echo (isset($error['EdadP']))?"is-invalid":"";?> value="<?php echo $txtEdadP; ?>" id="txtEdadP" >
                      <div class="invalid-feedback"><?php echo (isset($error['EdadP']))?$error['EdadP']:"";?></div>
                      <br>
                      </div>   	

                      <div class="form-group col-md-2">
                      <input type="text" name="txtParentescoP" class="form-control" 
                      <?php echo (isset($error['ParentescoP']))?"is-invalid":"";?> value="<?php echo $txtParentescoP; ?>" id="txtParentescoP" >
                      <div class="invalid-feedback"><?php echo (isset($error['ParentescoP']))?$error['ParentescoP']:"";?></div>
                      <br>
                      </div>   	

                      <div class="form-group col-md-2">
                      <input type="text" name="txtOcupacionP" class="form-control" 
                      <?php echo (isset($error['OcupacionP']))?"is-invalid":"";?> value="<?php echo $txtOcupacionP; ?>"id="txtOcupacionP" >
                      <div class="invalid-feedback"><?php echo (isset($error['OcupacionP']))?$error['OcupacionP']:"";?></div>
                      <br>
                      </div>   	

                      <div class="form-group col-md-5"> 
                      <input type="text" name="txtDireccionP" class="form-control" 
                      <?php echo (isset($error['DireccionP']))?"is-invalid":"";?> value="<?php echo $txtDireccionP; ?>" id="txtDireccionP" >
                      <div class="invalid-feedback"><?php echo (isset($error['DireccionP']))?$error['DireccionP']:"";?></div>
                      <br>
                      </div>   	

                      <div class="form-group col-md-2">
                      <input type="text" name="txtNombreO" class="form-control"
                      <?php echo (isset($error['NombreO']))?"is-invalid":"";?> value="<?php echo $txtNombreO; ?>" id="txtNombreO" >
                      <div class="invalid-feedback"><?php echo (isset($error['NombreO']))?$error['NombreO']:"";?></div>
                      <br>
                      </div>   	

                      <div class="form-group col-md-1">	
                      <input type="text" name="txtEdadO" class="form-control" 
                      <?php echo (isset($error['EdadO']))?"is-invalid":"";?> value="<?php echo $txtEdadO; ?>" id="txtEdadO" >
                      <div class="invalid-feedback"><?php echo (isset($error['EdadO']))?$error['EdadO']:"";?></div>
                      <br>
                      </div>   	

                      <div class="form-group col-md-2">
                      <input type="text" name="txtParentescoO" class="form-control" 
                      <?php echo (isset($error['ParentescoO']))?"is-invalid":"";?> value="<?php echo $txtParentescoO; ?>" id="txtParentescoO" >
                      <div class="invalid-feedback"><?php echo (isset($error['ParentescoO']))?$error['ParentescoO']:"";?></div>
                      <br>
                      </div>   	
                      
                      <div class="form-group col-md-2">
                      <input type="text" name="txtOcupacionO" class="form-control" 
                      <?php echo (isset($error['OcupacionO']))?"is-invalid":"";?> value="<?php echo $txtOcupacionO; ?>"id="txtOcupacionO" >
                      <div class="invalid-feedback"><?php echo (isset($error['OcupacionO']))?$error['OcupacionO']:"";?></div>
                      <br>
                      </div>   	

                      <div class="form-group col-md-5"> 
                      <input type="text" name="txtDireccionO" class="form-control" 
                      <?php echo (isset($error['DireccionO']))?"is-invalid":"";?> value="<?php echo $txtDireccionO; ?>" id="txtDireccionO" >
                      <div class="invalid-feedback"><?php echo (isset($error['DireccionO']))?$error['DireccionO']:"";?></div>
                      <br>
                      </div>   	

                      <div class="form-group col-md-2">
                      <input type="text" name="txtNombreI" class="form-control" 
                      <?php echo (isset($error['NombreI']))?"is-invalid":"";?> value="<?php echo $txtNombreI; ?>" id="txtNombreI" >
                      <div class="invalid-feedback"><?php echo (isset($error['NombreI']))?$error['NombreI']:"";?></div>
                      <br>
                      </div>   	
                      
                      <div class="form-group col-md-1">	
                      <input type="text" name="txtEdadI" class="form-control" 
                      <?php echo (isset($error['EdadI']))?"is-invalid":"";?> value="<?php echo $txtEdadI; ?>" id="txtEdadI" >
                      <div class="invalid-feedback"><?php echo (isset($error['EdadI']))?$error['EdadI']:"";?></div>
                      <br>
                      </div>   	
                      
                      <div class="form-group col-md-2">
                      <input type="text" name="txtParentescoI" class="form-control"
                      <?php echo (isset($error['ParentescoI']))?"is-invalid":"";?> value="<?php echo $txtParentescoI; ?>" id="txtParentescoI" >
                      <div class="invalid-feedback"><?php echo (isset($error['ParentescoI']))?$error['ParentescoI']:"";?></div>
                      <br>
                      </div>   	
                      
                      <div class="form-group col-md-2">
                      <input type="text" name="txtOcupacionI" class="form-control" 
                      <?php echo (isset($error['OcupacionI']))?"is-invalid":"";?> value="<?php echo $txtOcupacionI; ?>"id="txtOcupacionI" >
                      <div class="invalid-feedback"><?php echo (isset($error['OcupacionI']))?$error['OcupacionI']:"";?></div>
                      <br>
                      </div>   

                      <div class="form-group col-md-5"> 
                      <input type="text" name="txtDireccionI" class="form-control" 
                      <?php echo (isset($error['DireccionI']))?"is-invalid":"";?> value="<?php echo $txtDireccionI; ?>" id="txtDireccionI" >
                      <div class="invalid-feedback"><?php echo (isset($error['DireccionI']))?$error['DireccionI']:"";?></div>
                      <br>
                      </div>   


                      <div class="form-group col-md-2">
                      <input type="text" name="txtNombreM" class="form-control" 
                      <?php echo (isset($error['NombreM']))?"is-invalid":"";?> value="<?php echo $txtNombreM; ?>" id="txtNombreM" >
                      <div class="invalid-feedback"><?php echo (isset($error['NombreM']))?$error['NombreM']:"";?></div>
                      <br>
                      </div>  

                      <div class="form-group col-md-1">	
                      <input type="text" name="txtEdadM" class="form-control" 
                      <?php echo (isset($error['EdadM']))?"is-invalid":"";?> value="<?php echo $txtEdadM; ?>" id="txtEdadM" >
                      <div class="invalid-feedback"><?php echo (isset($error['EdadM']))?$error['EdadM']:"";?></div>
                      <br>
                      </div>  

                      <div class="form-group col-md-2">
                      <input type="text" name="txtParentescoM" class="form-control" 
                      <?php echo (isset($error['ParentescoM']))?"is-invalid":"";?> value="<?php echo $txtParentescoM; ?>" id="txtParentescoM" >
                      <div class="invalid-feedback"><?php echo (isset($error['ParentescoM']))?$error['ParentescoM']:"";?></div>
                      <br>
                      </div>  

                      <div class="form-group col-md-2">
                      <input type="text" name="txtOcupacionM" class="form-control" 
                      <?php echo (isset($error['OcupacionM']))?"is-invalid":"";?> value="<?php echo $txtOcupacionM; ?>"id="txtOcupacionM" >
                      <div class="invalid-feedback"><?php echo (isset($error['OcupacionM']))?$error['OcupacionM']:"";?></div>
                      <br>
                      </div>  

                      <div class="form-group col-md-5"> 
                      <input type="text" name="txtDireccionM" class="form-control" 
                      <?php echo (isset($error['DireccionM']))?"is-invalid":"";?> value="<?php echo $txtDireccionM; ?>" id="txtDireccionM" >
                      <div class="invalid-feedback"><?php echo (isset($error['DireccionM']))?$error['DireccionM']:"";?></div>
                      <br>
                      </div>  
                                          
                    <div class="form-group col-md-12">          
                      <label for="">Observaciones:</label>
                      <input type="text" name="txtObservaciones" class="form-control" <?php echo (isset($error['Observaciones']))?"is-invalid":"";?> value="<?php echo $txtObservaciones; ?>" placeholder="" id="txtObservaciones" >
                      <div class="invalid-feedback"><?php echo (isset($error['Observaciones']))?$error['Observaciones']:"";?></div>
                      <br>
                    </div>  

                    <div class="col-md-3">
                    </div>
        
                    <div class="col-md-2">
                        <button value="btnAgregar" <?php echo $accionAgregar; ?> class="btn btn-success" type="submit" name="accion" >Agregar</buttton> 
                    </div> 

                     <div class="col-md-2">
                        <button  value="btnModificar" <?php echo $accionModificar; ?> class="btn btn-warning" type="submit" name="accion" >Modificar</buttton>
                     </div> 

                     &nbsp; &nbsp;

                     <div class="col-md-1">
                            <button value="btnCancelar" <?php echo $accionCancelar; ?> class="btn btn-primary" type="submit" name="accion" >Cancelar</buttton>
                    </div> 
                        <br>
                     <br>
                 </form>
                </div>


                <div class="col-md-3">
                </div>


                
              

                <div style="height:50px"></div>
                <div class="card mb-4">
						    	<div class="card-header">
						    		<i class="fas fa-table mr-1"></i>Registros existentes</div>
					        		<div class="card-body">
						          	<div class="table-responsive">
                                <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                     <thead>
                                            <tr>
                                            <th>NSS</th>
                                            <th>Ocupación</th>

                                            <th>Nombre Completo</th>
 
     
                                            <th>Email</th>
                                            <th>Teléfono</th>

                                            <th>Acciones</th>                                      
                                            
											                      </tr>
					                    					</thead>
                                        <tbody>
                                        <?php foreach($listEmpleados as $empleado){ ?>	
                                            <tr>
                                            <td><?php echo $empleado['NSS'];?></td>
                                            <td><?php echo $empleado['Ocupacion'];?></td>

                                            <td><?php echo $empleado['Nombre'];?>
                                            <?php echo $empleado['ApellidoP'];?>
                                            <?php echo $empleado['ApellidoM'];?></td>
                                        
                                            <td><?php echo $empleado['Email'];?></td>
                                            <td><?php echo $empleado['Telefono'];?></td>
                                            <td>
                                            <form action="" method="post">
                                            <div>
                                                 <input type="hidden" name="txtID" value=""> 
                                                 <button value="Seleccionar" class="btn btn-info" type="submit" name="accion">
                                                   <i class="fas fa-hand-pointer"></i></buttton>        
                                              </form>
                                             
                                              <form action="reporteExcel.php" method="post">
                                                  <input type="hidden" name="txtID" value=""> 
                                                  <button class="btn btn-success" type="submit" > 
                                                  <i class="fas fa-file-excel"></i> </button> 
                                            </form>
                                                <?php if($tipo_usuario == 1) {  ?>
                                                <button value="btnEliminar" <?php echo $accionEliminar; ?> class="btn btn-danger" type="submit" name="accion" >
                                                    <i class="fas fa-trash-alt"></i>
                                                    </buttton>
                                                <?php    }?>
                                            </div>
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
		    </div>

        <!-- Copyright -->
      
      <!-- end of copyright -->
      <!-- end of copyright -->
  
     

    <!-- jQuery, Popper.js, Bootstrap JS -->
    <script src="jquery/jquery-3.3.1.min.js"></script>
    <!--<script src="popper/popper.min.js"></script>-->
    <script src="bootstrap/js/bootstrap.min.js"></script>
      
    <!-- datatables JS -->
    <script type="text/javascript" src="datatables/datatables.min.js"></script>    
     
    <!-- para usar botones en datatables JS -->  
    <script src="datatables/Buttons-1.5.6/js/dataTables.buttons.min.js"></script>  
    <script src="datatables/JSZip-2.5.0/jszip.min.js"></script>    
    <script src="datatables/Buttons-1.5.6/js/buttons.html5.min.js"></script>
     
    <!-- código JS propìo-->    
    <script type="text/javascript" src="main.js"></script>  

		<script src="js/scripts.js"></script>
		
        
	</body>
</html>
