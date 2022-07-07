FormularioCaloriasSuma
<?php

class FormularioCS{

    static $matriz_alim;
    private $Suma_calorias_alimentos;
    private $lista_a;
    
    static $veces;
    private $lu;
   
public function __construct() {
    
            include_once("Classes.php");
            //$FCS = new FormularioCS();

            $lista_alimentos = new ingredientes();
            global $lista_a;
            $lista_a = $lista_alimentos->get_comp_ingredientes();
            global $lu;
            $lu = 0;

            $Suma_calorias_alimentos = 0;
         
            FormularioCS::$veces +=1;


            if(FormularioCS::$veces==1){

                    $this->form_ingredientes();
                    
            }
       }
//$limpia_pantalla = wclear();
 function form_ingredientes(){
    
    //$galimentos = array();
        echo '<form  action="Form_Calorias.php" method="GET">'; 
        echo  '<select multiple name= alimentos[] width = 500px>';
            $i=1;
            global $lista_a;
            foreach($lista_a as $la){
            $denom_alimento = $la[1];
                $m_alimentos[$i]= $la[1]; //-1
                echo '<option>'.$denom_alimento;
            
                $i+=1;
                if($i>10){
                    break;
                }
            }
            
        echo'</select>';
        //FormularioCS::$veces +=1;
        echo '<input type=submit>';
        
        echo '</form>';
        
        global $lu;
        $lu +=1;
        //FormularioCS::$veces +=1;
        echo " VECES ".FormularioCS::$veces;
        
         //global $matriz_alim;
         $alimentos= array('hola');
        


        }     

        
//global $matriz_alim;


}

class Resul{

    private  $Suma_calorias_alimentos;
    private $alimentos; 
    static $resul_matriz;
     
     
    
    public function __construct() {
                //global $alimentos;
                //$alimentos = array('HOLA');
                $x=0;
               // $prealimentos = array('HOLA');
                static $alimentos;
               // while($x=0){
                $prealimentos = $_GET['alimentos'];
                $x+=1;
                //}
                $alimentos = $prealimentos;
                $this->form_calorias($alimentos);
                foreach($alimentos as $io){
                    echo "2º pasada".$io.'<br>';
                }
                $this->resultado($alimentos);
                foreach($alimentos as $io){
                    echo "3 pasada".$io.'<br>';
                }
                global $Suma_calorias_alimentos;
                echo " Calorias aportadas por los alimentos escogidos ".$Suma_calorias_alimentos;
    }

function getalimentos(){
    global $alimentos;
    return $alimentos;
}

function form_calorias($alimen){
    //global $matriz_alim;
    //$matriz_alim = $_POST['alimentos'];
    //$aux_conjunto_alim =$matriz_alim;
    //$conjunto_alim = $aux_conjunto_alim;



            echo '<form  method="REQUEST">'; //action="FormularioCaloriasSuma.php"
            $lm =1;
            //global $alimentos;
            foreach($alimen as $denom_alimento){

                $busca_deno = $denom_alimento;

                echo '  <input type = "text" name= "busca'.$lm.'" value='.$lm.'>   '; 

                echo ' Cantidad de '.$denom_alimento.'  <input type = "text" name= "cantidad_alimento"'.$lm.' value= 0><br>'; 
                $lm += 1;
            
            }
            echo '<input type=submit>';
            echo '</form>'; 
        
        
        }



function resultado($matriz_alim){

    $i=1;
    global $lista_a;
    //foreach($lista_a as $aliment){
    
    
    foreach($matriz_alim as $ma){
    
        $buscado =$_REQUEST["busca".$i];
        echo  "LINEA 116".$buscado; 
      //  if($lista_a[0]==$_POST["busca".$i]){
        $cant_alim = $_REQUEST['cantidad_alimento'.$i];
        echo "Linea 119".$cant_alim;
        $i += 1;
        echo $cant_alim."---".$ma;
     //   calcularCalorias($ma, $cant_alim);
      //  }
    }
}
function calcularCalorias($alimento, $cant_alim){
        $i=1;
    global $lista_a;
    global $Suma_calorias_alimentos;
    foreach($lista_a as $la){
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

}



$FCSa = new FormularioCS();
foreach($FCSa->$matriz_alim as $uo){
    echo "linea 160".$uo;
}
$xxres = new Resul(FormularioCS::$matriz_alim);
//global $xxres->getalimentos();
foreach($xxres->getalimentos() as $uo){
    echo "linea 164".$uo;
}

?>