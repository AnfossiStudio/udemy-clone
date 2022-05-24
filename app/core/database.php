<?php

class Database
{
  private function connect()
  {
    $_str = DBDRIVER . ':hostname=' . DBHOST . ';dbname=' . DBNAME;

    return new PDO($_str, DBUSER, DBPASSWORD);
  }

  public function query($query, $data = [])
  {
    $connection = $this->connect();

    $stm = $connection->prepare($query);

    if ($stm) {
      $check = $stm->execute($data);

      if ($check) {
        $results = $stm->fetchAll(PDO::FETCH_ASSOC);

        if ($results && count($results) > 0) {
          return $results;
        }
      }
    }
    return false;
  }
}
