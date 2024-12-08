<?php
class Diskon extends Controller {
    public function index() {
        $data['judul'] = 'Daftar Diskon';
        $data['diskon'] = $this->model('Diskon_model')->getAllDiskon();
        $this->view('templates/admin_header', $data);
        $this->view('diskon/index', $data);
        $this->view('templates/admin_footer');
    }

    public function form($id_diskon = null) {
        $data['judul'] = $id_diskon ? 'Edit Data Diskon' : 'Tambah Data Diskon';
        $data['diskon'] = $id_diskon ? $this->model('Diskon_model')->getDiskonById($id_diskon) : null;

        $this->view('templates/admin_header', $data);
        $this->view('diskon/form', $data);
        $this->view('templates/admin_footer');
    }    
    
    public function hapus($id_diskon){
        if($this->model('Diskon_model')->hapusDataDiskon($id_diskon) > 0){
            Flasher::setFlash('berhasil','dihapus','success');
            header('Location:' . BASEURL . '/diskon');
            exit;
        }else{
            Flasher::setFlash('gagal','dihapus','danger');
            header('Location:' . BASEURL . '/diskon');
            exit;
        }
    }

    public function getubah() {
        echo json_encode($this->model('Diskon_model')->getDiskonById($_POST['id_diskon']));
    }

    public function ubah(){
        if($this->model('Diskon_model')->ubahDataDiskon($_POST) > 0){
            Flasher::setFlash('berhasil','diubah','success');
            header('Location:' . BASEURL . '/diskon');
            exit;
        }else{
            Flasher::setFlash('gagal','diubah','danger');
            header('Location:' . BASEURL . '/diskon');
            exit;
        }
    }    
    
    public function cari() {
        $data['judul'] = 'Daftar Diskon';
        $data['diskon'] = $this->model('Diskon_model')->cariDataDiskon();
        $this->view('templates/admin_header', $data);
        $this->view('diskon/index', $data);
        $this->view('templates/admin_footer');
    }

    public function save()
{
    // Cek apakah ini proses tambah atau edit berdasarkan keberadaan 'id_diskon'
    if (empty($_POST['id_diskon'])) {
        // Proses tambah data
        $data = [
            'judul' => $_POST['judul'],
            'besaran' => $_POST['besaran'],
            'maksharga' => $_POST['maksharga'],
            'tanggalexp' => $_POST['tanggalexp'],
            'deskripsi' => $_POST['deskripsi'],
        ];

        if ($this->model('Diskon_model')->addDataDiskon($data)) {
            Flasher::setFlash('Berhasil', 'ditambahkan', 'success');
        } else {
            Flasher::setFlash('Gagal', 'ditambahkan', 'danger');
        }
    } else {
        // Proses edit data
        $data = [
            'id_diskon' => $_POST['id_diskon'],
            'judul' => $_POST['judul'],
            'besaran' => $_POST['besaran'],
            'maksharga' => $_POST['maksharga'],
            'tanggalexp' => $_POST['tanggalexp'],
            'deskripsi' => $_POST['deskripsi'],
        ];

        if ($this->model('Diskon_model')->updateDataDiskon($data)) {
            Flasher::setFlash('Berhasil', 'diedit', 'success');
        } else {
            Flasher::setFlash('Gagal', 'diedit', 'danger');
        }
    }

    header('Location: ' . BASEURL . '/diskon');
    exit;
}

}
