<?php
    require_once('conexion.php');

    $vendedor=$_POST['vendedor'];
    $name=$_POST['nameP'];
    $desc=$_POST['desc'];
    $precio=$_POST['precio'];
    $categoria=$_POST['categoria'];
    $subCategoria=$_POST['subcategoria'];
    $imagen=$_POST['image'];
    
    $sentence="INSERT INTO products(nameProduct, description,  price, category, subCategory, seller, productImage) VALUES ('$name', '$desc','$precio', '$categoria', '$subCategoria','$vendedor', '$imagen')";
    $guardar=mysqli_query($conexion, $sentence);

    if(!$guardar){
        echo "No jala wey";
    }else{
        $_SESSION['logged'] = true;
        header('location: perfil.php');
    }
    
?>