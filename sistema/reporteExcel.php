<?php



	//Incluimos librería y archivo de conexión
	require 'Classes/PHPExcel.php';
	require 'conexion/databaseMySQL.php';
	
	//Consulta
	$sql = "SELECT * FROM empleados ";
 
	$resultado = $mysqli->query($sql);
	$fila = 8; //Establecemos en que fila inciara a imprimir los datos
	$fila2 = 11; 
	$fila3 = 14; 
	$fila4 = 17; 
	$fila5 = 20; 
	$fila6 = 26; 
	$fila7 = 27; 
	$fila8 = 28; 
	$fila9 = 29; 
	$fila10 = 30; 
	$fila11 = 31; 

	$gdImage = imagecreatefrompng('img/logo.png');//Logotipo
	
	//Objeto de PHPExcel
	$objPHPExcel  = new PHPExcel();
	
	//Propiedades de Documento
	$objPHPExcel->getProperties()->setCreator("Héctor Robles")->setDescription("Reporte de cliente");
	
	//Establecemos la pestaña activa y nombre a la pestaña
	$objPHPExcel->setActiveSheetIndex(0);
	$objPHPExcel->getActiveSheet()->setTitle("REPORTE");
	
	$objDrawing = new PHPExcel_Worksheet_MemoryDrawing();
	$objDrawing->setName('Logotipo');
	$objDrawing->setDescription('Logotipo');
	$objDrawing->setImageResource($gdImage);
	$objDrawing->setRenderingFunction(PHPExcel_Worksheet_MemoryDrawing::RENDERING_PNG);
	$objDrawing->setMimeType(PHPExcel_Worksheet_MemoryDrawing::MIMETYPE_DEFAULT);
	$objDrawing->setHeight(100);
	$objDrawing->setCoordinates('A1');
	$objDrawing->setWorksheet($objPHPExcel->getActiveSheet());
	
	$estiloTituloReporte = array(
    'font' => array(
	'name'      => 'Arial',
	'bold'      => true,
	'italic'    => false,
	'strike'    => false,
	'size' =>12
    ),
    'fill' => array(
	'type'  => PHPExcel_Style_Fill::FILL_SOLID
	),
    'borders' => array(
	'allborders' => array(
	'style' => PHPExcel_Style_Border::BORDER_NONE
	)
    ),
    'alignment' => array(
	'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
	'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
    )
	);
	
	$estiloTituloReporte2 = array(
		'font' => array(
		'name'      => 'Arial',
		'bold'      => false,
		'italic'    => false,
		'strike'    => false,
		'size' =>11
		),
		'fill' => array(
		'type'  => PHPExcel_Style_Fill::FILL_SOLID
		),
		'borders' => array(
		'allborders' => array(
		'style' => PHPExcel_Style_Border::BORDER_NONE
		)
		),
		'alignment' => array(
		'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
		'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
		)
		);


	$estiloTituloColumnas = array(
    'font' => array(
	'name'  => 'Arial',
	'bold'  => false,
	'size' =>11,
	'color' => array(
	'rgb' => '000000'
	)
    ),
    'fill' => array(
	'type' => PHPExcel_Style_Fill::FILL_SOLID,
	'color' => array('rgb' => 'FFFFFF')
    ),
    'borders' => array(
	'allborders' => array(
	'style' => PHPExcel_Style_Border::BORDER_THIN
	)
    ),
    'alignment' =>  array(
	'horizontal'=> PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
	'vertical'  => PHPExcel_Style_Alignment::VERTICAL_CENTER
    )
	);
	
	$estiloTituloColumnas2 = array(
		'font' => array(
		'name'  => 'Arial',
		'bold'  => true,
		'size' =>12,
		'color' => array(
		'rgb' => '000000'
		)
		),
		'fill' => array(
		'type' => PHPExcel_Style_Fill::FILL_SOLID,
		'color' => array('rgb' => 'FFFFFF')
		),
		'borders' => array(
		'allborders' => array(
		'style' => PHPExcel_Style_Border::BORDER_THIN
		)
		),
		'alignment' =>  array(
		'horizontal'=> PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
		'vertical'  => PHPExcel_Style_Alignment::VERTICAL_CENTER
		)
		);

		$estiloTituloColumnas3 = array(
			'font' => array(
			'name'  => 'Arial',
			'bold'  => true,
			'size' =>11,
			'color' => array(
			'rgb' => '000000'
			)
			),
			'fill' => array(
			'type' => PHPExcel_Style_Fill::FILL_SOLID,
			'color' => array('rgb' => 'FFFFFF')
			),
			'borders' => array(
			'allborders' => array(
			'style' => PHPExcel_Style_Border::BORDER_THIN
			)
			),
			'alignment' =>  array(
			'horizontal'=> PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
			'vertical'  => PHPExcel_Style_Alignment::VERTICAL_CENTER
			)
			);

	$estiloInformacion = new PHPExcel_Style();
	$estiloInformacion->applyFromArray( array(
    'font' => array(
	'name'  => 'Arial',
	'color' => array(
	'rgb' => '000000'
	)
    ),
    'fill' => array(
	'type'  => PHPExcel_Style_Fill::FILL_SOLID
	),
    'borders' => array(
	'allborders' => array(
	'style' => PHPExcel_Style_Border::BORDER_THIN
	)
    ),
	'alignment' =>  array(
	'horizontal'=> PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
	'vertical'  => PHPExcel_Style_Alignment::VERTICAL_CENTER
    )
	));
	
	//ORIENTACIÓN DE LA HOJA DE EXCEL EN HORIZONTAL
	$objPHPExcel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);

	//FONDO BLANCO
	$objPHPExcel->getActiveSheet()->getStyle('A1:Z7')->applyFromArray($estiloTituloReporte);
	$objPHPExcel->getActiveSheet()->getStyle('A1:Z50')->applyFromArray($estiloTituloReporte);

	//DISEÑOS  CON MARCO
	$objPHPExcel->getActiveSheet()->getStyle('B8')->applyFromArray($estiloTituloColumnas);
	$objPHPExcel->getActiveSheet()->getStyle('D8')->applyFromArray($estiloTituloColumnas);
	$objPHPExcel->getActiveSheet()->getStyle('G8:G11')->applyFromArray($estiloTituloColumnas);

	$objPHPExcel->getActiveSheet()->getStyle('B11')->applyFromArray($estiloTituloColumnas);
	$objPHPExcel->getActiveSheet()->getStyle('E11')->applyFromArray($estiloTituloColumnas);
	$objPHPExcel->getActiveSheet()->getStyle('D11')->applyFromArray($estiloTituloColumnas);

	$objPHPExcel->getActiveSheet()->getStyle('B14')->applyFromArray($estiloTituloColumnas);
	$objPHPExcel->getActiveSheet()->getStyle('C14')->applyFromArray($estiloTituloColumnas);
	$objPHPExcel->getActiveSheet()->getStyle('D14')->applyFromArray($estiloTituloColumnas);
	$objPHPExcel->getActiveSheet()->getStyle('E14')->applyFromArray($estiloTituloColumnas);
	$objPHPExcel->getActiveSheet()->getStyle('F14')->applyFromArray($estiloTituloColumnas);
	$objPHPExcel->getActiveSheet()->getStyle('G14')->applyFromArray($estiloTituloColumnas);
	$objPHPExcel->getActiveSheet()->getStyle('H14')->applyFromArray($estiloTituloColumnas);
	
	$objPHPExcel->getActiveSheet()->getStyle('B17')->applyFromArray($estiloTituloColumnas);
	$objPHPExcel->getActiveSheet()->getStyle('F17')->applyFromArray($estiloTituloColumnas);

	$objPHPExcel->getActiveSheet()->getStyle('B20')->applyFromArray($estiloTituloColumnas);
	$objPHPExcel->getActiveSheet()->getStyle('E20')->applyFromArray($estiloTituloColumnas);
	$objPHPExcel->getActiveSheet()->getStyle('G20')->applyFromArray($estiloTituloColumnas);

	$objPHPExcel->getActiveSheet()->getStyle('B25')->applyFromArray($estiloTituloColumnas2);
	$objPHPExcel->getActiveSheet()->getStyle('C25')->applyFromArray($estiloTituloColumnas2);
	$objPHPExcel->getActiveSheet()->getStyle('D25')->applyFromArray($estiloTituloColumnas2);
	$objPHPExcel->getActiveSheet()->getStyle('E25')->applyFromArray($estiloTituloColumnas2);
	$objPHPExcel->getActiveSheet()->getStyle('F25')->applyFromArray($estiloTituloColumnas2);

	$objPHPExcel->getActiveSheet()->getStyle('B26')->applyFromArray($estiloTituloColumnas);
	$objPHPExcel->getActiveSheet()->getStyle('C26')->applyFromArray($estiloTituloColumnas);
	$objPHPExcel->getActiveSheet()->getStyle('D26')->applyFromArray($estiloTituloColumnas);
	$objPHPExcel->getActiveSheet()->getStyle('E26')->applyFromArray($estiloTituloColumnas);
	$objPHPExcel->getActiveSheet()->getStyle('F26')->applyFromArray($estiloTituloColumnas);

	$objPHPExcel->getActiveSheet()->getStyle('B27')->applyFromArray($estiloTituloColumnas);
	$objPHPExcel->getActiveSheet()->getStyle('C27')->applyFromArray($estiloTituloColumnas);
	$objPHPExcel->getActiveSheet()->getStyle('D27')->applyFromArray($estiloTituloColumnas);
	$objPHPExcel->getActiveSheet()->getStyle('E27')->applyFromArray($estiloTituloColumnas);
	$objPHPExcel->getActiveSheet()->getStyle('F27')->applyFromArray($estiloTituloColumnas);

	$objPHPExcel->getActiveSheet()->getStyle('B28')->applyFromArray($estiloTituloColumnas);
	$objPHPExcel->getActiveSheet()->getStyle('C28')->applyFromArray($estiloTituloColumnas);
	$objPHPExcel->getActiveSheet()->getStyle('D28')->applyFromArray($estiloTituloColumnas);
	$objPHPExcel->getActiveSheet()->getStyle('E28')->applyFromArray($estiloTituloColumnas);
	$objPHPExcel->getActiveSheet()->getStyle('F28')->applyFromArray($estiloTituloColumnas);

	$objPHPExcel->getActiveSheet()->getStyle('B29')->applyFromArray($estiloTituloColumnas);
	$objPHPExcel->getActiveSheet()->getStyle('C29')->applyFromArray($estiloTituloColumnas);
	$objPHPExcel->getActiveSheet()->getStyle('D29')->applyFromArray($estiloTituloColumnas);
	$objPHPExcel->getActiveSheet()->getStyle('E29')->applyFromArray($estiloTituloColumnas);
	$objPHPExcel->getActiveSheet()->getStyle('F29')->applyFromArray($estiloTituloColumnas);
	
	$objPHPExcel->getActiveSheet()->getStyle('B30')->applyFromArray($estiloTituloColumnas);
	$objPHPExcel->getActiveSheet()->getStyle('C30')->applyFromArray($estiloTituloColumnas);
	$objPHPExcel->getActiveSheet()->getStyle('D30')->applyFromArray($estiloTituloColumnas);
	$objPHPExcel->getActiveSheet()->getStyle('E30')->applyFromArray($estiloTituloColumnas);
	$objPHPExcel->getActiveSheet()->getStyle('F30')->applyFromArray($estiloTituloColumnas);
	$objPHPExcel->getActiveSheet()->getStyle('D31')->applyFromArray($estiloTituloColumnas);


	//TITULO PRINCIPAL
	$objPHPExcel->getActiveSheet()->setCellValue('D2', 'PROMASI - REPORTE DE CLIENTE');

	//TITULOS DE FORMULARIOS

	$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(3);
	$objPHPExcel->getActiveSheet()->setCellValue('A1', '');

	$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(20) &&
	 $objPHPExcel->getActiveSheet()->getRowDimension('8')->setRowHeight(30);
	$objPHPExcel->getActiveSheet()->setCellValue('B9', 'NSS');
	$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(10);
	$objPHPExcel->getActiveSheet()->setCellValue('C12', '');
	$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(20) &&
	$objPHPExcel->getActiveSheet()->getRowDimension('8')->setRowHeight(30);
	$objPHPExcel->getActiveSheet()->setCellValue('D9', 'Ocupación');
	$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(10);
	$objPHPExcel->getActiveSheet()->setCellValue('F12', '');
	$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(30) &&
	$objPHPExcel->getActiveSheet()->getRowDimension('12')->setRowHeight(30);
	$objPHPExcel->getActiveSheet()->setCellValue('G12', 'Foto');
	
	$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(20) &&
	$objPHPExcel->getActiveSheet()->getRowDimension('12')->setRowHeight(30);
	$objPHPExcel->getActiveSheet()->setCellValue('B12', 'Nombre');
	$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(20) &&
	$objPHPExcel->getActiveSheet()->getRowDimension('12')->setRowHeight(30);
	$objPHPExcel->getActiveSheet()->setCellValue('D12', 'Apellidos');
	$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(20) &&
	$objPHPExcel->getActiveSheet()->getRowDimension('12')->setRowHeight(30);
	$objPHPExcel->getActiveSheet()->setCellValue('E12', '');

	$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(20) &&
	$objPHPExcel->getActiveSheet()->getRowDimension('15')->setRowHeight(30);
	$objPHPExcel->getActiveSheet()->setCellValue('B15', 'Dirección');
	$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(20) &&
	$objPHPExcel->getActiveSheet()->getRowDimension('15')->setRowHeight(30);
	$objPHPExcel->getActiveSheet()->setCellValue('D15', 'Número');
	$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(20) &&
	$objPHPExcel->getActiveSheet()->getRowDimension('15')->setRowHeight(30);
	$objPHPExcel->getActiveSheet()->setCellValue('E15', 'C.P.');
	$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(20) &&
	$objPHPExcel->getActiveSheet()->getRowDimension('15')->setRowHeight(30);
	$objPHPExcel->getActiveSheet()->setCellValue('F15', 'Colonia');
	$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(30) &&
	$objPHPExcel->getActiveSheet()->getRowDimension('15')->setRowHeight(30);
	$objPHPExcel->getActiveSheet()->setCellValue('G15', 'Ciudad.');
	$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(15) &&
	$objPHPExcel->getActiveSheet()->getRowDimension('15')->setRowHeight(30);
	$objPHPExcel->getActiveSheet()->setCellValue('H15', 'Estado');

	$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(30) &&
	$objPHPExcel->getActiveSheet()->getRowDimension('18')->setRowHeight(30);
	$objPHPExcel->getActiveSheet()->setCellValue('B18', 'RFC');
	$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(15) &&
	$objPHPExcel->getActiveSheet()->getRowDimension('18')->setRowHeight(30);
	$objPHPExcel->getActiveSheet()->setCellValue('F18', 'Lugar y fecha de nacimiento');

	$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(20) &&
	$objPHPExcel->getActiveSheet()->getRowDimension('21')->setRowHeight(30);
	$objPHPExcel->getActiveSheet()->setCellValue('B21', 'Curp');
	$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(20) &&
	$objPHPExcel->getActiveSheet()->getRowDimension('21')->setRowHeight(30);
	$objPHPExcel->getActiveSheet()->setCellValue('E21', 'Email');
	$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(30) &&
	$objPHPExcel->getActiveSheet()->getRowDimension('21')->setRowHeight(30);
	$objPHPExcel->getActiveSheet()->setCellValue('G21', 'Teléfono');

	$objPHPExcel->getActiveSheet()->setCellValue('B23', 'Datos');
	$objPHPExcel->getActiveSheet()->setCellValue('B24', 'Familiares (Padres, Hermanos, Esposa (o)):');

	$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(20) &&
	$objPHPExcel->getActiveSheet()->getRowDimension('25')->setRowHeight(30);
	$objPHPExcel->getActiveSheet()->setCellValue('B25', 'Nombre');
	$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(20) &&
	$objPHPExcel->getActiveSheet()->getRowDimension('25')->setRowHeight(30);
	$objPHPExcel->getActiveSheet()->setCellValue('C25', 'Edad');
	$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(30) &&
	$objPHPExcel->getActiveSheet()->getRowDimension('25')->setRowHeight(30);
	$objPHPExcel->getActiveSheet()->setCellValue('D25', 'Parentesco');
	$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(20) &&
	$objPHPExcel->getActiveSheet()->getRowDimension('25')->setRowHeight(30);
	$objPHPExcel->getActiveSheet()->setCellValue('E25', 'Ocupación');
	$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(20) &&
	$objPHPExcel->getActiveSheet()->getRowDimension('25')->setRowHeight(30);
	$objPHPExcel->getActiveSheet()->setCellValue('F25', 'Dirección');

	$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(20) &&
	$objPHPExcel->getActiveSheet()->getRowDimension('31')->setRowHeight(30);
	$objPHPExcel->getActiveSheet()->setCellValue('B31', 'Observaciones');

	//Recorremos los resultados de la consulta y los imprimimos
	while($rows = $resultado->fetch_assoc()){
       
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$fila, $rows['NSS']);
		$objPHPExcel->getActiveSheet()->setCellValue('D'.$fila, $rows['Ocupacion']);
		$objPHPExcel->getActiveSheet()->setCellValue('G'.$fila, $rows['Foto']);
      //$objPHPExcel->getActiveSheet()->setCellValue('A1:E1');
		$fila++; //Sumamos 1 para pasar a la siguiente fila

		$objPHPExcel->getActiveSheet()->setCellValue('B'.$fila2, $rows['Nombre']);
		$objPHPExcel->getActiveSheet()->setCellValue('D'.$fila2, $rows['ApellidoP']);
		$objPHPExcel->getActiveSheet()->setCellValue('E'.$fila2, $rows['ApellidoM']);
		$fila2++; //Sumamos 1 para pasar a la siguiente fila

		$objPHPExcel->getActiveSheet()->setCellValue('B'.$fila3, $rows['Calle']);
		$objPHPExcel->getActiveSheet()->setCellValue('D'.$fila3, $rows['Numero']);
		$objPHPExcel->getActiveSheet()->setCellValue('E'.$fila3, $rows['CP']);
		$objPHPExcel->getActiveSheet()->setCellValue('F'.$fila3, $rows['Colonia']);
		$objPHPExcel->getActiveSheet()->setCellValue('G'.$fila3, $rows['Ciudad']);
		$objPHPExcel->getActiveSheet()->setCellValue('H'.$fila3, $rows['Estado']);
		$fila3++; //Sumamos 1 para pasar a la siguiente fila

		$objPHPExcel->getActiveSheet()->setCellValue('B'.$fila4, $rows['RFC']);
        $objPHPExcel->getActiveSheet()->setCellValue('F'.$fila4, $rows['LuYFeDNac']);
		$fila4++; //Sumamos 1 para pasar a la siguiente fila

		$objPHPExcel->getActiveSheet()->setCellValue('B'.$fila5, $rows['Curp']);
		$objPHPExcel->getActiveSheet()->setCellValue('E'.$fila5, $rows['Email']);
		$objPHPExcel->getActiveSheet()->setCellValue('G'.$fila5, $rows['Telefono']);
		$fila5++; //Sumamos 1 para pasar a la siguiente fila

		$objPHPExcel->getActiveSheet()->setCellValue('B'.$fila6, $rows['NombreD']);
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$fila6, $rows['EdadD']);
		$objPHPExcel->getActiveSheet()->setCellValue('D'.$fila6, $rows['ParentescoD']);
		$objPHPExcel->getActiveSheet()->setCellValue('E'.$fila6, $rows['OcupacionD']);
		$objPHPExcel->getActiveSheet()->setCellValue('F'.$fila6, $rows['DireccionD']);
		$fila6++; //Sumamos 1 para pasar a la siguiente fila

		$objPHPExcel->getActiveSheet()->setCellValue('B'.$fila7, $rows['NombreP']);
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$fila7, $rows['EdadP']);
		$objPHPExcel->getActiveSheet()->setCellValue('D'.$fila7, $rows['ParentescoP']);
		$objPHPExcel->getActiveSheet()->setCellValue('E'.$fila7, $rows['OcupacionP']);
		$objPHPExcel->getActiveSheet()->setCellValue('F'.$fila7, $rows['DireccionP']);
		$fila7++; //Sumamos 1 para pasar a la siguiente fila


		$objPHPExcel->getActiveSheet()->setCellValue('B'.$fila8, $rows['NombreO']);
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$fila8, $rows['EdadO']);
        $objPHPExcel->getActiveSheet()->setCellValue('D'.$fila8, $rows['ParentescoO']);
		$objPHPExcel->getActiveSheet()->setCellValue('E'.$fila8, $rows['OcupacionO']);
		$objPHPExcel->getActiveSheet()->setCellValue('F'.$fila8, $rows['DireccionO']);
		$fila8++; //Sumamos 1 para pasar a la siguiente fila

		$objPHPExcel->getActiveSheet()->setCellValue('B'.$fila9, $rows['NombreI']);
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$fila9, $rows['EdadI']);
		$objPHPExcel->getActiveSheet()->setCellValue('D'.$fila9, $rows['ParentescoI']);
		$objPHPExcel->getActiveSheet()->setCellValue('E'.$fila9, $rows['OcupacionI']);
		$objPHPExcel->getActiveSheet()->setCellValue('F'.$fila9, $rows['DireccionI']);
		$fila9++; //Sumamos 1 para pasar a la siguiente fila

        $objPHPExcel->getActiveSheet()->setCellValue('B'.$fila10, $rows['NombreM']);
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$fila10, $rows['EdadM']);
		$objPHPExcel->getActiveSheet()->setCellValue('D'.$fila10, $rows['ParentescoM']);
		$objPHPExcel->getActiveSheet()->setCellValue('E'.$fila10, $rows['OcupacionM']);
		$objPHPExcel->getActiveSheet()->setCellValue('F'.$fila10, $rows['DireccionM']);
		$fila10++; //Sumamos 1 para pasar a la siguiente fila

		$objPHPExcel->getActiveSheet()->setCellValue('D'.$fila11, $rows['Observaciones']);
		$fila11++;//Sumamos 1 para pasar a la siguiente fila
	}


	header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
	header('Content-Disposition: attachment;filename="ReportePROMASI.xlsx"');
	header('Cache-Control: max-age=0');
	
    $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
	$objWriter->save('php://output');



?>

<!--<b> Recoverable fatal error

</b> :Object of class PHPExcel_Writer_Excel5 could not be converted to string in 

<b> C:\xampp\htdocs\2021\sistema\reporteExcel.php</b> on line -->