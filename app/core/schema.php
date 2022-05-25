<?php

namespace App\Core;

class Schema
{
  /**
   * Generate id for table
   */
  public static function id($colname = 'id')
  {
    if (empty($colname)) {
      echo 'The name shold not be empty';
      die();
    }
    return  "`" . $colname . "` int(11) NOT NULL AUTO_INCREMENT";
  }

  /**
   * Generate string for table
   */
  public static function string($colname, $default = null, $charlen = 255)
  {
    if (empty($colname)) {
      echo 'The name shold not be empty';
      die();
    }

    return "`" . $colname . "` varchar(" . $charlen . ") NOT NULL DEFAULT `" . $default . "`";
  }

  public static function timestamp()
  {
    return "created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP , updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAM";
  }
}
