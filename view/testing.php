<!DOCTYPE html>
<html>

<head>
</head>

<body>
  <form action="testing.php" method="POST">
    <div>
      <input name="vejnavn" type="text" placeholder="Vejnavn">
    </div>
    <div>
      <input name="husnr" type="text" placeholder="Husnr">
    </div>
    <div>
      <input name="postnummer" type="text" placeholder="Postnummer">
    </div>

    <div>
      <input name="afstand" type="text" placeholder="Max afstand" min="0">
    </div>
    <div>
      <input name="submit" type="submit" value="Go">
    </div>
  </form>

  <form>
  <select>
    <option>-- Vælg Fortidsminde --</option>
      <?php
      include "form_handler.php";
        foreach($data_circle as $data){
          $navn = $data->primærtnavn;
          echo "<option value='" . $navn . "'>" . $navn . "</option>";
        }
      ?>
    </select>
  </form>

  <?php mysqli_close($connect);
  ?>

</body>

</html>