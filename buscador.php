
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


echo '<table border = "1">';
echo '<tr>';
echo '<td>Id</td>';	
echo '<td>Direccion</td>';
echo '<td>Ciudad</td>';
echo '<td>Telefono</td>';
echo '<td>Codigo_Postal</td>';
echo '<td>Tipo</td>';
echo '<td>Precio</td>';
echo '</tr>';



foreach ($arreglo_final as $nuevo4)
{
echo '<tr>';	
		echo '<td>'.$nuevo4['Id'].'</td>';
		echo '<td>'.$nuevo4['Direccion'].'</td>';
		echo '<td>'.$nuevo4['Ciudad'].'</td>';
		echo '<td>'.$nuevo4['Telefono'].'</td>';
		echo '<td>'.$nuevo4['Codigo_Postal'].'</td>';
		echo '<td>'.$nuevo4['Tipo'].'</td>';
		echo '<td>'.$nuevo4['Precio'].'</td>';
		echo '</tr>';
}
echo '</table>';

//}
//echo '</pre>';

//////////////////////////////////////////


?>