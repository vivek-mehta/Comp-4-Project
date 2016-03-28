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
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
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
      <?php
        error_reporting(1);
        $x = $_POST["InitialX"];
        $y = $_POST["InitialY"];
        $InitialX = $_POST["InitialX"];
        $InitialY = $_POST["InitialY"];
        $YArray = array();
        $XArray = array();
        array_push($YArray, $y);
        array_push($XArray, $x);
        $TargetXValue = $_POST["TargetXValue"];
        $StepVal = $_POST["StepVal"];
        $MaxIterations = abs($TargetXValue/$StepVal);
        $Grad = 0;//gradient
        $InfCheck = 0;
        if ($StepVal > $TargetXValue){
          echo ('<h2 class="header center blue-grey-text">You have entered a step value that is larger than the TargetXValue, Please re-enter values below</h2>');
        }
        //$i = 0;
      //  while (($InfCheck != INF OR $InfCheck != -INF) AND $i < $MaxIterations){
        for ($i=0; $i < $MaxIterations ; $i++) {
          $x = $XArray[$i];//startin x value
          $y = $YArray[$i];//starting y value
          $Grad = DEGetter($x, $y);
          $YNext = $y + $Grad*$StepVal;
        //  if ($YNext == INF){
            //break;
          //}
          array_push($XArray, ($x+$StepVal));
          array_push($YArray, $YNext);
        //  $i = $i + 1;
          $InfCheck = $YArray[$i];
        //}
        }
        //echo"<br><br><br> X VALS";
        //print_r($XArray);
        //echo "<br><br><br> Y VALS";
        //print_r($YArray);
        //$X1 = $XArray[1];
        //$Y1 = $YArray[1];
        //echo "<br><br> X INDEX TEST: [$X1, $Y1]";
        $DeEquation = $_POST["DeEquation"]; // Get input from user in the previous page and gets sumbitted to this page
        $DeEquation = strtolower($DeEquation);

        function DEGetter($x, $y){
          $DeEquation = $_POST["DeEquation"]; // Get input from user in the previous page and gets sumbitted to this page
          $DeEquation = strtolower($DeEquation);
          $DEArray = array(); // Create an array to hold the equation
          for( $i = 0; $i < strlen( $DeEquation ); $i++ ) { // A for loop from 0 to the length of the Equation given by the user to append each character of the equation to the array = DeArray
              $char = substr( $DeEquation, $i, 1 ); // Gets the character at postion i on the string equation the user gave and appends it to the char Variable
              if ($char !== " "){ // Checks to make sure that the current value is not a blank space
                array_push($DEArray, $char); // if it isn't a blank space it appends that current characer that is temp stored in the char Var and appends it to the array
              }
              //$DEArray[] = $char; Potenital to redice time in appending to array using this later on?? Programming efficently
            }
           /*used if statement in for loop above instead/*for( $i = 0; $i < count( $DEArray ); $i++ ) {
            if ($DEArray[$i] == " ") {
              unset($DEArray[$i]);
            }

          }*/
        //    echo "<br><br> $DeEquation<br><br><br>";
          //print_r($DEArray);
          //MathFunc($DEArray);
          $Gradient = Brackets(Subtraction(Addition(Multiplication(Division(Indices(Brackets(MathFunc(Substitute(DecimalPoint(Num($DEArray)), $x, $y)), $x, $y)))))), $x, $y);
          return($Gradient[0]);

          /*while (count($DEArray) > 1){
            $DeArray = Subtraction(Addition(Multiplication(Division(Indices(Substitute( DecimalPoint(Num($DEArray)), $x, $y))))) );
          }*/
          //while $DEArray[$i + Stepper] !==
          /*$DigitArray = array( "0", "1", "2", "3", "4", "5", "6", "7", "8", "9");
          for( $i = 0; $i < count( $DEArray ); $i++ ) {
              $IntEnd = 0;
              $Stepper = 0;
              $NewChr = "";
              $CurrentIndex = 0;
              if ($DEArray[$i] == "."){
                $CurrentIndex = $DEArray[$i]  ;
                while (( in_array($DEArray[$CurrentIndex - 1 - $Stepper], $DigitArray)) AND ($CurrentIndex - 1 - $Stepper) >= 0){
                  $Stepper = $Stepper + 1;
                  $IntEnd = $CurrentIndex - $Stepper;
                }
                $Stepper = 0;
                for ($i = $IntEnd; $i < $CurrentIndex; ++$i) {
                  $NewChr = $NewChr + $DEArray[$i];
                }
                while ((in_array($DEArray[$CurrentIndex + 1 + $Stepper], $DigitArray)) AND ($CurrentIndex + 1 + $Stepper) <= (count($DEArray) - 1)){
                  if ($Stepper != count($DEArray) - 1){
                    $Stepper = $Stepper + 1;
                  }
                  $IntEnd = $CurrentIndex + $Stepper;
                }
                for (($i = $CurrentIndex); $i < ($IntEnd +1); ++$i) {
                  $NewChr = $NewChr + $DEArray[$i];
                }
                array_push($DEArray, $CurrentIndex-1);
                array_push($DEArray, $NewChr);
                for ($i = 0;  $i < strlen($NewChr); ++$i){
                  array_pop($DEArray, $CurrentIndex);
                  }
                $NewChr = "";
              }
            }*/
          }

          function MathFunc($DEArray){//concatenates string of math funcs
          //  echo "Code is running....";
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
            //echo "<br><br>kuukFYUYUKMYUFyuyayth";
            //print_r($DEArray);
            return($DEArray);
          }

          function MathMod($Func, $Val){
            //echo("<br>Func: $Func");
            //echo("<br>Val: ");
            //print_r($Val);
            $Result = 0;
            if ($Func === "sin"){
              $Result = sin($Val);
              //echo("<br>Result: $Result");
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
            else {
              echo('<h2 class="header center blue-grey-text">You have entered a math function that is not recognized, Please go back to previous page</h2>');
              exit();
            }
            /*elseif ($Func === "log"){ // Closed function HARD TO PROGRAMME
              $Result = log($Val);
            }*/

            /*
            $abs = abs();
            $acos = acos();
            $acosh = acosh();
            $asin = asin();
            $asinh = asinh();
            $atan = atan();
            $atanh = atanh();
            $cos = cos();
            $cosh = cosh();
            $exp = exp();
            $log10 = log10();
            $log = log();
            $pi = pi();
            $sin = sin();
            $sinh = sinh();
            $tan = tan();
            $tanh = tanh();*/
            return($Result);
          }

          function Substitute($DEArray, $x, $y){
            $Operators = array("^", "/", "*", "+", "-", "(", ")", "");
            $Character = 0;
            $WorkingArray = array();
            $NewChr = "";
            $Value = 0; //Will be a temporary holder of the value of variable (x or y) currently being substituted :)
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
            /*while($Character < count($DEArray)){
              if (!(in_array($DEArray[$Character-1], $Operators)) AND !(in_array($DEArray[$Character+1], $Operators))){
                /*array_splice($DEArray, $Character+1, 0 , ")");
                array_splice($DEArray, $Character, 0 , "*");
                array_splice($DEArray, $Character-1, 0 , "(");
                echo "<br>if is runnning rn";
                array_push($WorkingArray, "(");
                array_push($WorkingArray, $DEArray[$Character-1]);
                array_push($WorkingArray, "*");
                array_push($WorkingArray, $Var);
                array_push($WorkingArray, ")");
                echo("<br><br> SubstWA: ");
                print_r($WorkingArray);
                $NewChr = Brackets($WorkingArray, $x, $y);
                array_splice($DEArray, $Character-1, 2 , $NewChr);
              }elseif ($DEArray[$Character-1] === "^"){
                echo "<br>elseif is runnning rn";
                array_push($WorkingArray, "(");
                array_push($WorkingArray, $Var);
                array_push($WorkingArray, "*");
                array_push($WorkingArray, $DEArray[$Character+1]);
                array_push($WorkingArray, ")");
                $NewChr = Brackets($WorkingArray, $x, $y);
                array_splice($DEArray, $Character-1, 2 , $NewChr);
              }
              $Character = $Character + 1;
            }*/
            //echo("<br><br>Subst:");
            //print_r($DEArray);
            return($DEArray);
          }

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
                    /*if (in_array($DEArray[count($DEArray)-1], $DigitArray)){ //but then we have to fix it when it doesn't concatenate if the thing is a float with only 1 dp at the end
                      if (strpos(".", $DEArray[count($DEArray)-2]) AND is_numeric($DEArray[count($DEArray)-2])){
                            $NewChr = $DEArray[count($DEArray)-2] + $DEArray[count($DEArray)-1];
                            array_pop($DEArray);
                            array_pop($DEArray);
                            array_push($DEArray, $NewChr);
                        }
                    print_r($DEArray);
                  }*/
                }
                  $Character = $Character + 1;
                  $NewChr = "";
                }
              //  echo("<br><br>Nums:");
                //print_r($DEArray);
                return($DEArray);
              }

          function DecimalPoint($DEArray){
          //  print_r($DEArray);
            $Character = 0;
            $NewChr = "";
            while ($Character < count($DEArray)) {
              if ((is_numeric($DEArray[$Character])) AND ($DEArray[$Character+1] === ".") AND (is_numeric($DEArray[$Character+2]))){
                $NewChr = $DEArray[$Character].$DEArray[$Character+1].$DEArray[$Character+2];
                array_splice($DEArray, $Character, 3 , $NewChr);
              }
              $Character = $Character + 1;
            }
          //  echo("<br><br>DP:");
            //print_r($DEArray);
            return($DEArray);
          }

          function Brackets($DEArray, $x, $y){
            $a = 0;
            if (($DEArray[0] === "(" ) AND ($DEArray[count($DEArray) - 1] === ")" )) {
              //echo("Running new code thing...");
              for ($i=1; $i < count($DEArray) - 1; $i++) {
              //  echo("<br>i: $i");
                $NewChr = $DEArray[$i];
              //  echo("<br>array: $NewChr");
                if ($DEArray[$i] === ")" ){
                  $b = $i;
                  break;
                }
                elseif ($DEArray[$i] === "("){
                  $a = 1;
                  break;
                }
                elseif ($i === count($DEArray)-2) {
                //  echo("<br><br>Start: ");
                //  print_r($DEArray);
                  array_splice($DEArray, 0, 1);
                //  echo("<br><br>Step 1: ");
                //  print_r($DEArray);
                  array_splice($DEArray, count($DEArray) - 1, 1);
                //  echo("<br><br>Step 2: ");
                  //print_r($DEArray);
                  $NewChr = Subtraction(Addition(Multiplication(Division(Indices(Brackets($DEArray, $x, $y))))));
              //    echo "<br>NewChr = ";
                //  print_r($NewChr);
                  array_splice($DEArray, 0, count($DEArray), $NewChr);
                  break;
                }
              }
            }
            //echo("<br>Now I'm running....");
            $NewChr = $DEArray[0];
          //  echo "<br><br>Array[0]: $NewChr";
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
                  //$Abcdefd = $DEArray[$c];
                //  echo "<br><br>DEARRAY[C] $Abcdefd";
                  array_push($WorkingArray, $DEArray[$c]);
                //  echo("<br><br>BracWA:");
                  //print_r($WorkingArray);
                  //echo("<br><br>BracDEA:");
                //  print_r($DEArray);
                }
                $NewChr = Subtraction(Addition(Multiplication(Division(Indices(Brackets($WorkingArray, $x, $y))))));
                if ($DEArray[$a-2] === "e"){
                  $NewChr = MathMod("e", $NewChr[0]);
                //  echo "<br>NewChr = $NewChr";
                  array_splice($DEArray, $a-2, $b-$a+3, $NewChr);
                }
                elseif (ctype_alpha($DEArray[$a-1])) {
                  $NewChr = MathMod($DEArray[$a-1], $NewChr[0]);
                //  echo "<br>NewChr = $NewChr";
                  array_splice($DEArray, $a-1, $b-$a+2, $NewChr);
                }
                else{
                //  echo "<br>NewChr = $NewChr";
                  array_splice($DEArray, $a, $b-$a+1, $NewChr);
                }
              }
              /*elseif (count($DEArray) == 1){
                break;
              }*/
              $a = $a + 1;
            }

            /*$a = 0;
            $b = 0;
            while($a < count($DEArray)){
              $WorkingArray = array();
              $NewChr = "";
              if (($DEArray[0] === "(") AND ($DEArray[count($DEArray)-1] === ")")){
                echo("<br><br> This bit is executuing now!!!! <br>");
                $WorkingArray = $DEArray;
                array_splice($WorkingArray, 0, 1);
                echo("<br> Working Array 1: ");
                print_r($WorkingArray);
                array_splice($WorkingArray, count($WorkingArray)-1, 1);
                echo("<br> Working Array 2: ");
                print_r($WorkingArray);
                if ((!in_array("(", $WorkingArray)) AND (!in_array(")", $WorkingArray))){// this if sttement doesn't execute
                  $a = 0;
                  $b = count($DEArray)-1;
                } else {
                  $Stepper = 0;
                  $b = $a + $Stepper + 1;
                  while (($DEArray[$b] != ")") AND ($b < count($DEArray))){
                    $Stepper = $Stepper + 1;
                    $b = $b + $Stepper;
                  }
                }
                echo("<br><br>b = $b");
                for ($c = $a+1; $c < $b; $c++){
                  $Abcdefd = $DEArray[$c];
                  echo "<br><br>DEARRAY[C] $Abcdefd";
                  array_push($WorkingArray, $DEArray[$c]);
                  echo("<br><br>BracWA:");
                  print_r($WorkingArray);
                  echo("<br><br>BracDEA:");
                  print_r($DEArray);
                }
                $NewChr = Subtraction(Addition(Multiplication(Division(Indices(Brackets($WorkingArray, $x, $y))))));
                //echo "<br>NewChr = $NewChr";
                array_splice($DEArray, $a, $b-$a+1, $NewChr);
                $a = $a + 1;
                $WorkingArray = array();
              }elseif ($DEArray[$a] === "(") {
                $Stepper = 0;
                $b = $a + $Stepper + 1;
                while (($DEArray[$b] != ")") AND ($b < count($DEArray))){
                  $Stepper = $Stepper + 1;
                  $b = $b + $Stepper;
                }
                echo("<br><br>b = $b");
                for ($c = $a+1; $c < $b; $c++){
                  $Abcdefd = $DEArray[$c];
                  echo "<br><br>DEARRAY[C] $Abcdefd";
                  array_push($WorkingArray, $DEArray[$c]);
                  echo("<br><br>BracWA:");
                  print_r($WorkingArray);
                  echo("<br><br>BracDEA:");
                  print_r($DEArray);
                }
                $NewChr = Subtraction(Addition(Multiplication(Division(Indices(Brackets($WorkingArray, $x, $y))))));
                //echo "<br>NewChr = $NewChr";
                array_splice($DEArray, $a, $b-$a+1, $NewChr);
                $a = $a + 1;
              }/*else{
                array_splice($DEArray, 0, 0, );
              }
            }*/
          //  echo("<br><br>Brackets:");
            //print_r($DEArray);
            return($DEArray);
          }

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
            //echo("<br><br>Indices:");
            //print_r($DEArray);
            return($DEArray);
          }

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
            //echo("<br><br>Div:");
            //print_r($DEArray);
            return($DEArray);
          }

          function Multiplication($DEArray){
            $Character = 0;
            $NewChr = "";
            while ($Character < count($DEArray)) {
              //echo("<br>");
              //print_r($DEArray);
              //echo("<br>");
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
              //echo("<br>");
              //print_r($DEArray);
              //echo("<br>");
              $Character = $Character + 1;
            }
          //  echo("<br><br>Mul:");
            //print_r($DEArray);
            return($DEArray);

          }
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
            //echo("<br><br>Add:");
            //print_r($DEArray);
            return($DEArray);

          }
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
            //echo("<br><br>Subtr:");
            //print_r($DEArray);
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
              <input id="StepVal" type="number" class="validate" name="StepVal" required="" min="0.001" max="<?php echo $TargetXValue; ?>" step ="any">
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
