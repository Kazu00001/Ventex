<?php
    require_once('conexion.php');
    $id=$_POST['id'];
    $more=mysqli_query($conexion, "SELECT * FROM products ORDER BY RAND() LIMIT 3");
    $buscar=mysqli_query($conexion, "SELECT * FROM products WHERE id = '$id'");
    $prod=mysqli_fetch_array($buscar);
    $seller= $prod['seller'];
    $cont=mysqli_query($conexion, "SELECT * FROM sellerprofile WHERE nameSeller = '$seller'");
    $cats = mysqli_query($conexion, "SELECT DISTINCT category FROM products;");
    $contact=mysqli_fetch_array($cont);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Producto</title>
    <link rel="stylesheet" href="p_producto.css">
    <link rel="stylesheet" href="header.css">
</head>
<body>
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
        <article id="container">
            <section id="container_left">
                <section id="container_pictures">
                    <div id="container_p">
                        <img src="imgs/<?php echo $prod['productImage']?>" class="imagen">
                    </div>
                </section>
                <section id="more_products">
                    <br>
                    <h1 class="prec">Más Productos</h1><br>
<!-------------------------------------------------------------------------------------------------------->
<?php while( $mostrar=mysqli_fetch_array($more)) { ?>
                
                <form action="p_producto.php" method="post" id="form1">
                    <button  class="m_product" onclick="enviarFormulario()">
                        <input type="hidden"  name="id" value="<?php echo $mostrar['id'];?>">
                        <section> <!--Esto contiene la informacion de un producto-->
                            <div class="mc_picture">
    <!--Imagen del Producto----><img src="imgs/<?php echo $mostrar['productImage']?>" class="m_imagen">
                            </div>
                            <div class="m_info">
                                <div class="m_precio">
    <!--Precio del Producto----><h1 class="precio">$<?php echo $mostrar['price']?></h1>
                                </div>
                                <div class="m_nombre">
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

                </section>
            </section>
            <section id="container_info">
                <br><br><br>
                <p id="precio">$<?php echo $prod['price']?></p><br>
                <h1 class="namP"><?php echo $prod['nameProduct']?></h1>
                <p id="verd">Top 5 en popularidad</p>
                <p class="desc"><b>Horario de Estancia: <br></b> 7:00am - 2:00pm</p>
                <p class="desc"><?php echo $prod['descriptionP']?></p>
                <p id="mas">¿Quieres ver mas productos de este vendedor?</p><br><br>
                <form action="vc_perfil.php" method="post">
                <form action="vc_perfil.php">
                    <input type="hidden"  name="vendedor" value="<?php echo $prod['seller'];?>">
                    <input type="submit" id="bot" value="Ver perfil del vendedor">
                </form>
            </section>

            <section id="contact_information">
                <br><br>
                <p class="namP">Información de contacto</p>
                <div class="container_links">
                <a href="<?php echo $contact['instagram']?>"><div class="link"></div></a>
                </div>
                <p class="contact_description"><?php echo $contact['Contactdescription']?></p>
            </section>
        </article>
    </main>
    
</body>
</html>