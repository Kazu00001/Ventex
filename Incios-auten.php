<?php
session_start();

//credenciales de acceso a la base datos

$hostname='localhost';
$username='root';
$password='';
$database='';//nombre de la db

// conexion a la base de datos

$Conexion = mysqli_connect($hostname, $username, $password, $database);

if (mysqli_connect_error()) {

    // si se encuentra error en la conexión

    exit('Fallo en la conexión de MySQL:' . mysqli_connect_error());
}

// Se valida si se ha enviado información, con la función isset()

if (!isset($_POST['correo'], $_POST['password'])) {

    // si no hay datos muestra error y re direccionar

    header('Location: Incios.html');
}

// evitar inyección sql
// pasar los parametros a recolectar 
if ($Result = $Conexion->prepare('SELECT id, pato, email, img FROM /* nombre de table*/accounts WHERE email = ?')) {
    // parámetros de enlace de la cadena s

    //s=string i=intenger 
    $Result->bind_param('s', $_POST['contra']);
    $Result->execute();
} else {
    // Si la preparación de la consulta falla, muestra el error
    die('Error en la preparación de la consulta: ' . mysqli_error($Conexion));
}

// acá se valida si lo ingresado coincide con la base de datos

$Result->store_result();
if ($Result->num_rows > 0) {
    $Result->bind_result($id, $hash_password,$email,$imagen);
    $Result->fetch();

    // se confirma que la cuenta existe ahora validamos la contraseña

    if (password_verify($_POST['contra'], $hash_password)) {

        // la conexion sería exitosa, se crea la sesión
        
        session_regenerate_id();
        $_SESSION['loggedin'] = TRUE;
        $_SESSION['name'] = $_POST['correo'];
        $_SESSION['id'] = $id;
        $_SESSION['email']= $email;
        $_SESSION['foto']= $imagen;
        //dederir al incio
        header('Location: perfil.php');
    } else {
        // contraseña incorrecta
        echo '<SCRIPT> alert("Tu contraseña es incorecta")</SCRIPT>';
        header('Location: Incios.html');
        
    }
} else {
    // usuario incorrecto
    header('Location: Incios.html');
    echo '<SCRIPT> alert("Tu usuario es incorrecto") </SCRIPT>';
}

//vaciar el stock
$Result->close();
//cierrara base de datos :D
$Conexion->close();
?>
