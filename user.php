<?php

require_once ('database.php');

class User {

  public function get_all_users() {
    $db = db_connect();
    $statement = $db->prepare("select * from users;");
    $statement->execute();
    return $statement->fetchAll(PDO::FETCH_ASSOC);
  }

  public function get_user_by_username($username) {
    $db = db_connect();
    $statement = $db->prepare("select * from users where username = :username;");
    $statement->bindParam(':username', $username);
    $statement->execute();
    return $statement->fetch(PDO::FETCH_ASSOC);
  }

  public function create_user($username, $password) {
    if (strlen($password) < 8) {
      return ['error' => 'Password must be at least 8 characters.'];
    }

    $existing = $this->get_user_by_username($username);
    if ($existing) {
      return ['error' => 'Username already exists.'];
    }

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $db = db_connect();
    $statement = $db->prepare("insert into users (username, password) values (:username, :password);");
    $statement->bindParam(':username', $username);
    $statement->bindParam(':password', $hashed_password);
    $statement->execute();

    return ['success' => true];
  }
}
?>