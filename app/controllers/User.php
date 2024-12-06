<?php
class User extends Controller {
    public function index() {
        $data['judul'] = 'Daftar User';
        $data['user'] = $this->model('Pelanggan_model')->getAllUser();
        $this->view('templates/admin_header', $data);
        $this->view('user/index', $data);
        $this->view('templates/admin_footer');
    } 
}
