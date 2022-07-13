<?php



Class resultados{

   



    function __constsruct(){

       
        //$FCS = new FormularioCS();

       
        global $lu;
       /* 
        $this->formulario1();
        $this->alimentos();

        $this->status_animal();
        */
    }


    function formulario1(){
                    //error_reporting(0);
                //include_once ("Classes.php");
                $lista_mascotas = new mascotas();
                //$lista_mascotas->mascotas_put("2bonito pez", 1);
                $lista_m = $lista_mascotas->mascotas_get();
                
                
                echo '<form action="Resultados.php" method="POST">';
                echo '<select  name ="animales">'; //multiple
                    
                        $i=0;
                        foreach($lista_m as $gmc){
                            echo '<option>'.$gmc[1];
                            $i+=1;
                        
                        }
                echo '</select>';
                echo 'Peso de mascota <input type=text name= "peso"><br>';
            echo '<input type=submit>';
            echo '</form>';   
    }





    function status_animal(){
        //include_once("Classes.php");
       
        echo "Su eleccion:<br>";
        $animal= $_POST['animales'];
            echo "$animal<br>\n";
        $peso_animal = $_POST['peso'];
            echo " con peso de ".$peso_animal;
        $masc_ind = new mascotas();
        $reg_masc_ind = $masc_ind->masc_ind_get($animal);
        $MER_calorias = round($reg_masc_ind[2]*70*($peso_animal)**(0.75));

            echo " y calorias que necesita de ".$MER_calorias;

    }
   

    
    function alimentos(){
            //$limpia_pantalla = wclear();
            $lista_alimentos = new ingredientes();
            global $lista_a;
            $lista_a = $lista_alimentos->get_comp_ingredientes();
            echo '<form  width = 60px method="POST">'; //action="Resultados.php"
            echo '<select multiple name= alimentos[]>';
                $i=1;
                global $lista_a;
                foreach($lista_a as $la){
                  
                    $denom_alimento = $la[1];
                    echo '<option>'.$denom_alimento;
              
                    if($i>10){
                        break;
                    }
                }
            echo '<input type=submit>';
            echo '</form>';
/*
                $i=1;
                global $Suma_calorias_alimentos;
                $Suma_calorias_alimentos = 0;
                global $lista_a;
                foreach($lista_a as $la){
                    //echo $la[0]."--".$la[1]."--".$la[2]."  calorias: ".$la[3];
                    $Suma_calorias_alimentos = $_POST["alimento['.$la[0]']"]*$la[3]+ $Suma_calorias_alimentos;
                    
                    echo '<br>';
                    $i+=1;
                    if($i>10){
                        break;
                    }
                 echo " Calorias aportadas por los alimentos escogidos ".$Suma_calorias_alimentos;
                    
                */ }
          

    //$limpia_pantalla = wclear();
    
   
    }


    include_once("Classes.php"); 
    $result =new resultados();
    $result->formulario1();

    $result->status_animal();
    $result->alimentos();

?>
