<?php

class AdminDashboard extends Controller {
    public function index() {
        // Anda dapat menambahkan logika di sini jika perlu, seperti mengambil data dari model
        $data['judul'] = 'Halaman Dashboard'; // Ganti dengan data yang ingin Anda kirim ke view jika ada
        $this->view('templates/admin_header', $data);
        $this->view('dashboard', $data);
        $this->view('templates/admin_footer');
    }
}