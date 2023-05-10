<?php
$usuario= "root";
$contrasenia = "";
$servidor = "localhost";
$basededatos="oscar";


// creación de la conexión a la base de datos con mysql_connect()
$conexion = mysqli_connect($servidor, $usuario, $contrasenia, $basededatos) or die ("error");
// if (mysqli_connect_error()) {
//     die("Error de conexión: " . mysqli_connect_error());
// }

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $code = $_POST['code'];
	$definitiva = $_POST['definitiva'];

    $queryinsertar = "INSERT INTO oscarr (nombre, apellido, code,definitiva) VALUES ('$nombre', '$apellido', '$code', '$definitiva')";
    mysqli_query($conexion, $queryinsertar);

    mysqli_close($conexion);
}
?>



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
<br>
<form action=""  method="post">
		<br>
		<label for="">Formulario de ingreso</label>
		<br>
		<br>
       <input type="text" placeholder="nombre" name="nombre"> 
       <br>
       <br>
       <input type="text" placeholder="apellido" name="apellido">
       <br>
       <br>
       <input type="number" placeholder="code" name="code">
       <br>
	   <br>
       <input type="number" placeholder="definitiva" name="definitiva">
       <br>
	   <br>
       <input type="submit">

    </form>

	
</body>
</html>
