<?php

   $conn = mysqli_connect("172.20.0.15", "root", "1231");
   if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
   }

   $sql = "CREATE DATABASE IF NOT EXISTS myDB";
   if ($conn->query($sql) === TRUE) {
      echo "Database created successfully";
   } else {
      echo "Error creating database: " . $conn->error;
   }

   mysqli_query($conn, "CREATE USER IF NOT EXISTS 'mysqluser'@'%' IDENTIFIED BY 'password';");
   mysqli_query($conn, "GRANT ALL ON myDB.* TO 'mysqluser'@'%'");
   mysqli_query($conn, "FLUSH PRIVILEGES");

   //mysqli_query($conn, "DROP USER 'mysqluser'@'localhost'");
   //mysqli_query($conn, "DROP DATABASE myDB");
   mysqli_close($conn);

   $conn = mysqli_connect("172.20.0.15", "mysqluser", "password");
   if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
   }

   mysqli_select_db($conn, "myDB");

   mysqli_query($conn, "CREATE TABLE IF NOT EXISTS users (id int NOT NULL AUTO_INCREMENT, username varchar(200) NOT NULL, password varchar(200) NOT NULL, PRIMARY KEY (id))");
   //print("Table Created ..."."\n");

   $res = mysqli_query($conn, "INSERT IGNORE INTO users (username, password) VALUES ('Vasiliy', '3fc0a7acf087f549ac2b266baf94b8b1'), ('Sergey', 'c7561db7a418dd39b2201dfe110ab4a4'), ('admin', 'firstpartofflag')");
   //print("Result of Insert Query: ".$res."\n");

   //$res = mysqli_query($conn, "SELECT * FROM users");
   //print("Result of the SELECT query: ");
   //print_r($res);

   mysqli_query($conn, "CREATE TABLE IF NOT EXISTS books (id int NOT NULL AUTO_INCREMENT, bookname varchar(200) NOT NULL, year int NOT NULL, country varchar(200) NOT NULL, author varchar(200) NOT NULL, PRIMARY KEY (id))");
   $resn = mysqli_query($conn, "INSERT IGNORE INTO books (bookname, year, country, author) VALUES ('War and Peace', '1867', 'Russia', 'Leo Tolstoy'), ('Pride and Prejudice', '1813', 'United Kingdom', 'Jane Austen'), ('Torah', '777', 'Ierusalim', 'lol'), ('Bible', '666', 'Heaven', 'Jesus'), ('South Park', '1997', 'USA', 'secondpartofflag')");
   //print_r($resn);

   mysqli_close($conn);

?>
