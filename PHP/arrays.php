<?php

$myArray = array('Rob', 'Kirsten', 'Tommy', 'Ralphie');
$myArray[] = 'Katie';
print_r($myArray);
echo $myArray[3];

echo "<br><br>";

$anotherArray[0] = 'pizza';
$anotherArray[1] = 'yogurt';
$anotherArray[5] = 'coffee';
$anotherArray['myFavoriteFood'] = 'ice cream';
print_r($anotherArray);

echo "<br><br>";

$thirdArray = array(
  'France' => 'French', 
  'USA' => 'English', 
  'Germany' => 'German'
);
unset($thirdArray['France']);
print_r($thirdArray);

echo sizeof($thirdArray);

?>
<html lang="en">
  <meta http-equiv="Cache-control" content="no-cache">
</html>