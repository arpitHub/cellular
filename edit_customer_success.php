<?php

include 'dbconnect.php';

$customerId = $_POST['Customer_ID'];
$fname = $_POST['Customer_FName'];
$lname = $_POST['Customer_Lname'];
$phone = $_POST['Phone_Number'];

$sql  = "
UPDATE Customer
SET    Customer_FName='$fname',Customer_Lname='$lname',Phone_Number='$phone'
WHERE  Customer_ID='$customerId' ";

if ($conn->query($sql) === TRUE) {
    header("Location: list.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
