<!DOCTYPE html>
<html>

<head>
  <?php include "../php_lib/connect.php"; ?>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
</head>

<body>

  <?php

  $q = strval($_GET['q']);
  $sql = "SELECT * FROM steder WHERE id = '" . $q . "'";
  $sql1 = "SELECT * FROM restaurant WHERE navn = '" . $q . "'";
  $result = mysqli_query($connect, $sql);
  $result1 = mysqli_query($connect, $sql1);

  while ($row = mysqli_fetch_array($result)) {
    echo "<table class='table table-bordered'>";
    echo "<th>Navn</th>";
    echo "<th>Type</th>";
    echo "<th>Adresse</th>";
    echo "<th>Kommune</th>";
    echo "<tr>";
    echo "<td>" . $row['primærtnavn'] . "</td>";
    echo "<td>" . $row['undertype'] . "</td>";
    echo "<td>" . $row['adresse'] . "</td>";
    echo "<td>" . $row['kommunenavn'] . "</td>";
    echo "</tr>";
    echo "</table>";
  }

  while ($row = mysqli_fetch_array($result1)) {
    echo "<table class='table table-bordered'>";
    echo "<th>Navn</th>";
    echo "<th>Adresse</th>";
    echo "<th>By</th>";
    echo "<th>Postnummer</th>";
    echo "<th>Kontrolrapport</th>";
    echo "<tr>";
    echo "<td>" . $row['navn'] . "</td>";
    echo "<td>" . $row['adresse'] . "</td>";
    echo "<td>" . $row['bynavn'] . "</td>";
    echo "<td>" . $row['postnummer'] . "</td>";
    echo "<td>" . $row['kontrolrapport'] . "</td>";
    echo "</tr>";
    echo "</table>";
  }

  mysqli_close($connect);

  ?>
</body>

</html>