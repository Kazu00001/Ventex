<?php
    $us = 'Usuario 1';
    require_once('conexion.php');
    $ex=mysqli_query($conexion, "SELECT * FROM products;");
    $exU=mysqli_query($conexion, "SELECT * FROM sellerprofile WHERE nameSeller = '$us'");

    // Verifica si la consulta fue exitosa
    if ($exU) {
        // Verifica si hay al menos una fila de resultados
        if (mysqli_num_rows($exU) > 0) { 
            // Obtiene los resultados
            $most = mysqli_fetch_array($exU);
        } else {
            echo "No se encontraron resultados para el usuario '$us'.";
        }
    } else {
        echo "Error en la consulta: " . mysqli_error($conexion);
    }
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
                <p id="nomUsuario"><?php echo $most['nameSeller']?></p>
            </section>
                <p class="description"><?php echo $most['profileDescription']?></p>
            <section id="container_contact">
                <p class="namP">Información de Contacto</p>
                <div class="container_links">
                    <a href="<?php echo $most['instagram']?>"><div class="link"></div></a>
                </div>
                <p class="contact_description"><?php echo $most['Contactdescription']?></p>
            </section>
        </article>
        <section id="titulo_C">
            <p id="tir">Productos del Vendedor</p>
        </section>
        <article id="pr_productos">
<!-------------------------------------------------------------------------------------------------------->
            <?php while($mostrar=mysqli_fetch_array($ex)) { ?>
                
            <form action="p_producto.php" method="post" id="form1">
                <button  class="container_p" onclick="enviarFormulario()">
                    <input type="hidden"  name="id" value="<?php echo $mostrar['id'];?>">
                    <section> <!--Esto contiene la informacion de un producto-->
                        <div class="c_picture">
<!--Imagen del Producto----><img src="imgs/<?php echo $mostrar['productImage']?>" class="imagen">
                        </div>
                        <div class="c_info">
                            <div class="c_precio">
<!--Precio del Producto----><h1 class="precio">$<?php echo $mostrar['price']?></h1>
                            </div>
                            <div class="c_nombre">
<!--Nombre del Producto----><p class="nombre"><?php echo $mostrar['nameProduct']?></p>
                            </div>
                        </div>
                        </section>
                    <script>
                        function enviarFormulario() {
                            document.getElementById('form1').submit();
                        }
                    </script>
                </button>
            </form>

            <?php }?>
<!-------------------------------------------------------------------------------------------------------->
           
        </article>
    </main>
    <footer></footer>
</body>
</html>