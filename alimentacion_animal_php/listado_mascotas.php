<!DOCTYPE html> 

<html lang="es" > 
    
<head> 
        <h1>
                LISTADO DE MASCOTAS
        </h1>
</head>
 <body>
     <br>Instrucciones:
     <br> 1º En pantalla salen las mascotas registradas.
     <br>
     <br>
 </body>
</html>
<?php
include_once("cabeceras.php");
include_once("Classes.php");
$masc = new mascotas();
    $masc->mascotas_put($_POST['Animal_status'],$_POST['rer'],$_POST['peso'],$_POST['calorias_porc'],$_POST['proteinas_porc'], $_POST['grasas_porc'],$_POST['carbohidratos_porc']);

    echo "<br> MASCOTAS REGISTRADAS <br>";
    $masc->mascotas_get();
?>