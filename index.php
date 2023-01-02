<?php

echo "Hello World, It is Henry";

$servername = "some-mysql";
$username = "root";
$password = "my-secret-pw";
$database = "myDB1";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";

/*
//Create database
$sql = "CREATE DATABASE myDB1";
if (mysqli_query($conn, $sql)) {
  echo "Database created successfully";
} else {
  echo "Error creating database: " . mysqli_error($conn);
}

mysqli_close($conn);


// sql to create table
$sql = "CREATE TABLE MyGuests (
id INT(6),
firstname VARCHAR(30),
lastname VARCHAR(30),
email VARCHAR(50),
reg_date VARCHAR(10)
)";

if (mysqli_query($conn, $sql)) {
  echo "Table MyGuests created successfully";
} else {
  echo "Error creating table: " . mysqli_error($conn);
}


$sql = "INSERT INTO MyGuests (id,firstname, lastname, email,reg_date)
VALUES ('1','John', 'Doe', 'john@example.com','12/10/20')";

if (mysqli_query($conn, $sql)) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
*/

$sql = "SELECT id, firstname, lastname FROM MyGuests";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while ($row = mysqli_fetch_assoc($result)) {
    echo "id: " . $row["id"] . " - Name: " . $row["firstname"] . " " . $row["lastname"] . "<br>";
  }
} else {
  echo "0 results";
}

mysqli_close($conn);
