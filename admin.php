<?php include 'functions.php'; ?>
<?php
$password = $_POST["password"];
$navn = $_POST["navn"];
if (isset($_POST["Login"])) {
  if (login($conn, $navn, $password) === true){
    $_SESSION["loggedin"] = true;
    if (checkbraxit($conn, $navn) === true) {
      $_SESSION["admin"] = true;
    }
    elseif (checkbraxit($conn, $navn) === false) {
      echo 'Du skal være admin for at tilgå denne side';
    }
  }
  elseif (login($conn, $navn, $password) === false)
   {
    ?>
    <p><b>DU BLEV IKKE LOGGET IND DA PASSWORD/BRUGER VAR FORKERT</b></p>
    <?php
  }
}
 ?>
<!DOCTYPE html>
<html>
<head>
  <title>Braxit A/S Admin</title>
</head>
<body>
  <?php
  if ($_SESSION["admin"] === true) {
  ?>
  <h1>Admin-panel</h2>
  <h2>Produkter</h2>
  <a href="nytprodukt.php">Nyt produkt</a>
  <table>
  <tr>
      <th>ID</th>
      <th>Navn</th>
      <th>Funktion</th>
  </tr>
  <?php
  $query = mysqli_query($conn, "SELECT * FROM Varer ORDER BY id ASC") or die(mysqli_error($conn));
  while ($produkt = mysqli_fetch_assoc($query)) {
    echo '<tr>';
              echo '<td>'.$produkt['id'].'</td>';
              echo '<td>'.$produkt['navn'].'</td>';
              ?>

              <td>
                  <a href="redigerprodukt.php?id=<?php echo $produkt['id'];?>">Rediger</a> |
                  <a href="sletprodukt.php?id=<?php echo $produkt['id'];?>">Slet</a>
              </td>
           <?php
              echo '</tr>';
     ?>
  <?php } ?>
  </table>


  <h2>Brugere</h2>
  <a href="newuser.php">Ny bruger</a>
  <table>
  <tr>
      <th>ID</th>
      <th>Navn</th>
      <th>Funktion</th>
  </tr>
  <?php
  $query = mysqli_query($conn, "SELECT * FROM Kunder ORDER BY id ASC") or die(mysqli_error($conn));
  while ($kunde = mysqli_fetch_assoc($query)) {
    echo '<tr>';
              echo '<td>'.$kunde['id'].'</td>';
              echo '<td>'.$kunde['navn'].'</td>';
              ?>

              <td>
                  <a href="edituser.php?id=<?php echo $kunde['id'];?>">Rediger</a> |
                  <a href="deleteuser.php?id=<?php echo $kunde['id'];?>">Slet</a>
              </td>
           <?php
              echo '</tr>';
  	 ?>
  <?php } ?>
  </table>

  <h2>Ordrer</h2>
  <table>
  <tr>
      <th>Kunde ID</th>
      <th>Vare</th>
      <th>Antal</th>
      <th>Pris</th>
      <th>Adresse</th>
      <th>Dato</th>
  </tr>
  <?php
  $query = mysqli_query($conn, "SELECT * FROM Ordrer ORDER BY id ASC") or die(mysqli_error($conn));
  while ($order = mysqli_fetch_assoc($query)) {
    echo '<tr>';
              echo '<td>'.$order['kunde'].'</td>';
              echo '<td><a href="vare.php?id='.$order['vare'].'">'.$order['vare'].'</a></td>';
              echo '<td>'.$order['antal'].'</td>';
              echo '<td>'.$order['pris'].'</td>';
              echo '<td>'.$order['adresse'].'</td>';
              echo '<td>'.$order['dato'].'</td>';
              ?>
           <?php
              echo '</tr>';
     ?>
  <?php } ?>
  </table>

  <?php }
  else {
   ?>
   <form action="" method="post">
     Brugernavn:<input type="text" name="navn"/>
     Password:<input type="password" name="password"/>
     <input type="submit" name="Login" value="Login"/>
   </form>

   <?php }
   ?>
 </body>
 </html>
