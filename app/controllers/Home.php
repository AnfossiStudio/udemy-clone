<?php

class Home extends Controller
{
  public function index()
  {
    $vars['index'] = 10;

    $this->view('home', $vars);
  }

  public function edit($id)
  {
    echo 'edit page '  . $id;
  }
}
