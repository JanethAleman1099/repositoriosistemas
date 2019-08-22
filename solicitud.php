<?php


$de= $_POST['usuario'];
$para = $_POST['amigo'];


$c=mysqli_connect('ubuntu24','root','12345');
mysqli_select_db($c,'Personas');

if(strcmp($_POST['usuario'],"")!=0)
{
$instruccion="insert into Solicitudes (De,Para) values (
'{$_POST['usuario']}','{$_POST['amigo']}')";

$r=mysqli_query($c,$instruccion);
echo "<br>Solicitud enviada";
}
else
echo "<br>Registro no guardado,Faltan datos";

?>
