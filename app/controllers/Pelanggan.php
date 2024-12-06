<?php
class Pelanggan extends Controller {
    public function index() {
        $data['judul'] = 'Daftar Pelanggan';
        $data['pelanggan'] = $this->model('Pelanggan_model')->getPelangganWithUserData();
        $this->view('templates/admin_header', $data);
        $this->view('pelanggan/index', $data);
        $this->view('templates/admin_footer');
    }  
}
