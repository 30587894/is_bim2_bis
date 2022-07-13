<html>
<?php
class mascotas{

    private $mascotas_caracteristica;

    private $mascota_caracteristica;

    private $peso;
    private $MER; //calorias calculadas para la caracteristica de mascota y peso

    public static  $num_reg=0;

    private $status;

    function get_mascotas_caracteristica(){

        return $this->mascotas_caracteristica;
    }

   
    function __construct(){
        print ("Construido");
      
        $this->mascotas_caracteristica = $this->mascotas_get();
      
    }
    function mascotas_put($status, $RER){
        $myfile ="RER.csv";
        if (($handle = fopen("RER.csv", "a")) !== FALSE) {
            $this->num_reg += 1;
            $txt = $this->num_reg.";".$status.";".$RER."\n";
            fwrite($handle, $txt);
                   
            fclose($handle);
       }
     
      
    }
    
    function mascotas_get(){
        $myfile ="RER.csv";
        $mascotas_caracteristica = array();
        if (($handle = fopen("RER.csv", "r")) !== FALSE) {
                 $row= 1;
 
                 
                while (($mascota = fgetcsv($handle, 100, ";")) !== FALSE) {
                    
                    $this->num_reg = count($mascota);
                    if(is_numeric($mascota[0])){ //no primera fila cabecera
                        $mascotas_caracteristica[$mascota[0]] =$mascota;
                        //echo ("Linea 56 ". $mascota[0]." ".$mascota[1]."<br>");
                        $row++;
                    };
                }
    
               
            fclose($handle);
            }
            //$this->mascotas_caracteristica = $mascotas_caracteristica;
            return $mascotas_caracteristica;
        }
    function masc_ind_get($num_reg, $peso){
        $mascotas_caracteristica = array();
        if (($handle = fopen("RER.csv", "r")) !== FALSE) {
                $id_animal=0;
                $especie="";
                $RER=0;
                
                //$mascota_caracterisiticas = array();
                $row= 1;
                while (($mascota = fgetcsv($handle, 1000, ";")) !== FALSE) {
                    
                    $num = count($mascota);
                    if(is_numeric($mascota[0])){ //no primera fila cabecera
                        $mascotas_caracteristica[$mascota[0]] =$mascota;
                        $row++;
                    }
                }
    
                foreach($mascotas_caracteristica as $ia)
                {
                    if($ia[0]==$num_reg){
                    echo ($ia[0]." ".$ia[1]." ".$ia[2]."----    \n");
                    $RER = $ia[2];
                    $this->MER = 70*(($peso)**(0.75));
                    echo ($ia[0].";".$ia[1].";".$ia[2].";".$this->MER."\n");
                    $this->mascota_caracteristica = $ia;  
                    break;  
                    }
                }  
            fclose($handle);
            }
            
            return $ia;
        }
    
    



    }




?>
</html>