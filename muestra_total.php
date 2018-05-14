
<?php
/*
echo '<pre>';
print_r($_REQUEST);
echo '</pre>';
*/
$data = file_get_contents("data-1.json");
$products = json_decode($data, true);

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
foreach ($products as $product) {
echo '<tr>';	

echo '<td>'.$product['Id'].'</td>';
echo '<td>'.$product['Direccion'].'</td>';
echo '<td>'.$product['Ciudad'].'</td>';
echo '<td>'.$product['Telefono'].'</td>';

echo '<td>'.$product['Codigo_Postal'].'</td>';

echo '<td>'.$product['Tipo'].'</td>';

echo '<td>'.$product['Precio'].'</td>';
echo '</tr>';
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