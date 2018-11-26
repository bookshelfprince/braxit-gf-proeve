<?php include 'functions.php';
$id = $_GET["id"];
if ($_SESSION["admin"] === true) {
if (isset($_POST["opdater"])) {
  $navn = $_POST["navn"];
  $pris = $_POST["pris"];
  $billede = $_POST["billede"];
  $beskrivelse = $_POST["beskrivelse"];
  if ($_POST["kategoriid"] == "2") {
  /* 2 = Øl */
    updateproduct($conn, $navn, $pris, $billede, $beskrivelse, '2');
    echo '<script>window.location.replace("admin.php")</script>';
  }

  else {
  /* 1 = Sodavand */
    updateproduct($conn, $navn, $pris, $billede, $beskrivelse, '1');
    echo '<script>window.location.replace("admin.php")</script>';
  }
    }
?>
<!DOCTYPE html>
<html>
<head>
  <title>Opdater produkt</title>
</head>
<body>
  <?php
  $query = mysqli_query($conn, "SELECT * FROM Varer WHERE id='$id'") or die(mysqli_error($conn));
  $produkt = array();
  while ($produkt = mysqli_fetch_array($query)) {
    $produkter[] = $produkt;
  }
  foreach ($produkter as $produkt)
  {
  ?>
  <form action="" method="post">
    Navn:<input type="text" name="navn" value="<?php echo $produkt["navn"]; ?>"/>
    Pris:<input type="text" name="pris" value="<?php echo $produkt["pris"]; ?>"/><br />
    Billede(url):<input type="text" name="billede" value="<?php echo $produkt["billede"]; ?>"/><br />
    Beskrivelse:<textarea name="beskrivelse" value="<?php echo $produkt["beskrivelse"]; ?>"></textarea>
    <p>Kategori</p>
    <select name="kategoriid">
    <option value="2">Øl</option>
    <option value="1">Sodavand</option>
    </select>
    <input type="submit" name="opdater" value="Opdater"/>
  </form>
  <?php } ?>
</body>
</html>
<?php } ?>
