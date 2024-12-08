<?php
class Box extends Controller {
    public function index() {
        $data['judul'] = 'Daftar Box';
        $data['box'] = $this->model('Box_model')->getAllBox();
        $this->view('templates/admin_header', $data);
        $this->view('box/index', $data);
        $this->view('templates/admin_footer');
    }

    public function form($id_size = null) {
        $data['judul'] = $id_size ? 'Edit Data Box' : 'Tambah Data Box';
        $data['box'] = $id_size ? $this->model('Box_model')->getBoxById($id_size) : null;

        $this->view('templates/admin_header', $data);
        $this->view('box/form', $data);
        $this->view('templates/admin_footer');
    }    
    
    public function hapus($id_size){
        if($this->model('Box_model')->hapusDataBox($id_size) > 0){
            Flasher::setFlash('berhasil','dihapus','success');
            header('Location:' . BASEURL . '/box');
            exit;
        }else{
            Flasher::setFlash('gagal','dihapus','danger');
            header('Location:' . BASEURL . '/box');
            exit;
        }
    } 

    public function ubah(){
        if($this->model('Menu_model')->ubahDataBox($_POST) > 0){
            Flasher::setFlash('berhasil','diubah','success');
            header('Location:' . BASEURL . '/menu');
            exit;
        }else{
            Flasher::setFlash('gagal','diubah','danger');
            header('Location:' . BASEURL . '/menu');
            exit;
        }
    } 

    public function cari() {
        $data['judul'] = 'Daftar Box';
        $data['box'] = $this->model('Box_model')->cariDataBox();
        $this->view('templates/admin_header', $data);
        $this->view('box/index', $data);
        $this->view('templates/admin_footer');
    }

    public function show_image($id_size) {
        // Menggunakan model untuk menampilkan gambar.
        $this->model('Box_model')->showImage($id_size);
    }

    public function save()
    {
    // Cek apakah ini proses tambah atau edit berdasarkan keberadaan 'id_size'
    if (empty($_POST['id_size'])) {
        // Proses tambah data
        if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] === UPLOAD_ERR_OK) {
            $gambar = file_get_contents($_FILES['gambar']['tmp_name']);
        } else {
            $gambar = null; // Atur gambar null jika tidak ada
        }

        $data = [
            'size' => $_POST['size'],
            'capacity' => $_POST['capacity'],
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
            'id_size' => $_POST['id_size'],
            'size' => $_POST['size'],
            'capacity' => $_POST['capacity'],
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
