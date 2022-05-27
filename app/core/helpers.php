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
   * render view page from views folder
   */
  public static function view($view, $params = [])
  {

    $view = str_replace(".", "/", $view);
    $filename = '../app/views/' . $view . ".view.php";

    if (file_exists($filename)) {
      extract($params);
      require $filename;
    } else {
      echo 'Count not found the view file ' . $filename;
    }
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
