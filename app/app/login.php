<html>

<head>
  <link rel="stylesheet" href="styles/main.css">
</head>

<?php
session_start();

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

$res = mysqli_query($conn, "INSERT IGNORE INTO users (login, password) VALUES ('$san_username', '$san_password')");

$res_u = mysqli_query($conn, "SELECT username FROM users WHERE username='$san_username'");
//print_r(mysqli_num_rows($res_u));
if (mysqli_num_rows($res_u) == 0) {
   echo 'Sorry... no such user';
} else {
   $res_uu = mysqli_query($conn, "SELECT username FROM users WHERE username='$san_username' AND password=" .md5($san_password));
   print_r(mysqli_num_rows($res_uu));
   if (mysqli_num_rows($res_uu) > 0) {
      echo 'Sorry... wrong password';
   } else {
      $_SESSION['username']= $san_username;
      //$_SESSION['password']= $password;
      //$results = mysqli_query($conn, $query);
      //echo 'Saved!';
      header("Location: ./index.php");
      //exit();
   }
}


mysqli_close($conn);

?>
</html>
