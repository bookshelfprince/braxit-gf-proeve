
<?php include 'functions.php'; ?>
<?php
$vare = $_GET["id"];
$kunde = $_POST["kunde"];
$adresse = $_POST["adresse"];
$antal = $_POST["antal"];
$antal = intval($antal);
$varepris = $_POST["pris"];
$varepris = intval($varepris);
$pris = $antal * $varepris;
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Braxit A/S</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
  </head>
  <body>
    <div id="header">																																																																																																										<div class="inner_copy"><a href="http://ecommercebuilders.blogspot.com/">best ecommerce platforms & website builderss</a></div>
  		<div id="header_inside">
  			<img src="images/header.jpg" width="999" height="222" border="0" /><br />
  			<ul id="menu">
          <?php include 'nav.php'; ?>
  			</ul>
  		</div>
  	</div>
  	<div id="wrapper">																																																																																																								<div class="inner_copy"><a href="http://www.mgwebmaster.com/free-website-builders/">http://www.mgwebmaster.com/free-website-builders/</a></div>
  		<div id="content_inside">
  			<div id="sidebar">
  				<h2 style="width: 174; height: 30;">Kategorier</h2><br />
  				<ul id="list">
            <?php include 'categories.php'; ?>
  				</ul>
  			</div>
  			<div id="main_block">
  				<div class="about">
            <?php
            if (isset($_SESSION["loggedin"])) {
            $bestil = "INSERT INTO Ordrer (adresse, kunde, vare, antal, pris) VALUES ('$adresse', '$kunde', '$vare', '$antal', '$pris')";
            mysqli_query($conn, $bestil) or die (mysqli_error($conn));
            echo 'Du har nu bestilt<br/>';
            } ?>
  				</div>
  				<div class="news">
  					<h1 style="width: 69; height: 30;">Nyheder</h1><br />
  					<?php include 'nyheder.php'; ?>
  				</div>

  			</div>
  		</div>
  	</div>
  	<div id="footer">																																																																																																																																									<div class="inner_copy"><a href="http://www.business.com/web-design/top-7-professional-website-builders-for-small-businesses/">Top 7 Professional Website Builders for Small Businesses</a></div>
  		<div id="footer_inside">
  			<ul class="footer_menu">
          <?php include 'nav.php'; ?>
  			</ul><br /><br />
  		</div>
  	</div>
  </body>
</html>
