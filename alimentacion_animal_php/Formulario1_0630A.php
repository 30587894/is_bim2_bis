<?php
    //error_reporting(0);
    include_once ("Classes.php");
    $lista_mascotas = new mascotas();
    //$lista_mascotas->mascotas_put("2bonito pez", 1);
    $lista_m = $lista_mascotas->mascotas_get();
    $lista_alimentos = new ingredientes();
    $lista_ea = array();    
    $lista_a = $lista_alimentos->get_comp_ingredientes();
    
    echo '<form action="accion.php" method="POST">';
    echo '<select multiple name =menu[]>';
           
            $i=0;
            foreach($lista_m as $gmc){
                echo '<option>'.$gmc[1];
                $i+=1;
            }
    echo '</select>';
    echo '<input type=submit>';
       
    echo '</form>';

    echo '<form action="accion.php" method="REQUEST">';
    
            $i=1;
            foreach($lista_alimentos->get_comp_ingredientes() as $la){
                echo $la[0]."--".$la[1]."--".$la[2];
                $denom_alimento = $la[1];
                echo '<input type = "checkbox" name= "alimento"'.$la[0].'value='.'"'.$denom_alimento.'">';
                echo '<br>';
                $i+=1;
            }
   
       
    echo '</form>';



?>



















</html>