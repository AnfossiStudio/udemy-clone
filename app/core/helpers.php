<?php

namespace App\Core;

class Helpers
{

  /**
   * Print prety array table
   */
  public static function  array_table($arr)
  {
    echo '<pre>';
    print_r($arr);
    echo '</pre>';
  }

  /**
   * Validation for inputs
   */
  public static function Validate($validation)
  {
    foreach ($validation as $rule => $value) {
    }
  }
}
