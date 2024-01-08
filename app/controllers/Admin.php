<?php
class Admin extends Controller
{
    private $userModel;
    public function __construct()
    {
        $this->userModel = $this->model('User');
    }
    public function get_authors()
    {
        $authors = $this->userModel->fetchUsers();
        // var_dump($authors);
        return $authors;

    }
    public function index()
    {
        $data = $this->get_authors();

        // var_dump($data);
        $this->view('admin/index', $data);
    }
    public function users()
    {
        $data = $this->get_authors();

        // var_dump($data);
        $this->view('admin/users', $data);
    }
    public function login()
    {

        $this->view('admin/login');
    }

}


?>