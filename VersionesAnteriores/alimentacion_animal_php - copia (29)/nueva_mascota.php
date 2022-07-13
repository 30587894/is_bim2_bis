<!DOCTYPE html> 

<html lang="es" > 
    
<head> 
        <h1>
REGISTRAR NUEVA MASCOTA
        </h1>
</head>
 <body>
     <br>Instrucciones:
     <br> 1º Rellene los campos, modificandolos si es necesario. El coeficiente de estado es el multiplicador de las calorías básicas de acuerdo al estado de la mascota.
     <br>
     <br>
 </body>
</html>


<?php
    include_once("Classes.php");
    include_once("cabeceras.php");
    
error_reporting(0);

    echo '<form  action = "listado_mascotas.php" method = "POST">';

    echo "<br>Animal y estado-actividad: <input type = text name='Animal_status' value= 'cunicula: sendentario'><br>";
    echo  "coeficiente de estado: <input type=numeric name= 'rer' value=1><br>";
    echo "Kgs peso: <input type= numeric name ='peso' value =6><br>";
    echo "Porcentaje de peso en Calorias estimadas: <input type= numeric name ='calorias_porc' value =18><br>";
    echo "Porcentaje de peso en proteinas estimadas: <input type= numeric name ='proteinas_porc' value =0.005><br>";
    echo "Porcentaje de peso en grasas estimadas: <input type= numeric name ='grasas_porc' value =0.005><br>";
    echo "Porcentaje de peso en Carbohidratos estimados: <input type= numeric name ='carbohidratos_porc' value =0.015><br>";
   
    echo '<br><input type=submit>';
    echo '</form>';

   



?>