<?php
/*

class Controller {
    protected $userRole;

    public function __construct() {
        // Misalnya, Anda mendapatkan role pengguna dari session atau database
        // Ini hanya contoh, Anda perlu menyesuaikan dengan logika otentikasi Anda
        $this->userRole = $this->getUser Role(); // Mendapatkan role pengguna
    }

    public function view($view, $data = []) {
        // Tentukan folder berdasarkan role
        $folder = $this->getViewFolderByRole($this->userRole);
        
        // Memuat view dari folder yang sesuai dengan role
        require_once '../app/views/' . $folder . '/' . $view . '.php';
    }

    public function model($model) {
        require_once '../app/models/' . $model . '.php';
        return new $model;
    }

    protected function getUser Role() {
        // Logika untuk mendapatkan role pengguna
        // Misalnya, dari session atau database
        // return $_SESSION['user_role']; // Contoh jika menggunakan session
        // Atau Anda dapat mengambilnya dari database jika diperlukan
        return 'admin'; // Ganti dengan logika yang sesuai
    }

    protected function getViewFolderByRole($role) {
        // Menentukan folder view berdasarkan role pengguna
        switch ($role) {
            case 'admin':
                return 'admin';
            case 'user':
                return 'user';
            default:
                return 'guest'; // Folder untuk pengguna yang tidak terdaftar
        }
    }
}
    */
?>