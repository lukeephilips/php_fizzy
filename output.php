<?php
class FizzBot
{
  private $input;
  private $fizzer;

  function __construct($input, $fizzer = array(3 => "fizz", 5 => "buzz"))
  {
    $this->input = $input;
    $this->fizzer = $fizzer;
  }

  function getInput()
  {
    return $this->input;
  }
  function setInput($input)
  {
    $user_input = (integer) $input;
    if ($user_input != 0) {
      $this->input = $user_input;
    }
  }


  function getFizzer()
  {
    foreach ($this->fizzer as $key => $value) {
      echo $value . " : ";
      echo $key;
      echo "<br>";
    }
  }
  function setFizzer($array)
  {
    $user_array = (array) $array;
    if (sizeof($user_array) != 0) {
      $this->fizzer = $user_array;
    }
  }

  function fizzy()
  {
    for ( $i = 1; $i <= $this->input; $i++ ) {
      $num = array_filter($this->fizzer, function($v, $k) use($i){
        if ($i % $k == 0) {
          return $v;
        };
      }, ARRAY_FILTER_USE_BOTH);

      if ($num) {
        echo implode(" ",$num);
      } else {
        echo "<b>". $i . "</b>";
      }
      echo "<br>";
    }
  }
}
 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
    <title>FizBuz</title>
  </head>
  <body>
    <div class="container">
      <div class="col-md-6">
        <?php
        $thing = new FizzBot(50);
        ?>
        <div class="col-md-6">
          <h1>
            Input:
            <?php
              echo $thing->getInput();
            ?>
          </h1>
        </div>
        <div class="col-md-6">
          <h2>
            Fizzer:
            <br>
            <?php
              $thing->getFizzer();
             ?>
          </h2>
        </div>
        <span>
          <?php
          $thing->fizzy();
          ?>
        </span>
      </div>
      <div class="col-md-6">
        <?php
        $other_thing = array(3 => "boom", 5 => "bap");
        $thing->setFizzer($other_thing);
        ?>
        <div class="col-md-6">
          <h1>
            Input:
            <?php
              echo $thing->getInput();
            ?>
          </h1>
        </div>
        <div class="col-md-6">
          <h2>
            Fizzer:
            <br>
            <?php
              $thing->getFizzer();
             ?>
          </h2>
        </div>
        <span>
          <?php
            $thing->fizzy();
          ?>
        </span>
      </div>
    </div>
  </body>
</html>
