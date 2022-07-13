<!DOCTYPE html> 

<html lang="es" > 
    
<head> 
        <h1>
CONSULTAR MENUS
        </h1>
</head>
 <body>
     <br>Instrucciones:
     <br> 1º Por cada MENU apareceran lo alimentos con su componente calorica. Al pie el balanceamiento logrado para esa mascota.
     <br>
     <br>
 </body>
</html>


<?php
include_once( "Classes.php");
include_once("cabeceras.php");

//error_reporting(0);
$rcme =  new rellenar_Calorias_Menu();

$rcme->consultar_menus();

?>