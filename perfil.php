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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
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
                <div id="pic"></div>
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
    <nav class="navtop">
        <h1 style="color:white;">Perfil</h1>
        <a href="" style="color:white;">Inicio</a>
        <a href="cerrar-sesion.php" style="color:white;"><i class="fas fa-sign-out-alt"></i>Cerrar Sesion</a>
    </nav>
    <div class="content">

        <h2>Información del Usuario</h2>
        <div>
            <img class="imgs" src="<?php echo'img/'.$_SESSION['foto']?>" >
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
            </table>



        </div>


    </div>



    </nav>

</body>

</html>