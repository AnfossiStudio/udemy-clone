<?php

namespace App\Core;

class Table
{

  protected $table = '';
  protected $columns;
  public function __construct($table, $columns)
  {
    $this->table = $table;
    $this->columns = $columns();
  }
}
