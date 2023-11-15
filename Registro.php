<?php
// Credenciales de acceso a la base de datos
$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'ventex';

// Conexión a la base de datos
$Conexion = mysqli_connect($hostname, $username, $password, $database);

// Verificar la conexión
if (mysqli_connect_error()) {
    exit('Fallo en la conexión de MySQL: ' . mysqli_connect_error());
}

// Datos del primer formulario
$Nom = $_POST['nombre'];
$correo = $_POST['correo'];
$fecha = $_POST['fecha'];
$telefono = $_POST['telefono'];
$hash = password_hash($_POST['pass'], PASSWORD_DEFAULT, ['cost' => 15]);

// Verificar si todos los datos están presentes
if (!isset($_POST['nombre'], $_POST['correo'], $_POST['fecha'], $_POST['telefono'], $_POST['pass'])) {
    header('Location: registropaw.html');
}

// Sentencia de envío del primer formulario
$sql = "INSERT INTO users (nameUser, email, birthdate, phone, pass) VALUES ('$Nom', '$correo', '$fecha', '$telefono', '$hash')";
$envio = mysqli_query($Conexion, $sql);

// Verificar si se ejecutó correctamente la primera consulta
if (!$envio) {
    echo '<SCRIPT> alert("Tu registro no se pudo registrar")</SCRIPT>';
    echo 'Error de MySQL: ' . mysqli_error($Conexion);
} else {
    // Datos del segundo formulario
    $value1 = $_POST['value1'];
    $value2 = $_POST['value2'];
    $value3 = $_POST['value3'];
    $value4 = $_POST['value4'];
    $value5 = $_POST['value5'];
    $value6 = $_POST['value6'];
    $value7 = $_POST['value7'];
    $value8 = $_POST['value8'];
    $value9 = $_POST['value9'];

    // Sentencia de envío del segundo formulario
    $sql2 = "INSERT INTO sellerprofile (idvendeor, nameSeller, profileDescription, Contactdescription, instagram, x, whatsapp, facebook, phoneNumber) VALUES ('$value1', '$value2', '$value3', '$value4', '$value5', '$value6', '$value7', '$value8', '$value9')";
    $envio2 = mysqli_query($Conexion, $sql2);

    // Verificar si se ejecutó correctamente la segunda consulta
    if (!$envio2) {
        echo '<SCRIPT> alert("Tu registro no se pudo registrar")</SCRIPT>';
        echo 'Error de MySQL: ' . mysqli_error($Conexion);
    } else {
        
            $targetDirectory = "uploads/";  // Carpeta donde deseas guardar los archivos
            $targetFile = $targetDirectory . basename($_FILES["archivo"]["name"]);  // Ruta completa del archivo

            // Verifica si el archivo es una imagen
            $esImagen = getimagesize($_FILES["archivo"]["tmp_name"]);
            if ($esImagen !== false) {
                    // Mueve el archivo a la ubicación deseada
                if (move_uploaded_file($_FILES["archivo"]["tmp_name"], $targetFile)) {
                        echo "El archivo " . htmlspecialchars(basename($_FILES["archivo"]["name"])) . " ha sido subido correctamente.";
                } else {
                        echo "Hubo un error al subir el archivo.";
                }
            } else {
                echo "El archivo no es una imagen válida.";
            }
        header('Location: Incios.html');
    }
}

// Cerrar la conexión de la base de datos
mysqli_close($Conexion);
?>
