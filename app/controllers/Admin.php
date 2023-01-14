<?php

class Admin extends Controller
{

    public function __construct()
    {
        $sess = isLoggedIn();
        if ($sess == false) {
            header('location:' . BASEURL . '/auth');
        } else {
            if ($_SESSION['role'] == 1) {
                $this->userModel = $this->model('User_Model');
                $this->keyModel = $this->model('Key_Model');
                $this->karyawanModel = $this->model('Karyawan_Model');
            } else {
                header('location:javascript://history.go(-1)');
            }
        }
    }


    public function index()
    {
        $data = [
            'title' => 'Admin',
            'page' => BASEURL . '/admin',
            'listname' => $this->userModel->getName()
        ];

        $this->view('admin/layout/header', $data);
        $this->view('admin/kunci/index', $data);
        $this->view('admin/layout/footer');


    }

    public function createkey()
    {
        $inputs = [
            'id_user' => '',
            'nilai_n' => '',
            'kunci_publik' => '',
            'kunci_privat' => '',
            'err_id_user' => '',
            'err_nilai_n' => '',
            'err_kunci_publik' => '',
            'err_kunci_privat' => ''
        ];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_UNSAFE_RAW);

            $inputs = [
                'id_user' => trim($_POST['iduser']),
                'nilai_n' => trim($_POST['nilain']),
                'kunci_publik' => trim($_POST['kuncipublik']),
                'kunci_privat' => trim($_POST['kunciprivat']),
                'err_id_user' => '',
                'err_nilai_n' => '',
                'err_kunci_publik' => '',
                'err_kunci_privat' => ''
            ];

            if (
                empty($inputs['err_id_user']) &&
                empty($inputs['err_nilai_n']) &&
                empty($inputs['err_kunci_publik']) &&
                empty($inputs['err_kunci_privat'])
            ) {
                if ($this->keyModel->addKey($inputs)) {
                    header('location:' . BASEURL . '/admin/listkunci');
                }
            }
        }
    }

    public function listkunci()
    {
        $data = [
            'title' => 'Admin',
            'page' => BASEURL . '/admin/listkunci',
            'list' => $this->keyModel->listKey()
        ];

        $this->view('admin/layout/header', $data);
        $this->view('admin/kunci/listkunci', $data);
        $this->view('admin/layout/footer');
    }

    public function akuncreate()
    {
        $data = [
            'title' => 'Admin',
            'page' => BASEURL . '/admin/akuncreate',
            'nik' => '',
            'role' => '',
            'username' => '',
            'password' => '',
            'password_rpt' => '',
            'err_nik' => '',
            'err_role' => '',
            'err_username' => '',
            'err_password' => '',
            'err_password_rpt' => ''
        ];

        if (isset($_POST['buatakun'])) {
            $_POST = filter_input_array(INPUT_POST, FILTER_UNSAFE_RAW);

            $data = [
                'title' => 'Admin',
                'page' => BASEURL . '/admin/akuncreate',
                'nik' => trim($_POST['nik']),
                'role' => trim($_POST['role']),
                'username' => trim($_POST['username']),
                'password' => trim($_POST['password']),
                'password_rpt' => trim($_POST['password-rpt']),
                'err_nik' => '',
                'err_role' => '',
                'err_username' => '',
                'err_password' => '',
                'err_password_rpt' => ''
            ];

            $nameValidation = "/^[a-zA-Z0-9]*$/";
            $passwordValidation = "/^(.{0,7}|[^a-z]*|[^\d]*)$/i";

            //Validate username on letters/numbers
            if (empty($data['username']) || ($data['username'] == '--Nama Penandatangan--')) {
                $data['err_username'] = 'Masukkan username.';
            } elseif (!preg_match($nameValidation, $data['username'])) {
                $data['err_username'] = 'Username hanya bisa memuat huruf dan angka.';
            } elseif ($this->userModel->username($data['username'])) {
                $data['err_username'] = 'Username tersebut sudah terdaftar.';
            }

            // Validate password on length, numeric values,
            if (empty($data['password'])) {
                $data['err_password'] = 'Masukkan Password.';
            } elseif (strlen($data['password']) < 6) {
                $data['err_password'] = 'Password minimal 8 karakter';
            } elseif (preg_match($passwordValidation, $data['password'])) {
                $data['err_password'] = 'Password harus memiliki setidaknya satu angka.';
            }

            //Validate confirm password
            if (empty($data['password_rpt'])) {
                $data['err_password_rpt'] = 'Masukkan Password.';
            } else {
                if ($data['password'] != $data['password_rpt']) {
                    $data['err_password_rpt'] = 'Passwords tidak sama, coba lagi!.';
                }
            }

            //Validate select role
            if (empty($data['role']) || ($data['role'] == 'Pilih Role')) {
                $data['err_role'] = 'Role belum dipilih.';
                $data['role'] = '';
            }

            //Validate select karyawan
            if (empty($data['nik']) || ($data['nik'] == 'Pilih Nama Karyawan')) {
                $data['err_nik'] = 'Nama Karyawan belum dipilih.';
                $data['nik'] = '';
            } elseif ($this->userModel->nikCheck($data['nik'])) {
                $data['err_username'] = 'Karyawan tersebut sudah terdaftar.';
                $data['nik'] = '';
            }

            // Make sure that errors are empty
            if (
                empty($data['err_username']) && empty($data['err_password'])
                && empty($data['err_password_rpt']) && empty($data['err_role'])
                && empty($data['err_nik'])
            ) {

                // Hash password
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                //Register user from model function
                if ($this->userModel->register($data)) {
                    $dir = BASEURL . '/docs' . '/' . $data['username'] .'/';
                    if(!file_exists($dir)) {
                        mkdir($dir);
                    }
                    //Redirect to the list akun
                    header('location: ' . BASEURL . '/admin/listakun');
                } else {
                    die('Something went wrong.');
                }
            }
        }

        $this->view('admin/layout/header', $data);
        $this->view('admin/akun/index', $data);
        $this->view('admin/layout/footer');
    }

    public function listakun()
    {
        $data = [
            'title' => 'Admin',
            'page' => BASEURL . '/admin/listakun',
            'list' => $this->userModel->listUsers()
        ];

        $this->view('admin/layout/header', $data);
        $this->view('admin/akun/listakun', $data);
        $this->view('admin/layout/footer');
    }
}
