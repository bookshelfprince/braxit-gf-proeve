<?php include 'functions.php';
$id = $_GET["id"];
$query = "DELETE FROM Varer WHERE id='$id'";
$result = mysqli_query($conn, $query);
if ($result) {
  echo 'slettet';
  echo '<script>window.location.replace("admin.php")</script>';
}
?>
