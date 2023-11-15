<?php
    require_once('conexion.php');
    $vend="Edgar Humberto Huizar Jimenez";

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Agregar producto</title>
    <link rel="stylesheet" href="header.css">
    <link rel="stylesheet" href="agregar_producto.css">
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
                    <div id="pic">
                    <img style="border-radius: 100px;" src="<?php  ?>">  
                    </div>
                </section>
        </article>
        <section id="bnav">
                <nav class="nave">
                    <ul class="menu">
                        <li><a href="inicio.php">Inicio</a></li>
                        <li><a href="#">Categorías</a>
                            <ul class="menuv">
                                <li><a href="#">Alimentos</a></li>
                                <li><a href="#">Accesorios</a></li>
                                <li><a href="#">Otros</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Perfil</a></li>
                    </ul>
                </nav>
        </section>
    </header>
    <main>
        <article id="containerNP">
            <form action="env_producto.php" method="post">
            <br><br>
            <input type="hidden" name="vendedor" value="hola">
                <label for="nameP" class="titl">Nombre del Producto</label><br><br>
                <input type="text" name="nameP" class="tex"><br><br>
                <label for="desc" class="titl">Descripción del Producto</label><br><br>
                <input type="text" name="desc" class="tex"><br><br>
                <label for="precio"  class="titl">Precio</label><br><br>
                <input type="text" name="precio" class="tex"><br><br>
                <label for="categoria" class="titl">Categoria</label><br><br>
                <select name="categoria" class="tex">
                    <option disabled value="">Categoria</option>
                    <option value=""></option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select>
                <br>
                <label for="subcategoria" class="titl">Subcategoria</label><br><br>
                <select name="subcategoria " class="tex">
                    <option disabled value="">Subcategoria</option>
                    <option value=""></option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select> 
                <label for="image" class="titl">imagen</label><br><br>
                <input type="file" name="image" class="tex"><br><br>
                <input type="submit" value="Guardar" class="guardar">
            </form>
        </article>
    </main>
</body>
</html>