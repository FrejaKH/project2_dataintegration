<html>

<head>
  <script>
    function showData(str) {
      if (str == "") {
        document.getElementById("dataTable").innerHTML = "";
        return;
      } else {
        let xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            document.getElementById("dataTable").innerHTML = this.responseText;
          }
        };
        xmlhttp.open("GET", "abe_handler.php?q=" + str, true);
        xmlhttp.send();
      }
    }
  </script>
</head>


<body>


  <form action="abe.php" method="POST">
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

  <br>
  <div id="dataTable"></div>
</body>

</html>