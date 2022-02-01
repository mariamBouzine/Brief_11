<?php require 'config.php'?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        class Tranche{
            // Properties
            public $borne_minimale ;
            public $borne_maximale ;
            public $prix_unitaire ; 

            function __construct($borne_min,$borne_max,$prix){
                $this -> borne_minimale = $borne_min;
                $this -> borne_maximale = $borne_max;
                $this -> prix_unitaire = $prix;
            }     
        }
        //Object:
        $tranche1 = new Tranche(0,100,$Tarifs["T1"]);
        $tranche2 = new Tranche(101,150,$Tarifs["T2"]);
        $tranche3 = new Tranche(151,210,$Tarifs["T3"]);
        $tranche4 = new Tranche(211,310,$Tarifs["T4"]);
        $tranche5 = new Tranche(311,510,$Tarifs["T5"]);
        $tranche6 = new Tranche(511,null,$Tarifs["T6"]);
        //variable:
        $Table = array();
        array_push($Table,$tranche1,$tranche2,$tranche3,$tranche4,$tranche5,$tranche6);
        $max ;
        $min ;  
        $moyen; 
        $Totale = array();
        $Totale_TVA  = array();
        if(isset($_POST["max"]) && isset($_POST["min"]) && isset($_POST['Calibre'])){
            $max = $_POST["max"];
            $min = $_POST["min"];
            $CalibreType = $_POST['Calibre'];
            if (empty($max) || empty($min) || empty($CalibreType)) {
                echo "max or min , type is empty";
            } else {
                $moyen  = $max - $min;
                // echo "<h5> $moyen </h5>" ;
                // echo "<h5> $CalibreType </h5>" ;
            } 	       
            if($moyen <= 150 and $moyen > 0){
                if($moyen <= $Table[0] -> borne_maximale && $moyen >= $Table[0] -> borne_minimale ){
                    $Totale[0] = $moyen * $Table[0] -> prix_unitaire;
                    //tva
                    $Totale_TVA = $Totale * $tva + $tambre;
                }
                elseif($moyen <= $Table[1] -> borne_maximale && $moyen >= $Table[1] -> borne_minimale){
                    $CTarif2 = ($moyen - 100) * $Table[1] -> prix_unitaire;
                    $CTarif1 =  $Trn1 ;
                    $Totale = $CTarif1 + $CTarif2;
                    //tva
                    $CTarif2_TVA = $CTarif2 * $tva;
                    $CTarif1_TVA = $CTarif1 * $tva;
                    $Totale_TVA = $CTarif2_TVA + $CTarif1_TVA + $tambre;
                    
                }
            }
            else {
                if($moyen <= $Table[2] -> borne_maximale && $moyen >= $Table[2] -> borne_minimale){
                    $Totale = $moyen * $Table[2] -> prix_unitaire;
                    //tva
                    $Totale_TVA = ($Totale * $tva) + $tambre;
                }
                elseif ($moyen <= $Table[3]-> borne_maximale && $moyen >= $Table[3] -> borne_minimale) {
                    $Totale =  $moyen * $Table[3] -> prix_unitaire;
                    // $CTarif3 =  $Trn3 ;
                    // $Totale = $CTarif3 + $CTarif4;
                    //tva
                    $Totale_TVA = ( $Totale * $tva) + $tambre;
                    // $CTarif3_TVA = $CTarif3 * $tva;
                    // $Totale_TVA = $CTarif4_TVA + $CTarif3_TVA + $tambre;
                }
                elseif ($moyen <= $Table[4] -> borne_maximale && $moyen >= $Table[4]-> borne_minimale) {
                    $Totale = $moyen * $Table[4] -> prix_unitaire;
                    // $CTarif4 =  $Trn4 ;
                    // $Totale = $CTarif4 + $CTarif5;
                    //tva
                    // $CTarif5_TVA = $CTarif5 * $tva;
                    // $CTarif4_TVA = $CTarif4 * $tva;
                    $Totale_TVA = ( $Totale * $tva) + $tambre;
                }
                else{
                    $Totale = $moyen * $Table[5]-> prix_unitaire;
                    // $CTarif5 =  $Trn5 ;
                    // $Totale = $CTarif5 + $CTarif6;
                    //tva
                    // $CTarif6_TVA = $CTarif6 * $tva;
                    // $CTarif5_TVA = $CTarif5 * $tva;
                    $Totale_TVA = ( $Totale * $tva) + $tambre;
                }

            }
            if($CalibreType == "min"){
                $Totale =  $Totale + $calibre["calibreMin"];
            }
            elseif($CalibreType == "moyen"){
                $Totale =  $Totale + $calibre["calibreMoyen"];
            }
            elseif($CalibreType == "max"){
                $Totale =  $Totale + $calibre["calibreMax"];
            }
        }
        
    ?>
</body>
</html>