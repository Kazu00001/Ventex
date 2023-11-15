<?php
session_start();
require_once('conexion.php');
$cats = mysqli_query($conexion, "SELECT DISTINCT category FROM products;");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ventex</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Incios.css">
    <link rel="stylesheet" href="header.css">
        <link rel="stylesheet" href="inicio.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cabin&family=Cabin+Sketch&display=swap" rel="stylesheet">
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
    
    <section id="title">
        <br><br>
        
    </section>
    
    <main id="main2">
        <aside id="for2">
            <br><br>
            <form action="actualizacion-datos.php" method="post" class="form">
                <h2 class="title" >Actualizacion de datos</h2>
                    <div class="flex">
                        <input type="hidden" name="ideup"  value="<?php echo $_SESSION['id'] ?>">
                    <label>
                        <input class="input" type="text" name="nombre" placeholder="" required="">
                        <span>Nombre(s)</span>
                    </label>
                </div>  
                <label>
                    <input class="input" type="email" name="correo" placeholder="" required="">
                    <span>Email</span>
                </label>
                    <label>
                        
                        <input class="input" type="date" name="fecha" placeholder="" required="">
                        <span>Fecha de nacimiento</span>
                    </label>
                    <label>
                        <input class="input" type="number" name="telefono" placeholder="" required="">
                        <span>Teléfono</span>
                    </label>

                    <input type="submit" value="Actualizar"  class="submit">
                    
            </form>
        </aside>
    </main>
</body>
</html>