<?php



date_default_timezone_set('UTC');

function cargar_ingredientes(){
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
                echo ($ia[1]."\n");
            }   
        fclose($handle);
        }

    }
cargar_ingredientes();

?>


