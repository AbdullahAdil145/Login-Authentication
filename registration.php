<?php

require_once('user.php');

$username = $_POST['username'];
$password = $_POST['password'];

$user = new User();
$result = $user->create_user($username, $password);

if (isset($result['error'])) {
  echo '<p style="color:red;">' . $result['error'] . '</p>';
  echo '<a href="register.php">Try again</a>';
} else {
  echo '<p style="color:green;">Account created successfully.</p>';
  echo '<a href="login.php">Login here</a>';
}
?>