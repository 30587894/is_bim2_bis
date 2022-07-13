<!DOCTYPE html> 

<html lang="es" > 
    
<head> 
        <h1>
REGISTRAR NUEVO ALIMENTO
        </h1>
</head>
 <body>
     <br>Instrucciones:
     <br> 1º Rellene los campos y dele a enviar para registrar un nuevo alimento.
     <br> OBSERVACION: Debido a que hay más de 6500 registros, y el ahora registrado se añade a la cola, no saldra en Cargar Menu.
     <br> En Cargar_Menu (Resultados.php) solo salen los 6 primeros del listado.
     <br> Para que salgan todos quitar la restricción en el fichero Resultados.php, linea 107.   
     <br>
 </body>
</html>
<?php
 error_reporting(0);
 include_once("cabeceras.php");
 echo '<form  width = 160px method="POST">'; //action="Resultados.php"

     echo 'Denominacion: <input type=text name= "denominacion" width =3px><br>';
     echo  "Categoria de alimento: <input type= text name ='tipo_alimento' width =3px><br>";
     echo "% de Calorias_peso que aporta: <input type= numeric name ='calorias' width =3px><br>";
     echo  "% proteinas: <input type= numeric name ='proteinas' width =3px><br>";
     echo  "% grasas: <input type= numeric name ='grasas' width =3px><br>";
     echo  "% hidratos de carbono: <input type= numeric name ='hidratos_carbono' width =3px><br>";
 

 
    
 echo '<input type=submit>';
 echo '</form>';

 include_once("Classes.php");

 $ingr = new ingredientes();

 $ingr->añadir_ingredientes($_POST['denominacion'], $_POST['tipo_alimento'], $_POST['calorias'], $_POST['proteinas'],$_POST['grasas'], $_POST['hidratos_carbono']);
        




?>