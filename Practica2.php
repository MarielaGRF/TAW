<?php
//Ejercicio1
echo "<h2> Ejercicio 1</h2>";
$array = array(2,5,6,7,8,1,9,3,4,0);
print_r($array);
echo "<br>";
asort($array);
foreach ($array as $i => $valor) {
    echo  $valor . "\n";
}
echo "<br>";
arsort($array);
foreach ($array as $i => $valor) {
    echo  $valor . "\n";
}

//Ejercicio2
echo "<h2> Ejercicio 2</h2>";
  $nombre="Mariela Georgina";
  $cd="Cd. Victoria";
  echo "Nombre:<b>". $nombre ."</b> <br>Lugar de nacimiento:"." ".$cd;

//Ejercicio3
echo "<h2> Ejercicio 3</h2>";
$array = array(2,5,6,7,8,1,9,3,4,0);
for ($i=0; $i < sizeof($array) ; $i++){
	echo $array[$i]. "\n";
}
	

?>