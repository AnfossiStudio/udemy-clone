<?php

namespace App\Core;

/**
 * Main Controller Class
 */
class Controller
{
  protected function view($view, $params = [])
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
}
