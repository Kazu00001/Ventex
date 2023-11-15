<?php
    require_once('conexion.php');
    session_start();
    $cats = mysqli_query($conexion, "SELECT DISTINCT category FROM products;");

?>
<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <Title>Inicio</Title>
        <link rel="stylesheet" href="header.css">
        <link rel="stylesheet" href="inicio.css">
        
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

        <div class="publicidad"><!-- Esta sección es para colocar una imagen de publicidad-->
            <div class= "carruseles">
                <section class="slider-carrusel"><img src="imgs/imag1.jpg"></section>
                <section class="slider-carrusel"><img src="imgs/imag2.jpg"></section>
                <section class="slider-carrusel"><img src="imgs/imag3.jpg"></section>
                <section class="slider-carrusel"><img src="imgs/imag4.jpg" ></section>
            </div>
        </div>
        <main>
            <article id="paquetes"><!--Toda esta parte contendrá los diferentes tipos de habitaciones-->
                <br>
                <h1 class="tits">Productos Recomendados</h1>
                <section id="container-rooms">
                <section class="habitacion"><section id="uno"></section></section>
                    <section class="habitacion"><section id="dos"></section></section>
                    <section class="habitacion"><section id="tres"></section></section>
                </section>
            </article><!-------------------------------------------------------------------------------->




            <article class="servicios"> <!--Esta parte contendrá una vista rapid de los serviios que ofrece el hotel-->
                <br><br> 
                <h1 class="tits">Para un Antojo</h1>
                <section id="container-rooms">
                    <section class="square_s">
                        <div class="c_icon">
                            <img src="imgs/Gomitas.jpg" class="icons">
                        </div>
                        <div class="titSer">
                            <p class="titS">$5.00</p>
                            <p class="titS">Gomitas</p>
                        </div>
                    </section>
                    <section class="square_s">
                        <div class="c_icon">
                            <img src="imgs/bistec.jpg" class="icons">
                        </div>
                        <div class="titSer">
                            <p class="titS">$40.00</p>
                            <p class="titS">Lonche de Bistec</p>
                        </div>
                    </section>
                    <section class="square_s">
                        <div class="c_icon">
                            <img src="imgs/pulpa.jpeg" class="icons">
                        </div>
                        <div class="titSer">
                            <p class="titS">$5.00</p>
                            <p class="titS">Pulparindo</p>
                        </div>
                    </section>
                    <section class="square_s">
                        <div class="c_icon">
                            <img src="imgs/pelon.jpeg" class="icons">
                        </div>
                        <div class="titSer">
                            <p class="titS">$8.00</p>
                            <p class="titS">Pelon Pelo Rico</p>
                        </div>
                    </section>
                    <section class="square_s">
                        <div class="c_icon">
                            <img src="imgs/mazapan.jpeg" class="icons">
                        </div>
                        <div class="titSer">
                            <p class="titS">$10.00</p>
                            <p class="titS">Mazapan</p>
                        </div>
                    </section>
                </section>
            </article><!-------------------------------------------------------------------------------->

            <aside class="imagen2"><h1 class="dul">Gran Variedad <br>de Dulces</h1></aside><!--imagen de publicidad-->

            <article class="servicios"> <!--Esta parte contendrá una vista rapida de las actividades existentes en el hotel-->
                <br><br> 
                <h1 class="tits">Productos Populares</h1>
                <p></p>
                <section id="container-rooms">
                    <section class="square_s">
                        <div class="c_icon">
                            <img src="imgs/pantalon1.jpg" class="icons">
                        </div>
                        <div class="titSer">
                            <p class="titS">$500.00</p>
                            <p class="titS">Pantalon Negro</p>
                        </div>
                    </section>
                    <section class="square_s">
                        <div class="c_icon">
                            <img src="imgs/rosas.jpg" class="icons">
                        </div>
                        <div class="titSer">
                            <p class="titS">$120.00</p>
                            <p class="titS">Ramo de Rosas</p>
                        </div>
                    </section>
                    <section class="square_s">
                        <div class="c_icon">
                            <img src="imgs/Golden.jpg" class="icons">
                        </div>
                        <div class="titSer">
                            <p class="titS">$860.00</p>
                            <p class="titS">Album Golden</p>
                        </div>
                    </section>
                    <section class="square_s">
                        <div class="c_icon">
                            <img src="imgs/kinder.jpeg" class="icons">
                        </div>
                        <div class="titSer">
                            <p class="titS">$15.00</p>
                            <p class="titS">Kinder Delice</p>
                        </div>
                    </section>
                    <section class="square_s">
                        <div class="c_icon">
                            <img src="imgs/pollo.jpg" class="icons">
                        </div>
                        <div class="titSer">
                            <p class="titS">400.00</p>
                            <p class="titS">Lonche de Pollo</p>
                        </div>
                    </section>
                </section>
            </article><!------------------------------------------------------------------------------->

            <footer></footer>
        </main>
    </body>
</html>