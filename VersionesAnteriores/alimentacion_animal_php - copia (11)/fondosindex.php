
<html lang; •es" > 
    
    <head> 
    
    
        <meta charset="utf-8">
         <meta http-equiv="X-UA-Compatible" content="IE=edge">
         <meta name; "viewport" content; "width;device-width, initial-scale;l" > 
         <title>Fondos de Bolsa de IBERCAJA</title> 
         <!--Bootstrap -->
</head>
<body>
<?php

/* gets the data from a URL */
function get_data($url) {
	$ch = curl_init();
	$timeout = 300; //5;
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);
	//curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
	$data = curl_exec($ch);
	curl_close($ch);
	return $data;
}


/////////////////////////////////CONSTRUCCION DE MATRIZ DE ICONOS
date_default_timezone_set('UTC');
$arr_fondo = array();
$participiacionAccionFondo = array();
$arr_resumen =array();
$arr_nom_fondos = array();
$row = 0;
$rowf=0; //numero de tickers
$rowfl; //numero de acciones participación fondos
$icono = array();
$matriz_porc_participacion = array();
$matriz_datos_ult = array();
$matriz_mezcla = array();
$matriz_iconos = array();
$frase_iconos = "";
$bajadaBrutaDatos = array(); 
$contarfilas= 0;
$bajadaBrutaDatosChorizo = "";
$hi = 0;
$set;
$setIconos;
$numero_definitivo_iconos;
$numero_posiciones_tikercsv;
$arraycabeceraresumen= array();
$numero_posiciones_tikercsv;
$setIconos = array();
$set = array();
$cuentaIco;


if (($handle = fopen("tikercsv.csv", "r")) !== FALSE) {
     $ic=0;
     $row=0;
     $qrw=0;
     $c=0;
    while (($iconov = fgetcsv($handle, 1000, ";")) !== FALSE) {
                $num = count($iconov);
                
                if(!in_array($iconov[2], $setIconos)){
                    $setIconos[]=$iconov[2];
                    
                }
                if($iconov[1]!=NULL)
                {$no_f= $iconov[1];}
                else{
                    {$no_f='FONDO_ERRONEO';}
                    
                        
                }
                if(!in_array($no_f, $set)){
                    $set[]=$no_f;
                    $qrw++;  
                };
                    

                 
        $row++;
    }
    $iconos_array = $setIconos;
    foreach($iconos_array as $ia)
    {

  
                if($c=0){
                    $frase_iconos = $ia;
                    $c++;
                }else{
                    $frase_iconos= $frase_iconos.",".$ia;
                    $c++;
                 
                }
    }
    $frase_iconos = substr($frase_iconos,1);
    $numero_posiciones_tikercsv=$row--;
    fclose($handle);
  
    $arrayIconos= $setIconos;

        $bajadaBrutaDatosChorizo = get_data('https://query1.finance.yahoo.com/v7/finance/quote?symbols='.$frase_iconos);
        $cuentaIco=1;
        $rowsArrayIconos=count($arrayIconos);
        $rowf=$numero_definitivo_iconos=$row;
        while($cuentaIco<$rowsArrayIconos)
        {
            
            $fin_cadena= arrayPosSymbols($bajadaBrutaDatosChorizo);            
            $bajadaBrutaDatos=substr($bajadaBrutaDatosChorizo, 0,$fin_cadena);
       
            if($cuentaIco<10)
            {
            }
            $priceLast=getLastPrice($bajadaBrutaDatos);
                
            $changepercent = getChangepercent($bajadaBrutaDatos);
                $pricePrevious =getPreviousPrice($bajadaBrutaDatos);
            if($pricePrevious>0){
                    $variacion = ((-$pricePrevious+$priceLast)/$pricePrevious);///$changepercent;
                    $matriz_datos_ult[$cuentaIco] = array ($cuentaIco, $iconos_array[$rowsArrayIconos-$cuentaIco], $priceLast, $variacion);
            } 
            else
            {
                $matriz_datos_ult[$cuentaIco] = array ($cuentaIco, $iconos_array[$rowsArrayIconos-$cuentaIco], 0, 0);
                
            }
                $bajadaBrutaDatosChorizo= getSymbol($bajadaBrutaDatosChorizo);

                $cuentaIco++;
            }
                $cuentaIco--;
                $m_mezcla=mezclarDatoUltimoConParticipacion('tikercsv.csv',$matriz_datos_ult);

            calcularResumen($m_mezcla);

        }
        
////////////////////////////////////Construccion

function numero_posiciones_tikercsv(){
    $numero_definitivo_posiciones_tikercsv= 0;

    if (($handlefl = fopen('tikercsv.csv', "r")) !== FALSE) {

            while (($iconofila = fgetcsv($handlefl, 2000, ";")) !== FALSE) {
                $numero_definitivo_posiciones_tikercsv++; //numero de acciones fondo de tikercsv.csv
            }
            fclose($handlefl);            
    }
    return $numero_definitivo_posiciones_tikercsv--;
}

function mezclarDatoUltimoConParticipacion($ficheroaleer,$matriz_datos_ult){

    global $matriz_mezcla;
    
    
    $matriz_datos_n =array();
    $iconofila = array();

        if (($handlefl = fopen($ficheroaleer, "r")) !== FALSE) {
            $rowfl= 0;
              while (($iconofila = fgetcsv($handlefl, 2000, ";")) !== FALSE) {
                   $numfl = count($iconofila);
                  
                   for($ir=1;$ir<count($matriz_datos_ult);$ir++){
                       
                      
                                $ic =$iconofila[2];
                        
                                if($matriz_datos_ult[$ir][1]==$ic){
                                        $vari = $matriz_datos_ult[$ir][3];

                                    
                                            $pes_porc =str_replace(',','.',$iconofila[4]);
                                            settype($matriz_mezcla[$rowfl][4],'float');
                                            settype($matriz_mezcla[$rowfl][5],'float');
                                            $matriz_mezcla[$rowfl][0]= date('Y-m-d');//fecha
                                            $matriz_mezcla[$rowfl][1]=$iconofila[1]; //fondo
                                            $matriz_mezcla[$rowfl][2]=$iconofila[2];//accion
                                            $matriz_mezcla[$rowfl][3]=$iconofila[3];//ticker
                                            $matriz_mezcla[$rowfl][4]=1.00*((float)$pes_porc)/100.00;//peso porcentual de la accion
                                            $matriz_mezcla[$rowfl][5]=1.00*((float)$vari);        //variacion de la accion
                                            $matriz_mezcla[$rowfl][6]=$vari*((float)$pes_porc);//variacion ponderada (absoluta)
                                            $matriz_mezcla[$rowfl][7]=$matriz_datos_ult[$ir][2];
                                        $rowfl++;

                                        }          
                                    
                                    }
                                      }
                                         

                }// fin de while
                 
            
            fclose($handlefl);
            global $numero_posiciones_tikercsv;
            $numero_posiciones_tikercsv=$rowfl--;
            
                
            
            
        return $matriz_mezcla;
    }
        
  //////////////////////////////DEPURACION NETA DE DATOS
 function getSymbol($bChorizo){
                $possimb=strrpos($bChorizo,'"symbol":"')+10;
                $chorizopartefinal= substr($bChorizo, $possimb, strlen($bChorizo));
                $posfinalsymb = strpos($chorizopartefinal,'"');
                $symicono = substr($chorizopartefinal,0,$posfinalsymb);
                return (substr($bChorizo,0,$possimb-11)); //<-10
                
 }

function getLastPrice($bajadaBrutaDeUno){
        $posiRegularMarketPrice = strrpos($bajadaBrutaDeUno, '"regularMarketPrice"',0);
        $inicioLastPrice = $posiRegularMarketPrice + 21;
        $priceLast = substr($bajadaBrutaDeUno,$inicioLastPrice,7);
        settype($priceLast,"float");
        return $priceLast;
        }
        
function getPreviousPrice($bajadaBrutaDeUno){               
            $posiPreviousPrice = strrpos($bajadaBrutaDeUno,'"regularMarketPreviousClose"',0);
          
            $inicioPreviousPrice = $posiPreviousPrice + 29;
            $pricePrevious = substr($bajadaBrutaDeUno,$inicioPreviousPrice,7);
            settype($pricePrevious,"float");
            
            return $pricePrevious;
            }

function getChangepercent($bajadaBrutaDeUno){               
            $posiChangepercent = strrpos($bajadaBrutaDeUno,'"regularMarketChangePercent"',0);// '"regularMarketPreviousClose"',0);
          
            $inicioChangepercent = $posiChangepercent + 29;
            $Changepercent = substr($bajadaBrutaDeUno,$inicioChangepercent,5);
            settype($Changepercent,"float");
            return $Changepercent;
            }

function arrayPosSymbols($bbdc){

        $posiSymbols = strrpos($bbdc,'"symbol"') +9;
      
        return $posiSymbols;
        }




function calcularResumen($matriz_mezcla){
   
    global $arr_resumen;
    $arr_fondo = array();
    global $set;
    try{
       
        $iqr=0; //iterador dentro de numero definitivo posiciones tikercsv
        $arr_nom_fondos = $set;
       global  $arraycabeceraresumen;
        $arraycabeceraresumen=array("Fecha","Fondo", "N", "Peso_Porc","Dia_semanal", "Variac_Porc");
        global $arr_resumen;
        $arr_resumen = array();
        $num_fondo = 0;
        foreach($arr_nom_fondos as $nom_fon){
            $arr_fondo[3]=0; //peso porcentual acumulado
            $arr_fondo[5]=0; //variacion porcentual acumulada
            $n =1;
            $iqr = 1; //0;
            while($iqr < count($matriz_mezcla))
            {
                    if($matriz_mezcla[$iqr][1]==$nom_fon){
                    $sum_peso= $arr_fondo[3];
                    $sum_var_abs= $arr_fondo[5];
                    $arr_fondo[0]=$matriz_mezcla[$iqr][0];//fecha
                    $arr_fondo[1]=$matriz_mezcla[$iqr][1];//fondo
                    $arr_fondo[2]=$n;                //numero de acciones
                    $arr_fondo[3]=$sum_peso+$matriz_mezcla[$iqr][4];
                    $arr_fondo[4]=date('w');
                    //peso porcentual acumulado
                    $arr_fondo[5]=$sum_var_abs+$matriz_mezcla[$iqr][6]; //peso variacion ponderada acumulado
                    $n++;
                    $arr_resumen[$num_fondo]=$arr_fondo;
                    
                
                    }    

                $iqr++;
               
            }
            $num_fondo++;
             
  
        }

    } catch(Exception $e){
        echo $e;
    }

}



//////////////////////////////////////CONSTRUCCION MATRIZ ICONO PRECIO_ULTIMO VAR_PORCENTUAL





?>
<script src= "datos2dias.php"></script>
 


</div>
</body>



</html>