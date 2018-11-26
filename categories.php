<?php
  $query = mysqli_query($conn, "SELECT * FROM Kategorier") or die(mysqli_error($conn));
  $kategori = array();
  while ($kategori = mysqli_fetch_array($query)) {
    $kategorier[] = $kategori;
  }
  foreach ($kategorier as $kategori)
  {
    ?>
<li class="color"><a href="kategori.php?id=<?php echo $kategori["id"]; ?>"><?php echo $kategori["navn"]; ?></a></li>
<?php } ?>
