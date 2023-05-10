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

// Realizar la consulta para mostrar los registros con definitiva mayor a 2.6
$sql = "SELECT * FROM oscarr WHERE definitiva > 2.6";
$resultado = mysqli_query($conexion, $sql);

echo "<table>";
echo "<tr><th>Nombre</th>
<th>Apellido</th>
<th>Code</th>
<th>definitiva</th><tr>";
while ($fila = mysqli_fetch_array($resultado)) {
    echo "<tr><td>" . $fila['nombre'] . "</td><td>" . $fila['apellido'] . "</td><td>" . $fila['code'] . "</td><td>" . $fila['definitiva'] . "</td>";
}
echo "</table>";

mysqli_close($conexion);
?>