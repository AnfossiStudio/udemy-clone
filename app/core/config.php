<?php

namespace App\Core;

class Config
{
  public static function init()
  {

    /**
     * website configurations
     */

    /**
     * Global Configurations
     */
    define('APP_NAME', 'Udemy App');
    define('APP_DESC', 'Free and paid tutotials');

    /**
     * Database Configurations
     */
    if (isset($_SERVER['SERVER_NAME'])) {
      print_r($_SERVER);

      if ($_SERVER['SERVER_NAME'] == 'localhost') {
        /**
         *  Run on localhost server
         */
        define('DBHOST', 'localhost');
        define('DBUSER', 'root');
        define('DBPASSWORD', '');
        define('DBNAME', 'udemy');
        define('DBDRIVER', 'mysql');
      } else {
        /**
         * Run on liveserver
         */
        define('DBHOST', 'localhost');
        define('DBUSER', 'root');
        define('DBPASSWORD', '');
        define('DBNAME', '');
        define('DBDRIVER', 'mysql');
      }
    } else {

      /**
       *  Run on command line server
       */
      define('DBHOST', 'localhost');
      define('DBUSER', 'root');
      define('DBPASSWORD', '');
      define('DBNAME', 'udemy');
      define('DBDRIVER', 'mysql');
    }
  }
}
