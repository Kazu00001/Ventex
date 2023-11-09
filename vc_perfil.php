<?php
    $us='Edgar Humberto Huizar';
    require_once('conexion.php');
    $ex=mysqli_query($conexion, "SELECT * FROM pruebav;");
    $exU=mysqli_query($conexion, "SELECT * FROM usuarios WHERE usuario = '$us'");
    $most=mysqli_fetch_array($exU);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="barra_nav_footV.css">
    <link rel="stylesheet" href="vc_perfil.css">
</head>
<body>
<!-------------------------------------------------------------------------------------------------------->
    <header>
        <article id="titfo">
            <section id="titC">
                <br>
                <h1 id="tit">VENTEX</h1>
            </section>
            <section id="search">
                <br><br><br>
                <input type="search" id="sear">
            </section>
            <section id="perfil">
                <div id="pic"></div>
            </section>
        </article>
        <section id="bnav"></section>
    </header>
<!-------------------------------------------------------------------------------------------------------->
    <main>
        <article id="bar_perfil">
            <section id="c_pic">
                <div id="pict">
                    <img src="imgs/<?php echo $most['picture']?>" class="imagen">
                </div>
                <p id="nomUsuario"><?php echo $most['usuario']?></p>
            </section>
        </article>
        <section id="titulo_C">
            <p id="tir">Productos del Vendedor</p>
        </section>
        <article id="pr_productos">
<!-------------------------------------------------------------------------------------------------------->
            <?php while($mostrar=mysqli_fetch_array($ex)) { ?>
            <section class="container_p"> <!--Esto contiene la informacion de un producto-->
                <div class="c_picture">
<!--Imagen del Producto--><img src="imgs/<?php echo $mostrar['imagen']?>" class="imagen">
                </div>
                <div class="c_info">
                    <div class="c_precio">
<!--Precio del Producto--><h1 class="precio">$<?php echo $mostrar['precio']?></h1>
                    </div>
                    <div class="c_nombre">
<!--Nombre del Producto--><p class="nombre"><?php echo $mostrar['nombre']?></p>
                    </div>
                </div>
            </section>
            <?php }?>
<!-------------------------------------------------------------------------------------------------------->
           
        </article>
    </main>
    <footer></footer>
</body>
</html>