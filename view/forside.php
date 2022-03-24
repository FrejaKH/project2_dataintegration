<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../stylesheet/style.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />

    <title>Forside</title>
</head>
<body>
   <?php include ('../modules/header.php');?>
   <div class="pageStructureFront">
      <div class="exerciseDivFront">
        <div class="welcomegreeting">
          <h1>Velkommen</h1>
          <p>På denne side kan du indtaste en adresse, og få vist de Fortidsminder som er inden for en afstand, som du ønsker</p>
          <form action="fortidsminder.php">
            <input class="inputFront" type="submit" value="Find fortidsminde">
        </form>
        </div>   
      </div>
     
  </div>
   <?php include ('../modules/footer.php');?>
</body>
</html>