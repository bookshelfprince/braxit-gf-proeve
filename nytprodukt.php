<?php include 'functions.php';
if ($_SESSION["admin"] === true) {
if (isset($_POST["opret"])) {
  $id = $_GET["id"];
  $navn = $_POST["navn"];
  $pris = $_POST["pris"];
  $billede = $_POST["billede"];
  $beskrivelse = $_POST["beskrivelse"];
  $kategoriid = $_POST["kategoriid"];
      addproduct($conn, $navn, $pris, $billede, $beskrivelse, $kategoriid);
      echo '<script>window.location.replace("admin.php")</script>';
    }
?>
<!DOCTYPE html>
<html>
<head>
  <title>Opret produkt</title>
</head>
<body>
  <form action="" method="post">
    Navn:<input type="text" name="navn"/>
    Pris:<input type="text" name="pris"/>
    Billede(url):<input type="text" name="billede"/><br />
    Beskrivelse:<textarea name="beskrivelse"></textarea><br />
  <p>Kategori</p>
    <select name="kategoriid">
    <option value="1">Øl</option>
    <option value="2">Sodavand</option>
    </select>
    <input type="submit" name="opret" value="Opret"/>
  </form>
</body>
</html>
<?php } ?>
