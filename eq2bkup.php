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
    DecimalPoint($DEArray);
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

  function DecimalPoint($DEArray){
    $DigitArray = array("0", "1", "2", "3", "4", "5", "6", "7", "8", "9");
    $NewChr = "";
    $CurrentIndex = 0;
    $LowerIntEnd = 0;
    $UpperIntEnd = 0;
    $Stepper = 1;
    $Character = 0;
    while ($Character < count($DEArray)) {
      $Stepper = 0;
      if ($DEArray[$Character] == "."){
            $CurrentIndex = $Character;
            while ((in_array($DEArray[$CurrentIndex - 1 - $Stepper], $DigitArray)) AND ($CurrentIndex - 1 - $Stepper) >= 0){
                $Stepper = $Stepper + 1;
                $LowerIntEnd = $CurrentIndex - $Stepper;
              }
            $Stepper = 0;
            for ($i = $LowerIntEnd; $i < $CurrentIndex; $i++){
              $NewChr = $NewChr.$DEArray[$i];
            }
            while ((in_array($DEArray[$CurrentIndex + 1 + $Stepper], $DigitArray)) AND (($CurrentIndex + 1 + $Stepper) < count($DEArray))){
              if ($Stepper != count($DEArray) -1){
                $Stepper = $Stepper + 1;
              }
              $UpperIntEnd = $CurrentIndex + $Stepper;
            }
            for ($i = $CurrentIndex; $i < $UpperIntEnd+1; $i++){
              $NewChr = $NewChr.$DEArray[$i];
              echo "<br>$NewChr<br>";
            }
            array_splice($DEArray, $UpperIntEnd+1, 0 , $NewChr);
            array_splice($DEArray, $LowerIntEnd, $UpperIntEnd - $LowerIntEnd+1);
            if (in_array($DEArray[count($DEArray)-1], $DigitArray)){ //but then we have to fix it when it doesn't concatenate if the thing is a float with only 1 dp at the end
              if (strpos(".", $DEArray[count($DEArray)-2]) AND strlen( $DEArray[count($DEArray)-2]) > 1){
                    $NewChr = $DEArray[count($DEArray)-2] + $DEArray[count($DEArray)-1];
                    array_pop($DEArray);
                    array_pop($DEArray);
                    array_push($DEArray, $NewChr);
                }
            print_r($DEArray);
          }
        }
          $Character = $Character + 1;
          $NewChr = "";
        }
        echo "<br><br>";
        print_r($DEArray);
      }

  function Brackets($DEArray){
    echo "Brackets Function Works";
    return $DEArray;
  }
  function Indices($DEArray){
    echo "Indices Function Works";
    return $DEArray;
  }
  function Division($DEArray){
    echo "Division Function Works";
    return $DEArray;

  }
  function Multiplication($DEArray){
    echo "Multiplication Function Works";
    return $DEArray;

  }
  function Addidtion($DEArray){
    echo "Addidtion Function Works";
    return $DEArray;

  }
  function Subtraction($DEArray){
    echo "Subtraction works";
    return $DEArray;

  }
  DEGetter();
?>
