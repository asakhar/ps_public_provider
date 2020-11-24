<?php
function inverseConcat(...$params) {
  $result = "";
  foreach ($params as $param) {
    if (!is_string($param)) {
      throw new TypeError;
    }

    $result = mb_convert_case($param, MB_CASE_LOWER, "UTF-8") . (empty($result) ? "" : " ") . $result;
  }
  if (empty($result)) {
    return "";
  }

  return mb_convert_case(mb_substr($result, 0, 1), MB_CASE_UPPER, "UTF-8") . mb_substr($result, 1);

  // $result = implode(" ", array_reverse($params));
  // return mb_convert_case(mb_substr($result, 0, 1), MB_CASE_TITLE, "UTF-8").mb_substr($result, 1);
}
function concatRegister(...$params) {
  $flicker = 0;
  $result = "";
  foreach ($params as $param) {
    if (!is_string($param)) {
      throw new TypeError;
    }

    $result .= (empty($result) ? "" : "-") . mb_convert_case($param, $flicker ? MB_CASE_UPPER : MB_CASE_LOWER, "UTF-8");
    $flicker = !$flicker;
  }
  return $result;
}
function removeSymbols(...$params) {
  $flicker = 0;
  $result = "";
  foreach ($params as $param) {
    if (!is_string($param)) {
      throw new TypeError;
    }

    $result .= (empty($result) ? "" : " ") . mb_ereg_replace($flicker ? "[е]" : "[т]", "", $param);
    $flicker = !$flicker;
  }
  return $result;
}

if ($argv && $argv[0] && realpath($argv[0]) === __FILE__) {
  echo removeSymbols("Первый", "Второй", "Третий", "Четвертый", "Пятый");
}