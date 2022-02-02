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
        $Tarifs = array("T1"=>0.794, "T2"=>0.883, "T3"=>0.9451, "T4"=> 1.0489, "T5"=>1.2915, "T6"=>1.4975);
        $tranch = array("tranch1"=>1,"tranch2"=>2,"tranch3"=>3,"tranch4"=>4,"tranch5"=>5,"tranch6"=>6);
        $Trn1 = 100 * $Tarifs["T1"];
        $Trn3 = 210 * $Tarifs["T3"];
        $Trn4 = 310 * $Tarifs["T4"];
        $Trn5 = 510 * $Tarifs["T5"];
        $tva = 14;
        $tambre = 0.45;
        $calibre = array( "calibreMin" => 22.65, "calibreMoyen" => 37.05, "calibreMax" => 46.20);
      
    ?>
</body>
</html>