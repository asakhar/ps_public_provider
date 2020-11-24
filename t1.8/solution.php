<?php
function substitute(string $sourceString, array $dictionary): string {
  foreach ($dictionary as $key => $value) {
    $sourceString = mb_ereg_replace($key, '$value', $sourceString, "ignoreCase");
  }
  return $sourceString;
}
if ($argv && $argv[0] && realpath($argv[0]) === __FILE__) {
  echo substitute("Раз Два Три Четыре Пять
  Скажем без подвоха", [
      'а' => 't',
      'р' => 'z',
      'в' => 'q',
      'ят' => '45',
      'о' => 'd',
    ]);
  try { 
    echo substitute([1, 2, 3, 4, 5], []);
  } catch (TypeError $e) {
    echo "INPUT ERROR";
  }
}