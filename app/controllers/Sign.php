<?php

use Endroid\QrCode\QrCode;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelHigh;
use Endroid\QrCode\Color\Color;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\RoundBlockSizeMode\RoundBlockSizeModeMargin;
use Endroid\QrCode\Writer\PngWriter;


class Sign extends Controller
{
    public function __construct()
    {
        $sess = isLoggedIn();
        if ($sess == false) {
            header('location:' . BASEURL . '/auth');
        } else {
            $this->sigModel = $this->model('Sig_Model');
        }
    }

    public function index()
    {
        $data = [
            'title' => 'Tanda tangan',
        ];
        $this->view('templates/header', $data);
        $this->view('signing/index', $data);
        $this->view('templates/footer');

        if (isset($_POST['uploadbtn'])) {
            $namedir = $_SESSION['username'];
            $validEkstensi = 'pdf';
            $nama = $_FILES['dokumen']['name'];

            $x = explode('.', $nama);

            $ekstensi = strtolower(end($x));

            $ukuran = $_FILES['dokumen']['size'];
            $file_tmp = $_FILES['dokumen']['tmp_name'];

            $target_dir = '../public/docs/' . $namedir . '/' . $nama;

            move_uploaded_file($file_tmp, $target_dir);

            $hash = $this->hashing($nama);

            $params = [
                'judul_dokumen' => $nama,
                'dokumen' => $target_dir,
                'nilai_hash' => $hash
            ];

            if ($this->sigModel->uploadDokumen($params)) {
                header('location:' . BASEURL . '/sign/generate/' . $hash);
            }
        }
    }

    public function hashing($nama)
    {
        $namedir = $_SESSION['username'];
        $file = '../public/docs/' . $namedir . '/' . $nama;
        $hash = md5_file($file);

        return $hash;
    }

    public function encrypt($n, $kPrivat, $nilai_hash)
    {
        $hash_array = str_split($nilai_hash);
        $hash_dec = '';

        foreach ($hash_array as $a) {
            $hash_dec .= hexdec($a);
        }

        $n = gmp_init($n);
        $hash_dec = gmp_init($hash_dec);

        $c = gmp_pow($hash_dec, $kPrivat);
        $enkripsi = gmp_mod($c, $n);

        $enkripsi = gmp_strval($enkripsi);

        return $enkripsi;
    }

    public function kongruen($n, $h)
    {
        $hash_array = str_split($h);
        $hash_dec = '';

        foreach ($hash_array as $a) {
            $hash_dec .= hexdec($a);
        }

        $test = gmp_init($hash_dec);
        $nn = gmp_init($n);

        $kongruen = gmp_mod($test, $nn);

        $kongruen = gmp_strval($kongruen);

        return $kongruen;
    }

    public function generate($hash)
    {
        $result = $this->sigModel->getDokumen($hash);

        $data = [
            'title' => 'Tanda tangan',
            'id_dokumen' => $result->id_dokumen,
            'judul_dokumen' => $result->judul_dokumen,
            'hash' => $result->nilai_hash
        ];

        $this->view('templates/header', $data);
        $this->view('signing/generate', $data);
        $this->view('templates/footer');
    }

    public function sigproses()
    {
        if (isset($_POST['btngenerate'])) {

            $kunci_privat = $_POST['kunci-privat'];

            $hasil = $this->sigModel->getKunci($kunci_privat);

            if ($kunci_privat == $hasil->kunci_privat) {
                if ($_SESSION['id_user'] == $hasil->id_user) {
                    $nilai_n = $hasil->nilai_n;
                    $kPrivat = $hasil->kunci_privat;
                    $idKunci = $hasil->id_kunci;
                    $nilai_hash = $_POST['nilaihash'];

                    $kongruen = $this->kongruen($nilai_n, $nilai_hash);

                    $sig = $this->encrypt($nilai_n, $kPrivat, $nilai_hash);

                    $input = [
                        'id_dokumen' => $_POST['id-dokumen'],
                        'id_kunci' => $idKunci,
                        'sig' => $sig,
                        'kongruen' => $kongruen,
                        'tanggal_pengesahan' => date('Y-m-d'),
                        'waktu_pengesahan' => date("H:i:s")
                    ];

                    if ($this->sigModel->generateSig($input)) {
                        header('location:' . BASEURL . '/sign/sukses/' . $sig);
                    }
                } else {
                    // kunci tidak terdaftar
                    Flasher::setFlash('Kunci yang di masukkan', 'tidak terdaftar, coba lagi!', 'danger');
                    header('location:' . BASEURL . '/sign/generate/' . $_POST['nilaihash']);
                }
            } else {
                // salah input kunci
                Flasher::setFlash('Kunci yang di masukkan', 'salah, coba lagi!', 'danger');
                header('location:' . BASEURL . '/sign/generate/' . $_POST['nilaihash']);
            }
        }

        if (isset($_POST['btnbatal'])) {
            $target = $_POST['nama-dokumen'];
            unlink('../public/docs/' . $_SESSION['username'] . '/' . $target);

            if ($this->sigModel->deleteDokumen($_POST['id-dokumen'])) {

                $data = [
                    'title' => 'Tanda tangan',
                    'id_dokumen' => '',
                    'judul_dokumen' => '',
                    'hash' => ''
                ];
                header('location:' . BASEURL . '/sign');
            }
        }
    }

    public function sukses($signature = 'blank')
    {
        $tmpdir = '../public/img/qr_tmp/';
        if (file_exists($tmpdir)) {
            $writer = new PngWriter();
            $name = substr($signature, 0, 4);

            $qrCode = QrCode::create($signature)
                ->setEncoding(new Encoding('UTF-8'))
                ->setErrorCorrectionLevel(new ErrorCorrectionLevelHigh())
                ->setSize(300)
                ->setMargin(10)
                ->setRoundBlockSizeMode(new RoundBlockSizeModeMargin())
                ->setForegroundColor(new Color(0, 0, 0))
                ->setBackgroundColor(new Color(255, 255, 255));

            $result = $writer->write($qrCode);

            $result->saveToFile($tmpdir . $name . '.png');

            $dataUri = $result->getDataUri();
        }

        $data = [
            'title' => 'Tanda tangan',
            'sig' => $signature,
            'qr' => $dataUri
        ];

        $this->view('templates/header', $data);
        $this->view('signing/success', $data);
        $this->view('templates/footer');
    }
}
