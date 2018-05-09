<?php
 	class Almacen 
 	{
 		public $arrayNew = array();
 		public function Fibonacci( array $array){
 			for ($i=0; $i < sizeof($array); $i++) { 
		 		if ($i==0 || $i==1) {
 					$arrayNew[$i]=$array[$i];
 					echo $arrayNew[$i]."\n";
 				}else{
 					$arrayNew[$i]= $arrayNew[$i - 1] + $arrayNew[$i - 2];
 					echo $arrayNew[$i]."\n";
 				}
		 	}
 			
 		}

 		public function original(){
 			$array = array(0,1,2,3,4,5,6,7,8,9,9,8,7,6,5,4,3,2,1,0,15,25,10,06,26);
 			echo "<b>Array Original</b><br>";
		 	for ($i=0; $i < sizeof($array); $i++) { 
		 		echo $array[$i]."\n";
		 		$j=$i;
		 		
		 	}
		 	echo "<br><b>Array Nuevo serie de Fibonacci</b></br>";
		 	$this->Fibonacci($array);
		 	
 		}

 	}

 	
	$a = new Almacen();
	$a->original();
 	

?>