<?php

namespace App\Service;

use PDO;

class UserService extends AbstractService
{
  public function findAll(): array
  {
    $query = "SELECT * FROM users";
    $res = $this->db->query($query);
    return $res->fetchAll(PDO::FETCH_ASSOC);
  }
}
