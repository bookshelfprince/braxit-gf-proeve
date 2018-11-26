<?php include 'functions.php';
if ($_SESSION["admin"] === true) {
$id = $_GET["id"];
if (isset($_POST["opdater"])) {
  $navn = $_POST["navn"];
  $by = $_POST["by"];
    if ($_POST["type"] == "2") {
    /* 2 = admin */
      updateuser($conn, '2', $navn, $by);
      echo '<script>window.location.replace("admin.php")</script>';
    }

    else {
    /* 1 = virksomhed */
      updateuser($conn, '1', $navn, $by);
      echo '<script>window.location.replace("admin.php")</script>';
    }
  }
?>
<!DOCTYPE html>
<html>
<head>
  <title>Opdater bruger</title>
</head>
<body>
  <?php
  $query = "SELECT * FROM Kunder WHERE navn='$navn'";
  $query = mysqli_query($conn, "SELECT * FROM Kunder WHERE id='$id'") or die(mysqli_error($conn));
  $kunde = array();
  while ($kunde = mysqli_fetch_array($query)) {
    $kunder[] = $kunde;
  }
  foreach ($kunder as $kunde)
  {
  ?>
  <form action="" method="post">
    Brugernavn:<input type="text" name="navn" value="<?php echo $kunde["navn"]; ?>"/>
    <select name="type">
    <option value="2">Admin</option>
    <option value="1">Virksomhed</option>
    </select>
    By:<input type="text" name="by" value="<?php echo $kunde["by"]; ?>"/>
    <input type="submit" name="opdater" value="Opdater"/>
  </form>
  <?php } ?>
</body>
</html>
<?php } ?>
