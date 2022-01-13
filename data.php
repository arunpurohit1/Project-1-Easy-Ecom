<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>php data</title>
</head>
<body>
    <?php include "form.html"?>
    <?php  
      $name = !empty($_POST['username']) ? $_POST['username'] : '';
      $email = !empty($_POST['useremail']) ? $_POST['useremail'] : '';
      $dob = !empty($_POST['userdob']) ? $_POST['userdob'] : '';
      $userconfig = !empty($_POST['userconfig']) ? $_POST['userconfig'] : '';
    ?>

     <?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "user";

// Create connection
$conn = mysqli_connect($servername, $username, $password , $database);


// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";


// $sql = "CREATE TABLE `user`.`userinfo` ( `Name` VARCHAR(15) NOT NULL , `Email` VARCHAR(30) NOT NULL , `DOB` DATE NOT NULL , `user/admin` VARCHAR(15) NOT NULL )";

// $result = mysqli_query($conn , $sql);
 
// if($result){
//   echo "The Table has been created";
// }
// else{
//   echo "Table not created".mysqli_error($conn);
// }

$sql = "INSERT INTO userinfo (`Name`, `Email`, `DOB` , `user` ) VALUES ('$name', '$email','$dob','$userconfig')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

if ("$userconfig" == "Admin"){
  header("Location: http://localhost/Project-1-EASY-ECOM-MASTER/admin.php", true, 301);
  exit();
}

if ("$userconfig" == "User"){
  header("Location: http://localhost/Project-1-EASY-ECOM-MASTER/user.php", true, 301);
  exit();
}


?> 
</body>
</html>