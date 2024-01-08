<?php
class adminController extends Controller
{
    private $adminModel;

    public function __construct()
    {
        $this->adminModel = $this->model("Admin");
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'email' => $_POST['email'],
                'password' => $_POST['password'],
                'email_err' => '',
                'password_err' => ''
            ];

            // Check if email exists
            $user = $this->adminModel->getUserByEmail($data['email']);
            if (!$user) {
                $data['email_err'] = 'User not exist';
            }

            // Validate email and password
            if (empty($data['email'])) {
                $data['email_err'] = 'Please enter email';
            }
            if (empty($data['password'])) {
                $data['password_err'] = 'Please enter password';
            }

            if (empty($data['email_err']) && empty($data['password_err'])) {
                $user = $this->adminModel->login($data['email'], $data['password']);
                if ($user) {
                    // Check if the user has admin role (assuming role = 1)
                    if ($user->role == 1) {
                        $_SESSION['user_id'] = $user->id;
                        $_SESSION['user_name'] = $user->username;

                        redirect(URLROOT . '/admin/dashboard');
                    } else {
                        // User is not an admin, handle accordingly
                        $data['password_err'] = ' sorry but you are not an admin';
                        $this->view('admin/login', $data);
                    }
                } else {
                    $data['password_err'] = 'Password Incorrect';
                    $this->view('admin/login', $data);
                }
            } else {
                $this->view('admin/login', $data);
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

            // Load the login page
            $this->view('admin/login', $data);
        }
    }
}