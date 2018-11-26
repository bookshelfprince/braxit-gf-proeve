<?php include 'connection.php'; ?>
<!DOCTYPE html>
<html>
  <head>
    <title>Braxit A/S</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
  					<h1 style="width:191; height: 30;">Vores vare</h1> <br />
  					<p>Braxit A/S er en dansk virksomhed med en stærk international platform. Vi producerer og markedsfører drikkevarer og maltbaserede ingredienser. Vores forretning er baseret på stærke værdier, der er skabt gennem fem generationers familieejet og -ledet virksomhed. Vores resultater skabes gennem intensivt fokus på kvalitet, innovation og stadig mere effektiv udnyttelse af teknologi og ressourcer.

Det er kvaliteten af vores produkter og værdien af vores varemærker, der er fundamentet for den fortsatte værdiskabelse i Braxit A/S. Det arbejder vi målrettet på at udfolde gennem en massiv international salgsindsats og positionering af vores virksomhed.</p>
  				</div>
  				<div class="news">
  					<h1 style="width: 69; height: 30;">Nyheder</h1><br />
  					<?php include 'nyheder.php'; ?>
  				</div>
  				<div id="items">
            <?php
            $query = mysqli_query($conn, "SELECT * FROM Varer") or die(mysqli_error($conn));
            $vare = array();
            while ($vare = mysqli_fetch_array($query)) {
              $varer[] = $vare;
            }
            foreach ($varer as $vare)
            {
              ?>
  					<div class="item">
  						<img src="<?php echo $vare["billede"]; ?>" width="202" height="173" /><br />
  						<span><?php echo $vare["pris"]; ?>kr pr. kasse</span><a href="vare.php?id=<?php echo $vare["id"]; ?>" class="buy">Mere info</a>
  					</div>
            <?php } ?>
  				</div>
  			</div>
  		</div>
  	</div>
  	<div id="footer">																																																																																																																																									<div class="inner_copy"><a href="http://www.business.com/web-design/top-7-professional-website-builders-for-small-businesses/">Top 7 Professional Website Builders for Small Businesses</a></div>
  		<div id="footer_inside">
  			<ul class="footer_menu">
          <?php include 'nav.php'; ?>
          <li style="margin-left: 800px;">kontakt@braxit-web.dk</li>
  			</ul><br /><br />
        <div style="text-align: right;">
          <a href="admin.php"><img src="http://www.clker.com/cliparts/z/x/c/h/u/8/black-pi-hi.png" width="5px" height="5px"/></a>
        </div>
  		</div>
  	</div>
  </body>
</html>
