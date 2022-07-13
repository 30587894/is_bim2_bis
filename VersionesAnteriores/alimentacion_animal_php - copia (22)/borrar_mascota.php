borrar_mascota
<?php


error_reporting(0);

        include_once("Classes.php");
        include_once("cabeceras.php");

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
    
    $lista_mascotas->masc_borrar($_POST['animales']);

    ?>