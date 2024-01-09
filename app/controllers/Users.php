<?php

class Users extends Controller
{
    private $userModel;
    public function __construct()
    {
        $this->userModel = $this->model('User');
    }

    public function login()
    {

        $this->view('users/login');
    }
    public function register()
    {

        $this->view('users/register');
    }

}