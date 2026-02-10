<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST["username"];
  $password = $_POST["password"];

if (empty($username)) {
  echo "Username required";
  echo"<br>";
   echo"login Unsuccessfull!";
}
elseif(strlen($password)<6){
   
    echo"password must be 6 character";
}
 else{
  echo "Welcome " . $username;
  echo"<br>";
  echo"login Success";
 }
}


?>
