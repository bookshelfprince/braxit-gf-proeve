<?php
/* Start session */
session_start();

/* Inkluder connection til database */
include 'connection.php';
/* Slut */

/* Krypter password */
function encrypt ($conn, $password)
{
  $password = password_hash($password, PASSWORD_BCRYPT);
  return $password;
}
/* Slut */

/* Tjek eksisterende brugere (brug if (count == 1))*/
function checkuser ($conn, $navn)
{
$navn = mysqli_real_escape_string($conn, $navn);
$query = "SELECT * FROM Kunder WHERE navn='$navn'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
if($row['navn'])
{
  return true;
}
else
{
  return false;
}
}
/* Slut */

/* Tilføj bruger */
function adduser ($conn, $level, $navn, $password, $by)
{
  /*
  Levels
  1 = virksomhed
  2 = bruger fra Braxit A/S
  */
$level = mysqli_real_escape_string($conn, $level);
$navn = mysqli_real_escape_string($conn, $navn);
$password = password_hash($password, PASSWORD_BCRYPT);
$by = mysqli_real_escape_string($conn, $by);
$bruger = "INSERT INTO Kunder (level, navn, password, byy)
VALUES ('$level', '$navn', '$password', '$by')";
mysqli_query($conn, $bruger) or die (mysqli_error($conn));
}

/* Slut */

/* Opdater bruger */
function updateuser ($conn, $level, $navn, $by)
{
$navn = mysqli_real_escape_string($conn, $navn);
$by = mysqli_real_escape_string($conn, $by);
$bruger = "UPDATE Kunder SET navn='$navn', byy='$by' WHERE navn='$navn'";
mysqli_query($conn, $bruger) or die (mysqli_error($conn));
}
/* Slut */

/* Login (use if (count == 1))*/
 function login ($conn, $navn, $password)
 {
   $navn = mysqli_real_escape_string($conn, $navn);
   $query = "SELECT * FROM Kunder WHERE navn='$navn'";
   $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
   $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
   $hash = $row["password"];
   /* $password = Bruger input, $hash = database password*/
   $verify = password_verify($password, $hash);
   if ($verify)
     {
       $_SESSION["id"] = $row["id"];
       return true;
     }
     else
     {
       return false;
     }
 }
 /* Slut */

/* Tjek bruger om bruger er fra Braxit A/S (brug if (count == 1))*/
function checkbraxit ($conn, $navn)
{
$check = "SELECT * FROM `Kunder` WHERE `navn`='$navn' AND `level`='2'";
$result = mysqli_query($conn, $check);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
if($row['navn'])
{
  return true;
}
else
{
  return false;
}
}
/* Slut */

/* Produkter */
/* Tilføj bruger */
function addproduct ($conn, $navn, $pris, $billede, $beskrivelse, $kategoriid)
{
$product = "INSERT INTO Varer (navn, pris, billede, beskrivelse, kategoriid)
VALUES ('$navn', '$pris', '$billede', '$beskrivelse', '$kategoriid')";
mysqli_query($conn, $product) or die (mysqli_error($conn));
}

/* Slut */

/* Opdater bruger */
function updateproduct ($conn, $navn, $pris, $billede, $beskrivelse, $kategoriid)
{
$product = "UPDATE Varer SET navn='$navn', pris='$pris', billede='$billede', beskrivelse='$beskrivelse', kategoriid='$kateogriid' WHERE navn='$navn'";
mysqli_query($conn, $product) or die (mysqli_error($conn));
}
/* Slut */
?>
