<?php

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
if ($_SERVER['SERVER_NAME'] == 'localhost') {
  /**
   *  Run on localhost server
   */
  define('DBHOST', 'localhost');
  define('DBPASSWORD', '');
  define('DBNAME', '');
  define('DBDRIVER', 'mysql');
} else {
  /**
   * Run on liveserver
   */
  define('DBHOST', 'localhost');
  define('DBPASSWORD', '');
  define('DBNAME', '');
  define('DBDRIVER', 'mysql');
}
