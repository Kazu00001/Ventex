<?php
    require_once('conexion.php');

    $cats = mysqli_query($conexion, "SELECT DISTINCT category FROM products;");
    echo' <SCRIPT>alert("Bienvenido '. $usu.'")</SCRIPT>'

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $id;?></title>
    <link rel="stylesheet" href="header.css">
    <link rel="stylesheet" href="categorias.css">
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
                            <?php while ($cate=mysqli_fetch_array($cats)) {?>
                                <li class="ca">
                                    <a href="Subcat.php?category=<?php echo $cate['category'];?>" 
                                    name=""><?php echo $cate['category'];?></a>
                                </li>
                                <?php } ?>
                        </ul>
                    </li>
                    <li><a href="#">Perfil</a></li>
                </ul>
            </nav>
        </section>
        
    </header>
    <main>
      <br><br><br>
        <h1 class="titCat"><?php echo $id?></h1><br>
        
        <article id="container-dr">
            <section class="c_drink">
                <p class="titCate">Americano</p><br>
<!------------------------------------------------------------------------------------------------>
                <section class="drink">
                    <div class="c_foto">
                        <img src="imgs/C-café-frio.png" class="foto">
                    </div>
                    <div class=ct_foto>
                        <p class="t_foto">Americano</p>
                    </div>
                </section>
<!------------------------------------------------------------------------------------------------>
                <section class="drink">
                    <div class="c_foto">
                        <img src="imgs/C-café-frio.png" class="foto">
                    </div>
                    <div class=ct_foto>
                        <p class="t_foto">Americano</p>
                    </div>
                </section>
                <section class="drink">
                    <div class="c_foto">
                        <img src="imgs/C-café-frio.png" class="foto">
                    </div>
                    <div class=ct_foto>
                        <p class="t_foto">Americano</p>
                    </div>
                </section>
                <section class="drink">
                    <div class="c_foto">
                        <img src="imgs/C-café-frio.png" class="foto">
                    </div>
                    <div class=ct_foto>
                        <p class="t_foto">Americano</p>
                    </div>
                </section>
                <section class="drink">
                    <div class="c_foto">
                        <img src="imgs/C-café-frio.png" class="foto">
                    </div>
                    <div class=ct_foto>
                        <p class="t_foto">Americano</p>
                    </div>
                </section>
                <section class="drink">
                    <div class="c_foto">
                        <img src="imgs/C-café-frio.png" class="foto">
                    </div>
                    <div class=ct_foto>
                        <p class="t_foto">Americano</p>
                    </div>
                </section>
                <section class="drink">
                    <div class="c_foto">
                        <img src="imgs/C-café-frio.png" class="foto">
                    </div>
                    <div class=ct_foto>
                        <p class="t_foto">Americano</p>
                    </div>
                </section>
            </section>
            <section class="c_drink">
                <p class="titCate">Expresso Tradicional</p><br>
                <section class="drink">
                    <div class="c_foto">
                        <img src="imgs/C-café-frio.png" class="foto">
                    </div>
                    <div class=ct_foto>
                        <p class="t_foto">Americano</p>
                    </div>
                </section>
                <section class="drink">
                    <div class="c_foto">
                        <img src="imgs/C-café-frio.png" class="foto">
                    </div>
                    <div class=ct_foto>
                        <p class="t_foto">Americano</p>
                    </div>
                </section>
                <section class="drink">
                    <div class="c_foto">
                        <img src="imgs/C-café-frio.png" class="foto">
                    </div>
                    <div class=ct_foto>
                        <p class="t_foto">Americano</p>
                    </div>
                </section>
                <section class="drink">
                    <div class="c_foto">
                        <img src="imgs/C-café-frio.png" class="foto">
                    </div>
                    <div class=ct_foto>
                        <p class="t_foto">Americano</p>
                    </div>
                </section>
                <section class="drink">
                    <div class="c_foto">
                        <img src="imgs/C-café-frio.png" class="foto">
                    </div>
                    <div class=ct_foto>
                        <p class="t_foto">Americano</p>
                    </div>
                </section>
                <section class="drink">
                    <div class="c_foto">
                        <img src="imgs/C-café-frio.png" class="foto">
                    </div>
                    <div class=ct_foto>
                        <p class="t_foto">Americano</p>
                    </div>
                </section>
                <section class="drink">
                    <div class="c_foto">
                        <img src="imgs/C-café-frio.png" class="foto">
                    </div>
                    <div class=ct_foto>
                        <p class="t_foto">Americano</p>
                    </div>
                </section>
                <section class="drink">
                    <div class="c_foto">
                        <img src="imgs/C-café-frio.png" class="foto">
                    </div>
                    <div class=ct_foto>
                        <p class="t_foto">Americano</p>
                    </div>
                </section>
                <section class="drink">
                    <div class="c_foto">
                        <img src="imgs/C-café-frio.png" class="foto">
                    </div>
                    <div class=ct_foto>
                        <p class="t_foto">Americano</p>
                    </div>
                </section>
                <section class="drink">
                    <div class="c_foto">
                        <img src="imgs/C-café-frio.png" class="foto">
                    </div>
                    <div class=ct_foto>
                        <p class="t_foto">Americano</p>
                    </div>
                </section>
            </section>


        </article> 
    </main>
    <footer></footer>
</body>
</html>