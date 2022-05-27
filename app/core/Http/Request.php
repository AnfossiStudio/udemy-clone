<?php

namespace App\Core\Http;

use App\Core\Helpers;

class Request
{

  /**
   * return request method
   */
  public function method()
  {
    return strtolower($_SERVER['REQUEST_METHOD']);
  }


  /**
   * return user ip address
   */
  public function ip()
  {
    $ip = null;
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
      $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
      $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
      $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
  }

  /**
   * return page url
   */
  public function path()
  {
    return '/' . $_GET['url'] ?? 'home';
  }

  /**
   * return params
   */
  public function all()
  {
    return array_merge($_POST, $_GET);
  }

  private function getParams()
  {
    $url = $_GET['url'] ?? 'home';
    $url = filter_var($url, FILTER_SANITIZE_URL);
    $params = explode('/', $url);
    
    return $params;
  }
}
