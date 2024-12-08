<?php
class Menu extends Controller {
    public function index() {
        $data['judul'] = 'Daftar Menu';
        $data['menu'] = $this->model('Menu_model')->getAllMenu();
        $this->view('templates/admin_header', $data);
        $this->view('menu/index', $data);
        $this->view('templates/admin_footer');
    }

    public function form($id_menu = null) {
        $data['judul'] = $id_menu ? 'Edit Data Menu' : 'Tambah Data Menu';
        $data['menu'] = $id_menu ? $this->model('Menu_model')->getMenuById($id_menu) : null;

        $this->view('templates/admin_header', $data);
        $this->view('menu/form', $data);
        $this->view('templates/admin_footer');
    }    
    
    public function hapus($id_menu){
        if($this->model('Menu_model')->hapusDataMenu($id_menu) > 0){
            Flasher::setFlash('berhasil','dihapus','success');
            header('Location:' . BASEURL . '/menu');
            exit;
        }else{
            Flasher::setFlash('gagal','dihapus','danger');
            header('Location:' . BASEURL . '/menu');
            exit;
        }
    }

    public function getubah() {
        echo json_encode($this->model('Menu_model')->getMenuById($_POST['id_menu']));
    }

    public function ubah(){
        if($this->model('Menu_model')->ubahDataMenu($_POST) > 0){
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
        $data['judul'] = 'Daftar Menu';
        $data['menu'] = $this->model('Menu_model')->cariDataMenu();
        $this->view('templates/admin_header', $data);
        $this->view('menu/index', $data);
        $this->view('templates/admin_footer');
    }

    public function show_image($id_menu) {
        // Menggunakan model untuk menampilkan gambar.
        $this->model('Menu_model')->showImage($id_menu);
    }

    public function save()
{
    // Cek apakah ini proses tambah atau edit berdasarkan keberadaan 'id_menu'
    if (empty($_POST['id_menu'])) {
        // Proses tambah data
        if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] === UPLOAD_ERR_OK) {
            $gambar = file_get_contents($_FILES['gambar']['tmp_name']);
        } else {
            $gambar = null; // Atur gambar null jika tidak ada
        }

        $data = [
            'nama' => $_POST['nama'],
            'harga' => $_POST['harga'],
            'deskripsi' => $_POST['deskripsi'],
            'tipe' => $_POST['tipe'],
            'gambar' => $gambar,
        ];

        if ($this->model('Menu_model')->addDataMenu($data)) {
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
            'id_menu' => $_POST['id_menu'],
            'nama' => $_POST['nama'],
            'harga' => $_POST['harga'],
            'deskripsi' => $_POST['deskripsi'],
            'tipe' => $_POST['tipe'],
            'gambar' => $gambar,
        ];

        if ($this->model('Menu_model')->updateDataMenu($data)) {
            Flasher::setFlash('Berhasil', 'diedit', 'success');
        } else {
            Flasher::setFlash('Gagal', 'diedit', 'danger');
        }
    }

    header('Location: ' . BASEURL . '/menu');
    exit;
}

}
