<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../stylesheet/style.css" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script type="text/javascript" src="../modules/script.js"></script>
  <title>Fortidsminder</title>
</head>

<body>
  <?php include('../modules/header.php'); ?>
  <div class="pageStructure">
    <div class="boxdiv">
      <div class="paragrahStructure">
        <h1>Find Fortidsminde nær dig</h1>
        <p>Udfyld felterne nedenfor, og find de Fortidsminder der er nærmest dig</p>
      </div>
    </div>
    <div class="boxdiv">
      <div class="searchBox">
        <form class="inputFrom" action="fortidsminder.php" method="POST">
          <div class="searchInputLabel">
            <label class="labelstructure">Indtast vejnavn</label>
            <input name="vejnavn" type="text" placeholder="Vejnavn">
          </div>
          <div class="searchInputLabel">
            <label class="labelstructure">Indtast husnr</label>
            <input name="husnr" type="text" placeholder="Husnr">
          </div>
          <div class="searchInputLabel">
            <label class="labelstructure">Indtast postnummer</label>
            <input name="postnummer" type="text" placeholder="Postnummer">
          </div>
          <div class="searchInputLabel">
            <label class="labelstructure">Indtast afstand (meter)</label>
            <input name="afstand" type="text" placeholder="Max afstand" min="0">
          </div>
          <br>
          <div class="searchInputLabel">
            <input class="inputFront" name="submit" type="submit" value="Find fortidsminde">
          </div>
        </form>
      </div>
    </div>

    <div class="boxdiv">
      <div class="paragrahStructure">
        <h3>Nærmeste Fortidsminder</h3>
      </div>
    </div>
    <div class="boxdiv">
      <form>
        <select name="data" onchange="showData(this.value)">
          <option>-- Vælg Fortidsminde --</option>
          <?php
          include "form_handler.php";
          foreach ($data_circle as $data) {
            $navn = $data->primærtnavn;
            $id = $data->id;
            echo "<option value='" . $id . "'>" . $navn . "</option>";
          }
          ?>
        </select>
      </form>

    </div>
    <div class="boxdiv">
      <div class="searchBoxTable">
        <div class="table-responsive">
          <div id="dataTable"></div>

        </div>
      </div>
    </div>

    <div class="boxdiv">
      <div class="paragrahStructureTable">
        <h3>Restauranter/forplejningsmuligheder i nærheden</h3>
      </div>
    </div>
    <div class="boxdiv">
      <form>
        <select name="data" onchange="showData1(this.value)">
          <option>-- Vælg Restaurant --</option>
          <?php
          include "form_handler.php";
          foreach ($xml->children() as $child) {
            if ($child->brancheKode == "DD.56.10.99" && $child->postnr == $_POST['postnummer']) {
              $navn = $child->navn1;
              // var_dump($navn);
              echo "<option value='" . $navn . "'>" . $navn . "</option>";
            }
          }
          ?>
        </select>
      </form>
    </div>
    <div class="boxdiv">
      <div class="searchBoxTable">
        <div class="table-responsive">
          <div id="dataTable1"></div>

        </div>
      </div>
    </div>
  </div>
  <?php include('../modules/footer.php'); ?>

</body>

</html>