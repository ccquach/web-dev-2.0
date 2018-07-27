<?php
  if ($_GET['city']) {
    // Get city name from form
    $city = str_replace(" ", "-", $_GET['city']);

    // Define URL and get doc
    define('URL', "https://www.weather-forecast.com/locations/$city/forecasts/latest");
    $doc = new DOMDocument();
    $doc -> loadHTML(file_get_contents(URL));
    
    // Find weather 1-3 days forecast
    $finder = new DomXPath($doc);
    $classname="b-forecast__table-description-content";
    $nodes = $finder -> query("//*[contains(concat(' ', normalize-space(@class), ' '), ' $classname ')]");
    $data = $nodes -> item(0) -> nodeValue;

    // display weather data or error message
    if ($data) $weather = '<div class="alert alert-info">'.$data.'</div>';
    else $weather = '<div class="alert alert-danger">That city could not be found.</div>';
}
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Weather Scraper</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css"       integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
  <link rel="stylesheet" href="./style.css">
</head>

<body>

  <div class="container">
    <div class="row align-items-center">
      <div class="col-sm-6 offset-sm-3 text-center">

        <header class="mb-3">
            <h1>
              <i class="fas fa-sun mb-4"></i>
              What's the Weather?
            </h1>
        </header>

        <main>
          <form method="get" class="mb-5">
            <div class="form-group">
              <label for="city">Enter the name of a city:</label>
              <input type="text" class="form-control" id="city" name="city" placeholder="Eg. London, Tokyo" autofocus>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary btn-block">Submit</button>
            <!-- Loading State Button -->
            <button type="button" class="btn btn-primary btn-block" disabled>
              <span class="mr-1">Loading</span>
              <i class="fas fa-spinner"></i>
            </button>
          </form>

          <!-- Weather forecast -->
          <p class="city">
            <?php echo $_GET['city'] ?>
          </p>
          <div class="weather">
            <?php echo $weather ?>
          </div>
        </main>

      </div>
    </div>
  </div>

  <script
    src="https://code.jquery.com/jquery-3.3.1.min.js"
    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous"></script>
  <script>
    $(document).ready(function() {
      $('button[type="submit"]').css('display', 'block');
      $('button[type="button"]').css('display', 'none');

      $('form').submit(function() {
        $('button[type="submit"]').css('display', 'none');
        $('button[type="button"]').css('display', 'block');
      });
    });
  </script>
</body>

</html>