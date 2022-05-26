<?php
require 'cli.php';
/**
 * 
 * migrate
 * 
 * //generate:model
 * //generate:table
 * //generate:controller
 * 
 */



unset($argv[0]);

$arguments = $argv;

/**
 * Migrate table to database
 */
if (end($arguments) == "migrate") {
  $tables = scandir(__DIR__ . "/../migrations/");
  $tables = array_slice($tables, 2);
  foreach ($tables as $table) {
    require_once __DIR__ . '/../core/init.php';
    require_once __DIR__  . '/../migrations/' . $table;
    $class = explode('.', $table)[0];
    $class::build();
    CLI::Log("table " . $class . " migration successfuly \n");
  }
}

/**
 * 
 * generate functions
 */

if (explode(':', $arguments[1])[0] === "generate") {
  $command = explode(":", $arguments[1])[1];
  $filename = $arguments[2] ?? null;
  if (!$filename) {
    CLI::Log("Please enter file name", 'e');
    return;
  }
  switch ($command) {
    case "table":
      CLI::table($filename);
      break;
    case "model":
      CLI::model($filename);
      break;
    case "controller":
      CLI::controller($filename);
      break;
    default:
      CLI::Log("Error can't find the command try again", 'e');
  }
}
