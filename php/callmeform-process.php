<?php
$errorMSG = "";

if (empty($_POST["name"])) {
    $errorMSG = "Name is required ";
} else {
    $name = $_POST["name"];
}

if (empty($_POST["phone"])) {
    $errorMSG = "Phone is required ";
} else {
    $phone = $_POST["phone"];
}

if (empty($_POST["email"])) {
    $errorMSG = "Email is required ";
} else {
    $email = $_POST["email"];
}

if (empty($_POST["select"])) {
    $errorMSG = "Select is required ";
} else {
    $select = $_POST["select"];
}

if (empty($_POST["terms"])) {
    $errorMSG = "Terms is required ";
} else {
    $terms = $_POST["terms"];
}


#if (empty($_POST["obser"])) {/* ------------------- */
#    $errorMSG = "La descripci¨®n es requerida ";/* ------------------- */
#} else {/* ------------------- */
#    $obser = $_POST["obser"];/* ------------------- */
#}/* ------------------- */

$EmailTo = "contacto@promasi.net";
$Subject = "Nueva solicitud de cotizaciÃ³n Web PROMASI";

// prepare email body text
$Body = "";
$Body .= "Nombre: ";
$Body .= $name;
$Body .= "\n";
$Body .= "Telefono: ";
$Body .= $phone;
$Body .= "\n";
$Body .= "Email: ";
$Body .= $email;
$Body .= "\n";
$Body .= "Interesado en: ";
$Body .= $select;
$Body .= "\n";
$Body .= "Terminos: ";
$Body .= $terms;
$Body .= "\n";
#$Body .= "Descripcion: ";/* ------------------- */
#$Body .= $obser;/* ------------------- */
#$Body .= "\n";/* ------------------- */

// send email
$success = mail($EmailTo, $Subject, $Body, "From:".$email);
// redirect to success page
if ($success && $errorMSG == ""){
   echo "success";
}else{
    if($errorMSG == ""){
        echo "Something went wrong :(";
    } else {
        echo $errorMSG;
    }
}
?>