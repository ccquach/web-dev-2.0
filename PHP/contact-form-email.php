<?php

  // data validation
  $error = ""; $successMessage = "";
  if ($_POST) {
    if (!$_POST['email']) {
      $error .= "- An email address is required.<br>";
    }
    if (!$_POST['subject']) {
      $error .= "- A subject is required.<br>";
    }
    if (!$_POST['message']) {
      $error .= "- A message is required.";
    }

    // check for valid email
    if ($_POST['email'] && !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
      $error .= "- The email address is invalid.";
    }

    if ($error != "") {
      // display server-side errors
      $error = '<div class="alert alert-danger" role="alert"><p><strong>There were error(s) in your form:</strong></p>' . $error . '</div>';
    } else {
      // send form if no errors
      $to = "me@domain.com";
      $subject = $_POST['subject'];
      $body = $_POST['message'];
      $headers = "From: ".$_POST['email'];
    
      if (mail($to, $subject, $body, $headers)) {
        $successMessage = '<div class="alert alert-success" role="alert">Your message was sent, we\'ll get back to you ASAP!</div>';
      } else {
        $error = '<div class="alert alert-danger" role="alert">Your message couldn\'t be sent. Please try again later.</div>';
      }
    }
  } 

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PHP Form</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"   integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>

<body>
  <div class="container">
    <div class="row">
      <div class="col-sm-6 col-sm-offset-3">
        <h1>Get in touch!</h1>

          <!-- Email submission status -->
          <div id="error"><?php echo $error.$successMessage; ?></div>

        <form method="post">

          <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
          </div>

          <div class="form-group">
            <label for="subject">Subject</label>
            <input type="text" class="form-control" id="subject" name="subject">
          </div>

          <div class="form-group">
            <label for="message">What would you like to ask us?</label>
            <textarea class="form-control" id="message" name="message" rows="3"></textarea>
          </div>

          <button type="submit" id="submit" class="btn btn-primary">Submit</button>

        </form>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

  <script type="text/javascript">
    $(document).ready(function() {
      $('form').submit(function(e) {
        // e.preventDefault();
        var error = "";

        if ($('#email').val() == "") {
          error += "- An email address is required.<br>";
        }
        if ($('#subject').val() == "") {
          error += "- The subject field is required.<br>";
        }
        if ($('#message').val() == "") {
          error += "- A message is required.";
        }

        if (error != "") {
          $('#error').html(
            '<div class="alert alert-danger" role="alert"><p><strong>There were error(s) in your form:</strong></p>' + error + '</div>'
            return false;
          );
        } else {
          // $('form').unbind('submit').submit();
          return true;
        }
      })
    });
  
  </script>
</body>

</html>