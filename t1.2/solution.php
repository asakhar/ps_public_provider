<?php
function getSumNK(array $arr, int $N, int $K) {
  $sum = 0;
  if($N+$K > count($arr))
    return -1;
  if ($N == 0) {
    return array_sum($arr);
  }

  if ($K != 0) {
    $K -= 1;
  }
  if(count($arr) == 0)
    return 0;
  $i = 0;
  foreach ($arr as $value) {
    if(!is_int($value))
      return -1;
    if($i < $K) {
      $i++;
      continue;
    }
    if ($i == $K + $N) {
      break;
    }
    $i++;
    $sum += $value;
  }
  return $sum;
}

if ($argv && $argv[0] && realpath($argv[0]) === __FILE__) {
  $arr = [1,3,4,5,8,9];;
  echo (getSumNK($arr, 4, 2));
}
