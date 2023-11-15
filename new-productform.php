<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ventex</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Incios.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cabin&family=Cabin+Sketch&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <h1>Ventex</h1>
    </header>
    
    <section id="title">
        <br><br>
        
    </section>
    <main id="main2">
        <aside id="for2">
            <br><br>
            <form action="new-productphp.php" method="post" class="form">
                <h2 class="title" >Actualizacion de datos</h2>
                    <div class="flex">
                        <input type="hidden" name="idpv"  value="<?php echo $_SESSION['id'] ?>">
                    <label>
                        <input class="input" type="text" name="nameProduct" placeholder="" required="">
                        <span>Nombre Producto</span>
                    </label>
                </div>  
                <label>
                    <input class="input" type="text" name="descriptionp" placeholder="" required="">
                    <span>Descripcion del producto</span>
                </label>
                    <label>
                        
                        <input class="input" type="texto" name="price" placeholder="" required="">
                        <span>Precio</span>
                    </label>
                    <label>
                    <label for="categoria" class="titl">Categoria</label><br><br>
                        <select name="categoria" class="tex">
                            <option disabled value="">Categoria</option>
                            <option value=""></option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>
                    </label>

                    <label>
                    <label for="subcategoria" class="titl">Subcategoria</label><br>
                        <select name="subcategoria " class="tex">
                            <option disabled value="">Subcategoria</option>
                            <option value=""></option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select> 
                    </label>
                    <input type="hidden" name="seller" value="<?php echo $_SESSION['name'] ?>">
                    <label >
                        <input type="file" name="archivo" id="archivo">
                        <span>Imagen</span>
                    </label>
                    <input type="submit" value="Subir nuevo producto"  class="submit">
            </form>
        </aside>
    </main>
</body>
</html>