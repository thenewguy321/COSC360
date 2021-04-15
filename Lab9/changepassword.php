<!DOCTYPE html>
<html>

<?php
$validinfo=False;
if ($_SERVER['REQUEST_METHOD']=="POST"){
    $uname = $_POST['username']; 
    $oldpassword = $_POST['oldpassword'];
    $newpassword = $_POST['newpassword']; 
    if (isset($uname) && isset($newpassword) && isset($oldpassword)){
        $validinfo=True;
    }
}
else {
    echo "Invalid information sent, please retry";
}

if ($validinfo){
    $host = "localhost";
    $database = "lab9";
    $user = "root";
    $pass = "";
    $connection = mysqli_connect($host, $user, $pass, $database);
    $error = mysqli_connect_error();
    $match = False;
    if($error != null)
    {
      $output = "<p>Unable to connect to database!</p>";
      exit($output);
    }
    else
    {
        //good connection, so do you thing

        $pass=md5($oldpassword);


        $sql = "SELECT username,password FROM users WHERE username='$uname' AND password='$pass'";


        $results = mysqli_query($connection, $sql);
        //and fetch requsults
        while ($row = mysqli_fetch_assoc($results))
        {
               $match=True;
        }
        mysqli_free_result($results);
        mysqli_close($connection);
    }
    if ($match){
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "lab9";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // prepare and bind
        $passenc = md5($newpassword);
        $stmt = $conn->prepare("UPDATE users SET password='$passenc' WHERE username='$uname'");
        try
        {
            $stmt->execute();
            echo "Password has been changed";
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
        $conn -> close();
    }
    else{
        echo "Username and/or password are invalid";
    }
}

?>
</html>