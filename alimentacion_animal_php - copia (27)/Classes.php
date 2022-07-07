<?php

//error_reporting(0);

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

        function añadir_ingredientes($denominacion, $tipo_alimento, $porciento_calorias, $porciento_proteinas,$porciento_grasa, $porciento_carbohidratos){
            $comp_ingr = array();
            if (($handle3 = fopen("COMPOSICION_INGREDIENTES.csv", "a")) !== FALSE) {
                   
                $txt = time().";". $denominacion.";".  $tipo_alimento.";".$porciento_calorias.";".$porciento_proteinas.";".$porciento_grasa.";".$porciento_carbohidratos."\n";
                echo "<br> registro que se graba ".$txt ;
                
                fwrite($handle3, $txt);
                
                //}

                fclose($handle3);
                }
                return $comp_ingr;
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
        
            private $status; //'Animal_status' value= cunicula: sendentario>";
            
            private $rer; //ype=numeric name= 'RER' values=1>";
            
            
            private $calorias_porc;// % calorias segun peso animal value =18>";
            
            private $proteinas_porc; // %proteinas segun peso animal value =0.005>";
            
            private $grasas_porc; // %grasa segun peso animal estimado' value =0.005>";
            
            private $carbohidratos_porc; //%carbohidratos segun peso animal estimado 015>";
            
           
        
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
            function mascotas_put($status,$rer,$peso,  $calorias_porc,$proteinas_porc, $grasas_porc,$carbohidratos_porc){
               
                if (($handle = fopen("RER.csv", "a")) !== FALSE) {
                    global $num_reg;
                    $num_reg += 1;
                    $MER= (0.70)*$rer*($peso)**(0.75);
                    $txt = time().";".$status.";".$rer.";".$peso.";".$MER.";".$calorias_porc.";".$proteinas_porc.";".$grasas_porc.";".$carbohidratos_porc."\n";
                    echo "grabado ".$txt;
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
                           
                            if(is_numeric($mascota[0])){ //no primera fila cabecera
                                $mascotas_caracteristica[$mascota[0]] =$mascota;
                              //  echo ( $mascota[0]." NOMBRE-STATUS ".$mascota[1]." RER ".$mascota[2]." peso ". $mascota[3]. " MER ".$mascota[4]. " %Cal/peso ". $mascota[5]. " % Prot/peso". $mascota[6]. " % Grasa/peso ". $mascota[7]. " % Carbohidratos/peso". $mascota[8]."<br>");
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
            
                function masc_borrar($denominacion){
                    $mascotas_caracteristica = array();
                    if (($handle4 = fopen("RER.csv", "r")) !== FALSE) {
                        $id_animal=0;
                        $especie="";
                        $RER=0;
                        
                        //$mascota_caracterisiticas = array();
                        $row= 1;
                        while (($mascota = fgetcsv($handle4, 1000, ";")) !== FALSE) {
                            
                            
                            if( $denominacion != $mascota[1]){ //no primera fila cabecera
                                $mascotas_caracteristica[$mascota[0]] =$mascota;
                                $row++;
                            }
                        }
                        fclose($handle4);
                    }
                    if (($handle5 = fopen("RER.csv", "a")) !== FALSE) {


                            foreach($mascotas_caracteristica as $ia)
                            {
                                $txt = time().";".$ia[1].";".$ia[2].";".$ia[3].";".$ia[4].";".$ia[5].";".$ia[6].";".$ia[7].";".$ia[8]."\n";
                    echo "grabado ".$txt.'<br>';
                                fwrite($handle5,$txt);
                            }  
                        fclose($handle5);
                        }
                        
                        return $ia;
                    }
        
        
        
            }
        
    Class rellenar_Calorias_Menu{

            private $cal_menu; // menus registrados
            //private $cant_menus;

            private $row;

            private $num_ind_menu_ocupados; //ind_menu claves ocupadas por conjunto de alimentos en menu

            private $num_ind_menu_a_ocupar;

            function get_cal_menu(){
                return $this->cal_menu;
            }


            function __construct()
            {
                self::absorber_datos();
            }

            function consultar_menus(){
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
                        //global $row;
                        $this->row= 0; //excel primera fila es cabecera 1
                        while (($menu = fgetcsv($handle, 500, ";")) !== FALSE) {
                            
                           // $num = count($menu);
                           // if(is_numeric($menu[0])){ //no primera fila cabecera
                                $this->cal_menu[]=$menu;
                              //  $cant_menus[$row]= $menu[0];
                                $this->row++;
                            //};
                        }
                      //  echo "row linea 219 ".$this->row;
                        foreach($this->cal_menu as $ia)
                        {
                           echo ("<br>Componente menu ".$ia[0].";".$ia[1].";".$ia[2].";".$ia[3].";".$ia[4].";".$ia[5].";".$ia[6].";".$ia[7]."\n");
                        }   
                    fclose($handle);
                    }
                    $this->cardinalidad_menu = $this->row;// count($this->cal_menu);
                    return $this->cal_menu;
                }









            
            function absorber_datos(){

               ////$this->cal_menu;
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
                        //global $row;
                        $this->row= 0; //excel primera fila es cabecera 1
                        while (($menu = fgetcsv($handle, 500, ";")) !== FALSE) {
                            
                           // $num = count($menu);
                           // if(is_numeric($menu[0])){ //no primera fila cabecera
                                $this->cal_menu[]=$menu;
                              //  $cant_menus[$row]= $menu[0];
                                $this->row++;
                            //};
                        }
                      //  echo "row linea 219 ".$this->row;
                        foreach($this->cal_menu as $ia)
                        {
                          //  echo ("<br>Componente menu ".$ia[0].";".$ia[1].";".$ia[2].";".$ia[3].";".$ia[4].";".$ia[5].";".$ia[6].";".$ia[7]."\n");
                        }   
                    fclose($handle);
                    }
                    $this->cardinalidad_menu = $this->row;// count($this->cal_menu);
                    return $this->cal_menu;
                }


            //menu = alimentos con el mismo $ind_menu
            
                function quitar_menu($ind_menu){
                    $this->absorber_datos(); 
                    $this->cal_menu;
                    global $aux_cal_menu;
                    global $num_ind_menu_ocupados;
                    
                    $i=0;

                    foreach($this->cal_menu as $rgtro){

                        if($rgtro[0] != $ind_menu){
                            $aux_cal_menu[$i]=$rgtro;
                            $num_ind_menu_ocupados[$i]=$rgtro[0];
                            $i++;
                        }                        
                    }
                    $this->cal_menu= $aux_cal_menu;
                    $this->cardinalidad_menu = count($this->cal_menu);
                   
                    return($this->cal_menu);
                }
                
                function calcular_id_menu(){
                    $this->absorber_datos();    
                    $this->cal_menu;
                   // $cant_elem_cal_menu = count($this->cal_menu[1]);
                    global $num_ind_menu_ocupados;
                    $max_ind_menu_ocupados=0;
                    if(isset($this->cal_menu[4])){
                    foreach($this->cal_menu as $cm){
                        if(is_null($cm[4])) {
                            $max_ind_menu_ocupados=0;
                            break;
                        }
                        if($max_ind_menu_ocupados<$cm[4]){
                            $max_ind_menu_ocupados = $cm[4];

                        }

                    }}else {$max_ind_menu_ocupados=0;}
                    
                    global $num_ind_menu_a_ocupar;
                    return $this->num_ind_menu_a_ocupar = $max_ind_menu_ocupados+1;
                
                }
                function anadir_alimento_a_menu($ca){
                        $cal_menu= $this->absorber_datos(); 

                        $int_i = count($cal_menu[0]);

                        $ca[0]=$int_i; 
                        
                        $ca[6]=5;
                        $ca = $this->cal_menu[$int_i]; //$row
                       
                       
                        $txt = "".$ca[0].";".$ca[1].";".$ca[2].";".$ca[3].";".$ca[4].";".$ca[5].";".$ca[6]."\n";
                        echo "<br> registro que se incluye ".$txt;
                    /*    foreach($this->cal_menu as $cas){
                            foreach($cas as $ca){
                            $txt = "".$ca[0].";".$ca[1].";".$ca[2].";".$ca[3].";".$ca[4].";".$ca[5].";".$ca[6]."."\n";
                            echo "<br> registros temporales junto a nuevo que se incluye ".$txt;
                            
                        }*/
                        if (($handle2 = fopen("Calorias_Menu.csv", 'a')) !== FALSE) {
                                $this->absorber_datos();
                                
                                //foreach( $this->cal_menu as $ca){
                                $txt = $ca[0].";". $ca[1].";".  $ca[2].";".  $ca[3].";". $ca[4].";".  $ca[5].";".  $ca[6]."\n";
                                echo "<br> registro que se grava ".$txt;
                                
                                fwrite($handle2, $txt);
                                
                                //}

                                fclose($handle2);
                       }
                    return $this->cal_menu;
                }

                function reconstruir_Calorias_Menu(){

                    $this->absorber_datos(); 
                    if (($handle2 = fopen("Calorias_Menu.csv", "w")) !== FALSE) {
                        $this->absorber_datos();
                        foreach( $this->cal_menu as $ca){
                         $txt = $ca[0].";". $ca[1].";". $ca[2].";". $ca[3].";". $ca[4].";". $ca[5].";". $ca[6]."\n";
                        echo "<br> registro que se grava ".$txt;
                        fwrite($handle2, $txt);
                         
                        }

                        fclose($handle2);
                   }
                   return $this->cal_menu;
                    
                }
                function reescribir_Calorias_Menu($cal_menu){

                    if (($handle2 = fopen("Calorias_Menu.csv", "w")) !== FALSE) {
                        
                        foreach( $cal_menu as $ca){
                         $txt = $ca[0].";". $ca[1].";". $ca[2].";". $ca[3].";". $ca[4].";". $ca[5].";". $ca[6]."\n";
                        echo "<br> registro que se grava ".$txt;
                        fwrite($handle2, $txt);
                         
                        }

                        fclose($handle2);
                   }
                   return $this->cal_menu;
                    
                }


    function anadir_menu_a_csv(){
        
        

            $this->absorber_datos(); 
            if (($handle2 = fopen("Calorias_Menu.csv", "w")) !== FALSE) {
                $this->absorber_datos();
                foreach( $this->cal_menu as $ca){
                 $txt = $ca[0].";". $ca[1].";". $ca[2].";". $ca[3].";". $ca[4].";". $ca[5].";". $ca[6]."\n";
                echo "<br> registro que se grava ".$txt;
                fwrite($handle2, $txt);
                 
                }

                fclose($handle2);
           }
           return $this->cal_menu;
            
        
    }

    }
           





    
        
   

?>


