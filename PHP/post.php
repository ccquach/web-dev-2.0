<?php
  print_r($_POST);

  echo "<br><br>";

  $user = strtolower($_POST['name']);
  $usernames = array("bob", "sam", "kate");
  echo $user ?
    in_array($user, $usernames) ? "Welcome back, $user!" : "Sorry $user, not allowed in here." :
    'Please enter your username.';

  echo "<br><br>SOLUTION:<br><br>";

  // solution

  if ($_POST) {
    $family = array("Rob", "Kirsten", "Tommy", "Ralphie");
    $isKnown = false;
    foreach ($family as $value) {
      if ($value == $_POST['name']) {
        $isKnown = true;
      }
    }
    if ($isKnown) {
      echo "Hi there ".$_POST['name']."!";
    } else {
      echo "I dont know you.";
    }
  }
?>

<p>Please enter your username:</p>

<form method="post">
  <input type="text" name="name">
  <input type="submit" value="Submit">
</form>