<?php

include '../src/conf.php';
include '../src/class.burger.php';
include '../src/class.db.php';

$burger = new Burger();

$email = $_POST['email'];
//$name = $_POST['name'];
$data = [];

$user = $burger->getUserByEmail($email);
if ($user) {
  $userId = $user['id'];
  $burger->incOrders($user['id']);
} else {
  $userId = $burger->createUser($email);
}

$burger->addOrder($userId, $data);

