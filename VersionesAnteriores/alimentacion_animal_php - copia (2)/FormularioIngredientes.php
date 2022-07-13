
<?php
    

    include_once("Classes.php");
    $lista_alimentos = new ingredientes();
    $lista_ea = array();    
    $lista_a = $lista_alimentos->get_comp_ingredientes();


    

    //$limpia_pantalla = wclear();
    echo '<form action="FormularioCalorias.php" method="POST">';
    echo '<select multiple name= alimentos[] width = 500px>';
        $i=1;
        foreach($lista_alimentos->get_comp_ingredientes() as $la){
           $denom_alimento = $la[1];
           
            echo '<option>'.$denom_alimento;
         
            $i+=1;
            if($i>10){
                break;
            }
        }
     echo'</select>';
     echo '<input type=submit>';
     echo '</form>';
 
      
?>