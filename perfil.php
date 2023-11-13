<?php

session_start();
/*

if (!isset($_SESSION['loggedin'])) {

    header('Location: index.html');
    exit;
}
*/
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil Usuario</title>
    <link rel="stylesheet" href="styleperf.css">
    <link rel="stylesheet" href="inicio.css">
    <link rel="stylesheet" href="header.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="loggedin">
<header>
        <article id="titfo">
            <section id="titC">
                <br>
                <a href="inicio.php"><h1 id="tit">Ventex</h1></a>
            </section>
            <section id="search">
                <br><br><br>
                <input type="search" id="sear">
            </section>
            <section id="perfil">
                <div id="pic">
                <img style="border-radius: 100px;" src="<?php echo'imgs/'.$_SESSION['img']?>">  
                </div>
            </section>
        </article>
        <section id="bnav">
            <nav class="nave">
                <ul class="menu">
                    <li><a href="inicio.php">Inicio</a></li>
                    <li><a href="#">Categorías</a>
                        <ul class="menuv">
                            <li><a href="#">Alimentos</a></li>
                            <li><a href="#">Accesorios</a></li>
                            <li><a href="#">Otros</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Perfil</a></li>
                </ul>
            </nav>
        </section>
        
    </header>
    <div id="espacio"><br><br><br></div>
    <div class="content">
        
        <div id="content2">
            <h2>Información del Usuario</h2>
            <img class="imgs" src="<?php echo'imgs/'.$_SESSION['img']?>" >
            <br>
            <p>
                La siguiente es la información registrada de tu cuenta
            </p>
            <table>
                <tr>
                    <td>Usuario:</td>
                    <td><?= $_SESSION['name'] ?></td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td><?= $_SESSION['email'] ?></td>
                </tr>
                <tr>
                    <td>Fecha de nacimiento:</td>
                    <td><?= $_SESSION['birthdate'] ?></td>
                </tr>
                <tr>
                    <td>Telefono(solo se te va mostar ati):</td>
                    <td><?= $_SESSION['phone'] ?></td>
                </tr>
                <tr>
                    <td>
                    <a href="cerrar-sesion.php" style="color:white;"><i class="fas fa-sign-out-alt"></i>Cerrar Sesion</a>
                    </td>
                </tr>
            </table>
        </div>
        <hr>
        <h1 class="titlesp">Estos son tus Productos</h1>
        <br><br><br><br> 
    </div>
</body>

</html>