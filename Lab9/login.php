<!DOCTYPE html>
<html>

<?php
$validinfo=False;
if ($_SERVER['REQUEST_METHOD']=="POST"){
    $uname = $_POST['username']; 
    $pword = $_POST['password']; 
    if (isset($uname) && isset($pword)){
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
        $passenc=md5($pword);
        $sql = "SELECT username,password FROM users WHERE username='$uname' AND password='$passenc'";

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
        echo "User has a valid account";
    }
    else{
        echo "User has an invalid username/password";
    }


}

?>
</html>