<?php

include '../src/conf.php';
include '../src/class.burger.php';
include '../src/class.db.php';

$burger = new Burger();

$email = $_POST['email'];
$name = $_POST['name'];
$phone = $_POST['phone'];

$addressFields = ['street', 'home', 'part', 'appt', 'floor'];
$address = '';
foreach ($_POST as $field => $value) {
  if ($value && in_array($field, $addressFields)) {
    $address .= $value . ',';
  }
}
$data = ['address' => $address];

$user = $burger->getUserByEmail($email);
if ($user) {
  $userId = $user['id'];
  $burger->incOrders($user['id']);
  $orderNum = $user['num_order'] + 1;
} else {
  $userId = $burger->createUser($email, $name);
  $orderNum = 1;
}

$orderId = $burger->addOrder($userId, $phone, $data);

echo "Спасибо, ваш заказ будет доставлен по адресу: $address<br>
Номер вашего заказа: #$orderId <br>
Это ваш $orderNum-й заказ!";

