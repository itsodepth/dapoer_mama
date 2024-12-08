<?php

class Flasher {
    public static function setFlash($pesan, $aksi, $tipe){
        $_SESSION['flash'] = [
            'pesan' => $pesan,
            'aksi' => $aksi,
            'tipe' => $tipe
        ];
    }

    public static function flash() {
        if (isset($_SESSION['flash'])) {
            $tipe = htmlspecialchars($_SESSION['flash']['tipe']);
            $pesan = htmlspecialchars($_SESSION['flash']['pesan']);
            $aksi = htmlspecialchars($_SESSION['flash']['aksi']);
    
            echo '<div class="alert alert-' . $tipe . ' alert-dismissible fade show" role="alert">';
            echo 'Data Mahasiswa <strong>' . $pesan . '</strong> ' . $aksi;
            echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
            echo '</div>';
    
            unset($_SESSION['flash']);
        }
    }
}