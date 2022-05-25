<?php

namespace App\Core;

class Model extends Database
{
  protected $table = '';

  /**
   * Insert data into database
   */
  public function insert($data = [])
  {
    $columns = join(',', array_keys($data));
    $columnsValues = join(',', array_map(function ($col) {
      return ':' . $col;
    }, array_keys($data)));

    $sql = 'INSERT INTO ' . $this->table . ' (' . $columns . ') VALUES (' . $columnsValues . ')';

    return $this->query($sql, $data);
  }

  public function all()
  {
    return $this->query('SELECT * FROM ' . $this->table);
  }
}
