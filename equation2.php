<?php
  function DEGetter()
  {
    $DeEquation = $_POST["DeEquation"]; // Get input from user in the previous page and gets sumbitted to this page
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
    echo "<br><br> $DeEquation<br><br><br>";
    print_r($DEArray);
    $x = $_POST["InitialX"];
    $y = $_POST["InitialY"];
    Subtraction(Addition(Multiplication(Division(Indices(Brackets(Subtitute( DecimalPoint(Num($DEArray)), $x, $y), $x, $y))))) );
    /*while (count($DEArray) > 1){
      $DeArray = Subtraction(Addition(Multiplication(Division(Indices(Subtitute( DecimalPoint(Num($DEArray)), $x, $y))))) );
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
    function MathMod(){
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
      $tanh = tanh();
    }

  function Subtitute($DEArray, $x, $y){
    $Operators = array("^", "/", "*", "+", "-", "(", ")", "");
    $Character = 0;
    while ($Character < count($DEArray)) {
      if ($DEArray[$Character] == "x"){
        array_splice($DEArray, $Character, 1 , $x);
        if (!(in_array($DEArray[$Character-1], $Operators)) AND !(in_array($DEArray[$Character+1], $Operators))){
          array_splice($DEArray, $Character+1, 0 , ")");
          array_splice($DEArray, $Character, 0 , "*");
          array_splice($DEArray, $Character-1, 0 , "(");
        }
      }elseif($DEArray[$Character] == "y"){
        array_splice($DEArray, $Character, 1 , $y);
        if (!(in_array($DEArray[$Character-1], $Operators)) AND !(in_array($DEArray[$Character+1], $Operators))){
          array_splice($DEArray, $Character+1, 0 , ")");
          array_splice($DEArray, $Character, 0 , "*");
          array_splice($DEArray, $Character-1, 0 , "(");
        }
      }
      $Character = $Character + 1;
    }
    echo("<br><br>Subst:");
    print_r($DEArray);
    return($DEArray);
  }
  $floatval = floatval(0);
  echo "<br>HERE $floatval<br>";

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
        echo("<br><br>Nums:");
        print_r($DEArray);
        return($DEArray);
      }

  function DecimalPoint($DEArray){
    print_r($DEArray);
    $Character = 0;
    $NewChr = "";
    while ($Character < count($DEArray)) {
      if ((is_numeric($DEArray[$Character])) AND ($DEArray[$Character+1] == ".") AND (is_numeric($DEArray[$Character+2]))){
        $NewChr = $DEArray[$Character].$DEArray[$Character+1].$DEArray[$Character+2];
        array_splice($DEArray, $Character, 3 , $NewChr);
      }
      $Character = $Character + 1;
    }
    echo("<br><br>DP:");
    print_r($DEArray);
    return($DEArray);
  }

  function Brackets($DEArray, $x, $y){
    $a = 0;
    while($a < count($DEArray)){
      $WorkingArray = array();
      $NewChr = "";
      if ($DEArray[$a] == "(") {
        $Stepper = 0;
        $b = $a + $Stepper + 1;
        while (($DEArray[$b] != ")") AND ($b < count($DEArray))){
          $Stepper = $Stepper + 1;
          $b = $b + $Stepper;
        }
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
        echo "<br>NewChr = $NewChr";
        array_splice($DEArray, $a, $b-$a+1, $NewChr);
      }
      $a = $a + 1;
    }
    echo("<br><br>Brackets:");
    print_r($DEArray);
    return($DEArray);
  }

  function Indices($DEArray){
    $Character = 0;
    $NewChr = "";
    while ($Character < count($DEArray)) {
      if ($DEArray[$Character] == "^"){
        $NewChr = pow($DEArray[$Character-1], $DEArray[$Character+1]);
        array_splice($DEArray, $Character-1, 3 , $NewChr);
        $Character = 0;
      }
      $Character = $Character + 1;
    }
    echo("<br><br>Indices:");
    print_r($DEArray);
    return($DEArray);
  }

  function Division($DEArray){
    $Character = 0;
    $NewChr = "";
    while ($Character < count($DEArray)) {
      if ($DEArray[$Character] == "/"){
        $NewChr = (floatval($DEArray[$Character-1])/floatval($DEArray[$Character+1]));
        array_splice($DEArray, $Character-1, 3 , $NewChr);
        $Character = 0;
      }
      $Character = $Character + 1;
    }
    echo("<br><br>Div:");
    print_r($DEArray);
    return($DEArray);
  }

  function Multiplication($DEArray){
    $Character = 0;
    $NewChr = "";
    while ($Character < count($DEArray)) {
      if ($DEArray[$Character] == "*"){
        $NewChr = ($DEArray[$Character-1]*$DEArray[$Character+1]);
        array_splice($DEArray, $Character-1, 3 , $NewChr);
        $Character = 0;
      }elseif ((is_numeric($DEArray[$Character])) AND (is_numeric($DEArray[$Character+1]))) {
        $NewChr = (floatval($DEArray[$Character])*floatval($DEArray[$Character+1]));
        array_splice($DEArray, $Character, 2 , $NewChr);
        $Character = 0;
      }
      $Character = $Character + 1;
    }
    echo("<br><br>Mul:");
    print_r($DEArray);
    return($DEArray);

  }
  function Addition($DEArray){
    $Character = 0;
    $NewChr = "";
    while ($Character < count($DEArray)) {
      if ($DEArray[$Character] == "+"){
        $NewChr = (floatval($DEArray[$Character-1])+floatval($DEArray[$Character+1]));
        array_splice($DEArray, $Character-1, 3 , $NewChr);
        $Character = 0;
      }
      $Character = $Character + 1;
    }
    echo("<br><br>Add:");
    print_r($DEArray);
    return($DEArray);

  }
  function Subtraction($DEArray){
    $Character = 0;
    $NewChr = "";
    while ($Character < count($DEArray)) {
      if ($DEArray[$Character] == "-"){
        $NewChr = ($DEArray[$Character-1]-$DEArray[$Character+1]);
        array_splice($DEArray, $Character-1, 3 , $NewChr);
        $Character = 0;
      }
      $Character = $Character + 1;
    }
    echo("<br><br>Subtr:");
    print_r($DEArray);
    return($DEArray);
  }
  DEGetter();
?>
