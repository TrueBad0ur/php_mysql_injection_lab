<html>

<head>
  <link rel="stylesheet" href="styles/main.css">
</head>

<div id="upper">
<h4>Getting info about books service</h4>
<form action='books.php' method="GET">
        <div class="main">
                <div class="field">
                        <label for="n">Book: </label>
                        <input type="text" id="n" name="book" size="25">
                </div>
                <input type="submit" value="Submit"/>
        </div>
</form>
</div>
</html>


<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: ./index.php");
    die();
}

if ($_GET['book'] != "") {
   $bookname = $_GET['book'];
   //echo $bookname;
   $conn = mysqli_connect("172.20.0.15", "mysqluser", "password");
   if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
   }
   //$res_u = mysqli_query($conn, "SELECT author FROM books WHERE bookname='War and Peace'");
   mysqli_select_db($conn, "myDB");


   $res = mysqli_query($conn, "SELECT * FROM books WHERE bookname like '%" . $bookname . "%'");

   if (!$res) {
?>
   <tr height="50">
            <td colspan="5" width="580"><?php die("Error: " . mysqli_error()); ?></td>
   </tr>
<?php
   }
   if (mysqli_num_rows($res) != 0) {
      //print_r(mysqli_num_rows($res));
      while ($row = mysqli_fetch_array($res)) {
?>
      <table>
	<tr height="30">

            <td><?php echo $row["bookname"]; ?></td>
            <td align="center"><?php echo $row["year"]; ?></td>
            <td><?php echo $row["country"]; ?></td>
            <td align="center"><?php echo $row["author"]; ?></td>

        </tr>
<?php
      }
   } else {
?>
      <tr height="30">

            <td colspan="5" width="580">No movies were found!</td>
            <!--
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            -->

        </tr>
<?php
   }

mysqli_close($conn);
}
?>
