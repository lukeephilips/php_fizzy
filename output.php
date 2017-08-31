<?php
$input = 60;
$fizzer = array( 3 => "fizz", 5 => "buzz", 4 => "zip" );

function fizzy($input, $fizzer)
{
  for ( $i = 1; $i <= $input; $i++ ) {
    $num = array_filter($fizzer, function($v, $k) use($i){
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
      <h1>
        <?php fizzy($input, $fizzer) ?>
      </h1>
    </div>

  </body>
</html>
