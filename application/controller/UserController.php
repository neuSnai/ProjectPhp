<?php
class UserController extends Pro_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('UserModel');
    }
    public function show(){
       $users= $this->UserModel->getAllUsers();
        $this->load->view('user/users',array('users'=>$users));
    }
}
?>
