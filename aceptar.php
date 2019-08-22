<?php


$c=mysqli_connect('ubuntu24','root','12345');
mysqli_select_db($c,'Personas');


echo "<h1>Aceptar solicitud</h1>";
echo "Usuario: {$_POST['para']}<br>";
echo "Solicitud: {$_POST['de']}<br>";

if(strcmp($_POST['de'],"")!=0)
{
$instruccion4="insert into Amistades (Usuario,Amigo) values (
'{$_POST['de']}','{$_POST['para']}')";
$r4=mysqli_query($c,$instruccion4);



$instruccion2="insert into Amistades (Usuario,Amigo) values (
'{$_POST['para']}','{$_POST['de']}')";
$r2=mysqli_query($c,$instruccion2);




$instruccion="delete from Solicitudes where De='{$_POST['de']}'";

$r=mysqli_query($c,$instruccion);
echo "<br>Amigo agregado";
}
else
echo "<br>Registro no borrado,Faltan datos";
?>
