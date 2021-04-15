<!DOCTYPE html>
<html>

<?php
$validinfo=False;
if ($_SERVER['REQUEST_METHOD']=="POST"){
    $uname = $_POST['username']; 

    if (isset($uname)){
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
    $fname="";
    $lname="";
    $email="";
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
        $sql = "SELECT username,firstName,lastName,email FROM users;";
        $results = mysqli_query($connection, $sql);
        //and fetch requsults
        while ($row = mysqli_fetch_assoc($results))
        {
            if (strcmp($uname,strval($row['username']))==0){
                $fname=strval($row['firstName']);
                $lname=strval($row['lastName']);
                $email=strval($row['email']);
               $match=True;
            }
        }
        mysqli_free_result($results);
        mysqli_close($connection);
    }
    if ($match){
        echo "<fieldset>";
        echo "<legend>User:".$uname."</legend>";
        echo "<table>";
        echo "<tr><td>First name:</td><td>".$fname."</td></tr>";
        echo "<tr><td>Last name:</td><td>".$lname."</td></tr>";
        echo "<tr><td>Email:</td><td>".$email."</td></tr>";
        echo "</table>";
        echo "</fieldset>";
    }
}

?>
</html>