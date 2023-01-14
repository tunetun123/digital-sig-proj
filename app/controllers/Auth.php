<?php

class Auth extends Controller
{
    public function __construct()
    {
        if (isLoggedIn() == false) {
            $this->userModel = $this->model('User_Model');
        } else {
            header('location:javascript://history.go(-1)');
        }
        // $this->userModel = $this->model('User_Model');
    }

    public function index()
    {
        $data = [
            'title' => 'Login',
            'username' => '',
            'password' => '',
            'usernameError' => '',
            'passwordError' => ''
        ];

        //cek post
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitasi data post
            $_POST = filter_input_array(INPUT_POST, FILTER_UNSAFE_RAW);

            $data = [
                'title' => 'Login',
                'username' => trim($_POST['username']),
                'password' => trim($_POST['password']),
                'usernameError' => '',
                'passwordError' => ''
            ];

            // validasi username
            if (empty($data['username'])) {
                $data['usernameError'] = 'Masukkan username.';
            }

            // validasi password
            if (empty($data['password'])) {
                $data['passwordError'] = 'Masukkan password.';
            }

            //Cek jika semua errors tidak ada
            if (empty($data['usernameError']) && empty($data['passwordError'])) {
                $loggedInUser = $this->userModel->login($data['username'], $data['password']);

                if ($loggedInUser) {
                    $this->createUserSession($loggedInUser);
                } else {
                    $data['passwordError'] = 'Password atau username salah. Coba Lagi.';

                    $this->view('auth/index', $data);
                }
            }
        } else {
            $data = [
                'title' => 'Login',
                'username' => '',
                'password' => '',
                'usernameError' => '',
                'passwordError' => ''
            ];
        }
        $this->view('auth/index', $data);
    }

    public function createUserSession($user)
    {
        $_SESSION['id_user'] = $user->id_user;
        $_SESSION['username'] = $user->username;
        $_SESSION['role'] = $user->id_role;

        if ($_SESSION['role'] == 1) {
            header('location:' . BASEURL);
        }
        if ($_SESSION['role'] == 2) {
            header('location:' . BASEURL);
        }
    }

    public function logout()
    {
        unset($_SESSION['id_user']);
        unset($_SESSION['username']);
        unset($_SESSION['id_role']);
        header('location:' . BASEURL);
    }
}
