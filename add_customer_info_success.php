<?php

include 'dbconnect.php';

// storing the query in a variable called $query

$planId = (int)$_POST['plan'];
$employeeId = (int)$_POST['employee'];
$customer_type = $_POST['customer_type'];
$plan_type = (int)$_POST['plan_type'];
$payment = 0;
$familyPlanId = 1101;

//die('here');
if (empty($_POST['Customer_FName']) ||
    empty($_POST['Customer_Lname']) ||
    empty($_POST['Phone_Number'])) {
  die('Name and Phone fields cannot be null');
}
$maxFamilyPlanId = $conn->query("select max(Family_PlanID) as family_planid from Customer");
while ($row = $maxFamilyPlanId->fetch_assoc()){
  $familyPlanId = (int)$row['family_planid']+1;
}
$maxCustId = $conn->query("select max(Customer_ID) as custid from Customer");
while ($row = $maxCustId->fetch_assoc()){
  $customerId = (int)$row['custid']+1;
}

if (!empty($customer_type) && 'I' == $customer_type) {
    $familyPlanId = null;
    $customer_type = null;
}

//print_r($customerId);die;

if (!empty($customer_type) && ('P' == $customer_type or 'I' == $customer_type)) {
  $payment = 1;
  if (empty($_POST['Card_Number']) ||
      empty($_POST['Verification_Document'])) {
    die('Card and Verification Document details needed');
  }
}

$customerQuery =
("INSERT INTO Customer(
  Customer_ID,
  Customer_FName,
  Customer_Lname,
  Phone_Number,
  Family_Plan,
  Family_PlanID,
  Customer_Type,
  Usage_Alert,
  Plan_ID,
  Employee_ID)
VALUES
($customerId,
 '{$_POST['Customer_FName']}',
 '{$_POST['Customer_Lname']}',
 '{$_POST['Phone_Number']}',
'{$plan_type}',
'{$familyPlanId}',
'{$customer_type}',
0,
'{$planId}',
'{$employeeId}')
 ");

if ($conn->query($customerQuery) === FALSE) {
  echo "Error: " . $customerQuery . "<br>" . $conn->error;
  $conn->close();
  die;
} else {
  header("Location: list.php?success=1");
}

if ($payment == 1) {
  $paymentQuery =
    ("INSERT INTO Payment(
      Card_Type,
      Card_Number,
      Address,
      Verification_Document,
      City,
      State,
      Zip,
      Tax,
      Total_Cost)
    VALUES
    ($customerId,
     '{$_POST['Card_Type']}',
     '{$_POST['Card_Number']}',
     '{$_POST['Address']}',
     '{$_POST['Verification_Document']}',
     '{$_POST['City']}',
     '{$_POST['State']}',
     '{$_POST['Zip']}',
     10,
     40
     ");

     if($conn->query($paymentQuery) === TRUE) {
       header("Location: list.php?success=1");
     } else {
       echo "Error: " . $paymentQuery . "<br>" . $conn->error;
     }
}

$conn->close();

echo "<br/>";
echo "<a href='home.php'>Home</a><br/>";
echo "<a href='add_customer.php'>Back</a>";

?>
