<?php

error_reporting(0);

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
          
            $this->comp_ingr = $this->cargar_ingredientes();
            
            
        }

        function añadir_ingredientes($denominacion, $tipo_alimento, $porciento_calorias, $porciento_proteinas,$porciento_grasa, $porciento_carbohidratos){
           if(!is_null($denominacion) and $denominacion!=""){
            if (($handle3 = fopen("COMPOSICION_INGREDIENTES.csv", "a")) !== FALSE) {
                   
                $txt = time().";". $denominacion.";".  $tipo_alimento.";".$porciento_calorias.";".$porciento_proteinas.";".$porciento_grasa.";".$porciento_carbohidratos."\n";
                echo "<br> registro que se graba ".$txt ;
                
                fwrite($handle3, $txt);
                
               
                fclose($handle3);
                }
               
            }
        }



        function cargar_ingredientes(){
            $comp_ingr = array();
            if (($handle = fopen("COMPOSICION_INGREDIENTES.csv", "r")) !== FALSE) {
                    
                    $comp_ingr = array();
                    $row= 1;
                    while (($alimento = fgetcsv($handle, 7000, ";")) !== FALSE) {
                        
                        $num = count($alimento);
                        if(is_numeric($alimento[0])){ //no primera fila cabecera
                            $comp_ingr[$alimento[0]] =$alimento;
                            $row++;
                        };
                    }
        
                  
                fclose($handle);
                }
                return $comp_ingr;
            }
        }
        class mascotas{

            private $mascotas_caracteristica;
        
            function get_num_reg(){
                return $this->num_reg;
            }
            
            
            function get_mascotas_caracteristica(){
        
                return $this->mascotas_caracteristica;
            }
        
           
            function __construct(){
               
                $this->mascotas_caracteristica = $this->mascotas_get();
              
            }
            function mascotas_put($status,$rer,$peso,  $calorias_porc,$proteinas_porc, $grasas_porc,$carbohidratos_porc){
               
                if (($handle = fopen("RER.csv", "a")) !== FALSE) {
                  
                    $MER= (0.70)*$rer*($peso)**(0.75); //calorias que necesita ese peso y rer 8estado de salud)
                    $txt = time().";".$status.";".$rer.";".$peso.";".$MER.";".$calorias_porc.";".$proteinas_porc.";".$grasas_porc.";".$carbohidratos_porc."\n";
                    echo "grabado ".$txt;
                    fwrite($handle, $txt);
                           
                    fclose($handle);
               }
             
              
            }
            
            function mascotas_get(){
              
                $mascotas_caracteristica = array();
                if (($handle = fopen("RER.csv", "r")) !== FALSE) {
                         $row= 1;
         
                         
                        while (($mascota = fgetcsv($handle, 100, ";")) !== FALSE) {
                           
                            if(is_numeric($mascota[0])){ //no primera fila cabecera
                                $mascotas_caracteristica[] =$mascota;
                             
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
                               
                                $RER = $ia[2];
                                
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
                                             
                        
                        $row= 1;
                        while (($mascota = fgetcsv($handle4, 1000, ";")) !== FALSE) {
                            
                            
                            if( $denominacion != $mascota[1]){ //no primera fila cabecera
                                $mascotas_caracteristica[] =$mascota;
                                $row++;
                            }
                        }
                        fclose($handle4);
                    }
                    if (($handle51 = fopen("RER.csv", "w")) !== FALSE) {




                        fclose($handle51);
                    }
                    foreach($mascotas_caracteristica as $ia)
                    {
                            if (($handle5 = fopen("RER.csv", "a")) !== FALSE) {


                           
                                $txt = time().";".$ia[1].";".$ia[2].";".$ia[3].";".$ia[4].";".$ia[5].";".$ia[6].";".$ia[7].";".$ia[8]."\n";
                                echo " Recuperado y conservado: ".$txt.'<br>';
                                fwrite($handle5,$txt);
                           
                        fclose($handle5);
                        }
                    }
                       $this->mascotas_caracteristica =$mascotas_caracteristica; //return $ia;
                    }
        
        
        
            }
        
    Class rellenar_Calorias_Menu{

            private $cal_menu; // menus registrados
           

            private $row;

          
            function get_cal_menu(){
                $this->absorber_datos();
                return $this->cal_menu;
            }


            function __construct()
            {
                self::absorber_datos();
            }

            function consultar_menus(){
                global $cant_menus;
                $this->cal_menu= array();
                if (($handle = fopen("Calorias_Menu.csv", "r")) !== FALSE) {
                        $this->row= 0; //excel primera fila es cabecera 1
                        while (($menu = fgetcsv($handle, 500, ";")) !== FALSE) {
                       
                                $this->cal_menu[]=$menu;
                           
                                $this->row++;
                         
                        }
                     
                      foreach($this->cal_menu as $tcl){

                        $primer_comp_cal_menu[]=$tcl[0]; //numero de referencia del menu
                    
                      }
                      $ind_array = array_unique($primer_comp_cal_menu,SORT_NUMERIC);

                      
                      foreach($ind_array as $n){
                          echo "<br>".$n."<br>";
                            $cant_total_calorias_aportadas =0;
                            $wia= "";
                            $nmer =0;
                            foreach($this->cal_menu as $ia)
                            {
                                if($n==$ia[0]){
                                 echo ("--".$ia[1]."; kgs:".$ia[2]."; MER:".$ia[3]."; MENU:".$ia[4]."<br>");
                                  break;
                               }
                            }
                            foreach($this->cal_menu as $ia)
                            {
                                if($n==$ia[0]){
                                 echo ("\t\t-----------".$ia[5].";  grs.:".$ia[6]."; CAL:".round($ia[7],6)."---<br>");
                                $cant_total_calorias_aportadas += $ia[7];   
                                $wia= $ia[0];
                                $nmer = $ia[3]/1000/100;  
                               }
                            } 
                            if($n==$wia){
                            echo "<br> Kilocalorias aportadas por nº". $n. " = ".$cant_total_calorias_aportadas;
                            echo " == ".round($cant_total_calorias_aportadas/$nmer,6)."% del necesitado <br>";
                        
                        }
                        
                    }  
                    fclose($handle);
                    }
                    $this->cardinalidad_menu = $this->row;// count($this->cal_menu);
                    return $this->cal_menu;
                }
      
            function absorber_datos(){

             
                $this->cal_menu = array();
                if (($handle = fopen("Calorias_Menu.csv", "r")) !== FALSE) {
                       
                        
                        $this->row= 0; //excel primera fila es cabecera 1
                        while (($menu = fgetcsv($handle, 500, ";")) !== FALSE) {
                            
                                $this->cal_menu[$this->row]=$menu;
                            
                                $this->row++;
                          
                        }
                  
                    fclose($handle);
                    }
                    $this->cardinalidad_menu = $this->row;// count($this->cal_menu);
                    return $this->cal_menu;
                }


           
            
                function quitar_menu($ind_menu){
                    $this->absorber_datos(); 
                    $this->cal_menu;
                    $aux_cal_menu =array();
                   
                    
                    $i=0;

                    foreach($this->cal_menu as $rgtro){

                        if($rgtro[0] != $ind_menu){
                            $aux_cal_menu[$i]=$rgtro;
                          
                            echo " <br> Se conserva:  ".$aux_cal_menu[$i][0]. " ".$aux_cal_menu[$i][1];
                            $i++;
                        } else{
                            echo " <br> Registro que se quita ".$rgtro[0];
                        }                       
                    }
                     $this->cal_menu= $aux_cal_menu;
                     $this->cardinalidad_menu = count($this->cal_menu);
                     
                     return $aux_cal_menu;///($this->cal_menu);
                }
                
                function calcular_id_menu(){
                    $this->absorber_datos();    
                  
                    $max_ind_menu_ocupados=0;
                    
                    foreach($this->cal_menu as $cm){
                        if(is_null($cm[4])) {
                            $max_ind_menu_ocupados=0;
                            break;
                        }
                        if($max_ind_menu_ocupados<$cm[4]){
                            $max_ind_menu_ocupados = $cm[4];

                        }

                    }
                
                   
                    return $this->num_ind_menu_a_ocupar = $max_ind_menu_ocupados+1;
                
                }
   
                function reescribir_Calorias_Menu($cal2_menu){
                  if (($handle21 = fopen("Calorias_Menu.csv", "w")) !== FALSE) {
                        
                          fclose($handle21);
                        }

                    foreach( $cal2_menu as $ca){    

                    if (($handle2 = fopen("Calorias_Menu.csv", "a")) !== FALSE) {
                      
                       
                         $txt = $ca[0].";". $ca[1].";". $ca[2].";". $ca[3].";". $ca[4].";". $ca[5].";". $ca[6].";". floatval($ca[5])*floatval($ca[6])."\n";
                       
                        fwrite($handle2, $txt);
                        fclose($handle2);
                        }

                      
                   }
            
                    
                }


    }
           





    
        
   

?>


