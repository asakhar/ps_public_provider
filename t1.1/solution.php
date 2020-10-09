<?php
function typesCounter(array $arr): array{
  $count = ['boolean' => 0, 'integer' => 0, 'float' => 0, 'string' => 0, 'object' => 0];
  foreach ($arr as $value) {
    // if (!array_key_exists(gettype($value), $count)) {
    //   $count[gettype($value)] = 0;
    // }
    $count[str_replace('double', 'float', gettype($value))]++;
  }
  return $count;
}

if ($argv && $argv[0] && realpath($argv[0]) === __FILE__) {
  $c = typesCounter([1, 3, 'test', 7, 'another string', 7.16, 1.2e3, 'hoho', 10, true]);
  foreach ($c as $key => $value) {
    echo ("$key = $value\n");
  }
}