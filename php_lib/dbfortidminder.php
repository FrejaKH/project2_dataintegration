  <?php
  // set execution time.
ini_set('max_execution_time', 3600);
  // set memory limit ulimited.
ini_set('memory_limit', '-1');
  // Include db settings
  include "connect.php";

  // Get data from API
  $url = "https://api.dataforsyningen.dk/steder?hovedtype=Fortidsminde";

  $json = file_get_contents($url);

  // Convert JSON string into an array // When true, JSON objects will be returned as associative arrays
  $json = json_decode($json, true);

  // Extracting data
  foreach ($json as $data) {

 
      $adress = getAdresse($data['visueltcenter'][0], $data['visueltcenter'][1]);
      // Database query to insert data 
 
    $sql =
      "INSERT INTO steder(id, hovedtype, undertype, primærtnavn, primærnavnstatus,
      kommunenavn, kommunekode, længde, bredde, adresse) VALUES 
    ('" . $data["id"] . "', '" . $data["hovedtype"] . "', '" . $data["undertype"] . "', '" . $data["primærtnavn"] . "',
    '" . $data["primærnavnestatus"] . "', '" . $data['kommuner'][0]["navn"] . "', '" . $data['kommuner'][0]["kode"] . "', '" . $data['visueltcenter'][0] . "', '" . $data['visueltcenter'][1] . "', '" . $adress[0]['adressebetegnelse'] . "'); ";
    $connect->query($sql);
    }
    $connect->close();
 
  ?>

</body>
<?php

function getAdresse($længde, $bredde){
  $url = "https://api.dataforsyningen.dk/adresser?cirkel=$længde,$bredde,500";

  $json = file_get_contents($url);

  $json = json_decode($json, true);

  return $json;

}

?>