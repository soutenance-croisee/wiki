<?php
class Pages extends Controller
{
    private $userModel;

    public function __construct()
    {

        $this->userModel = $this->model('User');
    }

    public function get_categories()
    {
        $categories = $this->userModel->fetchCategories();
        return $categories;
    }
    public function index()
    {
        $data['categories'] = $this->get_categories();

        $this->view('pages/index');
    }
}