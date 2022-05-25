<?php

use App\Core\Controller;
use App\Core\Helpers;

include __DIR__ . '/../models/User.php';

class Home extends Controller
{
  public function index()
  {
    $user = new User();
    Helpers::array_table($user->all());

    $vars['index'] = 10;

    $this->view('home', $vars);
  }

  public function edit($id)
  {
    echo 'edit page '  . $id;
  }
}
