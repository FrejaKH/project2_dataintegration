<?php

include "pretty_dump.php";

$vejnavn = $_POST['vejnavn'];
$husnr = $_POST['husnr'];
$postnummer = $_POST['postnummer'];
$afstand = $_POST['afstand'];

$url_adress = "https://api.dataforsyningen.dk/adgangsadresser?vejnavn=" . $vejnavn . "&husnr=" . $husnr . "&postnr=" . $postnummer . "&struktur=mini";
pretty_dump($url_adress);

// create cURL resource
$curl = curl_init($url_adress);

// set cURL options
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.1.2) Gecko/20090729 Firefox/3.5.2 GTB5');
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);

// Execute http request
$page = curl_exec($curl);
$data_adress = json_decode($page);

pretty_dump($data_adress);

$longitude_adress = $data_adress[0]->x;
$latitude_adress = $data_adress[0]->y;

/* --------------------------------------------------------------------------------------------------------------*/

$afstand = $_POST['afstand'];

$url_circle = "https://api.dataforsyningen.dk/steder?hovedtype=Fortidsminde&cirkel=" . $longitude_adress . "," . $latitude_adress . "," . $afstand;

// create cURL resource
$curl2 = curl_init($url_circle);

// set cURL options
curl_setopt($curl2, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl2, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.1.2) Gecko/20090729 Firefox/3.5.2 GTB5');
curl_setopt($curl2, CURLOPT_SSL_VERIFYPEER, 0);

// Execute http request
$page2 = curl_exec($curl2);
$data_circle = json_decode($page2);

pretty_dump($data_circle);

foreach($data_circle as $data){
    $navn = var_dump($data->primærtnavn);

}

 