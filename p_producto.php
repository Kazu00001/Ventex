<?php
    require_once('conexion.php');
    $id=$_POST['id'];
    $more=mysqli_query($conexion, "SELECT * FROM productos ORDER BY RAND() LIMIT 3");
    $buscar=mysqli_query($conexion, "SELECT * FROM productos WHERE nombre = '$id'");
    $prod=mysqli_fetch_array($buscar);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Producto</title>
    <link rel="stylesheet" href="p_producto.css">
</head>
<body>
    <script>alert(<?php echo $id?>)</script>
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
    <main>
        <article id="container">
            <section id="container_left">
                <section id="container_pictures">
                    <div id="container_p">
                        <img src="imgs/<?php echo $prod['imagen']?>" class="imagen">
                    </div>
                </section>
                <section id="more_products">
                    <br>
                    <h1 class="prec">Más Productos</h1><br>
<!-------------------------------------------------------------------------------------------------------->
<?php while( $mostrar=mysqli_fetch_array($more)) { ?>
                
                <form action="p_producto.php" method="post" id="form1">
                    <button  class="m_product" onclick="enviarFormulario()">
                        <input type="hidden"  name="id" value="<?php echo $mostrar['nombre'];?>">
                        <section> <!--Esto contiene la informacion de un producto-->
                            <div class="mc_picture">
    <!--Imagen del Producto----><img src="imgs/<?php echo $mostrar['imagen']?>" class="m_imagen">
                            </div>
                            <div class="m_info">
                                <div class="m_precio">
    <!--Precio del Producto----><h1 class="precio">$<?php echo $mostrar['precio']?></h1>
                                </div>
                                <div class="m_nombre">
    <!--Nombre del Producto----><p class="nombre"><?php echo $mostrar['nombre']?></p>
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

                </section>
            </section>
            <section id="container_info">
                <br><br><br>
                <p id="precio">$<?php echo $prod['precio']?></p><br>
                <h1 id="namP"><?php echo $prod['nombre']?></h1>
                <p id="verd">Top 5 en popularidad</p><br>
                <p class="desc"><b>Horario de Estancia: <br></b> 7:00am - 2:00pm</p>
                <p class="desc"><?php echo $prod['descripcion']?></p>
                <p id="mas">¿Quieres ver mas productos de este vendedor?</p><br><br>
                <form action="vc_perfil.php" method="post">
                <form action="vc_perfil.php">
                    <input type="hidden"  name="vendedor" value="<?php echo $prod['vendedor'];?>">
                    <input type="submit" id="bot" value="Ver perfil del vendedor">
                </form>
            </section>

            <section id="contact_information">
                <p>hola</p>
            </section>
        </article>
    </main>
    
</body>
</html>