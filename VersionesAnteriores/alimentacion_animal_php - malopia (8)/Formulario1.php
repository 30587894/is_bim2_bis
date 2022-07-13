<?php
   
    //error_reporting(0);
    include_once ("Classes.php");
    $lista_mascotas = new mascotas();
    //$lista_mascotas->mascotas_put("2bonito pez", 1);
    $lista_m = $lista_mascotas->mascotas_get();
    
    
    echo '<form action="Resultados.php" method="POST">';
    echo '<select  name ="animales">'; //multiple
           
            $i=0;
            foreach($lista_m as $gmc){
                echo '<option>'.$gmc[1];
                $i+=1;
              
            }
    echo '</select>';
    echo 'Peso de mascota <input type=text name= "peso"><br>';
   echo '<input type=submit>';
   echo '</form>';   



?>



















</html>