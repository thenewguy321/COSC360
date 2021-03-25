<!DOCTYPE html>
<body>
<?php

     $validinfo=False;
     if ($_SERVER['REQUEST_METHOD']=="GET"){
          $firstname = $_GET['firstname']; 
          $key = $_GET['key']; 
          if (isset($firstname) && isset($key)){
               //echo "First name is set to:".$firstname."</br>";
               //echo "Key is set to:".$key."</br>";
               $validinfo=True;
          }
          else{
               echo "Invalid firstname/key</br>";
          }
     }
     else if ($_SERVER['REQUEST_METHOD']=="POST"){
          $firstname = $_POST['firstname']; 
          $key = $_POST['key']; 
          if (isset($firstname) && isset($key)){
               // echo "First name is set to:".$firstname."</br>";
               // echo "Key is set to:".$key."</br>";
               $validinfo=True;
          }
          else{
               echo "Invalid firstname/key</br>";
          }
     }

     $dataarray=array();
     $file = fopen("data.txt","r");
     while(! feof($file)){
          $temp=explode(",",fgets($file));
          array_push($dataarray,$temp);
     }
     fclose($file);
     #echo $dataarray[1][1];
     $error="";
     if ($validinfo){
          foreach ($dataarray as $value) {
               if (strcasecmp(strval($value[0]),strval($key))==0 && strcasecmp(strval($value[1]),strval($firstname))==0){
                    echo "<h3>".$value[1]."'s coffee choice</h3>";
                    echo "<figure>";
                         echo "<img src=".$value[3].">";
                         echo "<figcaption>".$value[2]."</figcaption>";
                    echo "</figure>";
                    $error="";
                    break;
               }
               else{
                    $error="Invalid info";
               }
          }
     }
     echo $error;
 

?>

</body>