<?php

/*Функция должна принимать массив строк и выводить каждую строку в
отдельном параграфе (тег <p>)
Если в функцию передан второй параметр true, то возвращать (через return)
результат в виде одной объединенной строки.*/

function task1(array $strings,  $return = true)
{
  $result;
  if ($return) {
    $result = implode("\n", array_map(function($str){
      return "<p>$str</p>";
    }, $strings));
  }else {
    $result = implode(", ", array_map(function ($str) {
      return $str;
    }, $strings));
    echo $result;
  }
  return $result;
}
/*Задание #2

Функция должна принимать переменное число аргументов.
Первым аргументом обязательно должна быть строка, обозначающая арифметическое действие, которое необходимо выполнить со всеми передаваемыми аргументами.
Остальные аргументы это целые и/или вещественные числа.
Пример вызова: calcEverything(‘+’, 1, 2, 3, 5.2);
Результат: 1 + 2 + 3 + 5.2 = 11.2*/
/*Задание #2

Функция должна принимать переменное число аргументов.
Первым аргументом обязательно должна быть строка, обозначающая
арифметическое действие, которое необходимо выполнить со всеми
передаваемыми аргументами.
Остальные аргументы это целые и/или вещественные числа.
Пример вызова: calcEverything(‘+’, 1, 2, 3, 5.2);
Результат: 1 + 2 + 3 + 5.2 = 11.2*/

function task2(string $action, ...$args)
{
  foreach ($args as $n => $arg) {
    if (!is_int($arg) && !is_float($arg)) {
      trigger_error('argument #' . $n . ' is not integer or float');
      return 'ERROR: wrong argment';
    }
  }
  switch ($action) {
    case '+':
      return array_sum($args);
    case '-':
      return array_shift($args) - array_sum($args);
    case '/':
      $result = array_shift($args);
      foreach ($args as $n => $arg) {
        if ($arg == 0) {
          trigger_error('derive by zero on argument #' . ($n + 1));
          return 'ERROR: derive by zero';
        }
        $result = $result / $arg;
      }
      return $result;
    case '*':
      $result = 1;
      foreach ($args as $arg) {
        $result *= $arg;
      }

      return $result;

    default:
      return 'ERROR: unknown actions';
  }
}

/*Задание #3 (Использование рекурсии не обязательно)

Функция должна принимать два параметра – целые числа.
Если в функцию передали 2 целых числа, то функция должна отобразить
таблицу умножения размером со значения параметров, переданных в функцию.
(Например если передано 8 и 8, то нарисовать от 1х1 до 8х8). Таблица должна
быть выполнена с использованием тега <table>
В остальных случаях выдавать корректную ошибку.*/
function task3($a, $b)
{
  if (!is_int($a)) {
    trigger_error('а не число');
    return false;
  }
  if (!is_int($b)) {
    trigger_error('B не число');
    return false;
  }

  if ($a < 0 || $b < 0) {
    $resalt = "<table>";
    for ($i = -1; $i >= $a; $i--){
      $resalt .= '<tr>';
      for ($j = -1; $j >= $b; $j--){
        $resalt .='<td>';
        $resalt .= $i * $j;
        $resalt .= '</td>';
      }
      $resalt .= '</tr>';
    }
    $resalt .= "</table>";
    echo $resalt;
  }elseif ($a < 0 ){
    $resalt = "<table>";
    for ($i = -1; $i >= $a; $i--){
      $resalt .= '<tr>';
      for ($j = 1; $j <= $b; $j++){
        $resalt .='<td>';
        $resalt .= $i * $j;
        $resalt .= '</td>';
      }
      $resalt .= '</tr>';
    }
    $resalt .= "</table>";
    echo $resalt;
  }elseif ($b < 0 ) {
    $resalt = "<table>";
    for ($i = 1; $i <= $a; $i++) {
      $resalt .= '<tr>';
      for ($j = -1; $j >= $b; $j--) {
        $resalt .= '<td>';
        $resalt .= $i * $j;
        $resalt .= '</td>';
      }
      $resalt .= '</tr>';
    }
    $resalt .= "</table>";
    echo $resalt;
  }else{
    $resalt = "<table>";
    for ($i = 1; $i <= $a; $i++){
      $resalt .= '<tr>';
      for ($j = 1; $j <= $b; $j++){
        $resalt .='<td>';
        $resalt .= $i * $j;
        $resalt .= '</td>';
      }
      $resalt .= '</tr>';
    }
    $resalt .= "</table>";
    echo $resalt;
  }
}


/*Задание #6 (выполняется после просмотра модуля “ВСТРОЕННЫЕ ВОЗМОЖНОСТИ ЯЗЫКА”)

Создайте файл test.txt средствами PHP. Поместите в него текст - “Hello again!”
Напишите функцию, которая будет принимать имя файла, открывать файл и
выводить содержимое на экран.*/

function task4(string $filename)
{
  $fp = fopen($filename, 'r');
  if (!$fp) {
    return false;
  }

  $str = '';
  while (!feof($fp)) {
    $str .= fgets($fp, 1024);
  }

  echo $str;
}