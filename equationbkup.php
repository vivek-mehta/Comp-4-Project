<?php

  function DEGetter()
  {
    $DigitArray = array("0", "1", "2", "3", "4", "5", "6", "7", "8", "9")
    $DeEquation = $_POST["DeEquation"];
    $DEArray = array();
    for( $i = 0; $i < strlen( $DeEquation ); $i++ ) {
        $char = substr( $DeEquation, $i, 1 );
        if ($char !== " "){
          array_push($DEArray, $char);
        }
      }
      print_r($DEArray);
    }
  /*  for( $i = 0; $i < count( $DEArray ); $i++ ) {
      $IntEnd = 0;
      $Stepper = 0;
      $NewChr = "";
      $CurrentIndex = 0;
      if ($DEArray[$i] == "."){
        $CurrentIndex = current($DEArray[$i]);
        while (($DEArray[$CurrentIndex - 1 - $Stepper] in $DigitArray) AND ($CurrentIndex - 1 - $Stepper) >= 0){
          $Stepper = $Stepper + 1;
          $IntEnd = $CurrentIndex - $Stepper;
        }
        $Stepper = 0
        foreach (range($IntEnd, $CurrentIndex) as $i) {
          $NewChr = $NewChr + $DEArray[$i];
        }
        while (($DEArray[$CurrentIndex + 1 + $Stepper] in $DigitArray) AND ($CurrentIndex + 1 + $Stepper) <= (count($DEArray) - 1)){
          if ($Stepper != count($DEArray) - 1){
            $Stepper = $Stepper + 1;
          }
          $IntEnd = $CurrentIndex + $Stepper;
        }
        foreach (range($CurrentIndex, $IntEnd + 1) as $i) {
          $NewChr = $NewChr + $$DEArray[$i];
        }
        array_push($DEArray, $CurrentIndex-1);
        array_push($DEArray, $NewChr);
        foreach (range(0,strlen($NewChr))) as $i){
          array_pop($DEArray, $CurrentIndex);
          }
        $NewChr = "";




        //array_push($DEArray, $char);
            }
        }
        //$DEArray[] = $char; Potenital to redice time in appending to array using this later on?? Programming efficently
      }
     /*used if statement in for loop above instead/*for( $i = 0; $i < count( $DEArray ); $i++ ) {
      if ($DEArray[$i] == " ") {
        unset($DEArray[$i]);
      }

    }

  }*/

  function DP($DEArray){
      for( $i = 0; $i < count( $DEArray ); $i++ ) {
          if ($DEArray[$i] == "."){
              echo"YES";
              array_push($DEArray, $char);
          }
      }
  }

  function Brackets($DEArray){
    return $DEArray;
  }
  function Indices($DEArray){
    return $DEArray;
  }
  function Division($DEArray){
    echo "Division works";
    return $DEArray;

  }
  function Multiplication($DEArray){
    echo "Multiplication works";
    return $DEArray;

  }
  function Addidtion($DEArray){
    echo "Addidtion works";
    return $DEArray;

  }
  function Subtraction($DEArray){
    echo "Subtraction works";
    return $DEArray;

  }
  DEGetter()
?>
