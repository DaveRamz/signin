<?php
include ('../classes/register-contr.classes.php');
    // false en caso de que la variable sea NULL o que ni siquiera exista    ""
  if(isset($_POST["submit"])){
    $email =  $_POST["email"];
    $pwd =  $_POST["password"];
    $confirm =  $_POST["confirmPassword"];

    $register = new RegisterContr($email,$pwd,$confirm);
    $register->registerUser();
    
    header("location: ../index.php?error=none");
  }

?>