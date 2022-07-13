
<?php
session_start();
//$email = $_SESSION["mivariable"];
include_once("cabeceras.php");

error_reporting(0);

Class resultados{


    

    private $animal;

    private $peso;

    private $MER;

    private $num_menu;

    private $gra_cal; //gramos de calorias que come animal

    private $gra_pro; //gramos de proteinas que come animal

    private $gra_gra; //gramos de grasa que come animal

    private $gra_car; //gramos de carbohidratos que come el animal

    private $gra_tot; //total de gramos que consume al día
    function __constsruct(){
        
       
        global $relleno_Calorias_Menu_csv;

        global $relleno_Calorias_Menu_csv;
        $relleno_Calorias_Menu_csv = new Rellenar_Calorias_Menu();

     
    }

 

    
    function alimentos(){
       
            $lista_alimentos = new ingredientes();
            global $lista_a;
            $lista_a = $lista_alimentos->get_comp_ingredientes();
            $lista_mascotas = new mascotas();
          
            $lista_m = $lista_mascotas->mascotas_get();
            
            echo '<form  width = 160px method="POST">'; //action="Resultados.php"
            
            echo '<select  name ="animales">'; //multiple
                    
                        $i=0;
                        foreach($lista_m as $gmc){
             

                            echo '<option>'.$gmc[1];
                           
                            $i+=1;
                        
                        }
                echo '</select><br>';

                echo 'kgs mascota <input type=text name= "peso" width =3px>';
                echo  "% calorias: <input type= numeric name ='porcal' value =$gmc[5] width =3px>";
                echo  "% proteinas: <input type= numeric name ='porpro' value =$gmc[6] width =3px>";
                echo  "% grasas: <input type= numeric name ='porgra' value =$gmc[7] width =3px>";
                echo  "% HC: <input type= numeric name ='porcar' value =$gmc[8] width =3px><br>";
            

            
                $i=1;
                global $lista_a;
                foreach($lista_a as $la){
                  
                    $denom_alimento = $la[1];
                        echo "<br><input type = text name='name$i' value= '$denom_alimento'>";
                        echo  " cantidad en grs: <input type=numeric name= 'cantidad$i'>";
                        echo "% calorias: <input type= numeric name ='porcentajecalorias$i' value =$la[3]>";
                        echo "% proteinas: <input type= numeric name ='porcentajeproteinas$i' value =$la[4]>";
                        echo "% grasas: <input type= numeric name ='porcentajegrasas$i' value =$la[5]>";
                        echo "% carbohidratos: <input type= numeric name ='porcentajecarbohidratos$i' value =$la[6]><br>";
                
                   if($i++>7){
                       break;
                   }
                }
            echo '<br><input type=submit>';
            echo '</form>';
           
            include_once ("Classes.php");

            global $relleno_Calorias_Menu_csv;
            $relleno_Calorias_Menu_csv = new rellenar_Calorias_Menu();

                        
            $this->num_menu = $relleno_Calorias_Menu_csv->calcular_id_menu();

           
             
            $this->cal_menu = $relleno_Calorias_Menu_csv->get_cal_menu();
         
           global $relleno_Calorias_Menu_csv;
            

         
          

           

            if(isset ($_POST['animales'])){
                $this->animal= $_POST['animales'];}////


                $masc_ind= new mascotas();

                $reg_masc_ind = $masc_ind->masc_ind_get($this->animal);
            if(isset ($_POST['peso'])){
                    $this->peso = floatval($_POST['peso']);
                    
                    if(isset ($_POST['porcal']))$this->gra_cal= floatval($this->peso*floatval($_POST['porcal'])); 
                    
                    if(isset ($_POST['porpro']))$this->gra_pro= floatval($this->peso*floatval($_POST['porpro']));
                    
                    if(isset ($_POST['porgra']))$this->gra_gra= floatval($this->peso*floatval($_POST['porgra']));
                    if(isset($_POST['porcar'])) $this->gra_car= floatval($this->peso*floatval($_POST['porcar']));
                    $this->gra_tot= $this->gra_pro+$this->gra_gra+$this->gra_car;
                    $porcentaje_necesidad_peso= $this->gra_tot/$this->peso;
                    $this->MER=$MER_calorias = round(floatval($reg_masc_ind[2])*70*(floatval($this->peso))**(0.75));
                    
                    echo '<br>'.$this->animal." de ". $this->peso. "kg,necesita al día ".$this->MER. " calorias, en ".$this->gra_tot."kgrs repartidas en ".$this->gra_cal."gramos de calorias; ".$this->gra_pro." kgrs de proteinas; ".$this->gra_gra." kgrs de grasa; ".$this->gra_car." kgrs de carbohidratos<br>";
                
                
                }////

          


            $sum_gramos =0; 
            $sum_cal=0;
            $sum_pro=0;
            $sum_gra=0;
            $sum_car=0;
            $j=$i;

            $matriz_alimentos_escogidos =array();

            $num_elem_matriz_alimentos_escogidos=0;
            
            while( $j>-1){
                if(isset($_POST['cantidad'.$j]) and $_POST['cantidad'.$j]> 0){
                   
                    $sum_gramos += round(floatval($_POST['cantidad'.$j]));
                    $matriz_alimentos_escogidos[$j][0]= $this->num_menu;
                    $matriz_alimentos_escogidos[$j][1]=$_POST['name'.$j];
                    $matriz_alimentos_escogidos[$j][2]=$_POST['cantidad'.$j];
                    $num_elem_matriz_alimentos_escogidos++;
                    if(isset($_POST['porcentajecalorias'.$j])){
                        $calo_por= $matriz_alimentos_escogidos[$j][3]=round(floatval($_POST['porcentajecalorias'.$j]),4);
                        $calo_tot= $matriz_alimentos_escogidos[$j][4]=round(floatval($_POST['cantidad'.$j])*floatval($_POST['porcentajecalorias'.$j]),4);
                        $sum_cal += round(floatval($_POST['cantidad'.$j])*floatval($_POST['porcentajecalorias'.$j]));}
                        
                    if(isset($_POST['porcentajeproteinas'.$j])){
                        $sum_pro += round(floatval($_POST['cantidad'.$j])*floatval($_POST['porcentajeproteinas'.$j]));}
                           
                    if(isset($_POST['porcentajegrasas'.$j])){
                        $sum_gra += round(floatval($_POST['cantidad'.$j])*floatval($_POST['porcentajegrasas'.$j]));}
                    
                    if(isset($_POST['porcentajecarbohidratos'.$j])){;
                        $sum_car += round(floatval($_POST['cantidad'.$j])*floatval($_POST['porcentajecarbohidratos'.$j]));}
                   }
                   $j-=1;
                }
                $jk=1;
                foreach($matriz_alimentos_escogidos as $mae){
                    echo "<br> Menu nº ".$mae[0]." incluye: ".$mae[1]. " gramos de ".$mae[2];
                    $jk++;
                }  
               




            echo "<br>MENU ". $this->num_menu." Nutrientes aportados ";
            echo "Peso $sum_gramos  gramos -- ";
            echo "Calorias $sum_cal --" ;
            echo "Proteinas $sum_pro --" ;
            echo "Grasas $sum_gra --";
            echo "Hidratos de Carbono $sum_car <br>";


            echo "<br>%BALANCEADO CONSEGUIDO POR MENU ". $this->num_menu. "<br>";
            echo " --% balanceado peso:". round( $sum_gramos/$this->gra_tot/10,2);
            echo " --% balanceado en calorias: ". round( $sum_cal/$this->MER*100,2);
            echo " --% balanceado en proteinas: ".round($sum_pro/$this->gra_pro/100,2) ;
            echo " --% balanceado en grasas: ". round($sum_gra/$this->gra_gra/10,2) ;
            echo " --% balanceado en hidratos de Carbono: ".round($sum_car/$this->gra_car/10,2)."<br>";

            $_SESSION["animal"]=$this->animal;
            $_SESSION["peso"]=$this->peso;
            $_SESSION["RER"]=$reg_masc_ind[2];
            $_SESSION["MER"]=$this->MER;
            $_SESSION["num_menu"]=$this->num_menu;




            $jk=0;
            foreach($matriz_alimentos_escogidos as $mae){
                echo "<br> Menu nº ".$mae[0]."    incluye: ".$mae[1]. ";   gramos: ".$mae[2]. ";  calorias aportadas:".round($mae[4],2);
                
                $_SESSION["alimentos_racion".$jk][0]=$mae[0];//menu
                $_SESSION["alimentos_racion".$jk][1]=$mae[2];//cantidad
                $_SESSION["alimentos_racion".$jk][2]=$mae[1];//alimento
                $_SESSION["alimentos_racion".$jk][3]=$mae[3];//porcentaje
                $_SESSION["alimentos_racion".$jk][4]=$mae[4];
                //cal_total
                $jk++;
            }
            $_SESSION['u']=$jk;

        echo '<form action = "Cargar_menu.php" method="POST">';

        echo'<input type="text" name="guardar_registros" required value= "Si">';
        echo '<input type="submit"  value="CARGAR MENU"/>'; 
     
        echo '</form>';
       
    }

   
    }



    include_once("Classes.php"); 
    $result =new resultados();
    
    $result->alimentos();

?>
