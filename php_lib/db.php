<html>

<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
</head>

<body>

  <?php

  // Include db settings
  include "connect.php";

  $query = '';
  $table = '';
  // $tal = 500;


  // Get data from API
  $url = "https://api.dataforsyningen.dk/steder?hovedtype=Fortidsminde";

  $json = file_get_contents($url);

  // Convert JSON string into an array // When true, JSON objects will be returned as associative arrays
  $json = json_decode($json, true);

  // Extracting data
  foreach ($json as $data) {
    // if($tal > 0){

 
      $adress = getAdresse($data['visueltcenter'][0], $data['visueltcenter'][1]);
      // Database query to insert data 
      die();
      exit();



    // $query .=
      "INSERT INTO steder(hovedtype, undertype, primærtnavn, primærnavnstatus,
      kommunenavn, kommunekode, længde, bredde) VALUES 
    ('" . $data["hovedtype"] . "', '" . $data["undertype"] . "', '" . $data["primærtnavn"] . "',
    '" . $data["primærnavnestatus"] . "', '" . $data['kommuner'][0]["navn"] . "', '" . $data['kommuner'][0]["kode"] . "', '" . $data['visueltcenter'][0] . "', '" . $data['visueltcenter'][1] . "'); ";
    // var_dump($query);
    
    $table .= '
<tr>
    <td>' . $data["hovedtype"] . '</td>
    <td>' . $data["undertype"] . '</td>
    <td>' . $data["primærtnavn"] . '</td>
    <td>' . $data["primærnavnestatus"] . '</td>
    <td>' . $data['kommuner'][0]["navn"] . '</td>
    <td>' . $data['kommuner'][0]["kode"] . '</td>
    <td>' . $data['visueltcenter'][0] . '</td>
    <td>' . $data['visueltcenter'][1] . '</td>

</tr>
';
// $tal++;
// }
                  }
  // Display data
  if (mysqli_multi_query($connect, $query)) {
    echo '
<table class="table table-bordered">
<tr>
    <th>Hovedtype</th>
    <th>Undertype</th>
    <th>Primærtype</th>
    <th>primærnavnestatus</th>
    <th>Kommuner</th>
    <th>kommunekode</th>
    <th>Længdegrader</th>
    <th>Breddegrader</th>
    <th>Adresse</th>
</tr>
';
    echo $table;
    echo '</table>';
  }
  ?>

</body>
<?php

function getAdresse($længde, $bredde){
  $url = "https://api.dataforsyningen.dk/adresser?cirkel=$længde,$bredde,10";

  $json = file_get_contents($url);

  $json = json_decode($json, true);
  if(empty($json)){
    $url = "https://api.dataforsyningen.dk/adresser?cirkel=$længde,$bredde,25";

    $json = file_get_contents($url);
  
    $json = json_decode($json, true);
    if(empty($json)){
      $url = "https://api.dataforsyningen.dk/adresser?cirkel=$længde,$bredde,50";

      $json = file_get_contents($url);
    
      $json = json_decode($json, true);
    if(empty($json)){
      $url = "https://api.dataforsyningen.dk/adresser?cirkel=$længde,$bredde,100";

      $json = file_get_contents($url);
    
      $json = json_decode($json, true);
      if(empty($json)){
        $url = "https://api.dataforsyningen.dk/adresser?cirkel=$længde,$bredde,200";
  
        $json = file_get_contents($url);
      
        $json = json_decode($json, true);
        if(empty($json)){
          $url = "https://api.dataforsyningen.dk/adresser?cirkel=$længde,$bredde,300";
    
          $json = file_get_contents($url);
        
          $json = json_decode($json, true);
          if(empty($json)){
            $url = "https://api.dataforsyningen.dk/adresser?cirkel=$længde,$bredde,400";
      
            $json = file_get_contents($url);
          
            $json = json_decode($json, true);
            if(empty($json)){
              $url = "https://api.dataforsyningen.dk/adresser?cirkel=$længde,$bredde,500";
        
              $json = file_get_contents($url);
            
              $json = json_decode($json, true);
              if(empty($json)){  
                $url = "https://api.dataforsyningen.dk/adresser?cirkel=$længde,$bredde,700";
          
                $json = file_get_contents($url);
              
                $json = json_decode($json, true);
              }
            }
          }
        }
      }
    }
    }
    
  }
  return $json;

}


?>

</html>