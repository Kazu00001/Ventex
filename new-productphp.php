<?php
session_start();
require_once('conexion.php');

$idpv = mysqli_real_escape_string($conexion, $_POST['idpv']);
$nameProduct = mysqli_real_escape_string($conexion, $_POST['nameProduct']);
$descriptionp = mysqli_real_escape_string($conexion, $_POST['descriptionp']);
$price = mysqli_real_escape_string($conexion, $_POST['price']);
$categoria = mysqli_real_escape_string($conexion, $_POST['categoria']);
$subCategoria = mysqli_real_escape_string($conexion, $_POST['subcategoria']);
$seller = mysqli_real_escape_string($conexion, $_POST['seller']);

if (isset($_FILES["archivo"])) {
    $archivo = basename($_FILES["archivo"]["name"]);
    $targetDirectory = "imgs/";  // Ruta relativa al directorio del script
    $targetFile = $targetDirectory . $archivo;

    $esImagen = getimagesize($_FILES["archivo"]["tmp_name"]);
    if ($esImagen !== false) {
        if (move_uploaded_file($_FILES["archivo"]["tmp_name"], $targetFile)) {
            echo "El archivo $archivo ha sido subido correctamente.";
        } else {
            echo "Hubo un error al subir el archivo.";
        }
    } else {
        echo "El archivo no es una imagen válida.";
    }
} else {
    echo "No se ha seleccionado ningún archivo.";
}

$sentence = "INSERT INTO products (idpv, nameProduct, descriptionP, price, category, subCategory, seller, productImage) 
            VALUES ('$idpv', '$nameProduct', '$descriptionp', '$price', '$categoria', '$subCategoria', '$seller', '$archivo')";
$guardar = mysqli_query($conexion, $sentence);

if (!$guardar) {
    echo "Error al guardar los datos en la base de datos: " . mysqli_error($conexion);
} else {
    $_SESSION['logged'] = true;
    header('location: perfil.php');
}

mysqli_close($conexion);
?>
