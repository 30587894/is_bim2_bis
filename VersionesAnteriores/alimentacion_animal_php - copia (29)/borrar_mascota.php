<!DOCTYPE html> 

<html lang="es" > 
    
<head> 
        <h1>
BORRAR REGISTRO DE MASCOTA
        </h1>
</head>
 <body>
     <br>Instrucciones:
     <br> 1º Elija la mascota entre las registradas, y dele enviar; el primer registro de esa mascota-estado se borrará.
     <br> 2º La siguientes reseñas son los registros que se conservan, una vez borrado lo indicado en 1º.
     <br>
     <br>
 </body>
</html>



borrar_mascota
<?php


error_reporting(0);

        include_once("Classes.php");
       

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
    include_once("cabeceras.php");

    ?>