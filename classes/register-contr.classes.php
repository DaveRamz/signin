<?php
include ('../classes/register.classes.php');
class RegisterContr extends Register{

    private $email;
    private $pwd;
    private $confirm;

    public function __construct($email,$pwd,$confirm){
        $this->email = $email;
        $this->pwd = $pwd;
        $this->confirm = $confirm;
    }

    public function registerUser(){
        if($this->emptyInput() == false){
            header("location: ../index.php?error=emptyInput");
            exit();
        }
        if($this->matchPwd() == false){
            header("location: ../index.php?error=matchPwd");
            exit();
        }
        if($this->userCheck() == false){
            header("location: ../index.php?error=userCheck");
            exit();
        }
        $this->insertUser($this->email,$this->pwd);
    }

    private function matchPwd(){
        $check;
        if($this->pwd !== $this->confirm){
            $check = false;
        }else {
            $check = true;
        }
        return $check;
    }
    private function userCheck(){
        $check;
        if(!$this->checkUser($this->email)){
            $check = false;
        }else {
            $check = true;
        }
        return $check;

    }
    private function emptyInput(){
        $check;
        if(empty($this->pwd) || empty($this->email) || empty($this->confirm)){
            $check = false;
        }else {
            $check = true;
        }
        return $check;
    }
}
?>