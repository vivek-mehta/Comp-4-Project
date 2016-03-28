<?php
  function EulerMethod()
  {
    $X0 = $_POST["InitialX"];
    $Y0 = $_POST["InitialY"];
    $StepValue = $_POST["StepVal"];
    $DeEquation = $_POST["DeEquation"];
    $XArray = array($X0);
    $YArray = array($Y0);
    $MaxIterations = $_POST["iterations"];
/*  echo "Initial Condtions: ($X0,$Y0)<br>";
    echo "The Step Value Is $StepValue<br>";
   echo "DE Equation is $DeEquation<br>";
*/
    for ($i = 0; $i < $MaxIterations; $i++) {
      $NextY = $YArray[$i] + ($YArray[$i])*$StepValue;
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
