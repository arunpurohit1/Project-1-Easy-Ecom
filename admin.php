<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Profile</title>
    <style>
        body{
            background-color: darkcyan;
            text-align: center;
            font-size: larger;
        }
        button{
            font-size: medium;
        }
         input{
            border: 1px solid black;
            font-size: larger;
            font-family: 'Times New Roman', Times, serif;
        }
        label{
            color: black;
            font-size: x-large;
            
        }
    </style>
</head>

<body>
    <h1>Admin Panel</h1>
    <form action="admin.php" method = "post">
        <label for="username">Name:</label><br><p></p>
        <input type="text" name="username"  required><br>
        <p></p>
        <label for="useremail">Email:</label><br><p></p>
        <input type="text" name="useremail"  required><br>
        <p></p>
        <p></p>
        <br>
        <button>Submit</button>
        <p></p>
        <p></p>
        <br>
    </form>
    <h3> User Details </h3>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "user";

    $name = $_POST["username"];
    $email = $_POST["useremail"];
// Create connection
$conn = mysqli_connect($servername, $username, $password , $database);



// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}   
     $sql = "SELECT * FROM userinfo";
     $data = "SELECT Email , user FROM userinfo WHERE Email = '$email' AND user = 'Admin'";
    $main = mysqli_query($conn , $data);
    if(mysqli_num_rows($main) > 0){
     $result = mysqli_query($conn , $sql);
     $num = mysqli_num_rows($result);

     if($num > 0){
         while($row = mysqli_fetch_assoc($result)){
             echo nl2br("Name:-" ."    " .$row["Name"] ."    ". "Email:-" ."    " .$row["Email"]. "    ".  "DOB:-" ."    ". $row["DOB"]. "    ".  "User:-" ."    " . $row["user"]. "\n");
         }
     }
    }
    else{
        echo "You Are Not Admin";
    }
    ?>
</body>
</html>