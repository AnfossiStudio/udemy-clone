<?php

use App\Core\Schema;
use App\Core\Table;

class user_table
{
  public static function build()
  {
    return new Table('student', function () {
      return [
        Schema::id(),
        Schema::string('firstname'),
        Schema::string('lastname'),
        Schema::string('role'),
        Schema::timestamp()
      ];
    });
  }
}
