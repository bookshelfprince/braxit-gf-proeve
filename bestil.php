<?php include 'functions.php'; ?>
<?php
$id = $_GET["id"];
if (isset($_POST["Login"])) {
  $navn = $_POST["navn"];
  $password = $_POST["password"];
  if (login($conn, $navn, $password) === true){
    $_SESSION["loggedin"] = true;
    $query2 = mysqli_query($conn, "SELECT id FROM Kunder WHERE navn='$navn'") or die(mysqli_error($conn));
    $kunde = array();
    while ($kunde = mysqli_fetch_array($query2)) {
      $kunder[] = $kunde;
    }
    foreach ($kunder as $kunde)
    {
     $_SESSION["id"] = $kunde["id"];
    }
    echo '<script>window.location.replace("bestil.php?id='.$id.'");</script>';
  }
  else {
    ?>
    <p><b>DU BLEV IKKE LOGGET IND DA PASSWORD/BRUGER VAR FORKERT</b></p>
    <?php
  }
}
 ?>
<!DOCTYPE html>
<html>
  <head>
    <title>Braxit A/S</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
    <style>
    #main_block{

    font-size:11px;
    color:#464646;
    overflow:hidden;
    float:left;
    width:1000px;
    }
    </style>
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
  			<div id="main_block">
  				<div class="about">
  					<h1 style="width:191; height: 30;"><?php echo $vare["navn"]; ?></h1> <br />
            <img src="<?php
            if(isset($vare["billede"])) {
            echo $vare["billede"];
          }
          else {
            echo 'https://www.dreamboxsireland.com/wp-content/uploads/2016/03/Process-Order-when-Items-are-Out-of-Stock.png';
          }
            ?>" width="300" height="200" /><br />
  					<p><?php echo $vare["beskrivelse"]; ?></p>
  				</div>
  				<div class="news">
  					<h1 style="width: 69; height: 30;">Nyheder</h1><br />
  					<?php include 'nyheder.php'; ?>
  				</div>
  				<div id="items">
            <?php
              if (isset($_SESSION["loggedin"])) {
                $query = mysqli_query($conn, "SELECT * FROM Varer WHERE id='$id'") or die(mysqli_error($conn));
                $vare = array();
                while ($vare = mysqli_fetch_array($query)) {
                  $varer[] = $vare;
                }
                foreach ($varer as $vare)
                {
                  $kunde = $_SESSION["id"];
                  $kunde = mysqli_real_escape_string($conn, $kunde);
                  ?>
            <form action="bestilt.php?id=<?php echo $id ?>" method="post">
              Antal <?php echo $vare["navn"]; ?> pr. kasse: <input type="text" name="antal"/><br/>
              Adresse(Vejnavn, nummer, by, postnummer): <input type="text" name="adresse"/><br/>
              <input type="hidden" name="kunde" value="<?php echo $kunde; ?>"/>
              <input type="hidden" name="pris" value="<?php echo $vare["pris"]; ?>"/>
              <input type="submit" name="bestil" value="Bestil"/>
            </form>

            <?php } }
            else {
             ?>
             <form action="bestil.php?id=<?php echo $id ?>" method="post">
               Virksomhedsnavn:<input type="text" name="navn"/>
               Password:<input type="password" name="password"/>
               <input type="submit" name="Login" value="Login"/>
             </form>

             <?php }
             ?>
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
