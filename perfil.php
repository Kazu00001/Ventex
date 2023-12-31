<?php

use LDAP\Result;

session_start();
    require_once('conexion.php');

    $cats = mysqli_query($conexion, "SELECT DISTINCT category FROM products;");


if (!isset($_SESSION['loggedin'])) {

    header('Location: incios.html');
    exit;
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil Usuario</title>
    <link rel="stylesheet" href="styleperf.css">
    <link rel="stylesheet" href="cuadro_producto.css">
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
                <div id="pic"><img style="border-radius: 100px;" class="imgeesp" src="<?php echo'imgs/'.$_SESSION['img']?>"> </div>
            </section>
        </article>
        <section id="bnav">
            <nav class="nave">
                <ul class="menu">
                    <li><a href="inicio.php">Inicio</a></li>
                    <li><a href="#">Categorías</a>
                        <ul class="menuv">
                            <?php while ($cat=mysqli_fetch_array($cats)) {?>
                                <li class="ca">
                                    <a href="Subcat.php?category=<?php echo $cat['category'];?>" 
                                    name=""><?php echo $cat['category'];?></a>
                                </li>
                                <?php } ?>
                        </ul>
                    </li>
                    <li><a href="perfil.php">Perfil</a></li>
                </ul>
            </nav>
        </section>
        
    </header>

    
    <main>
        
    <article class="content">
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
                    <td>Telefono(solo se te va mostar a ti):</td>
                    <td><?= $_SESSION['phone'] ?></td>
                </tr>
                <tr>
                    <td>
                    <a href="cerrar-sesion.php" style="color:white;"><i class="fas fa-sign-out-alt"></i>Cerrar Sesion</a>
                    </td>
                </tr>
                <tr>
                    <td>
                         
                        <form action="actualizacion-datosa.php" class="boten">
                            <input type="submit" class="submit" value="Editar">
                        </form>
                    </td>
                </tr>
            </table>
        </div>
        <section id="content3"> 
    <?php
    $hostname = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'ventex';
    
    // conexión a la base de datos
    $idt = $_SESSION['name'];
    $Conexion = mysqli_connect($hostname, $username, $password, $database);

    if (!$Conexion) {
        die("Error en la conexión: " . mysqli_connect_error());
    }
    $sellerw = $_SESSION['id'];

    $sql = "SELECT * FROM sellerprofile WHERE idddfi = '$sellerw'";
    $envio = mysqli_query($Conexion, $sql);

    if (!$envio) {
        die('Error en la consulta: ' . mysqli_error($Conexion));
    }

    while ($mostar = mysqli_fetch_array($envio)) {
        ?>
        <h1>Información de Contacto</h1>
        <section id="iconos-juntos">
            <section><a href="<?php echo $mostar['instagram']; ?>"><img src="imgs/instagram.png" class="iconos"></a></section>
            <section><a href="<?php echo $mostar['x']; ?>"><img src="imgs/twitter.png" class="iconos2"></a></section>
            <section><a href="<?php echo $mostar['whatsapp']; ?>"><img src="imgs/whatsapp.png" class="iconos"></a></section>
        </section>
        <br><br><br><br><br>
        <?php
        echo '<p>' . $mostar['profileDescription'] . '</p>';
        echo'<br><br';
        echo '<p>' . $mostar['Contactdescription'] . '</p>';
    }

    // Cerrar la conexión a la base de datos
    mysqli_close($Conexion);
    ?>
<br>
<form action="actualizacion-redes.php" class="boten">
                            <input type="submit" class="submit" value="Editar">
                        </form>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</section>

    <Section id="contentallp">
    <hr>
       
        <h1 class="titlesp">Estos son tus Productos</h1>
        <form action="new-productform.php" class="boten">
                            <input type="submit" class="submit" value="Nuevo producto">
        </form>
        <form action="" method="post">
        <label id="campolab" for="campo">Buscar:</label>
        <input type="text" name="campo"  id="campo" onkeyup="getData()">
    </form>
        <section id="content"></section>
        <script>
            document.addEventListener("DOMContentLoaded", getData);

            function getData() {
                let input = document.getElementById("campo").value;
                let content = document.getElementById("content");
                let url = "load2.php";
                let formData = new FormData();
                formData.append('campo', input);

                fetch(url, {
                    method: "POST",
                    body: formData
                }).then(response => response.text())
                    .then(data => {
                        console.log(data);
                        content.innerHTML = data;
                    }).catch(err => console.log(err));
            }
        </script>
    </Section>
    
</article>
    </main>
</body>

</html>