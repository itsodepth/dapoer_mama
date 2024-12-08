<?php
class Pesanan extends Controller {
    public function index() {
        $data['judul'] = 'Daftar Pesanan';
        $data['pesanan'] = $this->model('Pesanan_model')->getAllPesanan();
        $this->view('templates/admin_header', $data);
        $this->view('pesanan/index', $data);
        $this->view('templates/admin_footer');
    }

    public function form($id_pes = null) {
        $data['judul'] = $id_pes ? 'Edit Data Pesanan' : 'Tambah Data Pesanan';
        $data['pesanan'] = $id_pes ? $this->model('Pesanan_model')->getPesananById($id_pes) : null;

        $this->view('templates/admin_header', $data);
        $this->view('pesanan/form', $data);
        $this->view('templates/admin_footer');
    }

    public function detail($id_pes = null){
        $data['judul'] = 'Detail Pesanan';
        $data['pesanan'] = $this->model('Pesanan_model')->getPesananById($id_pes);
        $this->view('templates/admin_header', $data);
        $this->view('pesanan/detail', $data);
        $this->view('templates/admin_footer');
    }

    public function tambah(){
        if(isset($_POST['waktu']) && isset($_POST['status']) && isset($_POST['alamat']) && isset($_POST['tlp']) && isset($_POST['cara_bayar']) && isset($_POST['jumlah']) && isset($_POST['totalharga'])) {
            if($this->model('Pesanan_model')->tambahDataPesanan($_POST) > 0){
                Flasher::setFlash('berhasil','ditambahkan','success');
                header('Location:' . BASEURL . '/pesanan');
                exit;
            } else {
                Flasher::setFlash('gagal','ditambahkan','danger');
                header('Location:' . BASEURL . '/pesanan');
                exit;
            }
        } else {
            Flasher::setFlash('gagal','data tidak lengkap','danger');
            header('Location:' . BASEURL . '/pesanan');
            exit;
        }
    }    

    public function ubah(){
        if($this->model('Pesanan_model')->ubahDataPesanan($_POST) > 0){ // Perbaiki 'ubahDataMahasiswa' menjadi 'ubahDataMenu'
            Flasher::setFlash('berhasil','diubah','success');
            header('Location:' . BASEURL . '/pesanan');
            exit;
        }else{
            Flasher::setFlash('gagal','diubah','danger');
            header('Location:' . BASEURL . '/pesanan');
            exit;
        }
    }    
    
    public function cari() {
        $data['judul'] = 'Daftar Pesanan';
        $data['pesanan'] = $this->model('Pesanan_model')->cariDataMenu();
        $this->view('templates/admin_header', $data);
        $this->view('pesanan/index', $data);
        $this->view('templates/admin_footer');
    }
}
