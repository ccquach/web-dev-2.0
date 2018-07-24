<?php

  print_r($_GET);

  echo "<br><br>";

  echo "Hi there ".$_GET['name']."!";

  echo "<br><br>";

  // prime number
  $num = $_GET['number'];
  if (is_numeric($num) && $num > 1 && $num == round($num, 0)) {
    $isPrimeString = isPrime($num) ? "is a prime!" : "is not a prime.";
    echo $num." ".$isPrimeString;
  } else if ($_GET) {
    echo "<p>Please enter a positive whole number greater than 1.</p>";
  }

  function isPrime($num) {
    for ($i = 2; $i < $num; $i++) {
      if ($num % $i == 0) return false;
    }
    return true;
  }
?>

<p>What's your name?</p>

<form action="#">
  <input type="text" name="name">
  <input type="submit" value="Go!">
</form>

<p>Please enter a whole number</p>

<form action="#">
  <input type="text" name="number">
  <input type="submit" value="Is it prime?">
</form>