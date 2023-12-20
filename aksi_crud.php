<?php

class Mahasiswa {
    private $koneksi;

    // Konstruktor untuk inisialisasi koneksi
    public function __construct($koneksi) {
        $this->koneksi = $koneksi;
    }

    // Method untuk menyimpan data mahasiswa baru
    public function simpanData($nim, $nama, $alamat, $prodi) {
        $query = "INSERT INTO tmhs (nim, nama, alamat, prodi) VALUES ('$nim', '$nama', '$alamat', '$prodi')";
        $simpan = mysqli_query($this->koneksi, $query);
        return $simpan;
    }

    // Method untuk mengubah data mahasiswa
    public function ubahData($id_mhs, $nim, $nama, $alamat, $prodi) {
        $query = "UPDATE tmhs SET nim = '$nim', nama = '$nama', alamat = '$alamat', prodi = '$prodi' WHERE id_mhs = '$id_mhs'";
        $ubah = mysqli_query($this->koneksi, $query);
        return $ubah;
    }

    // Method untuk menghapus data mahasiswa
    public function hapusData($id_mhs) {
        $query = "DELETE FROM tmhs WHERE id_mhs = '$id_mhs'";
        $hapus = mysqli_query($this->koneksi, $query);
        return $hapus;
    }
}

// Contoh penggunaan:
include 'koneksi.php';

$mahasiswa = new Mahasiswa($koneksi);

if(isset($_POST['bsimpan'])) {
    $simpan = $mahasiswa->simpanData($_POST['tnim'], $_POST['tnama'], $_POST['talamat'], $_POST['tprodi']);
    if($simpan){
        echo "<script>alert('Simpan Data Sukses!'); document.location='index.php';</script>";
    } else {
        echo "<script>alert('Simpan Data Gagal!');</script>";
    }
}

if(isset($_POST['bubah'])) {
    $ubah = $mahasiswa->ubahData($_POST['id_mhs'], $_POST['tnim'], $_POST['tnama'], $_POST['talamat'], $_POST['tprodi']);
    if($ubah){
        echo "<script>alert('Ubah Data Sukses!'); document.location='index.php';</script>";
    } else {
        echo "<script>alert('Ubah Data Gagal!');</script>";
    }
}

if(isset($_POST['bhapus'])) {
    $hapus = $mahasiswa->hapusData($_POST['id_mhs']);
    if($hapus){
        echo "<script>alert('Hapus Data Sukses!'); document.location='index.php';</script>";
    } else {
        echo "<script>alert('Hapus Data Gagal!');</script>";
    }
}
?>
