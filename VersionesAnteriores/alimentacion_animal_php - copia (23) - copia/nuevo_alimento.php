nuevo_alimento
<?php

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