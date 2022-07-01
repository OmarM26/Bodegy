<!DOCTYPE html>
<?php
$usuario  = "root";
$password = "";
$servidor = "localhost";
$basededatos = "bodegy";
$con = mysqli_connect($servidor, $usuario, $password) or die("No se ha podido conectar al Servidor");
$db = mysqli_select_db($con, $basededatos) or die("Upps! Error en conectar a la Base de Datos");

?>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/> <!--Importante--->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Descargar</title>
</head>
<body>
    
<?php
date_default_timezone_set("America/Santiago");
$fecha = date("d/m/Y");

header("Content-Type: text/html;charset=utf-8");
header("Content-Type: application/vnd.ms-excel charset=iso-8859-1");
$filename = "ReporteExcel_" .$fecha. ".xls";
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Content-Disposition: attachment; filename=" . $filename . "");


$listaproductos = ("SELECT * FROM producto ORDER BY producto_id ASC");
$DataProductos = mysqli_query($con, $listaproductos);

?>


<table style="text-align: center;" border='1' cellpadding=1 cellspacing=1>
<thead>
    <tr style="background: #D0CDCD;">
    <th>Id producto</th>
    <th>Nombre</th>
    <th>Codigo</th>
    <th>Stock</th>
    </tr>
</thead>
<?php
    while ($lista = mysqli_fetch_array($DataProductos)) { ?>
    <tbody>
        <tr>
            <td><?php echo $lista['producto_id']; ?></td>
            <td><?php echo $lista['producto_nombre']; ?></td>
            <td><?php echo $lista['producto_codigo']; ?></td>
            <td><?php echo $lista['producto_stock'] ; ?></td>
        </tr>
    </tbody>
    
<?php } ?>
</table>

</body>
</html>