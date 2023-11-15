<?php
session_start();
require('conexion.php');
$sellerw= $_SESSION['name'];

$columas = ['id','nameProduct','description','price','category','subcategory','seller','productImage'];
$table = "products";
$campo = isset($_POST['campo']) ? $Conexion->real_escape_string($_POST['campo']) : null;
$where = '';

if ($campo != null) {
    $where = "WHERE (";
    $cont = count($columas);

    for ($i = 0; $i < $cont; $i++) {
        $where .= $columas[$i] . " LIKE '%" . $campo . "%' OR ";
    }

    $where = substr_replace($where, "", -3);
    $where .= ")";
}

$consult = "SELECT " . implode(",", $columas) . " FROM $table $where  WHERE saller='$sellerw'";
$Conexion->set_charset("utf8");
header('Content-Type: text/html; charset=utf-8');
$result = $Conexion->query($consult);

if ($result === false) {
    die("Error in query: " . $Conexion->error);
}

$num_rows = $result->num_rows;

if ($num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
            echo'<form action="p_producto.php" method="post" id="form1">';
            echo'<button  class="container_p" onclick="enviarFormulario()">';
            echo'<input type="hidden"  name="id" value="'.$row['id'].'">';      
            echo'<section>';// <!--Esto contiene la informacion de un producto-->
            echo'<div class="c_picture">';
            /*<!--Imagen del Producto---->*/echo'<img src="imgs/'.$row['productImage'].'" class="imagen">';
                echo'</div>';
                echo'<div class="c_info">';
                   echo '<div class="c_precio">';
/*<!--Precio del Producto---->*/ echo'<h1 class="precio">'.$row['price'].'</h1>';
                    echo'</div>';
                    echo '<div class="c_nombre">';
/*<!--Nombre del Producto---->*/ echo'<p class="nombre">'.$row['nameProduct'].'</p>';
                   echo '</div>';
                echo '</div>';
                echo '</section>';

            echo '<script>';
               echo 'function enviarFormulario() {';
                echo "document.getElementById('form1').submit();";
                echo '}';
           echo '</script>';
        echo'</button>';
    echo '</form>';
    }
} else {
    echo '<p>Sin resultados</p>';
}
?>
