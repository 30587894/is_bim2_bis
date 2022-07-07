
<?php
    

   // /*session is started if you don't write this line can't use $_Session  global variable*/
  //  $em = $_POST['alimentos'];
 

    include_once("Classes.php");
    $lista_alimentos = new ingredientes();
    $lista_ea = array();    
    $lista_a = $lista_alimentos->get_comp_ingredientes();


    

    //$limpia_pantalla = wclear();
    $m_alimentos = array();
    echo '<form action="FormularioCaloriasSuma.php" method="POST">';
    echo '<select multiple name= alimentos[] width = 500px>';
        $i=1;
        foreach($lista_alimentos->get_comp_ingredientes() as $la){
           $denom_alimento = $la[1];
            $m_alimentos[$i]= $la[1]; //-1
            echo '<option>'.$denom_alimento;
         
            $i+=1;
            if($i>10){
                break;
            }
        }
          
     echo'</select>';
     echo '<input type=submit>';
     echo '</form>';
     //$_SESSION["mivariable"]=$m_alimentos; 
      
?>