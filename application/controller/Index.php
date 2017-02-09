<?php
class Index extends Pro_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin');
    }
    public function index(){

        $this->load->view('index/index');
    }

    public function login(){
        if(IS_POST){
            $username=$_POST['username'];
            $password=$_POST['password'];
            $checkResult=$this->Admin->check($username,$password);
            if($checkResult['status']==1){
                $this->index();
            }
            else{
                $mes=$checkResult['message'];
                $this->load->view("index/login",array('mes'=>$mes));
            }
        }
        else{
            $this->load->view("index/login.php");
        }

    }
    public function logout(){
        $this->login();
    }

}
?>