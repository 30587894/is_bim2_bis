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


            //if(FormularioCS::$veces==1){

                    $this->form_ingredientes();
                    
           // }
       }
//$limpia_pantalla = wclear();
 function form_ingredientes(){

    //$galimentos = array();
        echo '<form  method="POST">';
        
      
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
    
       
        $iga=0;
        global $alimentos;
        $alimentos;
        
        if (isset($_POST['alimentos'])) {
        
                $aux=$_POST['alimentos'];
                $i = 1;
                foreach($aux as $ga){
                    if(!is_null($ga)){
                        $alimentos[$iga] = $ga;
                            
                         //   echo '<br>'.$ga.'<br>';
                        //  echo '  <input type = "text" name= "busca" value='.$i.'>   '; 

                            echo ' Cantidad de '.$ga.'  <input type = "text" name= "cantidad_alimento"><br>'; 

                            echo '<input type=submit>';
                            $indice =0;
                            $calor_ga =0;
                            global $lista_a;
                            foreach($lista_a as $lis){
                                if(str_contains($ga,$lis[1]))
                                {
                                    $indice =$lis[0]; 
                                    $calor_ga =$lis[3];
                                    break;
                                }                            }
                            
                            //$buscado =$_POST["busca"];
                            //echo  "LINEA 116  -->".$buscado; 
                            
                            if (isset($_POST['cantidad_alimento'])) {
                                    $cant_alim = $_POST['cantidad_alimento'];
                                    
                                    echo  $cant_alim."---".$alimentos[$i]." cal:".$calor_ga."<br>";
                                //   calcularCalorias($ma, $cant_alim);
                                    $matriz_buscados[][0]=$indice;
                                    $matriz_buscados[][1]=$ga;
                                    $matriz_buscados[][2]=$cant_alim;
                                    $matriz_buscados[][3]=$calor_ga;
                                    $i += 1;

                            }
                    }
                    
        
       
                 }
        echo '</form>';

        $suma_calorias =0;

        foreach($matriz_buscados as $bus){

            $sum_par= round($bus[3]*$bus[2]);
            echo  $bus[0].'--'. $bus[1].'-cantidad: '.$bus[2].'-cal/ud:'.$bus[3].' calorias racion: '.$sum_par.'<br>';
            $suma_calorias +=$sum_par;

        }

        echo "CALORIAS MENU ".$suma_calorias;
      
       


        
      
        }       


    }
}

class Resul{

    private  $Suma_calorias_alimentos;
    private $alimentos; 
    static $resul_matriz;
     
     
    
    public function __construct($prealimentos) {
                //global $alimentos;
                //$alimentos = array('HOLA');
                $x=0;
               // $prealimentos = array('HOLA');
                static $alimentos;
               // while($x=0){
               // global $prealimentos;
                $x+=1;
                //}
                global $prealimentos;
                $alimentos = $prealimentos;
                
                //$this->resultado($alimentos);
               global $Suma_calorias_alimentos;
                echo " Calorias aportadas por los alimentos escogidos ".$Suma_calorias_alimentos;
    }

function getalimentos(){
    global $alimentos;
    return $alimentos;
}



function resultado($matriz_alim){

    $i=1;
    global $lista_a;
    //foreach($lista_a as $aliment){
    
    
    foreach($matriz_alim as $ma){
    
        $buscado =$_POST["busca".$i];
        echo  "LINEA 116".$buscado; 
      //  if($lista_a[0]==$_POST["busca".$i]){
        $cant_alim = $_POST['cantidad_alimento'.$i];
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

$xxres = new Resul("hola");

?>