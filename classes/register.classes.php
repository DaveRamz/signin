<?php 
include ('../classes/dbh.classes.php');
class Register extends Dbh{

    protected function insertUser($email,$pwd){
        $stmt = $this->connect()->prepare('CALL INSERT_USER(?,?);');
        
        $pwdHashed = password_hash($pwd,PASSWORD_DEFAULT);

        if(!$stmt->execute(array($email,$pwdHashed))){  
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }
        $stmt = null;
    }

    protected function checkUser($email){
        $stmt = $this->connect()->prepare('SELECT EMAIL FROM USERS WHERE EMAIL = ?;');
        if(!$stmt->execute(array($email))){  //false si no se pudo ejecutar
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }
        $check;
        if($stmt->rowCount() > 0){
            $check = false;
        }else {
            $check = true;
        }
        return $check;
    }
}
?>