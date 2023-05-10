<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<a href="index.php">volver</a>
</body>
</html>
<?php
// Conectarse a la base de datos
$conexion = mysqli_connect("localhost", "root", "", "oscar");

// Verificar la conexión
if (mysqli_connect_error()) {
    die("Error de conexión: " . mysqli_connect_error());
}


// Obtener los valores del registro correspondiente

$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$code = $_POST['code'];
$definitiva = $_POST['definitiva'];

// Realizar la consulta
$cantidad = "SELECT COUNT(*) FROM oscarr WHERE nombre='$nombre' AND apellido='$apellido' AND code='$code' AND definitiva='$definitiva'";
$resultado = mysqli_query($conexion, $cantidad);
$fila = mysqli_fetch_array($resultado);

//verificar si hay error en la consulta
if (!$resultado) {
    die("Error en la consulta: " . mysqli_error($conexion));
}


// Realizar la consulta para mostrar todos los registros
$sql = "SELECT * FROM oscarr";
$resultado = mysqli_query($conexion, $sql);

echo "<table>";
echo "<tr><th>Nombre</th>
<th>Apellido</th>
<th>Code</th>
<th>definitiva</th><tr>";
while ($fila = mysqli_fetch_array($resultado)) {
    echo "<tr><td>" . $fila['nombre'] . "</td><td>" . $fila['apellido'] . "</td><td>" . $fila['code'] . "</td><td>" . $fila['definitiva'] . "</td>";
    echo "<td><form method='post'><input type='hidden' name='nombre' value='" . $fila['nombre'] . "'><input type='hidden' name='apellido' value='" . $fila['apellido'] . "'><input type='hidden' name='code' value='" . $fila['code'] . "'>
    <input type='hidden' name='definitiva' value='" . $fila['definitiva'] . "'></form></td></tr>";
}
echo "</table>";

echo "Cantidad de registros encontrados: " . mysqli_num_rows($resultado);
mysqli_close($conexion);
?>
