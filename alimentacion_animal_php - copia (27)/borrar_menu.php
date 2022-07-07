borrar_menu

<?php


error_reporting(0);

        include_once("Classes.php");
        include_once("cabeceras.php");

        $lista_alimentos = new ingredientes();
        global $lista_a;
        $lista_a = $lista_alimentos->get_comp_ingredientes();
        $lista_mascotas = new mascotas();

        $lista_m = $lista_mascotas->mascotas_get();

        echo '<form  width = 160px method="POST">'; //action="Resultados.php"

        echo '<select  name ="animales">'; //multiple
                
                    $i=0;
                    foreach($lista_m as $gmc){
        

                        echo '<option>'.$gmc[1];
                    
                        $i+=1;
                    
                    }
            echo '</select>';

            echo '<input type=submit>';
            echo '</form>';
        
   
        $rcl= new rellenar_Calorias_Menu();

        foreach($rcl->get_cal_menu() as $ca){

                //echo "recorrido menu nº ".$ca[0]. "  animal ". $ca[1];

                if($ca[1]==$_POST['animales']){

                    $cal_menu= $rcl->quitar_menu($ca[0]);

                    echo "menu quitado nº ".$ca[0];
                    $rcl->reescribir_Calorias_Menu($cal_menu);
                    break;


                }



        }






?>