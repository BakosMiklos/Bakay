<?php

function ido($varos){

    // Adatok betöltése
    $cp=fopen("https://api.openweathermap.org/data/2.5/weather?q=".$varos."&units=metric&lang=hu&appid=cb9d90cacab0b7302686aab85a55f78b" , "r");

    $adatok=fread($cp,1024);

    $adat_decod=json_decode($adatok);

    $hofok = $adat_decod -> main -> temp;

    $datum=date("Y.m.d");   

    $para=$adat_decod -> main -> humidity;

    $szel=$adat_decod->wind->speed;
    $szel=$szel*3.6;

    $szelirany=$adat_decod->wind->deg;

    print("<br><br><br>Város: ".$varos."<br>");
    print("Hőfok: ".$hofok."°C<br>");
    print("Dárum: ".$datum."<br>");
    print("Pára: ".$para."%<br>");
    print("Szél: ".$szel."km/h<br>");
    print("Szélirény: ".$szelirany."°<br>");
    require("kapcs.inc.php");
    
    $sql="INSERT INTO `idoj`(`varos`, `datum`, `hofok`, `para`, `szel`, `szelirany`) VALUES ('".$varos."','".$datum."','".$hofok."','".$para."','".$szel."','".$szelirany."')";

    if ($con->query($sql) === TRUE) {
        echo "New record created successfully";
      } else {
        echo "Error: " . $sql . "<br>" . $con->error;
      }
      
      $con->close();; 
}



$varos="Budapest,hu";
ido($varos);
$varos="Szolnok,hu";
ido($varos);
$varos="Újfehértó,hu";
ido($varos);
$varos="Győr,hu";
ido($varos);
$varos="Miskolc,hu";
ido($varos);
?>