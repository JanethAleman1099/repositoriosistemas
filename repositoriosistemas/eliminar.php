<?php


$c=mysqli_connect('ubuntu24','root','12345');
mysqli_select_db($c,'Personas');


echo "<h1>Borrar solicitud</h1>";
echo "Usuario: {$_POST['de']}<br>";

if(strcmp($_POST['de'],"")!=0)
{
$instruccion="delete from Solicitudes where De='{$_POST['de']}'";

$r=mysqli_query($c,$instruccion);
echo "<br>Registro borrado";
}
else
echo "<br>Registro no borrado,Faltan datos";
?>
