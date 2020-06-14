<?php


class Burger
{
  public function getUserByEmail(string $email)
  {
    $db = Db::getInstance();
    $query = "SELECT * FROM user_burger WHERE email = :email";
    return $db->fetchOne($query, __METHOD__, [':email' => $email]);
  }

  public function createUser(string $email, string $name)
  {
    $db = Db::getInstance();
    $query = "INSERT INTO user_burger(email, `name`) VALUES (:email, :name)";
    $result = $db->exec($query, __METHOD__, [
      ':email' => $email,
      ':name' => $name
    ]);
    if (!$result) {
      return false;
    }

    return $db->lastInsertId();
  }

  public function addOrder(int $userId, array $data)
  {
    $db = Db::getInstance();
    $query = "INSERT INTO orders(user_id, user_adress, comment, payment, date) VALUES (:user_id, :address, :comment, :payment, :date)";
    $result = $db->exec(
      $query,
      __METHOD__,
      [
        ':user_id' => $userId,
        ':address' => $data['address'],
        ':date' => date('Y-m-d H:i:s'),

      ]
    );
    if (!$result) {
      return false;
    }
    return $db->lastInsertId();
  }


  public function incOrders(int $userId)
  {
    $db = Db::getInstance();
    $query = "UPDATE user_burger SET num_order = num_order +1 WHERE id = $userId";
    return $db->exec($query, __METHOD__);
  }
}
