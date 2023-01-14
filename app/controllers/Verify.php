<?php

class Verify extends Controller
{
    public function __construct()
    {
        $this->keyModel = $this->model('Key_Model');
        $this->sigModel = $this->model('Sig_Model');
    }

    public function dekripsi($id_kunci, $sig)
    {
        $dekripsi = '';

        $tarik = $this->keyModel->pubKeyById($id_kunci);

        $kPublik = $tarik->kunci_publik;
        $n = $tarik->nilai_n;

        $p = gmp_pow((int)$sig, $kPublik);
        $dekripsi .= gmp_mod($p, $n);

        $dekripsi = strval($dekripsi);

        return $dekripsi;
    }

    public function verifybyqr()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['qr-submit'])) {
            $_POST = filter_input_array(INPUT_POST, FILTER_UNSAFE_RAW);

            if (empty($_POST['hasilscan'])) {
                Flasher::setFlash('Kolom Tanda tangan', 'masih kosong, coba scan lagi!', 'danger');
                header('location:' . BASEURL . '/verify');
            } else if ((empty($_POST['listnama'])) || ($_POST['listnama'] == '--Nama Penandatangan--')) {
                Flasher::setFlash('Silahkan', 'memilih nama, coba lagi!', 'danger');
                header('location:' . BASEURL . '/verify');
            } else {
                $id_kunci = $_POST['listnama'];
                $sig = $_POST['hasilscan'];

                $dekripsi = $this->dekripsi($id_kunci, $sig);

                $get = $this->sigModel->getKongruen($sig);
                $id_sig = $get->id_sig;


                if ($dekripsi == $get->kongruen) {
                    header('location:' . BASEURL . '/verify/verified/' . $id_sig);
                } else {
                    header('location:' . BASEURL . '/verify/notverified');
                }
            }
        }
    }

    public function index()
    {
        $data = [
            'title' => 'Verifikasi',
            'listname' => $this->keyModel->keyUser()
        ];

        $this->view('templates/header', $data);
        $this->view('verify/scan', $data);
        $this->view('templates/footer');
    }

    public function verified($hasil)
    {

        $res = $this->sigModel->getDetail($hasil);

        $data = [
            'title' => 'Verifikasi',
            'nama' => $res->nama,
            'divisi' => $res->divisi,
            'jabatan' => $res->jabatan,
            'judul_dokumen' => $res->judul_dokumen,
            'tgl_sah' => $res->tanggal_pengesahan,
            'waktu_sah' => $res->waktu_pengesahan,
            'k_publik' => $res->kunci_publik
        ];

        $this->view('templates/header', $data);
        $this->view('verify/index', $data);
        $this->view('templates/footer');
    }

    public function notverified()
    {
        $data = [
            'title' => 'Verifikasi'
        ];

        $this->view('templates/header', $data);
        $this->view('verify/notverified');
        $this->view('templates/footer');
    }
}
