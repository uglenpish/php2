<?php
require_once 'init.php';

if (isUserAuthorized ()) {
//  пользователь не авторзованн
  header('Location: index.php');
  die;
}

$email = $_POST['email'];
$user = getUserByLogin($email);

if (!$user) {
  echo 'No user with this login and password 123';
  die;
}

$gotPassword = $_POST['password'];
$passwordHash = getPasswordHash($gotPassword);

if ($passwordHash !== $user['password']) {
  echo 'No user with this login and password 456';
  die;
}

$_SESSION['user_id'] = $user['id'];
header('Location: index.php?authorized=1');
