<?php
$archivo = file( "registros.txt" ); 
    $lineas = count( $archivo ); 

    for( $i = 0; $i < $lineas; $i++ ) {
       $user_access[] = [
            'matricula' => $archivo[$i],
            'name' => $archivo[$i+1],
            'carrera' => $archivo[$i+2],
            'email' => $archivo[$i+3],
            'telefono' => $archivo[$i+4],
            'tipo'=>$archivo[$i+5]
        ];
         $i=$i+6;
    }
    
    //print_r( $aUrls ); 
