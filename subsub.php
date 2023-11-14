<?php
    $subpro = $_POST['id'];
    
    $us = 'Usuario 1';
    require_once('conexion.php');
    $cats=mysqli_query($conexion, "SELECT DISTINCT category FROM products;");
    
    
    $exU=mysqli_query($conexion, "SELECT * FROM sellerprofile WHERE nameSeller = '$us'");

    $busc = "SELECT * FROM products WHERE subcategory = '$subpro'";
    $ex = mysqli_query($conexion, $busc);
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
    <title>Ventex</title>
    <link rel="stylesheet" href="header.css">
    <link rel="stylesheet" href="categorias.css">
    <link rel="stylesheet" href="subcat.css">
</head>
<body>
<!-------------------------------------------------------------------------------------------------------->
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
                    <li><a href="#">Perfil</a></li>
                </ul>
            </nav>
        </section>
        
    </header>
<!-------------------------------------------------------------------------------------------------------->
<main>
    <article id="bar_perfil">
    </article>
    <section id="titulo_C">
        <h1><?php echo $subpro ?></h1>
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