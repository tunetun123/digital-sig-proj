<?php

class Home extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Home',
            'currPage' => 'home'
            // 'role' => ''
        ];
        $this->view('templates/header', $data);
        $this->view('home/index');
        $this->view('templates/footer');
    }

    public function scan()
    {
        $data['title'] = 'Verifikasi QR-Code';

        $this->view('templates/header', $data);
        $this->view('home/scan');
        $this->view('templates/footer');
    }

    public function upload()
    {
        $data['title'] = 'Verifikasi dengan File';

        $this->view('templates/header', $data);
        $this->view('home/upload');
        $this->view('templates/footer');
    }
}
