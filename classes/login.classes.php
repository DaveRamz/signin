<?php 
include ('../classes/dbh.classes.php');
class Login extends Dbh{

    protected function logUser($email,$pwd){

        $stmt = $this->connect()->prepare('SELECT USER_PASSWORD FROM USERS WHERE EMAIL = ?');
        if(!$stmt->execute(array($email))){  
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }

        $check;
        if($stmt->rowCount() == 0){
            $stmt = null;
            header("location: ../index.php?error=userNotFound");
            exit();
        }

        $pwdHashed = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $checkPwd = password_verify($pwd,$pwdHashed[0]["USER_PASSWORD"]);
        if($checkPwd == false){
            $stmt = null;
            header("location: ../index.php?error=wrongPassword");
            exit();
        }else if($checkPwd == true){
            session_start();
            $_SESSION["user_email"] = $email;
        }
        $stmt = null;
    }
}
?>