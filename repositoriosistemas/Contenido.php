<?php
session_start();
$ima=$_SESSION['ima'];
echo "<table border=1 align=left>";
echo "<td width=100>".$_SESSION['usuario']."/".$_SESSION['ed']."</td>";
echo "<td width=100 height=40>"."<center><img src='$ima' width=40 height=40 >"."</td>";
echo "<td width=75><form action=buscar.php method=POST>
	<input type=text name=ubuscar><input type=hidden name=actual value={$_SESSION['usuario']}><input type=submit value=BUSCAR></form>"."</td>";

echo "</table>";
echo "<table border=1 align=left>";
echo "<td width=100>".Publicacion."</td>";
echo "<td width=75><form action=nuevap.php method=POST>
	<input type=text name=pub><input type=hidden name=actual value={$_SESSION['usuario']}><input type=submit value=PUBLICAR></form>"."</td>";

echo "</table>";

	

echo "<br><br><br><br><br><br>";

$c=mysqli_connect('ubuntu24','root','12345');
mysqli_select_db($c,'Personas');

$sql="SELECT * from Amistades where Usuario='" .$_SESSION['usuario']. "'";
$r=mysqli_query($c,$sql);
echo "<table border=1 align=left>";
echo "<td width=100>"."Amistades"."</td>";
while ($arr=mysqli_fetch_array($r))
	{
	echo "<tr>";
	echo "<td width=100>" . $arr['Amigo'] . "</td>";
	
	
	
	}
echo "</table>";
$sql2="SELECT * from Publicaciones where Para='" .$_SESSION['usuario']. "' OR De='".$_SESSION['usuario']."'";
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

$sql3="SELECT * from Solicitudes where Para='" .$_SESSION['usuario']. "'";
$r3=mysqli_query($c,$sql3);
echo "<table border=1 align=right>";
echo "<td width=100>"."Solicitudes"."</td>";
while ($arr3=mysqli_fetch_array($r3))
	{
	echo "<tr>";
	$var=$arr3['De'];
	echo "<td width=100>" . $arr3['De'] . "</td>";
	
	echo "<td width=75><form action=aceptar.php method=POST>
	<input type=hidden name=de value=$var><input type=hidden name=para value={$_SESSION['usuario']}><input type=submit value=ACEPTAR></form>"."</td>";
	echo "<td width=75><form action=eliminar.php method=POST>
	<input type=hidden name=de value=$var><input type=hidden name=para value={$_SESSION['usuario']}><input type=submit value=ELIMINAR></form>"."</td>";
	
	
	}
echo "</table>";

?>

