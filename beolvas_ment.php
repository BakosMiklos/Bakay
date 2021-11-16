<?php
function ido($varos) {
    // Adatok betöltése
    $cp = fopen("https://api.openweathermap.org/data/2.5/weather?q=" . $varos . "&units=metric&lang=hu&appid=cb9d90cacab0b7302686aab85a55f78b", "r");

    $adatok = fread($cp,1024);
    $adatok_decod = json_decode($adatok);
    $hofok = $adatok_decod->main->temp;
    $datum = date("Y.m.d");
    $para = $adatok_decod->main->humidity;
    $szel = $adatok_decod->wind->speed;
    $szel = $szel * 3.16;
    $szelirany = $adatok_decod->wind->deg; 

    print("<br>Város: " . $varos . "<br>");
    print("Hőfok: " . $hofok . "°C <br>");
    print("Dátum: " . $datum . "<br>");
    print("Pára: " . $para . "% <br>");
    print("Szél: " . $szel ." km/h <br>");
    print("Szélirány: " . $szelirany. "° <br>");

// Adatbázis kapcsoldás
require("kapcs.inc.php");

$sql="INSERT INTO `idoj`(`varos`, `datum`, `hofok`, `para`, `szel`, `szelirany`) VALUES ('".$varos."','".$datum."','".$hofok."','".$para."','".$szel."','".$szelirany."')";

mysqli_query($con, $sql);
}

$budapest ='Budapest,hu';
ido($budapest);

$debrecen = 'Debrecen,hu';
ido($debrecen);

$gyor = 'Győr,hu';
ido($gyor);

$erd = 'Érd,hu';
ido($erd);
?>