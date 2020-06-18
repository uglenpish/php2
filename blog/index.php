<?php
require_once 'init.php';

//создаем сессию

if (!isUserAuthorized ()) {
//  пользователь не авторзованн
  header('Location: register_form.php');
  die;
}

echo 'You ID is = ' . $_SESSION['user_id'];

if (!empty($_GET['authorized'])) {
  echo 'You just successfully authorized';
}