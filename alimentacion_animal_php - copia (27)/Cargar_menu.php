Cargar_menu

<?php

  

    session_start();
    include_once("cabeceras.php");
    error_reporting(0);
    $u=$_SESSION["u"];
    $animal = $_SESSION["animal"];
    $peso = $_SESSION["peso"];
    $RER = $_SESSION["RER"];
    $MER=    $_SESSION["MER"];
    $num_menu = $_SESSION["num_menu"];

    
    $jk=0;
           for($jk; $jk<=$u; $jk++){
                //echo "<br> Menu nº ".$mae[0]." incluye: ".$mae[1]. " gramos de ".$mae[2];
                
               $n_menu =$_SESSION["alimentos_racion".$jk][0]; //limento
               $alimento=$_SESSION["alimentos_racion".$jk][2]; //alimento
               $cantidad= $_SESSION["alimentos_racion".$jk][1]; //cantidad
               $cal_gr=$_SESSION["alimentos_racion".$jk][3];
               $cal_tot=$_SESSION["alimentos_racion".$jk][4];
                
                 
       

      

        
        
            
        $txt = time().";".$animal.";".$peso.";".$MER.";".$num_menu.";".$alimento.";".$cantidad.";".$cal_gr.";".$cal_tot."\n";
      echo "<br> 239 registro que se graba NOMBRE ".$alimento."   cantidad ".$cantidad."  porcentaje calorias ".$cal_gr."total".$cal_tot."\n";
        
        if (($handle0701 = fopen("Calorias_Menu.csv", 'a')) !== FALSE) {
                echo "<br> registro que se graba ".$txt;

             fwrite($handle0701, $txt);
 
             fclose($handle0701);
        
              }
           //   $jk--;
     }









?>