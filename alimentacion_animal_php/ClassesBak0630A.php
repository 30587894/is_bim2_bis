<?php



date_default_timezone_set('UTC');

    class ingredientes{

        private $comp_ingr;

        function get_comp_ingredientes(){
            return $this->comp_ingr;
        }
        function get_comp_ingr($ref_denominacion){
           
          
                echo ($this->comp_ingr[$ref_denominacion][1]." ".$this->comp_ingr[$ref_denominacion][2]);
            
        }
        
        function __construct(){
            //print ("Construido");
            //global $comp_ingr;
            $this->comp_ingr = $this->cargar_ingredientes();
            
            
        }

        function cargar_ingredientes(){
            $comp_ingr = array();
            if (($handle = fopen("COMPOSICION_INGREDIENTES.csv", "r")) !== FALSE) {
                    $id_alimento=0;
                    $denominacion="";
                    $tipo_alimento="";
                    $porciento_calorias=0;
                    $porciento_proteinas=0;
                    $porciento_grasa=0;
                    $porciento_carbohidratos=0;
                    $comp_ingr = array();
                    $row= 1;
                    while (($alimento = fgetcsv($handle, 7000, ";")) !== FALSE) {
                        
                        $num = count($alimento);
                        if(is_numeric($alimento[0])){ //no primera fila cabecera
                            $comp_ingr[$alimento[0]] =$alimento;
                            $row++;
                        };
                    }
        
                    foreach($comp_ingr as $ia)
                    {
                        //echo ($ia[1]."\n");
                    }   
                fclose($handle);
                }
                return $comp_ingr;
            }
        }
        class mascotas{

            private $mascotas_caracteristica;
        
            private $mascota_caracteristica;
        
            private $peso;
            private $MER; //calorias calculadas para la caracteristica de mascota y peso
        
            private  $num_reg;
        
            private $status;
        
            function get_num_reg(){
                return $this->num_reg;
            }
            
            
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


