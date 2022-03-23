<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../stylesheet/style.css" />
    <title>Fortidsminder</title>
</head>
<body>
<?php include ('../modules/header.php');?>

  <form action="fortidsminder.php" method="POST">
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

   <?php include ('../modules/footer.php');?>
</body>
</html>