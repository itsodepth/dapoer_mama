<?php
class Pesanan extends Controller {
    public function index() {
        $data['judul'] = 'Daftar Pesanan';
        $data['pesanan'] = $this->model('Pesanan_model')->getAllPesanan();
        $this->view('templates/admin_header', $data);
        $this->view('pesanan/index', $data);
        $this->view('templates/admin_footer');
    }

    public function detail($id_pes = null) {
        $data['judul'] = 'Detail Pesanan';
        $data['pesanan'] = $this->model('Pesanan_model')->getPesananById($id_pes);
        $data['detail_pesanan'] = $this->model('Pesanan_model')->getDetailPesananById($id_pes); // Ambil detail pesanan
        $this->view('templates/admin_header', $data);
        $this->view('pesanan/detail', $data);
        $this->view('templates/admin_footer');
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

    public function updateStatus() {
        if($this->model('Pesanan_model')->updateStatusPesanan($_POST) > 0) {
            Flasher::setFlash('berhasil', 'diupdate', 'success');
            header('Location:' . BASEURL . '/pesanan');
            exit;
        } else {
            Flasher::setFlash('gagal', 'diupdate', 'danger');
            header('Location:' . BASEURL . '/pesanan');
            exit;
        }
    }
}
