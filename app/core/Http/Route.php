<?php

namespace App\Core\Http;

use App\Core\Controller;
use App\Core\Helpers;
use App\Core\Http\Request;
use App\Core\Http\Response;

class Route
{
  protected static array $routes = [];
  public Request $request;
  protected Response $response;

  public function __construct(Request $request, Response $response)
  {
    $this->request = $request;
    $this->response = $response;
  }

  public static function get($route, $action)
  {
    self::$routes['get'][$route] = $action;
  }

  public static function post($route, $action)
  {
    self::$routes['post'][$route] = $action;
  }

  public function resolve()
  {
    /**
     * TODO: Add dynamic paramters
     */
    $path = $this->request->path();
    $method = $this->request->method();
    $action = self::$routes[$method][$path] ?? false;
    $params = explode('/', trim($path, '/'));

    if (!$action) {
      // 404 file
      Helpers::view('errors.404');
      return;
    }

    /**
     * Route::get('/' , function(){
     *    echo 'work';
     * })
     */
    if (is_callable($action)) {
      call_user_func_array($action, []);
    }

    /**
     * 
     * Route::get('/' , [HomeController::class , 'index'])
     */
    if (is_array($action)) {
      $controller = '\App\Controllers\\' . $action[0];

      call_user_func_array([new $controller, $action[1]], []);
    }

    /**
     * Route::get('/' , 'HomeController@index')
     */
    if (is_string($action)) {
      if (str_contains($action, '@')) {
        $action = explode("@", $action);
        $controller = '\App\Controllers\\' . $action[0];
        call_user_func_array([new $controller, $action[1]], []);
      } else {
        return 'Error';
      }
    }
  }
}
