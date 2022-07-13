FormularioCalorias
<?php
session_start();

/*session is started if you don't write this line can't use $_Session  global variable*/
$em = $_POST['alimentos'];
$_SESSION["mivariable"]=$em;
    
    include_once ("FormularioIngredientes.php");

    $conjunto_alim =$_POST['alimentos'];

  
    echo '<form action="FormularioCaloriasSuma.php" method="POST">';
    $i =1;
    foreach($conjunto_alim as $denom_alimento){

        //echo $denom_alimento.'  <input type = "text" name='.$denom_alimento.' value='.$denom_alimento.'><br>'; 

        echo ' Cantidad de '.$denom_alimento.'  <input type = "text" name= "cantidad_alimento"'.$i.'><br>'; 
        $i += 1;
       // calcularCalorias($denom_alimento);

    }
    echo '<input type=submit>';
    echo '</form>';/*function calcularCalorias($d_alimento){
        $i=1;
    global $lista_alimentos;
    global $Suma_calorias_alimentos;
    foreach($lista_alimentos->get_comp_ingredientes() as $la){
        //foreach($conjunto_alim as $d_alimento){
    //   echo $la[0]."--".$la[1]."--".$la[2]."  calorias: ".$la[3];
            if($d_alimento == $la[1]){

                $Suma_calorias_alimentos = $_POST[$d_alimento]*$la[3]+ $Suma_calorias_alimentos;
     
        
    }
    
        //  echo '  de <input type = "checkbox" name= "alimento"'.$la[0].'value='.'"'.$denom_alimento.'">';
        //echo '<br>';
       // }
        $i+=1;
        if($i>10){
            break;
        }
    }
} 
  
 

//$limpia_pantalla = wclear();

echo " Calorias aportadas por los alimentos escogidos ".$Suma_calorias_alimentos;

*/
?>