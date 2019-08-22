<?php

$usuario = $_POST['nnombre'];
$pass = $_POST['npassword'];
 
if(empty($usuario) || empty($pass)){
header("Location: Inicio.html");
exit();
}
 
$c=mysqli_connect('ubuntu24','root','12345') or die("Error al conectar " . mysqli_error());
mysqli_select_db($c,'Personas') or die ("Error al seleccionar la Base de datos: " . mysqli_error());
 


$result = mysqli_query($c,"SELECT * from usuarios where Username='" . $usuario . "'");
 
if($row = mysqli_fetch_array($result)){
if($row['Password'] == $pass){
session_start();

$_SESSION['usuario'] = $usuario;
$_SESSION['ima'] = $row['Imagen'];
$_SESSION['ed'] = $row['Edad'];
header("Location: Contenido.php");
}else{
header("Location: Inicio.html");
exit();
}
}else{
header("Location: Inicio.html");
exit();
}
 
 
?>
