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

  // Get data from API
  $url = "https://api.dataforsyningen.dk/steder?hovedtype=Fortidsminde";

  $json = file_get_contents($url);

  // Convert JSON string into an array // When true, JSON objects will be returned as associative arrays
  $json = json_decode($json, true);

  // Extracting data
  foreach ($json as $data) {

    // Database query to insert data 
    $query .=
      "INSERT INTO steder VALUES 
    ('" . $data["id"] . "','" . $data["hovedtype"] . "', '" . $data["undertype"] . "', '" . $data["primærtnavn"] . "',
    '" . $data["primærnavnestatus"] . "', '" . $data['kommuner'][0]["navn"] . "', '" . $data['kommuner'][0]["kode"] . "', '" . $data['visueltcenter'][0] . "', '" . $data['visueltcenter'][1] . "'); ";

    $table .= '
<tr>
    <td>' . $data["id"] . '</td>
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
  }

  // Display data
  if (mysqli_multi_query($connect, $query)) {
    echo '
<table class="table table-bordered">
<tr>
    <th>ID</th>
    <th>Hovedtype</th>
    <th>Undertype</th>
    <th>Primærtype</th>
    <th>primærnavnestatus</th>
    <th>Kommuner</th>
    <th>kommunekode</th>
    <th>Længdegrader</th>
    <th>Breddegrader</th>
</tr>
';
    echo $table;
    echo '</table>';
  }
  ?>

</body>

</html>