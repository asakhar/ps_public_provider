<?php
function getInitials(string $FIO): ?string {
  $upcasew = mb_convert_case($FIO, MB_CASE_TITLE, "UTF-8");
  //var_dump($upcasew);
  // $russian_letters = "а..я"."А..Я"."-";
  $russian_letters = 'йцукенгшщзхъфывапролджэячсмитьбюёЙЦУКЕНГШЩЗХЪФЫВАПРОЛДЖЭЯЧСМИТЬБЮЁ-';

  $words = str_word_count($upcasew, 1, $russian_letters);
  
  if ($words < 2) {
    return null;
  }
  //var_dump($words);
  $ret = $words[0].' ';
  foreach(array_slice($words,1) as $value) {
    $ret .= $value[0].$value[1].".";
  }
  return $ret;
}

if ($argv && $argv[0] && realpath($argv[0]) === __FILE__) {
  echo getInitials("мамин-сибиряк дмитрий наркисович")."\n";
  echo getInitials("Петров иван")."\n";
  echo getInitials("Маркес Габриэль Хосе Гарсиа")."\n";
}