<?php

namespace App\Service;

use App\Db\Db;

abstract class AbstractService
{
  protected $db;

  public function __construct()
  {
    $this->db = Db::getPdoInstance();
  }
}
