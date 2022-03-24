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
  $result = mysqli_query($connect, $sql);

  echo "<table class='table table-bordered'>
<tr>
<th>Navn</th>
<th>Type</th>
<th>Adresse</th>
<th>Kommune</th>
</tr>";
  while ($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['primærtnavn'] . "</td>";
    echo "<td>" . $row['undertype'] . "</td>";
    echo "<td>" . $row['adresse'] . "</td>";
    echo "<td>" . $row['kommunenavn'] . "</td>";
    echo "</tr>";
  }
  echo "</table>";
  mysqli_close($connect);

  ?>
</body>

</html>