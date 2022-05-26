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
    return  "`" . $colname . "` int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT";
  }

  /**
   * Generate string for table
   */
  public static function string($colname, $default = "NULL", $charlen = 255)
  {
    if (empty($colname)) {
      echo 'The name shold not be empty';
      die();
    }

    return "`" . $colname . "` varchar(" . $charlen . ") NOT NULL";
  }

  public static function timestamp()
  {
    /**
     * TODO: Edit time stamp sql
     */
    return "`created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP , `updated_at` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAM";
  }
}
