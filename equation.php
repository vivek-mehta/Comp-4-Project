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
  <script type="text/javascript" src="../comp4/js/googlechart.js"></script>
</head>

<body>
  <nav class="cyan" role="navigation">
    <div class="nav-wrapper container"><a id="logo-container" href="index.html" class="brand-logo">Euler's Method</a>
      <ul class="right hide-on-med-and-down">
        <li><a href="equation.php">Euler's Method</a></li>
        <!--<li><a href="#">Integrating Factor Method</a></li>-->
        <li><a href="ScreenCast.html">View ScreenCast</a></li>
        <li><a href="About.html">About</a></li>
        <li><a href="Contact.html">Contact</a></li>
      </ul>

      <ul id="nav-mobile" class="side-nav">
        <li><a href="equation.php">Euler's Method</a></li>
        <!--<li><a href="#">Integrating Factor Method</a></li>-->
        <li><a href="ScreenCast.html">View ScreenCast</a></li>
        <li><a href="About.html">About</a></li>
        <li><a href="Contact.html">Contact</a></li>
      </ul>
      <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>
  </nav>


    </div>
  </div>


  <div class="container">
    <div class="section">
        <br><br>
        <h2 class="header center blue-grey-text">Enter Values For Euler's Method</h2>
        <form class="col s12" action="finalequation.php" method="post">
          <div class="row">
            <div class="input-field col s12">
              <input id="DeEquation" type="text" class="validate" name="DeEquation" required="">
              <label for="DeEquation">Differential Equation f(x, y)</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s6">
              <input id="InitialX" type="number" class="validate" name="InitialX" required="" step = "any">
              <label for="InitialX">Initial X Value</label>
            </div>
            <div class="input-field col s6">
              <input id="InitialY" type="number" class="validate" name="InitialY" required="" step = "any">
              <label for="InitialY">Initial Y Value</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12">
              <input id="StepVal" type="number" class="validate" name="StepVal" required="" min="0.001" max="10000" step ="any">
              <label for="StepVal">Step Value</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12">
              <input id="TargetXValue" type="number" class="validate" name="TargetXValue" required="">
              <label for="TargetXValue">Target X Value</label>
            </div>
          </div>
          <div class="row">
            <div class="grid-example col s12">
              <button onclick="__doPostBack('ctl00$body$ctl01','')" class="btn waves-effect waves-light" style="display: block; width: 100%;" type="submit" name="action">
                Submit
                <i class="mdi-content-send right"></i>
              </button>
            </div>
          </div>
      </form>
    </div>
  </div>
<br><br><br><br><br>
  <footer class="page-footer cyan lighten-2">
    <div class="container">
      <div class="row">
        <div class="col l6 s12">
          <h5 class="white-text">Information</h5>
          <p class="grey-text text-lighten-4">This website solves first order differential equations<br>using Euler's Method Algorithm to produce an<br>approixmate solution to this differential
equation</p>


        </div>
        <div class="col l5 s12 right">
          <h5 class="white-text">Navigation</h5>
          <ul>
            <li><a class="white-text" href="equation.php">Euler's Method</a></li>
            <!--<li><a class="white-text" href="#!">Integrating Factor Method</a></li> -->
            <li><a class="white-text" href="ScreenCast.html">View ScreenCast</a></li>
            <li><a class="white-text" href="About.html">About</a></li>
            <li><a class="white-text" href="Contact.html">Contact</a></li>
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
