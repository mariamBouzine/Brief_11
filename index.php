<?php require 'config.php'?>
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
        $calibre = array( "calibreMin" => 22.65, "calibreMoyen" => 37.05, "calibreMax" => 46.20);
        $max ;
        $min ;  
        $moyen; 
        $CalibreType;
        $Totale = array();
        $TotaleHT = array();
        if(isset($_POST["Submit"])){
            $max = $_POST["max"];
            $min = $_POST["min"];
            $CalibreType = $_POST['Calibre'];
            if (empty($max) || empty($min) || empty($CalibreType)) {
                echo "<script>alert(\"max or min , type is empty\")</script>";

            } else {
                $moyen  = $max - $min;
                // echo "<h5> $moyen </h5>" ;
                // echo "<h5> $CalibreType </h5>" ;
            } 	       
            if($moyen <= 150){
                if($moyen <= $Table[0] -> borne_maximale ){
                    $Totale[0] = $moyen;
                    $TotaleHT[0] = $moyen * $Table[0] -> prix_unitaire;
                    //tva
                    // $Totale_TVA = $Totale * $tva + $tambre;
                }
                elseif($moyen <= $Table[1] -> borne_maximale && $moyen >= $Table[1] -> borne_minimale){
                    $Totale[0] = 100;
                    $Totale[1] = $moyen - $Totale[0];
                    $TotaleHT[0] = $Totale[0] * $Table[0] -> prix_unitaire;
                    $TotaleHT[1] = $Totale[1] * $Table[1] -> prix_unitaire;
                    //tva
                    // $CTarif2_TVA = $CTarif2 * $tva;
                    // $CTarif1_TVA = $CTarif1 * $tva;
                    // $Totale_TVA = $CTarif2_TVA + $CTarif1_TVA + $tambre;
                    
                }
            }
            else {
                if($moyen <= $Table[2] -> borne_maximale && $moyen >= $Table[2] -> borne_minimale){
                    $Totale[2] = $moyen;
                    $TotaleHT[2] = $moyen * $Table[2] -> prix_unitaire;
                    // $Totale = $moyen * $Table[2] -> prix_unitaire;
                    //tva
                    // $Totale_TVA = ($Totale * $tva) + $tambre;
                }
                elseif ($moyen <= $Table[3]-> borne_maximale && $moyen >= $Table[3] -> borne_minimale) {
                    $Totale[3] = $moyen;
                    $TotaleHT[3] = $moyen * $Table[3] -> prix_unitaire;
                    // $Totale =  $moyen * $Table[3] -> prix_unitaire;
                
                    //tva
                    // $Totale_TVA = ( $Totale * $tva) + $tambre;
                   
                }
                elseif ($moyen <= $Table[4] -> borne_maximale && $moyen >= $Table[4]-> borne_minimale) {
                    $Totale[4] = $moyen;
                    $TotaleHT[4] = $moyen * $Table[4] -> prix_unitaire;
                    // $Totale = $moyen * $Table[4] -> prix_unitaire;
                    //tva
                    // $Totale_TVA = ( $Totale * $tva) + $tambre;
                }
                else{
                    $Totale[5] = $moyen;
                    $TotaleHT[5] = $moyen * $Table[5] -> prix_unitaire;
                    // $Totale = $moyen * $Table[5]-> prix_unitaire;
                    //tva
                    // $CTarif6_TVA = $CTarif6 * $tva;
                    // $CTarif5_TVA = $CTarif5 * $tva;
                    // $Totale_TVA = ( $Totale * $tva) + $tambre;
                }

            }
            // foreach($Totale as $key => $value){
              if($CalibreType == "min"){
                 $TypeCalibre =   $calibre["calibreMin"];
              }
              elseif($CalibreType == "moyen"){
                  $TypeCalibre = $calibre["calibreMoyen"];
              }
              elseif($CalibreType == "max"){
                  $TypeCalibre =  $calibre["calibreMax"];
              }
            // }
        }
        
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="Style.css">
    <title>Document</title>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-dark">
          <a class="navbar-brand" href="#"><img src="logo.png"></a><h3 id="logo">SOLIDAO</h3>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item active">
                <a class="nav-link" href="#"> <span class="sr-only">(current)</span></a>
              </li>
            </ul>
          </div>
  </nav><br><br><br>
  <div class="container bg-warning">
  <br><br>
    <form action="index.php" method="POST">
      <div class="row row1">
        <div class="col-12 col-md-6 col-lg-3">
          <label for="fname">Ancien index</label>
        </div>
        <div class="col-12 col-md-6 col-lg-9">
          <input type="text" id="fmax" name="max" placeholder="Your max..">
        </div>
      </div>
      <div class="row row1">
        <div class="col-12 col-md-6 col-lg-3">
          <label for="fname">Nouvel index</label>
        </div>
        <div class="col-12 col-md-6 col-lg-9">
          <input type="text" id="fmin" name="min" placeholder="Your min..">
        </div>
      </div>
      <br>
      <div class="row row1">
        <div class="col-12 col-md-2 col-lg-3">
          <label for="fname">Calibre</label>
        </div>
        <div class="col-12 col-md-10 col-lg-9">
          <input type="radio" name="Calibre" value="min"  class="type">minimale
          <input type="radio" name="Calibre" value="moyen"  class="type">moyen
          <input type="radio" name="Calibre" value="max"  class="type">maximale
        </div>
      </div>           
      <div class="row row1">
        <div class="col-10 col-md-3 col-lg-6">
          
        </div>
        <div class="col-8 col-md-3 col-lg-3">
          <input type="submit" value="Submit" name='Submit'>
        </div>
        <div class="col-2 col-md-3 col-lg-1">
          <input type='submit' onclick="btnprint()" value='Print' id="btnPrint" class="btn1" >
        </div>
      </div> <div class="row row1">      
      </div>
    </form>
    <br><br>
  </div>
  <br><br>
  <?php 
    if(isset($_POST["Submit"])){
  ?>
  <div class="container mt-3 table-responsive table1" id="table1">
    <div class=" divNav row " >
      <?php 
      if(isset($_POST["Submit"])){ ?>
        <div class="col-4 col-md-6 col-lg-3 d-flex justify-content-center" >Ancien index : <?php echo $max ?></div>
        <div class="col-5 col-md-6 col-lg-5 d-flex justify-content-center">Nouvel index : <?php echo $min ?></div>
        <div class="col-3 col-md-6 col-lg-4 d-flex justify-content-center">Consommation : <?php echo $moyen ?></div>
      <?php
            }
      ?>
    </div>
    
    <table  class="table table-borderless table1">
      <thead>
        <tr>
          <th></th>
          <th > مفوتر<br>
              Facturé</th>
          <th>س.و<br>
              P.U</th>
          <th>المبلغ د.إ.ر<br>
              Montant HT</th>
          <th>ض.ق.م<br>
              Taux TVA</th>
          <th>مبلغ الرسوم<br>
              Montant Taxes</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>CONSOMMATION ELECTRICITE</td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td>إستھلاك الكھرباء</td>
        </tr>
      <?php 
      if(isset($_POST["Submit"])){
        foreach($Totale as $key => $value){
      ?>
        <tr>
            <td></td>
            <td><?php echo $value ?></td>
            <td><?php echo $Table[$key]->prix_unitaire ?></td>
            <td><?php echo $TotaleHT[$key] ?></td>
            <td><?php echo $tva . "%";?></td>
            <td><?php echo $TotaleHT[$key] * $tva /100 ?></td>
        </tr>
        <?php
            }
        }
        ?>
        <?php 
          if(isset($_POST["Submit"])){
        ?>
        <tr>
          <td> REDEVANCE FIXE ELECTRICITE</td>
          <td></td>
          <td></td>
          <td><?php echo $TypeCalibre?></td>
          <td><?php echo $tva . "%";?></td>
          <td><?php echo $TypeCalibre * $tva /100 ?></td>
          <td> إثاوة   ثابتة الكھرباء </td>
        </tr>
        <?php
        }
        ?>
        <tr>
          <td>TAXES POUR LE COMPTE DE L’ETAT</td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td>الرسوم المؤداة لفائدة الدولة </td>
        </tr>
        <?php 
          if(isset($_POST["Submit"])){
        ?>
        <tr>
          <td class="text-secondary">TOTAL TVA</td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td><?php echo $SOUS_Toatla = ($TotaleHT[$key] * $tva /100)+ ($TypeCalibre * $tva /100)?></td>
          <td class="text-secondary">مجموع ض.ق.م</td>
        </tr>
        <?php
        }
        ?>
        <?php 
        if(isset($_POST["Submit"])){
        ?>
        <tr>
          <td class="text-secondary"> TIMBRE</td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td><?php echo $tambre?></td>
          <td class="text-secondary">الطابع</td>
        </tr>
        <?php
        }
        ?>
        <?php 
          if(isset($_POST["Submit"])){
        ?>
        <tr>
          <td>SOUS-TOTAL</td>
          <td></td>
          <td></td>
          <td><?php echo $SOUS_THT=$TotaleHT[$key] + $TypeCalibre ?></td>
          <td></td>
          <td><?php echo $SOUS_T=$SOUS_Toatla + $tambre?></td>
          <td>المجموع الجزئي</td>
        </tr> 
        <?php
        }
        ?>
        <br><br> <?php 
          if(isset($_POST["Submit"])){
        ?>
        <tr>
          <td>TOTAL ÉLECTRICITÉ</td>
          <td></td>
          <td></td>
          <td></td>
          <td><?php echo $SOUS_T + $SOUS_THT?></td>
          <td></td>
          <td>مجموع  الكھرباء</td>
        </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
  </div>
  <?php
        }
        ?>
  <iframe name="print_frame" width="0" height="0" frameborder="0" src="about:blank">
        
  </iframe>
  <script>
     function btnprint(){
            window.frames["print_frame"].document.body.innerHTML =   
            document.getElementById("table1").innerHTML;
            window.frames["print_frame"].window.focus();
            window.frames["print_frame"].window.print();
        } 
  </script>
</body>
</html>