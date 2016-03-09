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
    <div class="nav-wrapper container"><a id="logo-container" href="#" class="brand-logo">Title?</a>
      <ul class="right hide-on-med-and-down">
        <li><a href="#">Euler's Method</a></li>
        <li><a href="#">Integrating Factor Method</a></li>
        <li><a href="#">View ScreenCast</a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">Contact</a></li>
      </ul>

      <ul id="nav-mobile" class="side-nav">
        <li><a href="#">Euler's Method</a></li>
        <li><a href="#">Integrating Factor Method</a></li>
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
        <br><br>
        <h2 class="header center blue-grey-text">Enter Values For Euler's Method</h2>
        <form class="col s12" action="finalequation.php" method="post">
          <div class="row">
            <div class="input-field col s12">
              <input id="DeEquation" type="text" class="validate" name="DeEquation">
              <label for="DeEquation">Differential Equation f(x, y)</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s6">
              <input id="InitialX" type="text" class="validate" name="InitialX">
              <label for="InitialX">Initial X Value</label>
            </div>
            <div class="input-field col s6">
              <input id="InitialY" type="text" class="validate" name="InitialY">
              <label for="InitialY">Initial Y Value</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12">
              <input id="StepVal" type="text" class="validate" name="StepVal">
              <label for="StepVal">Step Value</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12">
              <input id="TargetXValue" type="text" class="validate" name="TargetXValue">
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
          <p class="grey-text text-lighten-4">...<br>...<br>...</p>


        </div>
        <div class="col l5 s12 right">
          <h5 class="white-text">Navigation</h5>
          <ul>
            <li><a class="white-text" href="#!">About</a></li>
            <li><a class="white-text" href="#!">Euler's Method</a></li>
            <li><a class="white-text" href="#!">Integrating Factor Method</a></li>
            <li><a class="white-text" href="#!">View ScreenCast</a></li>
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
