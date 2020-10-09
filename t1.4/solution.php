<?php
function getSumExp3(array $input): int {
  $sum = 0;
  foreach ($input as $val) {
    if (!is_int($val)) {
      if (!is_float($val)) {
        return -1;
      }
      $sum += floor($val) ** 3;
    } else {
      $sum += $val ** 3;
    }

  }
  return $sum;
}

if ($argv && $argv[0] && realpath($argv[0]) === __FILE__) {
  echo (getSumExp3([1, 3, 4.2]));
}