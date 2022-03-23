<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../stylesheet/style.css" />
    <title>forside</title>
</head>
<body>
   <?php include ('../modules/header.php');?>
   <div class="pageStructureFront">
      <div class="exerciseDivFront">
        <div style="display: flex; align-items: center; flex-direction: column; width: 90%; background-color: azure; border-radius: 10px;">
          <h2>Vælg et spil</h2>
          <form action="gaetettal.html">
            <input class="inputFront" type="submit" value="Gæt et tal">
        </form>
          <!-- <button><a href="gaetettal.html">Gætettal</a></button> -->
        </div>
   
      </div>
     
  </div>
   <?php include ('../modules/footer.php');?>
</body>
</html>