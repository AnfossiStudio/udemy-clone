<?php

use App\Core\Schema;
use App\Core\Table;

class user_table
{
  public static function build()
  {
    return new Table('user', function () {
      return [
        Schema::id()
      ];
    });
  }
}