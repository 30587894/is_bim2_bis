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
                return $this->cal_menu;  //$this->absorber_datos();
            }


            function __construct()
            {
                
            }

            function absorber_datos(){

                global $cal_menu;
                global $cant_menus;
                $cal_menu = array();
                if (($handle = fopen("Calorias_Menu", "r")) !== FALSE) {
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
                            if(is_numeric($menu[0])){ //no primera fila cabecera
                                $cal_menu[$row] =$menu;
                              //  $cant_menus[$row]= $menu[0];
                                $row++;
                            };
                        }
            
                        foreach($cal_menu as $ia)
                        {
                            echo ($ia[1]."\n");
                        }   
                    fclose($handle);
                    }
                    return $cal_menu;
                }


            //menu = alimentos con el mismo $ind_menu
            
                function quitar_menu($cal_menu, $ind_menu){

                    global $cal_menu;
                    global $aux_cal_menu;
                    global $num_ind_menu_ocupados;
                    
                    $i=0;

                    foreach($cal_menu as $rgtro){

                        if($rgtro[0] != $ind_menu){
                            $aux_cal_menu =$rgtro;
                            $num_ind_menu_ocupados[$i]=$rgtro[0];
                            $i++;
                        }                        
                    }
                    $cal_menu= $aux_cal_menu;
                    return($cal_menu);
                }
                
                function añadir_menu($menu_array_nuevo){
                        
                    global $cal_menu;
                    $cant_elem_cal_menu = count($cal_menu);
                    global $num_ind_menu_ocupados;
                    $max_ind_menu_ocupados=0;
                    foreach($cal_menu as $cm){
                        if($max_ind_menu_ocupados<$cm[4]){
                            $max_ind_menu_ocupados = $cm[4];

                        }

                    }
                    global $num_ind_menu_a_ocupar;
                    $num_ind_menu_a_ocupar = $max_ind_menu_ocupados+1;
                    global $row;
                    foreach($menu_array_nuevo as $man){

                        $man[4]=$num_ind_menu_a_ocupar;
                        $man[0]=$row;
                        $cal_menu[] =$man; //$row
                        $row++;
                    }
                    return $cal_menu;
                }

                function reconstruir_Calorias_Menu($cal_menu){

                    
                    if (($handle = fopen("Calorias_Menu.csv", "w")) !== FALSE) {
                     
                        foreach( $cal_menu as $ca){
                        $this->num_reg += 1;
                        $txt = $ca[0].";". $ca[1].";". $ca[2].";". $ca[3].";". $ca[4].";". $ca[5].";". $ca[6].";". $ca[7].";".$ca[7]*$ca[8]."\n";
                        fwrite($handle, $txt);
                         
                        }

                        fclose($handle);
                   }
                   return $cal_menu;
                    
                }

    }
           





    
        
   

?>


