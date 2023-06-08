<?php

$GLOBALS['signs'] = [
  'I' => ['present' => false, 'amount' => 1],
  'V' => ['present' => false, 'amount' => 5],
  'X' => ['present' => false, 'amount' => 10],
  'L' => ['present' => false, 'amount' => 50],
  'C' => ['present' => false, 'amount' => 100],
  'D' => ['present' => false, 'amount' => 500],
  'M' => ['present' => false, 'amount' => 1000],
];

/**
 * @param string $s
 * @return int
 */
function romanToInt(string $s) {
  $signs = $GLOBALS['signs'];
  $value = 0;
  for ($i = strlen($s); $i >= 1; $i--) {
    $sign = $s[$i - 1];
    $signs[$sign]['present'] = true;
    $current = $signs[$sign];
    $keysAbove = array_values(array_filter(array_keys($signs),function ($item) use ($current, $signs) {
      return $signs[$item]['amount'] > $current['amount'];
    }));
    for ($l = 0; $l < count($keysAbove); $l++) {
      if ($signs[$keysAbove[$l]]['present']) {
        $current['amount'] = -$current['amount'];
        break;
      }
    }
    $value += $current['amount'];
  }
  return $value;
}

/**
 * @param int $n
 * @return string
 */
function intToRoman(int $n): string {
  $signs = array_reverse($GLOBALS['signs']);
  $result = '';
  foreach ($signs as $key => $value) {
    while ($n >= $value['amount']):
      $result .= $key;
      $n -= $value['amount'];
    endwhile;
  }
  $signs = array_reverse($signs);
  foreach (array_keys($signs) as $key) {
    $keysAbove = array_values(array_filter(array_keys($signs), function ($item) use ($signs, $key) {
      return $signs[$item]['amount'] >  $signs[$key]['amount'];
    }));
    if (count($keysAbove)) {
      $upperKey = $keysAbove[0] ?? null;
      $higherKey = $keysAbove[1] ?? null;
      if ($upperKey) {
        $result = str_replace(str_repeat($key, 4), $key . $upperKey, $result);
      }
      if ($higherKey) {
        $result = str_replace($upperKey . $key . $upperKey, $key . $higherKey, $result);
      }
    }
  }
  return $result;
}
