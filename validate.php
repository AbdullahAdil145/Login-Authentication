<?php
session_start();
require_once('user.php');

$username = $_POST['username'];
$password = $_POST['password'];

$user = new User();
$user_data = $user->get_user_by_username($username);

if ($user_data && password_verify($password, $user_data['password'])) {
  $_SESSION['authenticated'] = 1;
  $_SESSION['username'] = $username;
  header("Location: /index.php");
} else {
  if (!isset($_SESSION['failed_attempts'])) {
    $_SESSION['failed_attempts'] = 1;
  } else {
    $_SESSION['failed_attempts']++;
  }

  header("Location: /login.php");
  exit;
}