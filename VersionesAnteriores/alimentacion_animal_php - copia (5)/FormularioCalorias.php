FormularioCalorias
<?php

//session_start();
//$em = $_SESSION["mivariable"]; //em =alimentos array elegido


    
   // include_once ("FormularioIngredientes.php");
   
    include_once("Classes.php");

     $k=0;
    $aux_conjunto_alim =$_POST['alimentos'];
    
  
    $conjunto_alim = $aux_conjunto_alim;
   


            echo '<form action="FormularioCaloriasSuma.php" method="POST">';
            $l =1;
            foreach($conjunto_alim as $denom_alimento){

                $busca_deno = $denom_alimento;

                echo '  <input type = "text" name= "busca'.$l.'" value='.$l.'>   '; 

                echo ' Cantidad de '.$denom_alimento.'  <input type = "text" name= "cantidad_alimento"'.$l.' value= 0><br>'; 
                $l += 1;
            // calcularCalorias($denom_alimento);

            }
            echo '<input type=submit>';
            echo '</form>';






?>