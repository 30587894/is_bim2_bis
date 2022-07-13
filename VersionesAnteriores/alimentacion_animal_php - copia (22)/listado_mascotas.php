listado_mascotas
<?php
include_once("cabeceras.php");
include_once("Classes.php");
$masc = new mascotas();
    $masc->mascotas_put($_POST['Animal_status'],$_POST['rer'],$_POST['peso'],$_POST['calorias_porc'],$_POST['proteinas_porc'], $_POST['grasas_porc'],$_POST['carbohidratos_porc']);

    echo "<br> MASCOTAS REGISTRADAS <br>";
    $masc->mascotas_get();
?>