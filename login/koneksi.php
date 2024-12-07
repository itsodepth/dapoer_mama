<?php
$host = mysqli_connect("localhost", "root", "", "catering");
if($host){
 echo "Koneksi berhasil";
} else{
 echo "Koneksi gagal!" . mysqli_connect_error();
 die();
}
?>