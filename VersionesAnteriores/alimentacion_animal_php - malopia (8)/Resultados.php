<?php



Class resultados{

   



    function __constsruct(){

       
        //$FCS = new FormularioCS();
        global $alimento_anadir;

        global $animales_anadir;
       
        global $num_menu;

        global $array_alimentos_escogidos;

        global $lu;

        global $relleno_Calorias_Menu_csv;
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
        
        include_once("Classes.php");
       
        echo "Su eleccion:<br>";
        $animal= $_POST['animales'];
            echo "$animal<br>\n";
        $peso_animal = $_POST['peso'];
            echo " con peso de ".$peso_animal;
        $masc_ind = new mascotas();
        $reg_masc_ind = $masc_ind->masc_ind_get($animal);
        $MER_calorias = round($reg_masc_ind[2]*70*($peso_animal)**(0.75));
        global $relleno_Calorias_Menu_csv;
        $relleno_Calorias_Menu_csv = new Rellenar_Calorias_Menu();
        global $cal_menu;
        $cal_menu = $relleno_Calorias_Menu_csv->get_cal_menu();
        global $num_menu;
        $num_menu = $relleno_Calorias_Menu_csv->calcular_id_menu($cal_menu);
     
        global $animales_anadir;
        $animales_anadir[$num_menu][1]= $animal; //estatus_animal
        $animales_anadir[$num_menu][2]= $peso_animal;
        $animales_anadir[$num_menu][3]= $MER_calorias;
        $animales_anadir[$num_menu][4]= $num_menu;
        
        
        




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

           

            global $animales_anadir;
            global $relleno_Calorias_Menu_csv;
            global $array_alimentos_escogidos;
            global $num_menu;
            $array_alimentos_escogidos = $_POST['alimento'];
            foreach($array_alimentos_escogidos as $aae){
                 
                       // global $animales_anadir;
                        $animales_anadir[$num_menu][5]=$aae; //porcientocalorias
                    
                        foreach($lista_a as $cal_la){
                            if(str_contains($cal_la,$aae)){
                                $animales_anadir[$num_menu][7]=$cal_la;
                                break;
                            }
            
                        }
                        $relleno_Calorias_Menu_csv->anadir_alimento_a_menur($animales_anadir);                        

            }
            $relleno_Calorias_Menu_csv-> reconstruir_Calorias_Menu($relleno_Calorias_Menu_csv->get_cal_menu());
             }
          

    //$limpia_pantalla = wclear();
    
   
    }


    include_once("Classes.php"); 
    $result =new resultados();
    $result->formulario1();

    $result->status_animal();
    $result->alimentos();

?>
