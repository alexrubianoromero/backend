<!DOCTYPE html>
<html>
<head>
	<style>
	  #formato_precio{
	  	font-size: 20px;
	  	color:#FFD733;
	  	display: inline-block;
	  }
	</style>
</head>
<body>
<?php
/*
echo '<pre>';
print_r($_REQUEST);
echo '</pre>';
*/
$data = file_get_contents("data-1.json");
$products = json_decode($data, true);

echo '<table border = "1">';
/*
echo '<tr>';
echo '<td>Id</td>';	
echo '<td>Direccion</td>';
echo '<td>Ciudad</td>';
echo '<td>Telefono</td>';
echo '<td>Codigo_Postal</td>';
echo '<td>Tipo</td>';
echo '<td>Precio</td>';
echo '</tr>';
*/
foreach ($products as $nuevo4) {
echo '<tr><td></td><td></td></tr>';
	echo '<tr><td></td><td></td></tr>';
echo '<tr>';	
		echo '<td rowspan="2"><img  src="img/home.jpg" width="300px"  heigth="300px"></td>';
		echo '<td>';
		echo '<b>Direccion:</b>'.$nuevo4['Direccion'];
		echo '<br><b>Ciudad:</b> '.$nuevo4['Ciudad'];
		echo '<br><b>Telefono:</b> '.$nuevo4['Telefono'];
		echo '<br><b>Codigo_Postal: </b>'.$nuevo4['Codigo_Postal'];
		echo '<br><b>Tipo: </b>'.$nuevo4['Tipo'];
		echo '<br><b>Precio: </b><div id="formato_precio">'.$nuevo4['Precio'].'</div>';
		echo '<hr></hr>';
		echo '</td>';
		echo '</tr>';
		echo '<tr><td colspan = "2" align="left" valing ="top"><div id="vermas" align="right">VER MAS</div></td></tr>';
}
echo '</table>';
/*
echo '<pre>';
foreach ($products as $product) {
print_r($product);
}
echo '</pre>';
*/

?>
</body>
</html>
