<?php

class AdminDashboard extends Controller {
    public function index() {
        $data['judul'] = 'Halaman Dashboard'; // Ganti dengan data yang ingin Anda kirim ke view jika ada
        $data['hasil'] = $this->model('AdminDashboard_model')->getAllPenghasilan();
        $data['hasil_bulan'] = $this->model('AdminDashboard_model')->getAllPenghasilanByMonth();
        
        // Ambil data penghasilan per bulan dalam setahun
        $data['penghasilan_per_bulan'] = $this->model('AdminDashboard_model')->getPenghasilanPerBulan();
        $data['total_penghasilan_tahun_ini'] = $this->model('AdminDashboard_model')->getPenghasilanTahunIni();

        $this->view('templates/admin_header', $data);
        $this->view('dashboard', $data);
        $this->view('templates/admin_footer');
    }
}