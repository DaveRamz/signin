<?php
include ('../classes/login.classes.php');
class LoginContr extends login{

    private $email;
    private $pwd;

    public function __construct($email,$pwd){
        $this->email = $email;
        $this->pwd = $pwd;
    }

    public function loginUser(){
        if($this->emptyInput() == false){
            header("location: ../index.php?error=emptyInput");
            exit();
        }
        $this->logUser($this->email,$this->pwd);
    }

    private function emptyInput(){
        $check;
        if(empty($this->pwd) || empty($this->email)){
            $check = false;
        }else {
            $check = true;
        }
        return $check;
    }
}
?>