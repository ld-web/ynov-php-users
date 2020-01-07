<?php
namespace App\Db;

use Exception;
use PDO;

class Db
{
  private $pdoInstance;

  public function __construct()
  {
    try {
      $dbConfig = parse_ini_file(__DIR__ . '/../../config/db.ini');
      if (!$dbConfig) {
        throw new Exception("Erreur lors de l'analyse du fichier de configuration de base de données (voir README.md pour avoir les informations de configuration)");
      }
    
      $dsn = "mysql:host=" . $dbConfig['host'] . ";" .
        "dbname=" . $dbConfig['db'] . ";" .
        "charset=" . $dbConfig['charset'];
    
      $this->pdoInstance = new PDO(
        $dsn,
        $dbConfig['user'],
        $dbConfig['password']
      );
    } catch (Exception $ex) {
      die($ex->getMessage());
    }
  }

  public function getPdoInstance(): PDO
  {
    return $this->pdoInstance;
  }
}
