<?php


$c=mysqli_connect('ubuntu24','root','12345');
mysqli_select_db($c,'Personas');

$sql="SELECT * from usuarios where Username='" .$_POST['ubuscar']. "'";
$r=mysqli_query($c,$sql);
echo "<table border=1 align=left>";
echo "<td width=100>"."Resultado"."</td>";
while ($arr=mysqli_fetch_array($r))
	{
	echo "<tr>";
	$imagen=$arr['Imagen'];
	echo "<td width=100>" . $arr['Username'] . "</td>";
	echo "<td width=100 height=40>"."<center><img src='$imagen' width=40 height=40 >"."</td>";
	echo "<td width=75><form action=ver.php method=POST>
	<input type=hidden name=nombre1 value={$arr['Username']}><input type=hidden name=actual1 value={$_POST['actual']}>
	<input type=submit value=Ver></form>"."</td>";
	
	
	}
echo "</table>";
?>
