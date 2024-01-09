<?php
class UsersController extends Controller
{

    private $userModel;
    public function __construct()
    {
        $this->userModel = $this->model('User');
    }
    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'name' => $_POST['username'],
                'email' => $_POST['email'],
                'password' => $_POST['password'],
                'name_err' => '',
                'email_err' => '',
                'password_err' => '',
            ];
            if (empty($data['name']))
                $data['name_err'] = 'Please enter name';
            if (empty($data['email']))
                $data['email_err'] = 'Please enter email ';
            if (empty($data['password']))
                $data['password_err'] = 'Please enter password';


            // check if email exist
            if ($this->userModel->getUserByEmail($data['email'])) {
                $data['email_err'] = 'Email exists';
            }

            if (empty($data['name_err']) && empty($data['email_err']) && empty($data['password_err'])) {
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
                // user register success
                if ($this->userModel->register($data['name'], $data['email'], $data['password'])) {
                    // user added successfully
                    // die('testiiing');

                    redirect(URLROOT . '/users/login');
                } else {
                    // user not added successfully
                    die('Something went wrong!!');
                }
            } else {
                $this->view('users/register', $data);
            }
        } else {
            $data = [
                'name' => '',
                'email' => '',
                'password' => '',
                'name_err' => '',
                'email_err' => '',
                'password_err' => '',
            ];

            // load the register
            $this->view('users/register', $data);
        }
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'email' => $_POST['email'],
                'password' => $_POST['password'],
                'email_err' => '',
                'password_err' => ''
            ];

            // check if email exist
            if (!$this->userModel->getUserByEmail($data['email'])) {
                $data['email_err'] = 'User not exist';
            }
            if (empty($data['email']))
                $data['email_err'] = 'Please enter email';
            if (empty($data['password']))
                $data['password_err'] = 'Please enter password';

            if (empty($data['email_err']) && empty($data['password_err'])) {
                $user = $this->userModel->login($data['email'], $data['password']);
                // die(var_dump($user));
                if ($user) {
                    // set The sessions
                    $_SESSION['user_id'] = $user['id'];
                    // die(var_dump($_SESSION['user_id']));
                    $_SESSION['user_name'] = $user['username'];
                    $_SESSION['email'] = $user['email'];
                    redirect(URLROOT . '/pages/index');
                } else {
                    // password incorrect
                    $data['password_err'] = 'Password Incorrect';
                    $this->view('users/login', $data);
                }
            } else {
                // user register failed
                $this->view('users/login', $data);
            }
        } else {
            $data = [
                'name' => '',
                'email' => '',
                'password' => '',
                'name_err' => '',
                'email_err' => '',
                'password_err' => '',
            ];

            // load the register
            $this->view('users/login', $data);
        }
    }
    // logout
    public function logout()
    {
        $_SESSION['users_id'] = null;
        $_SESSION['name'] = null;
        session_destroy();
        redirect('');
    }

}