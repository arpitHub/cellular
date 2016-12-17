<?php
include 'dbconnect.php';

$customerId= $_REQUEST['id'];

if ($customerId == '' or $customerId == null) {
  die("Invalid Customer Id");
}

$sql  = "DELETE FROM Customer
WHERE customer_id='$customerId' ";

if ($conn->query($sql) === TRUE) {
    header("Location: list.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
