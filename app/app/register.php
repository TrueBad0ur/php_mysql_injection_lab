<html>

<head>
  <link rel="stylesheet" href="styles/main.css">
</head>

<?php
   $conn = mysqli_connect("172.20.0.15", "mysqluser", "password");
   if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
   }

   mysqli_select_db($conn, "myDB");
   $username = $_POST["username"];
   $san_username = filter_var($username, FILTER_SANITIZE_STRING);
   $password = $_POST["password"];
   $san_password = filter_var($password, FILTER_SANITIZE_STRING);
   //echo $username;
   //echo $password;

   $res_u = mysqli_query($conn, "SELECT username FROM users WHERE username='$san_username'");
   //print_r(mysqli_num_rows($res_u));
   if (mysqli_num_rows($res_u) > 0) {
      echo 'Sorry... username already taken';
   } else {
   	$query = "INSERT INTO users (username, password) VALUES ('$san_username', '".md5($san_password)."')";
   	$results = mysqli_query($conn, $query);
   	echo 'You were registered';
   	exit();
   }

   mysqli_close($conn);

?>

</html>
