<!DOCTYPE html>
<html>
<head>
	<style>
	  #formato_precio{
	  	font-size: 20px;
	  	color:#FFD733;
	  	display: inline-block;
	  }

	  #vermas{
	  	width: 100%
	  	heigth:50px;
	  	/*border:1px solid black;*/
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
$valores = $_REQUEST['precio'];
$separados = explode(";", $valores);
/*
echo '<pre>';
print_r($separados);
echo '</pre>';
*/

$valor_inicial = $separados[0];
$valor_final = $separados[1];

$data = file_get_contents("data-1.json");
$products= json_decode($data, true);
$arreglo_final ='';
$i=0;
foreach ($products as $product)
{
		$arreglo_final[$i]['Id']=$product['Id'];
		$arreglo_final[$i]['Direccion']=$product['Direccion'];
		$arreglo_final[$i]['Ciudad']=$product['Ciudad'];
		$arreglo_final[$i]['Telefono']=$product['Telefono'];
		$arreglo_final[$i]['Codigo_Postal']=$product['Codigo_Postal'];
		$arreglo_final[$i]['Tipo']=$product['Tipo'];
		$sin_signo = str_replace("$", "",$product['Precio']);
		$sin_coma = str_replace(chr(44), "",$sin_signo);
		$arreglo_final[$i]['Precio']=$sin_coma;
		$i++;
}//finde foreach



if($_REQUEST['ciudad']=='')
{
	$arreglo_final = $arreglo_final ;
}
else	
{
	$arreglo_final2 = $arreglo_final; 
	$arreglo_final='';
$i=0;
foreach ($arreglo_final2 as $product)
{
		if($product['Ciudad']==$_REQUEST['ciudad'] )
		{	
		
		$arreglo_final[$i]['Id']=$product['Id'];
		$arreglo_final[$i]['Direccion']=$product['Direccion'];
		$arreglo_final[$i]['Ciudad']=$product['Ciudad'];
		$arreglo_final[$i]['Telefono']=$product['Telefono'];
		$arreglo_final[$i]['Codigo_Postal']=$product['Codigo_Postal'];
		$arreglo_final[$i]['Tipo']=$product['Tipo'];
		$sin_signo = str_replace("$", "",$product['Precio']);
		$sin_coma = str_replace(chr(44), "",$sin_signo);
		$arreglo_final[$i]['Precio']=$sin_coma;
		$i++;
		}//finde if 
}//finde foreach

}//fin del if



if($_REQUEST['tipo']=='')
{
	$arreglo_final = $arreglo_final;
}
else

{
$arreglo_final2=$arreglo_final;
$arreglo_final ='';
$i=0;
foreach ($arreglo_final2 as $product)
{	
		if( $product['Tipo']==$_REQUEST['tipo'] )
		{		
		$arreglo_final[$i]['Id']=$product['Id'];
		$arreglo_final[$i]['Direccion']=$product['Direccion'];
		$arreglo_final[$i]['Ciudad']=$product['Ciudad'];
		$arreglo_final[$i]['Telefono']=$product['Telefono'];
		$arreglo_final[$i]['Codigo_Postal']=$product['Codigo_Postal'];
		$arreglo_final[$i]['Tipo']=$product['Tipo'];
		$arreglo_final[$i]['Precio']= $product['Precio'];
		$i++;
		}//finde if 
}//finde foreach
}//fin del if


$arreglo_final3 = $arreglo_final;
$arreglo_final ='';
$i=0;
foreach ($arreglo_final3 as $product)
{
		if( $product['Precio'] >= $valor_inicial && $product['Precio'] <= $valor_final)
		{	
		$arreglo_final[$i]['Id']=$product['Id'];
		$arreglo_final[$i]['Direccion']=$product['Direccion'];
		$arreglo_final[$i]['Ciudad']=$product['Ciudad'];
		$arreglo_final[$i]['Telefono']=$product['Telefono'];
		$arreglo_final[$i]['Codigo_Postal']=$product['Codigo_Postal'];
		$arreglo_final[$i]['Tipo']=$product['Tipo'];
		$arreglo_final[$i]['Precio']=$product['Precio'];
		$i++;
		}//finde if 
}//finde foreach
/*
$filas_arreglo = sizeof($arreglo_final);
$filas_arreglo2  = count($arreglo_final);
echo '<br>filas <br>'.$filas_arreglo.'<br>';
echo '<br>count <br>'.$filas_arreglo2.'<br>';
*/

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
*/
echo '</tr>';

foreach ($arreglo_final as $nuevo4)
{
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
		echo '<br><b>Precio: </b><div id="formato_precio">$'.number_format($nuevo4['Precio'], 0, ',', '.').'</div>';
		echo '<hr></hr>';

		echo '</td>';
		/*
		echo '<td>'.$nuevo4['Direccion'].'</td>';
		echo '<td>'.$nuevo4['Ciudad'].'</td>';
		echo '<td>'.$nuevo4['Telefono'].'</td>';
		echo '<td>'.$nuevo4['Codigo_Postal'].'</td>';
		echo '<td>'.$nuevo4['Tipo'].'</td>';
		echo '<td>'.$nuevo4['Precio'].'</td>';
		*/
		echo '</tr>';
		echo '<tr><td colspan = "2" align="left" valing ="top"><div id="vermas" align="right">VER MAS</div></td></tr>';
		
}
echo '</table>';

//}
//echo '</pre>';

//////////////////////////////////////////


?>
</body>
</html>
