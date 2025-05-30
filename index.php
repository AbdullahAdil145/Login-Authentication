<?php
session_start();

if (!isset($_SESSION['authenticated'])) {
  header("Location: login.php");
  exit;
}

require_once('user.php');

$user = new User();
$user_list = $user->get_all_users();

echo "<h2>Welcome, " . htmlspecialchars($_SESSION['username']) . "!</h2>";
echo "<a href='logout.php'>Logout</a>";

echo "<h3>All Users</h3>";
echo "<pre>";
print_r($user_list);
?>
