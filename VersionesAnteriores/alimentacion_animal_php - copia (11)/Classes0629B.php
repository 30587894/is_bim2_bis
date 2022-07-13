<?php



date_default_timezone_set('UTC');
echo "hola";
    class ingredientes{

        private $comp_ingr;

        function get_comp_ingr($ref_denominacion){
           
            //foreach($comp_ingr as $oo)
            //{
                echo ($this->comp_ingr[$ref_denominacion][1]." ".$this->comp_ingr[$ref_denominacion][2]);
            //}
            //return $item_elegido;
        }
        
        function __construct(){
            print ("Construido");
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
    
    $ingr_elegido_clase = new ingredientes();
    //$ingr_elegido_clase->cargar_ingredientes();
    $ingr_elegido_clase->get_comp_ingr(2);
    

?>


