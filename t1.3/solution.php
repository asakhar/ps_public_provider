<?php
function getBMI(int $height, float $weight): ?float {
  if ($height >= 10 && $height <= 300 && $weight >= 1 && $weight <= 300) {
    return round($weight / ($height ** 2) * 10000, 2);
  } else {
    return null;
    // throw new Exception("Invalid arguments.");
  }
}

if ($argv && $argv[0] && realpath($argv[0]) === __FILE__) {
  echo (getBMI(170, 77.));
}