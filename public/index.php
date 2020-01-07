<?php
require '../vendor/autoload.php';

use App\Db\Db;

$connection = Db::getPdoInstance();

$query = "SELECT * FROM users";
$res = $connection->query($query);
$users = $res->fetchAll(PDO::FETCH_ASSOC);

var_dump($users);
