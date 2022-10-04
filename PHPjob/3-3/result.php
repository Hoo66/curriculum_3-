<?php
  $number = $_POST['number'];

  $len = strlen($number);
  $random = mt_rand(0, $len - 1);
  $result = substr($number, $random, 1);
  $date = date("Y/m/d");

  if ($result === 0) {
    $luck = '凶';
  } elseif (1 <= $result || $result <= 3) {
    $luck = '小吉';
  } elseif (4 <= $result || $result <= 6) {
    $luck = '中吉';
  } elseif (7 <= $result || $result <= 8) {
    $luck = '吉';
  } else {
    $luck = '大吉';
  }

?>


  <p><?php echo $date; ?>の運勢は</p>
  <p>選ばれた数字は<?php echo $result; ?></p>
  <p><?php echo $luck; ?></p> 


