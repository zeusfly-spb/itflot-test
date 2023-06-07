<?php

function romanToInt($s) {
  $value = 0;
  $signs = [
    'I' => ['present' => false, 'amount' => 1],
    'V' => ['present' => false, 'amount' => 5],
    'X' => ['present' => false, 'amount' => 10],
    'L' => ['present' => false, 'amount' => 50],
    'C' => ['present' => false, 'amount' => 100],
    'D' => ['present' => false, 'amount' => 500],
    'M' => ['present' => false, 'amount' => 1000],
  ];

  for ($i = strlen($s); $i >= 1; $i--) {
    $sign = $s[$i - 1];
    $signs[$sign]['present'] = true;
    $current = $signs[$sign];
    $biggerKeys = array_values(array_filter(array_keys($signs), function ($item) use ($current, $signs) {
      return $signs[$item]['amount'] > $current['amount'];
    }));
    for ($l = 0; $l < count($biggerKeys); $l++) {
      if ($signs[$biggerKeys[$l]]['present']) {
        $current['amount'] = -$current['amount'];
        break;
      }
    }
    $value += $current['amount'];
  }
  return $value;
}
