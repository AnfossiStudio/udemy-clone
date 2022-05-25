<?php

namespace App\Core;

class Database
{
  private function connect()
  {
    $_str = DBDRIVER . ':hostname=' . DBHOST . ';dbname=' . DBNAME;

    return new \PDO($_str, DBUSER, DBPASSWORD);
  }

  public function query($query, $data = [], $type = 'object')
  {
    $connection = $this->connect();

    $stm = $connection->prepare($query);

    if ($stm) {
      $check = $stm->execute($data);

      if ($check) {
        if ($type == 'object') {
          $type = \PDO::FETCH_OBJ;
        } else {
          $type = \PDO::FETCH_ASSOC;
        }
        $results = $stm->fetchAll($type);

        if ($results && count($results) > 0) {
          return $results;
        }
      }
    }
    return false;
  }

  public function create_tables()
  {
    // Users Table
    $query = "
    	CREATE TABLE IF NOT EXISTS `users` (
      `id` int(11) NOT NULL AUTO_INCREMENT,
      `email` varchar(100) NOT NULL,
      `password` varchar(255) NOT NULL,
      `date` date DEFAULT NULL,
      PRIMARY KEY (`id`),
      KEY `email` (`email`),
      KEY `date` (`date`)
      ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4
    ";

    $this->query($query);
  }
}
