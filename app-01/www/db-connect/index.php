<?php
$servername = "mysql";
$username = "userdb";
$password = "fzL3YUCgQ?Ho2";
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
 mysql_select_db('world',$conn);
?>
