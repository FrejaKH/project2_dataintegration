<!DOCTYPE html>
<html>

<head>
  <style>
    table {
      width: 100%;
      border-collapse: collapse;
    }

    table,
    td,
    th {
      border: 1px solid black;
      padding: 5px;
    }

    th {
      text-align: left;
    }
  </style>
</head>

<body>

  <?php
  var_dump($q);
  $con = mysqli_connect("localhost", "root", "", "fortidsminderdb");
  if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
  }

  $q = strval($_GET['q']);
  mysqli_select_db($con, "fortidsminderdb");
  $sql = "SELECT * FROM steder WHERE id = '" . $q . "'";
  $result = mysqli_query($con, $sql);

  echo "<table>
<tr>
<th>Navn</th>
<th>Type</th>
<th>Kommune</th>
</tr>";
  while ($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['primærtnavn'] . "</td>";
    echo "<td>" . $row['undertype'] . "</td>";
    echo "<td>" . $row['kommunenavn'] . "</td>";
    echo "</tr>";
  }
  echo "</table>";
  mysqli_close($con);

  ?>
</body>

</html>