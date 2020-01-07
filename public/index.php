<?php
require '../vendor/autoload.php';

use App\Service\UserService;

$userService = new UserService();
$users = $userService->findAll();

var_dump($users);
