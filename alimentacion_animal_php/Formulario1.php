<?php
    error_reporting(0);
    include_once ("Classes.php");
    $lista_mascotas = new mascotas();
    //$lista_mascotas->mascotas_put("2bonito pez", 1);
   
    
    echo '<form action="accion.php" method="POST">';
    echo '<select multiple name =menu[]>';
            $lista_m = $lista_mascotas->mascotas_get();
            $i=0;
            foreach($lista_m as $gmc){
                echo '<option>'.$gmc[1];
                $i+=1;
            }
    echo '</select>';
    echo '<input type=submit>';
    echo '</form>';

?>









</html>