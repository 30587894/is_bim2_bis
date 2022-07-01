<?php
   
    //error_reporting(0);
    include_once ("Classes.php");
    $lista_mascotas = new mascotas();
    //$lista_mascotas->mascotas_put("2bonito pez", 1);
    $lista_m = $lista_mascotas->mascotas_get();
    
    
    echo '<form action="Resultados0630B.php" method="POST">';
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
/*
    echo '<form action="Resultados0630A.php" method="REQUEST">';
    
            $i=1;
            foreach($lista_alimentos->get_comp_ingredientes() as $la){
                echo $la[0]."--".$la[1]."--".$la[2];
                $denom_alimento = $la[1];
                echo '<input type = "checkbox" name= "alimento"'.$la[0].'value='.'"'.$denom_alimento.'">';
                echo '<br>';
                $i+=1;
                if($i>10){
                    break;
                }
            }
   
            echo '<input type=submit>';   
    echo '</form>';
*/


?>



















</html>