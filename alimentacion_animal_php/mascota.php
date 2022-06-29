mascota.php

<?php
class mascotas{

    private $mascota_caracteristica;

    //function get_comp_ingr($ref_denominacion){
       
        //foreach($comp_ingr as $oo)
        //{
      //      echo ($this->comp_ingr[$ref_denominacion][1]." ".$this->comp_ingr[$ref_denominacion][2]);
        //}
        //return $item_elegido;
    //}
    
    function __construct(){
        print ("Construido");
        //global $comp_ingr;
        $this->mascota_caracteristica = $this->masc_get();
        
        
    }

    function masc_get(){
        $mascota_caracteristica = array();
        if (($handle = fopen("RER.csv", "r")) !== FALSE) {
                $id_animal=0;
                $denominacion="";
                $RER=0;
                
                //$mascota_caracterisiticas = array();
                $row= 1;
                while (($mascota = fgetcsv($handle, 1000, ";")) !== FALSE) {
                    
                    $num = count($mascota);
                    if(is_numeric($mascota[0])){ //no primera fila cabecera
                        $mascota_caracteristica[$mascota[0]] =$mascota;
                        $row++;
                    };
                }
    
                foreach($mascota_caracteristica as $ia)
                {
                    echo ($ia[1]." ".$ia[2]." ".$ia[3]."\n");
                }   
            fclose($handle);
            }
            return $mascota_caracteristica;
        }
    }

$ingr_elegido_clase = new mascotas();
//$ingr_elegido_clase->cargar_ingredientes();
//$ingr_elegido_clase->get_comp_ingr(2);







?>