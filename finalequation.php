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
      <?php
        error_reporting(1);
        $x = $_POST["InitialX"];
        $y = $_POST["InitialY"];
        $InitialX = $_POST["InitialX"];
        $InitialY = $_POST["InitialY"];
        $YArray = array(); // Y Array, holding all y values
        $XArray = array();// X Array holding all x values
        array_push($YArray, $y);// appends initial y value to array
        array_push($XArray, $x);//appends initial x value to array
        $TargetXValue = $_POST["TargetXValue"];
        $StepVal = $_POST["StepVal"];
        $MaxIterations = abs(($TargetXValue-$InitialX)/$StepVal);
        $Grad = 0;
        $InfCheck = 0;
        // This for loop calculates the y values using all the functions
        // and Euler's Method algorithm to work out the approixmate value
        // It calls the DEGetter function which would call the other functions
        // so that it can work out the Gradient value
        for ($i=0; $i < $MaxIterations ; $i++) {
          $x = $XArray[$i];
          $y = $YArray[$i];
          $Grad = DEGetter($x, $y);
          $YNext = $y + $Grad*$StepVal;
          array_push($XArray, ($x+$StepVal));
          array_push($YArray, $YNext);
          $InfCheck = $YArray[$i];
        }
        $DeEquation = $_POST["DeEquation"];
        $DeEquation = strtolower($DeEquation);
        // This function gets the differential equation from the user input
        // Then appends the equation seperatly into an array
        // Calls other functons to calculate gradient for the x and y
        // that is passed through as a parameter
        function DEGetter($x, $y){
          $DeEquation = $_POST["DeEquation"];
          $DeEquation = strtolower($DeEquation);
          $DEArray = array();
          for( $i = 0; $i < strlen( $DeEquation ); $i++ ) {
              $char = substr( $DeEquation, $i, 1 );
              if ($char !== " "){
                array_push($DEArray, $char);
              }
            }
          $Gradient = Brackets(Subtraction(Addition(Multiplication(Division(Indices(Brackets(MathFunc(Substitute(DecimalPoint(Num($DEArray)), $x, $y)), $x, $y)))))), $x, $y);
          return($Gradient[0]);
          }
          // This function concatenates inputs that maybe a math function
          // So it checks if the previous and next elements of an array
          // are in the alapabet if they are they get concatenatted
          // This would be used to work out the value of that math function
          function MathFunc($DEArray){
            $NewChr = "";
            $CurrentIndex = 0;
            $FuncEnd = 0;
            $Stepper = 0;
            $Character = 0;
            while ($Character < count($DEArray)) {
              $Stepper = 0;
              if ((ctype_alpha($DEArray[$Character])) AND (ctype_alpha ($DEArray[$Character+1]))){
                $CurrentIndex = $Character;
                while ((ctype_alpha($DEArray[$CurrentIndex + 1 + $Stepper]))){
                  $Stepper = $Stepper + 1;
                  $FuncEnd = $CurrentIndex + $Stepper;
                }
                for ($i = $CurrentIndex; $i < $FuncEnd+1; $i++){
                  $NewChr = $NewChr.$DEArray[$i];
                }
                array_splice($DEArray, $FuncEnd+1, 0 , $NewChr);
                array_splice($DEArray, $Character, $FuncEnd - $Character+1);
              }
              $Character = $Character + 1;
              $NewChr = "";
            }
            return($DEArray);
          }
          // This function gets the math function that the user may have
          // entered and works out the value the user passed in that
          // math function and returns it as a result
          // if it doesn't find a math function error message is given
          function MathMod($Func, $Val){
            $Result = 0;
            if ($Func === "sin"){
              $Result = sin($Val);
            }
            elseif ($Func === "cos"){
              $Result = cos($Val);
            }
            elseif ($Func === "tan"){
              $Result = tan($Val);
            }
            elseif ($Func === "arcsin"){
              $Result = asin($Val);
            }
            elseif ($Func === "arccos"){
              $Result = acos($Val);
            }
            elseif ($Func === "arctan"){
              $Result = atan($Val);
            }
            elseif ($Func === "sinh"){
              $Result = sinh($Val);
            }
            elseif ($Func === "cosh"){
              $Result = cosh($Val);
            }
            elseif ($Func === "tanh"){
              $Result = tanh($Val);
            }
            elseif ($Func === "arsinh"){
              $Result = asinh($Val);
            }
            elseif ($Func === "arcosh"){
              $Result = acosh($Val);
            }
            elseif ($Func === "artanh"){
              $Result = atanh($Val);
            }
            elseif ($Func === "e"){
              $Result = exp($Val);
            }
            elseif ($Func === "ln"){
              $Result = log($Val);
            }
            return($Result);
          }
          // This function gets the x and y values that are passed through
          // as a parameter of the function and then looks for either
          // an x or y in the array and if it finds any it would replace
          // the x or y with the value that is passed through
          function Substitute($DEArray, $x, $y){
            $Operators = array("^", "/", "*", "+", "-", "(", ")", "");
            $Character = 0;
            $WorkingArray = array();
            $NewChr = "";
            $Value = 0;
            while ($Character < count($DEArray)) {
              if ($DEArray[$Character] === "x"){
                $Value = $x;
                array_splice($DEArray, $Character, 1 , $Value);
              }
              if ($DEArray[$Character] === "y"){
                $Value = $y;
                array_splice($DEArray, $Character, 1 , $Value);
              }
              $Character = $Character + 1;
            }
            return($DEArray);
          }
          // This function concatenates numbers together, it works by
          // finding out if the previous and next elements are both
          // integers and if they are it gets concatenatted together
          function Num($DEArray){
            $NewChr = "";
            $CurrentIndex = 0;
            $IntEnd = 0;
            $Stepper = 0;
            $Character = 0;
            while ($Character < count($DEArray)) {
              $Stepper = 0;
              if ((is_numeric($DEArray[$Character])) AND (is_numeric($DEArray[$Character+1]))){
                    $CurrentIndex = $Character;
                    while ((is_numeric($DEArray[$CurrentIndex + 1 + $Stepper]))){
                      $Stepper = $Stepper + 1;
                      $IntEnd = $CurrentIndex + $Stepper;
                    }
                    for ($i = $CurrentIndex; $i < $IntEnd+1; $i++){
                      $NewChr = $NewChr.$DEArray[$i];
                    }
                    array_splice($DEArray, $IntEnd+1, 0 , $NewChr);
                    array_splice($DEArray, $Character, $IntEnd - $Character+1);
                  }
                  $Character = $Character + 1;
                  $NewChr = "";
                }
                return($DEArray);
              }
          // This function looks for a decimal point sign in the array
          // if it finds one it would need to concate these numbers
          // together as it is one number, it does this by checking
          // if the next element is an integer and keeps on checking until
          // it's not and would concatenate those together
          function DecimalPoint($DEArray){
            $Character = 0;
            $NewChr = "";
            while ($Character < count($DEArray)) {
              if ((is_numeric($DEArray[$Character])) AND ($DEArray[$Character+1] === ".") AND (is_numeric($DEArray[$Character+2]))){
                $NewChr = $DEArray[$Character].$DEArray[$Character+1].$DEArray[$Character+2];
                array_splice($DEArray, $Character, 3 , $NewChr);
              }
              $Character = $Character + 1;
            }
            return($DEArray);
          }
          // This function looks for Brackets in the array and this would mean
          // that the function needs to work out what's in the brackets first
          // so it follows the correct matematical order. It does this by
          // look for a start and end bracket and appends what's in between
          // those two brackets into a working array and it recursivley calls
          // all the functions untill it has worked out what's in the working
          // array which is then placed in the array this function
          // keeps on checking for brackets until it doesn't find anymore
          function Brackets($DEArray, $x, $y){
            $a = 0;
            if (($DEArray[0] === "(" ) AND ($DEArray[count($DEArray) - 1] === ")" )) {
              for ($i=1; $i < count($DEArray) - 1; $i++) {
                $NewChr = $DEArray[$i];
                if ($DEArray[$i] === ")" ){
                  $b = $i;
                  break;
                }
                elseif ($DEArray[$i] === "("){
                  $a = 1;
                  break;
                }
                elseif ($i === count($DEArray)-2) {
                  array_splice($DEArray, 0, 1);
                  array_splice($DEArray, count($DEArray) - 1, 1);
                  $NewChr = Subtraction(Addition(Multiplication(Division(Indices(Brackets($DEArray, $x, $y))))));
                  array_splice($DEArray, 0, count($DEArray), $NewChr);
                  break;
                }
              }
            }
            $NewChr = $DEArray[0];
            while($a < count($DEArray)){
              $WorkingArray = array();
              $NewChr = "";
              if ($DEArray[$a] == "(") {
                $Stepper = 0;
                $b = $a + $Stepper + 1;
                while (($DEArray[$b] != ")") AND ($b < count($DEArray))){
                  $Stepper = $Stepper + 1;
                  $b = $b + 1;
                }
                for ($c = $a+1; $c < $b; $c++){
                  array_push($WorkingArray, $DEArray[$c]);
                }
                $NewChr = Subtraction(Addition(Multiplication(Division(Indices(Brackets($WorkingArray, $x, $y))))));
                if ($DEArray[$a-2] === "e"){
                  $NewChr = MathMod("e", $NewChr[0]);
                  array_splice($DEArray, $a-2, $b-$a+3, $NewChr);
                }
                elseif (ctype_alpha($DEArray[$a-1])) {
                  $NewChr = MathMod($DEArray[$a-1], $NewChr[0]);
                  array_splice($DEArray, $a-1, $b-$a+2, $NewChr);
                }
                else{
                  array_splice($DEArray, $a, $b-$a+1, $NewChr);
                }
              }
              $a = $a + 1;
            }
            return($DEArray);
          }
          // this function looks for an indicies sign that the user gives
          // if it finds one it would work out the value to the power off
          // the other value that the user gave and would then place
          // this value in the array
          function Indices($DEArray){
            $Character = 0;
            $NewChr = "";
            $WorkingArray = array();
            while ($Character < count($DEArray)) {
              if ($DEArray[$Character] === "^"){
                if((is_numeric($DEArray[$Character+1])) AND ($DEArray[$Character+2] === "*")){
                  array_push($WorkingArray, $DEArray[$Character+1]);
                  array_push($WorkingArray, $DEArray[$Character+3]);
                  $NewChr = Multiplication($WorkingArray);
                  array_splice($DEArray, $Character+1, 3 , $NewChr);
                }
                while((is_numeric($DEArray[$Character+1])) AND (is_numeric($DEArray[$Character+2]))){
                  array_push($WorkingArray, $DEArray[$Character+1]);
                  array_push($WorkingArray, $DEArray[$Character+2]);
                  $NewChr = Multiplication($WorkingArray);
                  array_splice($DEArray, $Character+1, 2 , $NewChr);
                }
                $NewChr = pow($DEArray[$Character-1], $DEArray[$Character+1]);
                array_splice($DEArray, $Character-1, 3 , $NewChr);
                $Character = 0;
              }
              $Character = $Character + 1;
            }
            return($DEArray);
          }
          // This function looks for an division sign that the user gives
          // if it finds one it would work out the value before the sign
          // divided by the other value after the sign then it would place
          // this value in the array
          function Division($DEArray){
            $Character = 0;
            $NewChr = "";
            while ($Character < count($DEArray)) {
              if ($DEArray[$Character] === "/" AND (is_numeric($DEArray[$Character-1])) AND (is_numeric($DEArray[$Character+1]))){
                $NewChr = (floatval($DEArray[$Character-1])/floatval($DEArray[$Character+1]));
                array_splice($DEArray, $Character-1, 3 , $NewChr);
                $Character = 0;
              }
              $Character = $Character + 1;
            }
            return($DEArray);
          }
          // This function looks for an Multiplication sign that the user gives
          // if it finds one it would work out the value before the sign
          // multiplied by the other value after the sign then it would place
          // this value in the array
          function Multiplication($DEArray){
            $Character = 0;
            $NewChr = "";
            while ($Character < count($DEArray)) {
              if ($DEArray[$Character] === "*" AND (is_numeric($DEArray[$Character-1])) AND (is_numeric($DEArray[$Character+1]))){
                $NewChr = floatval(($DEArray[$Character-1])*floatval($DEArray[$Character+1]));
                array_splice($DEArray, $Character-1, 3 , $NewChr);
                $Character = 0;
              }
              elseif ((($DEArray[$Character]==="0") OR ($DEArray[$Character+1]==="0")) AND (is_numeric($DEArray[$Character])) AND (is_numeric($DEArray[$Character+1]))){
                array_splice($DEArray, $Character, 2 , 0);
                $Character = 0;
              }
              elseif ((is_numeric($DEArray[$Character])) AND (is_numeric($DEArray[$Character+1]))) {
                $NewChr = (floatval($DEArray[$Character])*floatval($DEArray[$Character+1]));
                array_splice($DEArray, $Character, 2 , $NewChr);
                $Character = 0;
              }
              $Character = $Character + 1;
            }
            return($DEArray);

          }
          // This function looks for an Addition sign that the user gives
          // if it finds one it would work out the value before the sign
          // added by the other value after the sign then it would place
          // this value in the array
          function Addition($DEArray){
            $Character = 0;
            $NewChr = "";
            while ($Character < count($DEArray)) {
              if ($DEArray[$Character] === "+"){
                $NewChr = (floatval($DEArray[$Character-1])+floatval($DEArray[$Character+1]));
                array_splice($DEArray, $Character-1, 3 , $NewChr);
                $Character = 0;
              }
              $Character = $Character + 1;
            }
            return($DEArray);

          }
          // This function looks for an subtraction sign that the user gives
          // if it finds one it would work out the value before the sign
          // subtracted by the other value after the sign then it would place
          // this value in the array
          function Subtraction($DEArray){
            $Character = 0;
            $NewChr = "";
            if ($DEArray[0] === "-"){
              $NewChr = $DEArray[0].$DEArray[1];
              array_splice($DEArray, 0 , 2, $NewChr);
              $NewChr = "";
            }
            while ($Character < count($DEArray)) {
              if ($DEArray[$Character] === "-"){
                $NewChr = ($DEArray[$Character-1]-$DEArray[$Character+1]);
                array_splice($DEArray, $Character-1, 3 , $NewChr);
                $Character = 0;
              }
              $Character = $Character + 1;
            }
            return($DEArray);
          }
      ?>
      <!--<div id="dom-target(X)" style="display: none;">
        <?php
        /*for ($i=0; $i < $MaxIterations; $i++) {
          $X1 = $XArray[$i];
          echo htmlspecialchars($X1);
          echo htmlspecialchars(", ");

        }*/
        ?>
      </div>
      <div id="dom-target(Y)" style="display: none;">
        <?php
        /*for ($i=0; $i < $MaxIterations; $i++) {
          $Y1 = $YArray[$i];
          echo htmlspecialchars($Y1);
          echo htmlspecialchars(", ");
        }*/
        ?>
      </div>-->
      <!--<script>
            var div = document.getElementById("dom-target(X)");
            var myData = div.textContent;
            document.writeln(myData);
        </script>
        <script>
          var div = document.getElementById("dom-target(Y)");
          var myData = div.textContent;
          document.writeln(myData);
        </script>-->
        <center><div id="curve_chart" style="width: 900px; height: 700px"></div></center>
        <script type="text/javascript">
        //BAD VERSION REVERT WHEN GOOGLE FIXES package 44  google.charts.load('current', {'packages':['corechart']});
          google.charts.load('current', {'packages':['corechart']});
          google.charts.setOnLoadCallback(drawChart);
          // This function gets the data that is in the PHP X and Y arrays
          // it would then print them in the data variable so that
          // data would be plotted on the graph using the values that
          // the system calcualted and would then draw the graph
          function drawChart() {
            //console.log("Creating chart");
            var data = google.visualization.arrayToDataTable([
              [' X', 'Y'],
              <?php
              for ($i=0; $i <= $MaxIterations; $i++) {
                $X1 = $XArray[$i];
                $Y1 = $YArray[$i];
                if ($YArray[$i] == "" or $YArray[$i] == INF or $YArray[$i] == -INF){
                  break;
                }
                echo "[" . $X1 . "," . $Y1 . "],";
                echo "\n";
              }
              ?>
             ]);
            var options = {
              title: 'dy/dx = <?php echo($DeEquation); ?>',
              curveType: 'function',
            };
            var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));
            chart.draw(data, options);
          }
        </script>
        <form class="col s12" action="finalequation.php" method="post">
        <div class="row">
          <div class="input-field col s12">
            <input id="StepVal" type="number" class="validate" name="StepVal" required="" min="0.001" max="<?php echo $TargetXValue; ?>" step ="any">
            <label for="StepVal">Step Value</label>
            <input id="DeEquation" type="hidden" name="DeEquation" value="<?php echo $DeEquation;?>">
            <input id="InitialX" type="hidden" name="InitialX" value="<?php echo $InitialX;?>" >
            <input id="InitialY" type="hidden" name="InitialY" value="<?php echo $InitialY; ?>" >
            <input id="TargetXValue" type="hidden" name="TargetXValue" value="<?php echo $TargetXValue; ?>">
          </div>
        </div>
        <div class="grid-example col s12">
          <button class="btn waves-effect waves-light" style="display: block; width: 100%;" type="submit" name="action" value="update">
            Submit
            <i class="mdi-content-send right"></i>
          </button>
        </div>
        </form>

        <!--<div id="curve_chart" style="width: 900px; height: 500px"></div>-->
        </div>
        <form class="col s12" method="post">
          <div class="row">
            <div class="input-field col s12">
              <input id="DeEquation" type="text" class="validate" name="DeEquation" required="">
              <label for="DeEquation">Differential Equation f(x, y)</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s6">
              <input id="InitialX" type="number" class="validate" name="InitialX" required="">
              <label for="InitialX">Initial X Value</label>
            </div>
            <div class="input-field col s6">
              <input id="InitialY" type="number" class="validate" name="InitialY" required="">
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
          <div class="grid-example col s12">
            <button onclick="__doPostBack('ctl00$body$ctl01','')" class="btn waves-effect waves-light" style="display: block; width: 100%;" type="submit" name="action" value="update">
              Submit
              <i class="mdi-content-send right"></i>
            </button>
          </div>
        </div>
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
          <p class="grey-text text-lighten-4">This website solves first order differential equations<br>using Euler's Method Algorithm to produce an<br>approixmate solution to this differential
equation</p>


        </div>
        <div class="col l5 s12 right">
          <h5 class="white-text">Navigation</h5>
          <ul>
            <li><a class="white-text" href="#!">About</a></li>
            <li><a class="white-text" href="#!">Euler's Method</a></li>
            <!--<li><a class="white-text" href="#!">Integrating Factor Method</a></li> -->
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
