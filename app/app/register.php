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
   $password = $_POST["password"];
   //echo $username;
   //echo $password;

   $res_u = mysqli_query($conn, "SELECT username FROM users WHERE username='$username'");
   print_r(mysqli_num_rows($res_u));
   if (mysqli_num_rows($res_u) > 0) {
      echo 'Sorry... username already taken';
   } else {
   	$query = "INSERT INTO users (username, password) VALUES ('$username', '".md5($password)."')";
   	$results = mysqli_query($conn, $query);
   	echo 'Saved!';
   	exit();
   }

   mysqli_close($conn);

?>

</html>
