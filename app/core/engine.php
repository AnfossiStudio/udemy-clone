<?php

namespace App\Core;

class Engine
{
  /**
   * Render page view
   * TODO: Create Template Engine
   */
  public static function render($file)
  {
    if (file_exists($file)) {
    } else {
      //! Error Throw
      echo $file . ' not found';
    }
  }
}
