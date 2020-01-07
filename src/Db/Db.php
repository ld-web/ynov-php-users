<?php

namespace App\Db;

use Exception;
use PDO;

class Db
{
  private static $pdoInstance = null;

  private function __construct()
  {
  }

  public static function getPdoInstance(): PDO
  {
    if (self::$pdoInstance !== null) {
      return self::$pdoInstance;
    }

    try {
      $dbConfig = parse_ini_file(__DIR__ . '/../../config/db.ini');
      if (!$dbConfig) {
        throw new Exception("Erreur lors de l'analyse du fichier de configuration de base de données (voir README.md pour avoir les informations de configuration)");
      }

      $dsn = "mysql:host=" . $dbConfig['host'] . ";" .
        "dbname=" . $dbConfig['db'] . ";" .
        "charset=" . $dbConfig['charset'];

      self::$pdoInstance = new PDO(
        $dsn,
        $dbConfig['user'],
        $dbConfig['password']
      );

      return self::$pdoInstance;
    } catch (Exception $ex) {
      throw $ex;
    }
  }
}
