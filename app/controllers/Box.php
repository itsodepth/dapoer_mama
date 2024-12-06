<?php
class Box extends Controller {
    public function index() {
        $data['judul'] = 'Daftar Box';
        $data['box'] = $this->model('Box_model')->getAllBox();
        $this->view('templates/admin_header', $data);
        $this->view('box/index', $data);
        $this->view('templates/admin_footer');
    }

    public function form($id_box = null) {
        $data['judul'] = $id_box ? 'Edit Data Box' : 'Tambah Data Box';
        $data['box'] = $id_box ? $this->model('Box_model')->getBoxById($id_box) : null;

        $this->view('templates/admin_header', $data);
        $this->view('box/form', $data);
        $this->view('templates/admin_footer');
    }    
    
    public function hapus($id_box){
        if($this->model('Box_model')->hapusDataBox($id_box) > 0){
            Flasher::setFlash('berhasil','dihapus','success');
            header('Location:' . BASEURL . '/box');
            exit;
        }else{
            Flasher::setFlash('gagal','dihapus','danger');
            header('Location:' . BASEURL . '/box');
            exit;
        }
    }

    public function getubah() {
        echo json_encode($this->model('Box_model')->getBoxById($_POST['id_box']));
    }   
    
    public function cari() {
        $data['judul'] = 'Daftar Box';
        $data['box'] = $this->model('Box_model')->cariDataBox();
        $this->view('templates/admin_header', $data);
        $this->view('box/index', $data);
        $this->view('templates/admin_footer');
    }

    public function show_image($id_box) {
        // Menggunakan model untuk menampilkan gambar.
        $this->model('Box_model')->showImage($id_box);
    }

    public function save()
    {
    // Cek apakah ini proses tambah atau edit berdasarkan keberadaan 'id_box'
    if (empty($_POST['id_box'])) {
        // Proses tambah data
        if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] === UPLOAD_ERR_OK) {
            $gambar = file_get_contents($_FILES['gambar']['tmp_name']);
        } else {
            $gambar = null; // Atur gambar null jika tidak ada
        }

        $data = [
            'ukuran' => $_POST['ukuran'],
            'kapasitas' => $_POST['kapasitas'],
            'gambar' => $gambar,
        ];

        if ($this->model('Box_model')->addDataBox($data)) {
            Flasher::setFlash('Berhasil', 'ditambahkan', 'success');
        } else {
            Flasher::setFlash('Gagal', 'ditambahkan', 'danger');
        }
    } else {
        // Proses edit data (kode sebelumnya)
        if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] === UPLOAD_ERR_OK) {
            $gambar = file_get_contents($_FILES['gambar']['tmp_name']);
        } else {
            $gambar = base64_decode($_POST['gambar_lama']);
        }

        $data = [
            'id_box' => $_POST['id_box'],
            'ukuran' => $_POST['ukuran'],
            'kapasitas' => $_POST['kapasitas'],
            'gambar' => $gambar,
        ];

        if ($this->model('Box_model')->updateDataBox($data)) {
            Flasher::setFlash('Berhasil', 'diedit', 'success');
        } else {
            Flasher::setFlash('Gagal', 'diedit', 'danger');
        }
    }

    header('Location: ' . BASEURL . '/box');
    exit;
}

}
