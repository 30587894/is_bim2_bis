FormularioCaloriasSuma
<?php


//session_start();
//$em = $_SESSION["mivariable"]; //em =alimentos array elegido

//$_POST[$denom_alimento];
//include_once ("FormularioCalorias.php");
include_once("Classes.php");
include_once("FormularioIngredientes.php");
include_once("FormularioCalorias.php");


$Suma_calorias_alimentos = 0;

$lista_alimentos = new ingredientes();
$lista_ea = array();    
$lista_a = $lista_alimentos->get_comp_ingredientes();

$i=1;

foreach($lista_a as $alimento){
    $buscado =$_POST["busca".$i];
    echo  $buscado; 
    if($lista_a[1]==$_POST["busca".$i]){
    $cant_alim = $_POST['cantidad_alimento'.$i];
    $i += 1;
    echo $cant_alim."---".$alimento;
    calcularCalorias($alimento, $cant_alim);
    }
}

function calcularCalorias($alimento, $cant_alim){
    $i=1;
global $lista_alimentos;
global $Suma_calorias_alimentos;
foreach($lista_alimentos->get_comp_ingredientes() as $la){
    //foreach($conjunto_alim as $d_alimento){
//   echo $la[0]."--".$la[1]."--".$la[2]."  calorias: ".$la[3];
        if($alimento == $la[1]){

            $Suma_calorias_alimentos = $cant_alim*$la[3]+ $Suma_calorias_alimentos;
            echo $Suma_calorias_alimentos;
    
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



?>