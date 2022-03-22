<!DOCTYPE html>
<html>

<head>
</head>

<body>

  <form>
    <select>
      <option disabled selected>-- Vælg kommune --</option>
      <?php
      include "../php_lib/connect.php";
      $records = mysqli_query($connect, "SELECT kommune From steder");

      while ($row = mysqli_fetch_array($records)) {
        echo "<option value='" . $row['kommune'] . "'>" . $row['kommune'] . "</option>";
      }
      ?>
    </select>
  </form>

  <?php mysqli_close($connect);
  ?>

</body>

</html>