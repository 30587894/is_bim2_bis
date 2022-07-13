<?php



date_default_timezone_set('UTC');

    class ingredientes{

        private $comp_ingr;

        private $num_ind_menu_a_ocupar;

        function get_comp_ingredientes(){
            return $this->comp_ingr;
        }
        function get_comp_ingr($ref_denominacion){
           
          
                echo ($this->comp_ingr[$ref_denominacion][1]." ".$this->comp_ingr[$ref_denominacion][2]);
            
        }

        function get_cal_menu(){
            return $this->cal_menu;
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
        
            //private $mascota_caracteristica;
        
            private $peso;
            //private $MER; //calorias calculadas para la caracteristica de mascota y peso
        
            private  $num_reg;
        
            private $status;
        
            function get_num_reg(){
                return $this->num_reg;
            }
            
            
            function get_mascotas_caracteristica(){
        
                return $this->mascotas_caracteristica;
            }
        
           
            function __construct(){
                //print ("Construido");
              
                $this->mascotas_caracteristica = $this->mascotas_get();
              
            }
            function mascotas_put($status, $RER){
                $myfile ="RER.csv";
                if (($handle = fopen("RER.csv", "a")) !== FALSE) {
                    global $num_reg;
                    $num_reg += 1;
                    $txt = $num_reg.";".$status.";".$RER."\n";
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
                            global $num_reg;
                            $this->num_reg=$num_reg = count($mascota);
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
            function masc_ind_get($denominacion){
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
                            if($ia[1]==$denominacion){
                                //echo ($ia[0]." ".$ia[1]." ".$ia[2]."----    \n");
                                $RER = $ia[2];
                                //$this->MER = 70*(($peso)**(0.75));
                                //echo ($ia[0].";".$ia[1].";".$ia[2].";".$this->MER."\n");
                               // $this->mascota_caracteristica = $ia;  
                                break;  
                            }
                        }  
                    fclose($handle);
                    }
                    
                    return $ia;
                }
            
            
        
        
        
            }
        
    Class rellenar_Calorias_Menu{

            private $cal_menu; // menus registrados
            //private $cant_menus;

            private $num_ind_menu_ocupados; //ind_menu claves ocupadas por conjunto de alimentos en menu

            private $num_ind_menu_a_ocupar;

            function get_cal_menu(){
                return $this->absorber_datos();
            }


            function __construct()
            {
                
            }

            function absorber_datos(){

                $this->cal_menu;
                global $cant_menus;
                $this->cal_menu = array();
                if (($handle = fopen("Calorias_Menu.csv", "r")) !== FALSE) {
                        $animal_status="";
                        $peso=0;
                        $MER=0;
                        $ind_menu=0;
                        $alimento="";
                        $cant_alimento=0;
                        $calor_gramo=0;
                        $calor_registro = array();
                        global $row;
                        $row= 0; //excel primera fila es cabecera 1
                        while (($menu = fgetcsv($handle, 500, ";")) !== FALSE) {
                            
                            $num = count($menu);
                           // if(is_numeric($menu[0])){ //no primera fila cabecera
                                $this->cal_menu[$row] =$menu;
                              //  $cant_menus[$row]= $menu[0];
                                $row++;
                            //};
                        }
            
                        foreach($this->cal_menu as $ia)
                        {
                            //echo ("<br>Componente menu ".$ia[1]."\n");
                        }   
                    fclose($handle);
                    }
                    $this->cardinalidad_menu = count($this->cal_menu);
                    return $this->cal_menu;
                }


            //menu = alimentos con el mismo $ind_menu
            
                function quitar_menu($ind_menu){

                    $this->cal_menu;
                    global $aux_cal_menu;
                    global $num_ind_menu_ocupados;
                    
                    $i=0;

                    foreach($this->cal_menu as $rgtro){

                        if($rgtro[0] != $ind_menu){
                            $aux_cal_menu =$rgtro;
                            $num_ind_menu_ocupados[$i]=$rgtro[0];
                            $i++;
                        }                        
                    }
                    $this->cal_menu= $aux_cal_menu;
                    $this->cardinalidad_menu = count($this->cal_menu);
                    return($this->cal_menu);
                }
                
                function calcular_id_menu(){
                        
                    $this->cal_menu;
                    $cant_elem_cal_menu = count($this->cal_menu);
                    global $num_ind_menu_ocupados;
                    $max_ind_menu_ocupados=0;
                    foreach($this->cal_menu as $cm){
                        if($max_ind_menu_ocupados<$cm[4]){
                            $max_ind_menu_ocupados = $cm[4];

                        }

                    }
                    global $num_ind_menu_a_ocupar;
                    return $this->num_ind_menu_a_ocupar = $max_ind_menu_ocupados+1;
                
                }
                function anadir_alimento_a_menu($ca){

                        $this->cal_menu[$this->cardinalidad_menu] =$ca; //$row
                        $this->cardinalidad_menu+=1;
                        $txt = $ca[0].";". $ca[1].";". $ca[2].";". $ca[3].";". $ca[4].";". $ca[5].";". $ca[6].";". $ca[7].";".$ca[7]*$ca[6]."\n";
                        echo "<br> registro que se incluye ".$txt;
                        foreach($this->cal_menu as $ca){
                            $txt = $ca[0].";". $ca[1].";". $ca[2].";". $ca[3].";". $ca[4].";". $ca[5].";". $ca[6].";". $ca[7].";".$ca[7]*$ca[6]."\n";
                            echo "<br> registros temporales junto a nuevo que se incluye ".$txt;
                        }
                    return $this->cal_menu;
                }

                function reconstruir_Calorias_Menu(){

                    
                    if (($handle = fopen("Calorias_Menu.csv", "w")) !== FALSE) {
                     
                        foreach( $this->cal_menu as $ca){
                        global $num_reg;
                        $num_reg += 1;
                        $txt = $ca[0].";". $ca[1].";". $ca[2].";". $ca[3].";". $ca[4].";". $ca[5].";". $ca[6].";". $ca[7].";".$ca[7]*$ca[6]."\n";
                        echo "<br> registro que se grava ".$txt;
                        fwrite($handle, $txt);
                         
                        }

                        fclose($handle);
                   }
                   return $this->cal_menu;
                    
                }

    }
           





    
        
   

?>


