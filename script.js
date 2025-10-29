document.addEventListener('DOMContentLoaded', function () {
    var konfirmasiHapusModal = document.getElementById('konfirmasiHapusModal');

    konfirmasiHapusModal.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget; 
        
        // Ambil data ID dan NAMA dari tombol yang diklik
        var id_mahasiswa = button.getAttribute('data-id');
        var nama_mahasiswa = button.getAttribute('data-nama'); // Ambil nama
        
        // Tentukan URL penghapusan
        var url_delete = 'logic/logicDelete.php?id=' + id_mahasiswa;
        
        // Cari elemen di Modal
        var hapusLink = konfirmasiHapusModal.querySelector('#hapusLink');
        var namaSpan = konfirmasiHapusModal.querySelector('#namaMahasiswaHapus'); // Cari span untuk nama
        
        // Set href (tujuan link)
        hapusLink.setAttribute('href', url_delete);

        // Set teks di Modal Body dengan nama mahasiswa
        namaSpan.textContent = nama_mahasiswa;
    });
});