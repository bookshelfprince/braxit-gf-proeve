<?php include 'functions.php';
if ($_SESSION["admin"] === true) {
if (isset($_POST["opret"])) {
  $navn = $_POST["navn"];
  $password = $_POST["password"];
  $by = $_POST["by"];
  if (checkuser($conn, $navn) === true){
     	echo '<p><b>Brugernavn er allerede i brug</p></b>';
  }
  else {
    if ($_POST["type"] == "2") {
    /* 2 = admin */
      adduser($conn, '2', $navn, $password, $by);
      echo '<script>window.location.replace("admin.php")</script>';
    }
    else {
    /* 1 = virksomhed */
      adduser($conn, '1', $navn, $password, $by);
      echo '<script>window.location.replace("admin.php")</script>';
    }

  }
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Opret bruger</title>
</head>
<body>
  <form action="" method="post">
    Brugernavn:<input type="text" name="navn"/>
    Password:<input type="password" name="password"/>
    <select name="type">
    <option value="1">Virksomhed</option>
    <option value="2">Admin</option>
    </select>
    By:<input type="text" name="by"/>
    <input type="submit" name="opret" value="Opret"/>
  </form>
</body>
</html>
<?php } ?>
