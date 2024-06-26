<?php
    $us = 'Usuario 1';
    session_start();
    require_once('conexion.php');
    $cats=mysqli_query($conexion, "SELECT DISTINCT category FROM products;");
    
    $exU=mysqli_query($conexion, "SELECT * FROM sellerprofile WHERE nameSeller = '$us'");

    $mywher = isset($_GET['category']) ? $_GET['category'] : null;
    $busc = null;

    if ($mywher != null) {
        $busc = "SELECT * FROM products WHERE category = '$mywher'";
    } else {
        $busc = "SELECT * FROM products";
    }
    $subc=mysqli_query($conexion, "SELECT DISTINCT subcategory FROM products WHERE category='$mywher';");
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
                <div id="pic"><img style="border-radius: 100px;" class="imgeesp" src="<?php echo'imgs/'.$_SESSION['img']?>"> </div>
                </div>
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
<!-------------------------------------------------------------------------------------------------------->
<main>
    <article class="bar_perfil">
        <br>
            <?php while ($subcat=mysqli_fetch_array($subc)) {?>
                <form action="subsub.php" method="post" id="form1">
                <button  class="subcate" onclick="enviarFormulario()">
                    <input type="hidden"  name="id" value="<?php echo $subcat['subcategory'];?>">
                        <section>
                            <p><?php echo $subcat['subcategory'];?></p>
                        </section>

                    <script>
                        function enviarFormulario() {
                            document.getElementById('form1').submit();
                        }
                    </script>
                </button>
            </form>
            <?php } ?>
    </article>
    <section id="titulo_C">
        <h1 class="tituleishon"><?php echo $mywher ?></h1>
    </section>
    <article id="pr_productos">
<!-------------------------------------------------------------------------------------------------------->
            <?php while($mostrar=mysqli_fetch_array($ex)) { ?>
                
            <form action="p_producto.php" method="post" id="form1">
                <button  class="container_p" onclick="enviarFormulario()">
                    <input type="hidden"  name="id" value="<?php echo $mostrar['id'];?>">
                    <input type="hidden"  name="categ" value="<?php echo $mostrar['category'];?>">
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