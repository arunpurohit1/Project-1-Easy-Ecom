<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
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
    <h1>User Panel</h1>
    <form action="user.php" method = "post">
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
    <h3> Your Details </h3>
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
     $data = "SELECT Name, Email, DOB , user FROM userinfo WHERE Email = '$email' AND user = 'user'";
    $main = mysqli_query($conn , $data);
    $followingdata = $main->fetch_array(MYSQLI_ASSOC);
   echo nl2br("Name:-" ."      ". "  " .$followingdata["Name"] ."      ". "Email:-" ."       " .$followingdata["Email"]. "       ".  "DOB:-" ."       ". $followingdata["DOB"]. "        ".  "User:-" ."       " . $followingdata["user"]. "\n");
    ?>
</body>
</html>