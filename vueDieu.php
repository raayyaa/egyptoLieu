<!DOCTYPE html>
<html lang="fr">

<head>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="bootstrap.min.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>



</head>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/egyptoLieu"><img src="logo.png" alt="accueil"></a>

    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="controllerLieu.php">Lieu</a></li>
        <li class="dropdown">
        <li><a href="controllerPharaon.php">Pharaon</a></li>
        <li><a href="controllerDieu.php">Dieu</a></li>
      </ul>

    </div>
  </div>
</nav>
</head>

<body>


<br><br><br>

  <a class='button' href='createDieu.php'>Nouveau</a>


  <div class="container">
    <?php

    foreach ($datarecup as $donnees) {

      echo "<div class='cadre col-md-4'>";
      echo '<div class="photos" style="background:url(./photos/' . str_replace(" ", "", $donnees['NomDieu']) . '.jpg);"> </div>';
      echo "<div class='encart-description'>";
      echo "<p class='title' name='id'>" . $donnees['NomDieu'] . "</p>";
      echo "<p class='description' name='Représentation'>" . $donnees['Représentation'] . "</p>";
      echo "<a class='button' href='Dieu/" . $donnees['NomDieu'] . "/modifier'>Modifier</a>";
      echo "&nbsp";
      echo "<a class='button' href='Dieu/" . $donnees['NomDieu'] . "/delete'>Supprimer</a>";
      echo "</div>";
      echo "</div>";
    }
    ?>

  </div>
</body>

</html>