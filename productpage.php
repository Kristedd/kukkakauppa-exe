<?php session_start();
include "productpageselect.php"?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <meta charset="UTF-8">
  <title><?=$pd["name"]?></title>
  <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/menubar.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">

</head>
<body>
  <!-- Header -->

<?php
include "menu.php";

?>
  <!-- main page -->
  <div id="side-bar">
    <ul>
      <li> <a href="sisakasvit.html">Sisäkasvit</a></li>
      <li> <a href="ulkokasvit.html">Ulkokasvit</a></li>
      <li> <a href="tyokalut.html">Työkalut</a></li>
      <li> <a href="kasvienhoito.html">Kasvienhoito</a></li>
      </ul>
  </div>
  <div id="tuote-main">
    <div id="header">
    <h1></h1>
  </div>

  <div class="productpic">
    <img src="<?=$pd["meta"][1]?>" alt="">

  </div>
  <div class="productinfo">
    <div class="productname">
      <p><?=$pd["name"]?></p>
    </div>
    <div class="productprice">
      <p><?=$pd["price"]?></p>
    </div>
    <div class="productaddtocart">
      <p>+</p>
    </div>
  </div>
<?php
  if(!empty($pd["meta"][2])) {
    echo "<div class=\"productdesc\">
    <p>" . $pd["meta"][2] . "</p>
    </div>";
  } else {
     echo "<div class=\"productdesc\">
     <p>Ei kuvausta...</p>
     </div>";
   }
    ?>
  </div>





  </div>
  <!-- Footer -->
  <div id="footer">


  </div>
</body>
</html>
