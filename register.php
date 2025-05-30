<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
  <title>Register</title>
</head>
<body>

<h1>Register</h1>
<form action="register_handler.php" method="post">
  <label for="username">Username:</label><br>
  <input type="text" id="username" name="username" required><br>

  <label for="password">Password (min 8 characters):</label><br>
  <input type="password" id="password" name="password" required><br><br>

  <input type="submit" value="Register">
</form>

</body>
</html>