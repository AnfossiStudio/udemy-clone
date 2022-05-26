<?php

namespace App\Core;

class Table extends Database
{

  protected $table = '';
  protected $columns;
  public function __construct($table, $columns)
  {
    $this->table = $table;
    $this->columns = $columns();

    $sql = "CREATE TABLE IF NOT EXISTS `" . $table . "` (" . join(',', $this->columns) . ")";
    return $this->query($sql);
  }
}
