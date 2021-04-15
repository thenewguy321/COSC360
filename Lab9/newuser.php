<!DOCTYPE html>
<html>

<p>Here are some results:</p>

<?php
$validinfo=False;
if ($_SERVER['REQUEST_METHOD']=="POST"){
    $fname = $_POST['firstname']; 
    $lname = $_POST['lastname']; 
    $uname = $_POST['username']; 
    $email = $_POST['email']; 
    $password = $_POST['password']; 
    if (isset($fname) && isset($lname) && isset($uname) && isset($email) && isset($password)){
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
    $pa = "";
    $connection = mysqli_connect($host, $user, $pa, $database);
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
        $sql = "SELECT username,email FROM users;";
    
        $results = mysqli_query($connection, $sql);
    
        //and fetch requsults
        while ($row = mysqli_fetch_assoc($results))
        {
            if (strcmp($uname,strval($row['username']))==0 || strcmp($email,strval($row['email']))==0){
                $match=True;
            }
        }
        mysqli_free_result($results);
        mysqli_close($connection);
    }

    if ($match){
        echo "<p>User already exists with this username and/or email.</p>";
        echo "<a href='lab9-1.html'>Return to user entry</a>";
    }
    else{
        $servername = "localhost";
        $username = "root";
        $pas = "";
        $dbname = "lab9";

        // Create connection
        $conn = new mysqli($servername, $username, $pas, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // prepare and bind
        $passenc = md5($password);
        $stmt = $conn->prepare("INSERT INTO users (username, firstName, lastName, email, password) VALUES ('$uname', '$fname', '$lname','$email','$passenc')");
        try
        {
            $stmt->execute();
            echo "An account for the user has been created";
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
        $conn -> close();
    }

}


?>
</html>