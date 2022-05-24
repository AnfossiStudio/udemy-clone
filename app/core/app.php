<?php

class App
{
  protected $controller = '_404';
  protected $method = 'index';

  function __construct()
  {
    $url = $this->getUrl();
    // print_r($url);

    $pageController = '../app/controllers/' . ucfirst($url[0]) . '.php';

    if (file_exists($pageController)) {
      require $pageController;
      $this->controller = $url[0];
      unset($url[0]);
    } else {
      require '../app/controllers/' . $this->controller . '.php';
      $this->controller = '_404';
    }

    $_controller = new $this->controller();
    $_method = $url[1] ?? $this->method;

    if (!empty($url[1])) {
      if (method_exists($_controller, strtolower($_method))) {
        $this->method = strtolower($_method);
        unset($url[1]);
      }
    }

    call_user_func_array([$_controller, $this->method], $url);
  }

  private function getUrl()
  {
    $url = $_GET['url'] ?? 'home';
    $url = filter_var($url, FILTER_SANITIZE_URL);
    $params = explode('/', $url);
    return $params;
  }
}
