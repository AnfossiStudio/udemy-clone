<?php

class CLI
{

  /**
   * generate model file
   */
  public static function model($name)
  {
    $name = ucfirst(strtolower(trim($name)));
    $template =
      "<?php

use App\Core\Model;

class " . $name . " extends Model
{
  protected \$table = '" . strtolower($name) . "';
}
";
    $path = __DIR__ . '/../models/' . $name . ".php";
    if (!is_file($path)) {
      file_put_contents($path, $template);
      self::Log("model " . $name . " created successfuly \n");
    } else {
      self::Log("Model already exists", 'e');
    }
  }

  /**
   * generate table file
   */
  public static function table($name)
  {
    $name = strtolower(trim($name));
    $template =
      "<?php

use App\Core\Schema;
use App\Core\Table;

class " . $name . "_table
{
  public static function build()
  {
    return new Table('" . $name . "', function () {
      return [
        Schema::id()
      ];
    });
  }
}";

    $path = __DIR__ . '/../migrations/' . $name . "_table.php";
    if (!is_file($path)) {
      file_put_contents($path, $template);
      self::Log("table " . $name . "_table created successfuly \n");
    } else {
      self::Log("Table already exists", 'e');
    }
  }

  /**
   * Genreate Controller file
   */
  public static function controller($name)
  {

    $name = ucfirst(strtolower(trim($name)));
    $template =
      "<?php
namespace App\Controllers;

use App\Core\Controller;

class " . $name . "Controller extends Controller
{
  public function index()
  {
  }
}
    ";
    $path = __DIR__ . '/../controllers/' . $name . "Controller.php";
    if (!is_file($path)) {
      file_put_contents($path, $template);
      self::Log("Controller " . $name . "_table created successfuly \n");
    } else {
      self::Log("Controller already exists", 'e');
    }
  }

  /**
   * Log for console
   */
  public static function Log($str, $type = 's')
  {
    switch ($type) {
      case 'e': //error
        echo "\n\033[31m$str \033[0m\n";
        break;
      case 's': //success
        echo "\n\033[32m$str \033[0m\n";
        break;
      case 'w': //warning
        echo "\n\033[33m$str \033[0m\n";
        break;
      case 'i': //info
        echo "\n\033[36m$str \033[0m\n";
        break;
      default:
        # code...
        break;
    }
  }
}
