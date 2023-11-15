<?php
session_start();

$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'ventex';

$Conexion = mysqli_connect($hostname, $username, $password, $database);

if (mysqli_connect_error()) {
    exit('Fallo en la conexión de MySQL: ' . mysqli_connect_error());
}

if (empty($_POST['profileD']) || empty($_POST['WhatsAppup']) || empty($_POST['x']) || empty($_POST['Instagram']) || empty($_POST['Contactdescription']) || empty($_POST['facebook'])) {
    header('Location: registropaw.html');
    exit();
}

$idup = $_POST['ideup'];
$profileD = $_POST['profileD'];
$WhatsAppup = $_POST['WhatsAppup'];
$x = $_POST['x'];
$Instagram = $_POST['Instagram'];
$Contactdescription = $_POST['Contactdescription'];
$facebook = $_POST['facebook'];

$sql = "UPDATE sellerprofile SET profileDescription = ?, Contactdescription = ?, instagram = ?, x = ?, whatsapp=?, facebook= ? WHERE idvendeor = '$idup'";
$stmt = mysqli_prepare($Conexion, $sql);
echo $sql; // Muestra la consulta SQL

mysqli_stmt_bind_param($stmt, "ssssss", $profileD, $Contactdescription, $Instagram, $x, $WhatsAppup, $facebook);

$envio = mysqli_stmt_execute($stmt);

mysqli_close($Conexion);

if (!$envio) {
    echo 'Error de MySQL: ' . mysqli_error($Conexion);
} else {
    header('Location: Incios.html');
}
?>
