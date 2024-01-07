<?php

class Users extends Controller
{
    public function index()
    {

        $this->view('pages/index');
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