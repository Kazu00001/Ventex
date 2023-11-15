<?php
session_start();
require('conexion.php');
$sellerw = $_SESSION['name'];

$columas = ['id', 'nameProduct', 'descriptionP', 'price', 'category', 'subcategory', 'seller', 'productImage'];
$table = "products";
$campo = isset($_POST['campo']) ? $conexion->real_escape_string($_POST['campo']) : null;
$where = '';

if ($campo != null) {
    $where = "AND (";
    $cont = count($columas);

    for ($i = 0; $i < $cont; $i++) {
        $where .= $columas[$i] . " LIKE '%" . $campo . "%' OR ";
    }

    $where = substr_replace($where, "", -3);
    $where .= ")";
}

$consult = "SELECT " . implode(",", $columas) . " FROM $table WHERE seller='$sellerw' $where";
$result = $conexion->query($consult);

if ($result === false) {
    die("Error in query: " . $conexion->error);
}

$num_rows = $result->num_rows;

if ($num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<form action="p_producto.php" method="post" id="form1">';
        echo '<button  class="container_p" onclick="enviarFormulario()">';
        echo '<input type="hidden"  name="id" value="' . $row['id'] . '">';
        echo '<input type="hidden"  name="categ" value="' . $row['category'] . '">';
        echo '<section>'; // <!--Esto contiene la informacion de un producto-->
        echo '<div class="c_picture">';
        /*<!--Imagen del Producto---->*/echo '<img src="imgs/' . $row['productImage'] . '" class="imagen">';
        echo '</div>';
        echo '<div class="c_info">';
        echo '<div class="c_precio">';
        /*<!--Precio del Producto---->*/echo '<h1 class="precio">$' . $row['price'] . '</h1>';
        echo '</div>';
        echo '<div class="c_nombre">';
        /*<!--Nombre del Producto---->*/echo '<p class="nombre">' . $row['nameProduct'] . '</p>';
        echo '</div>';
        echo '</div>';
        echo '</section>';

        echo '<script>';
        echo 'function enviarFormulario() {';
        echo "document.getElementById('form1').submit();";
        echo '}';
        echo '</script>';
        echo '</button>';
        echo '</form>';
    }
} else {
    echo '<p>Sin resultados</p>';
}
?>
