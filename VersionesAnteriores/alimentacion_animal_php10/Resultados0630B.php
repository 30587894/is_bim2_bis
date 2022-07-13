Resultados.php
<?php
        //include_once("Classes.php");
        include_once ("Formulario1.php");
        echo "Su eleccion:<br>";
        $animal= $_POST['animales'];
            echo "$animal<br>\n";
        $peso_animal = $_REQUEST['peso'];
            echo " con peso de ".$peso_animal;
        $masc_ind = new mascotas();
        $reg_masc_ind = $masc_ind->masc_ind_get($animal);
        $MER_calorias = round($reg_masc_ind[2]*70*($peso_animal)**(0.75));

            echo " y calorias que necesita de ".$MER_calorias;

     
   

    

    //$limpia_pantalla = wclear();
    echo '<form action="Resultados0630B.php" method="POST">';
    echo '<select multiple name= "alimentos[]">';
        $i=1;
        foreach($lista_alimentos->get_comp_ingredientes() as $la){
            echo $la[0]."--".$la[1]."--".$la[2]."  calorias: ".$la[3];
            $denom_alimento = $la[1];
            echo '  Cantidad escogida: <input type = "text" name="alimento["'.$la[0].']">"';
          //  echo '  de <input type = "checkbox" name= "alimento"'.$la[0].'value='.'"'.$denom_alimento.'">';
            echo '<br>';
            $i+=1;
            if($i>10){
                break;
            }
        }
     echo '<input type=submit>';
     echo '</form>';

        $i=1;
        $Suma_calorias_alimentos = 0;
        foreach($lista_alimentos->get_comp_ingredientes() as $la){
            //echo $la[0]."--".$la[1]."--".$la[2]."  calorias: ".$la[3];
            $Suma_calorias_alimentos = $_POST["alimento[".$la[0]]*$la[3]+ $Suma_calorias_alimentos;
            
            echo '<br>';
            $i+=1;
            if($i>10){
                break;
            }
        }
          

    //$limpia_pantalla = wclear();
    
    echo " Calorias aportadas por los alimentos escogidos ".$Suma_calorias_alimentos;
?>