<?php
//Ejercicio1
echo "<h2> Ejercicio 1</h2>";
 $arrayFName = array("Nombre" => "Mariela" , "apellido"=>"Reyes");
echo $arrayFName["Nombre"]. "<br>";
echo $arrayFName["Nombre"]." ".$arrayFName["apellido"]. "<br>";
$arrayLName = array('Nombre' => "Georgina");
echo $arrayLName["Nombre"]." ".$arrayFName["apellido"]. "<br>";

//Ejercicio2
echo "<h2> Ejercicio 2</h2>";
	$arrayName1 = array(4,8,15,16,23,42 );
	$arrayName = array(0 => 4 ,1=>8,2=>15,3=>16,4 =>23 ,5=>42);
	echo $arrayName[0]. "<br>";

//Ejercicio3
function f1($hello,$jhon,$Doe,$signo,$Greetings)
{
	echo "<h2> Ejercicio 3</h2>";
    for ($i=0; $i <2 ; $i++) { 
    	echo $hello." " .$jhon. " ". $Doe. $signo."<br>";
    }
    
    echo $Greetings." ".$jhon. " ". $Doe. $signo.$signo.$signo."<br>";
    echo $Greetings." ".$jhon. " ". $Doe."<br>";
   
}
$hello="Hello";
	$jhon="Jhon"; 
	$Doe="Doe"; 
	$signo="!"; 
	$Greetings="Greetings";

 f1($hello,$jhon,$Doe,$signo,$Greetings);
?>