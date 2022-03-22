<!DOCTYPE html>
<html>

<head>
</head>

<body>
  <form action="#" method="POST">
    <div>
      <input name="vejnavn" type="text" placeholder="Vejnavn">
    </div>
    <div>
      <select>
        <option disabled selected>-- Vælg kommune --</option>
        <?php
        include "../php_lib/connect.php";
        $records = mysqli_query($connect, "SELECT DISTINCT kommunenavn From steder ORDER BY kommunenavn");

        while ($row = mysqli_fetch_array($records)) {
          echo "<option value='" . $row['kommunenavn'] . "'>" . $row['kommunenavn'] . "</option>";
        }
        ?>
      </select>
      </div>
    <div>
      <input name="afstand" type="number" placeholder="Max afstand" min="0">
    </div>
  </form>

  <?php mysqli_close($connect);
  ?>

</body>

</html>