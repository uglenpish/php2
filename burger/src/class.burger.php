<?php


class Burger
{
  public function getUserByEmail(string $email)
  {
    $db = Db::getInstance();
    $query = "SELECT * FROM users WHERE email = :email";
    return $db->fetchOne($query, __METHOD__, [':email' => $email]);
  }

  public function createUser(string $email, string $name)
  {
    $db = Db::getInstance();
    $query = "INSERT INTO users(email, `name`) VALUES (:email, :name)";
    $result = $db->exec($query, __METHOD__, [
      ':email' => $email,
      ':name' => $name
    ]);
    if (!$result) {
      return false;
    }

    return $db->lastInsertId();
  }

  public function addOrder(int $userId, string $phone, array $data)
  {
    $db = Db::getInstance();
    $query = "INSERT INTO orders(user_id, user_address, phone, date) VALUES (:user_id, :address, :phone, :date)";
    $result = $db->exec(
      $query,
      __METHOD__,
      [
        ':user_id' => $userId,
        ':address' => $data['address'],
        ':date' => date('Y-m-d H:i:s'),
        ':phone' => $phone,
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
    $query = "UPDATE users SET num_order = num_order +1 WHERE id = $userId";
    return $db->exec($query, __METHOD__);
  }
}

