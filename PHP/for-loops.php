<?php

for ($i = 2; $i <= 30; $i += 2) {
  echo $i."<br>";
}

echo "<br><br>";

for ($j = 10; $j >= 0; $j--) {
  echo $j."<br>";
}

echo "<br><br>";

$family = array('Rob', 'Kirsten', 'Tommy', 'Ralphie');
foreach ($family as $key => $value) {
  // $value = $value." Percival";
  $family[$key] = $value." Percival";
  echo "Array item ".$key." is ".$value."<br>";
}

echo "<br><br>";

for ($i = 0; $i < sizeof($family); $i++) {
  echo $family[$i]."<br>";
}

?>
