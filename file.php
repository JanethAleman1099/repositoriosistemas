<?php

if ($_FILES['archivo']["error"] > 0)
  {
  echo "Error: " . $_FILES['archivo']['error'] . "<br>";
  }
else
  {
  echo "Nombre: " . $_FILES['archivo']['name'] . "<br>";
  echo "Tipo: " . $_FILES['archivo']['type'] . "<br>";
  echo "Tamaño: " . ($_FILES["archivo"]["size"] / 1024) . " kB<br>";
  echo "Carpeta temporal: " . $_FILES['archivo']['tmp_name'];

move_uploaded_file($_FILES['archivo']['tmp_name'],"/var/www/html/Rulobook/fp/" . $_FILES['archivo']['name']);
}
echo "<br><br><br>";
echo "Rutaf:  "."/var/www/html/Rulobook/fp/" . $_FILES['archivo']['name'];
$rut="/Rulobook/fp/" . $_FILES['archivo']['name'];
echo "<br>Usuario: {$_POST['nombre1']}<br>";
echo "Clave: {$_POST['clave1']}<br>";


$c=mysqli_connect('ubuntu24','root','12345');
mysqli_select_db($c,'Personas');

if(strcmp($_POST['nombre1'],"")!=0)
{
$instruccion="insert into usuarios (Username,Password,Imagen,Edad) values (
'{$_POST['nombre1']}','{$_POST['clave1']}','$rut','{$_POST['edad1']}')";

$r=mysqli_query($c,$instruccion);
}
else
echo "<br>Registro no guardado,Faltan datos";
?>
