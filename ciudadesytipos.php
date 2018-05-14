<?php


$data = file_get_contents("data-1.json");
$products = json_decode($data, true);

$i = 0;
foreach ($products as $product) {
//echo '<br>-----'.$product['Ciudad'];
$ciudades[$i]=$product['Ciudad'];
$tipos[$i]=$product['Tipo'];
$i++;
}
$ciudadades_unicas = array_unique($ciudades);
$tipos_unicos = array_unique($tipos);
/*
echo '<pre>';
print_r($ciudadades_unicas);
echo '</pre>';
*/



?>