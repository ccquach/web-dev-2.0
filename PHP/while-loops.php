<?php

  $i = 0;
  while ($i < 10) {
    echo $i."<br>";
    $i++;
  }

  echo "<br><br>";

  $j = 5;
  while ($j <= 50) {
    echo $j."<br>";
    $j += 5;
  }

  echo "<br><br>";

  $i = 1;
  while ($i <= 10) {
    $j = $i * 5;
    echo $j."<br>";
    $i++;
  }
  
  echo "<br><br>";

  $dogs = array('terrier', 'cocker spaniel', 'labrador', 'dachshund');
  $i = 0;
  while ($i < sizeof($dogs)) {
    echo $dogs[$i]."<br>";
    $i++;
  }

?>
