<?php

use App\Core\Controller;

class _404 extends Controller
{
  public function __construct()
  {
    $this->view('error.404');
  }
}
