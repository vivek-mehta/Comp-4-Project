<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>Main Page</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>

<body>
  <nav class="cyan" role="navigation">
    <div class="nav-wrapper container"><a id="logo-container" href="#" class="brand-logo">Euler's Method</a>
      <ul class="right hide-on-med-and-down">
        <li><a href="#">Euler's Method</a></li>
        <!--<li><a href="#">Integrating Factor Method</a></li>-->
        <li><a href="#">View ScreenCast</a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">Contact</a></li>
      </ul>

      <ul id="nav-mobile" class="side-nav">
        <li><a href="#">Euler's Method</a></li>
        <!--<li><a href="#">Integrating Factor Method</a></li>-->
        <li><a href="#">View ScreenCast</a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">Contact</a></li>
      </ul>
      <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>
  </nav>


    </div>
  </div>


  <div class="container">
    <div class="section">

      <!--   Icon Section   -->
      <div class="row">
          <?php
          function DE()
          {
            $DeEquation = $_POST["DeEquation"];
            echo $DeEquation;
          }
          //DE()
          function EulerMethod()
          {
            $X0 = $_POST["InitialX"];
            $Y0 = $_POST["InitialY"];
            $StepValue = $_POST["StepVal"];
            $XArray = array($X0);
            $YArray = array($Y0);
            $MaxIterations = $_POST["iterations"];
            //echo "Initial Condtions: ($X0,$Y0)<br>";
            //echo "The Step Value Is $StepValue<br>";
            //echo "DE Equation is $DeEquation<br>";
            for ($i = 0; $i < $MaxIterations; $i++) {
              $NextY = $YArray[$i] + (5*$XArray[$i]+$YArray[$i])*$StepValue;
              array_push($YArray, $NextY);
              $NextX = $XArray[$i]+$StepValue;
              array_push($XArray, $NextX);
            }
            echo "X ";
            print_r($XArray);
            echo "<br><br>";
            echo "Y ";
            print_r($YArray);
          }
          EulerMethod()
        ?>
        </div>

    </div>
    <br><br>

    <div class="section">

    </div>
  </div>

  <footer class="page-footer cyan lighten-2">
    <div class="container">
      <div class="row">
        <div class="col l6 s12">
          <h5 class="white-text">Information</h5>
          <p class="grey-text text-lighten-4">...<br>...<br>...</p>


        </div>
        <div class="col l5 s12 right">
          <h5 class="white-text">Navigation</h5>
          <ul>
            <li><a class="white-text" href="#!">About</a></li>
            <li><a class="white-text" href="#!">Euler's Method</a></li>
            <!--<li><a class="white-text" href="#!">Integrating Factor Method</a></li>-->
            <li><a class="white-text" href="#!">View ScreenCast</a></li>
            <li><a class="white-text" href="#!">Contact</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="footer-copyright">
      <div class="container">
      Made by <a class="yellow-text text-lighten-3" href="http://www.vivek-mehta.com">Vivek Mehta</a>
      </div>
    </div>
  </footer>


  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>

  </body>
</html>
