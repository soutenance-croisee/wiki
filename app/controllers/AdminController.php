<?php 
class AdminController extends Controller{
    private $adminModel ;
    public function __construct()
    {
        $this->adminModel = $this->model('Admin');
        
    }

public function dash(){

    $this->view('admin/dashAdmin');
}
public function login(){

    $this->view('admin/login');
}

}


?>