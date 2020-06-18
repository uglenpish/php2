<?php
function isUserAuthorized ()
{
  return isset($_SESSION["user_id"]);
}

function getPasswordHash(string $userPassword): string
{
  return sha1($userPassword . 'aasdsdgg3424dg');
}

function getUserByLogin(string $email): array
{
  $query = "SELECT * FROM users WHERE email = '$email'";
  $ret = getDbConnection()->query($query);
  $users =  $ret->fetchAll();
  return $users[0] ?? [];
}