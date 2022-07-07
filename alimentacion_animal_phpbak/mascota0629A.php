mascota.php

<?php
class mascotas{

    private $mascota_caracteristica;
    private $peso;
    private $MER; //calorias calculadas para la caracteristica de mascota y peso

    private $especie;

    private $status;

    //function get_comp_ingr($ref_denominacion){
       
        //foreach($comp_ingr as $oo)
        //{
      //      echo ($this->comp_ingr[$ref_denominacion][1]." ".$this->comp_ingr[$ref_denominacion][2]);
        //}
        //return $item_elegido;
    //}
    
    //function __construct(){
      //  print ("Construido");
        //global $comp_ingr;
       // $this->mascota_caracteristica = $this->masc_get();
        
    //    }
    function __construct($num_reg,$peso){
        print ("Construido");
        //global $comp_ingr;
        $this->mascota_caracteristica = $this->masc_get($num_reg,$peso);
        $this->peso = $peso;
        
        
        
    }

    function masc_get($num_reg, $peso){
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
                    };
                }
    
                foreach($mascotas_caracteristica as $ia)
                {
                    if($ia[0]==$num_reg){
                    echo ($ia[0]." ".$ia[1]." ".$ia[2]."----    \n");
                    $RER = $ia[2];
                    $this->MER = 70*(($peso)**(0.75));
                    echo ($ia[0]." ".$ia[1]." ".$ia[2]." ".$this->MER."---    \n");
                    } 
                }  
            fclose($handle);
            }
            return $mascotas_caracteristica;
        }
    }

$ingr_elegido_clase = new mascotas(16,75);
//$ingr_elegido_clase->cargar_ingredientes();
//$ingr_elegido_clase->get_comp_ingr(2);







?>