$(function () {
    // Event handler untuk tombol Tambah Data Menu
    $('.tombolTambahDataMenu').on('click', function () {
        $('#judulModal').html('Tambah Data Menu');
        $('.modal-footer button[type=submit]').html('Tambah Data');

        // Kosongkan input pada modal
        $('#nama').val('');
        $('#harga').val('');
        $('#deskripsi').val('');
        $('#gambar').val('');
        $('#kategori').val('');
        $('#id_menu').val(''); // Reset ID jika sebelumnya ada
    });

    // Event handler untuk tombol Ubah Data Menu
    $('.tampilModalUbahMenu').on('click', function () {
        $('#judulModal').html('Ubah Data Menu');
        $('.modal-footer button[type=submit]').html('Ubah Data');
        $('.modal-body form').attr('action', 'http://localhost/phpmvc/public/menu/ubah');

        const id_menu = $(this).data('id'); // Ambil ID dari tombol yang diklik

        // Ajax untuk mendapatkan data menu berdasarkan ID
        $.ajax({
            url: 'http://localhost/phpmvc/public/menu/getubah',
            data: { id_menu: id_menu },
            method: 'post',
            dataType: 'json',

            success: function (data) {
                // Isi input pada modal dengan data dari server
                $('#nama').val(data.nama);
                $('#harga').val(data.harga);
                $('#deskripsi').val(data.deskripsi);
                $('#gambar').val(data.gambar);
                $('#kategori').val(data.tipe);
                $('#id_menu').val(data.id_menu);
            },
        });
    });
});
