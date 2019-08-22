<?php
$usuario = $_POST['nombre1'];
$uactual = $_POST['actual1'];
mysqli_connect('ubuntu24','root','12345') or die("Error al conectar " . mysqli_error());
mysqli_select_db($c,'Personas'); or die ("Error al seleccionar la Base de datos: " . mysqli_error());
$result = mysqli_query("SELECT * from Amistades where Usuario='" . $uactual . "' AND Amigo='". $usuario."'");
if($row = mysqli_fetch_array($result)){
mysqli_connect('ubuntu24','root','12345');
mysqli_select_db($c,'Personas');
$sql="SELECT * from usuarios where Username='" . $usuario . "'";
$r=mysqli_query($c,$sql);
echo "<table border=1 align=left>";
echo "<td width=100>"."Persona"."</td>";
while ($arr=mysqli_fetch_array($r))
	{
	echo "<tr>";
	$imagen=$arr['Imagen'];
	echo "<td width=400>" . $arr['Username'] . "</td>";
	echo "<td width=400 height=160>"."<center><img src='$imagen' width=160 height=160 >"."</td>";
	}
echo "</table>";
echo "</table>";
echo "<table border=1 align=left>";
echo "<td width=100>".Publicacion."</td>";
echo "<td width=75><form action=nuevao.php method=POST>
	<input type=text name=pub><input type=hidden name=de value={$uactual}><input type=hidden name=para value={$usuario}><input type=submit value=PUBLICAR></form>"."</td>";
echo "</table>";
$sql2="SELECT * from Publicaciones where Para='". $usuario ."' OR De='". $usuario ."'";
$r2=mysqli_query($c,$sql2);
echo "<center><table border=1>";
echo "<td width=100>"."DE"."</td>";
echo "<td width=100>"."PARA"."</td>";
echo "<td width=100>"."Publicacion"."</td>";
while ($arr2=mysqli_fetch_array($r2))
	{
	echo "<tr>";
	echo "<td width=100>" . $arr2['De'] . "</td>";
	echo "<td width=100>" . $arr2['Para'] . "</td>";
	echo "<td width=100>" . $arr2['Publicacion'] . "</td>";	
	}
echo "</center></table>";
echo "<br>";
mysqli_connect('ubuntu24','root','12345')
mysqli_select_db($c,'Personas');
$sql="SELECT * from Amistades where Usuario='" .$usuario. "'";
$r=mysqli_query($c,$sql);
echo "<table border=1 align=left>";
echo "<td width=100>"."Amistades"."</td>";
while ($arr=mysqli_fetch_array($r))
	{
	echo "<tr>";
	echo "<td width=100>" . $arr['Amigo'] . "</td>";
	}
echo "</table>";
}else{
mysqli_connect('ubuntu24','root','12345')
mysqli_select_db($c,'Personas');
$sql="SELECT * from usuarios where Username='" . $usuario . "'";
$r=mysqli_query($c,$sql);
echo "<table border=1 align=left>";
echo "<td width=100>"."Persona"."</td>";
while ($arr=mysqli_fetch_array($r))
	{
	echo "<tr>";
	$imagen=$arr['Imagen'];
	echo "<td width=400>" . $arr['Username'] . "</td>";
	echo "<td width=400 height=160>"."<center><img src='$imagen' width=160 height=160 >"."</td>";
	echo "<td width=75><form action=solicitud.php method=POST>
	<input type=hidden name=usuario value={$_POST['actual1']}><input type=hidden name=amigo value={$_POST['nombre1']}>
	<input type=submit value=Agregar></form>"."</td>";	
	}
echo "</table>";
}
?>
