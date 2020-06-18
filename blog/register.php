<?php

require_once 'init.php';

if (isUserAuthorized ()) {
//  пользователь не авторзованн
  header('Location: index.php');
  die;
}

$name = $_POST['login'];
$userPassword = $_POST['password'];
$password = getPasswordHash($userPassword);
$email = $_POST['email'];

if (getUserByLogin($email)) {
  echo 'User with the same name already exists';
  die;
}

$query = "INSERT INTO users (`name`, `password`, email) VALUES ('$name', '$password', '$email')";
$ret = getDbConnection()->query($query);

if ($ret) {
  echo 'прошло успешно';
} else {
  echo $query . "<br>";
  var_dump(getDbConnection()->errorInfo());
  echo 'ошибка';
}