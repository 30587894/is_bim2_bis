Resultados.php
<?php




    include_once("Formulario1.php");

    //$limpia_pantalla = wclear();
    echo "Su eleccion:<br>";
    $animal= $_POST['menu'];
        echo "$animal<br>\n";
    $peso_animal = $_POST['peso'];
        echo " con peso de ".$peso_animal;
    $masc_ind = new mascotas();
    $reg_masc_ind = $masc_ind->masc_ind_get($animal);
    $MER_calorias = round($reg_masc_ind[2]*70*($peso_animal)**(0.75));
        echo " y calorias que necesita de ".$MER_calorias;
    

?>