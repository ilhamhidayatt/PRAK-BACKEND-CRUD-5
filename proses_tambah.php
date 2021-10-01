<?php
// memanggil file koneksi.php untuk melakukan koneksi database
include 'koneksi.php';

	// membuat variabel untuk menampung data dari form
  $nama_pemesan   = $_POST['nama_pemesan'];
  $nama_tim     = $_POST['nama_tim'];
  $no_hp     = $_POST['no_hp'];
  $perjam     = $_POST['perjam'];
  $jam    = $_POST['jam'];
  $tanggal_pemesanan     = $_POST['tanggal_pemesanan'];
  $tanggal_main    = $_POST['tanggal_main'];
  $harga_tiket    = $_POST['harga_tiket'];
  $bukti_pembayaran    = $_POST['bukti_pembayaran'];


//cek dulu jika ada gambar produk jalankan coding ini
if($bukti_pembayaran != "") {
  $ekstensi_diperbolehkan = array('png','jpg'); //ekstensi file gambar yang bisa diupload 
  $x = explode('.', $bukti_pembayaran); //memisahkan nama file dengan ekstensi yang diupload
  $ekstensi = strtolower(end($x));
  $file_tmp = $_FILES['bukti_pembayaran']['tmp_name'];   
  $angka_acak     = rand(1,999);
  $nama_gambar_baru = $angka_acak.'-'.$bukti_pembayaran; //menggabungkan angka acak dengan nama file sebenarnya
        if(in_array($ekstensi, $ekstensi_diperbolehkan) === true)  {     
                move_uploaded_file($file_tmp, 'gambar/'.$nama_gambar_baru); //memindah file gambar ke folder gambar
                  // jalankan query INSERT untuk menambah data ke database pastikan sesuai urutan (id tidak perlu karena dibikin otomatis)
                  $query = "INSERT INTO produk (nama_pemesan, nama_tim, no_hp, perjam, jam, tanggal_pemesanan, tanggal_main, harga_tiket, bukti_pembayaran) VALUES ('$nama_pemesan', '$nama_tim', '$no_hp', '$perjam', '$jam', '$tanggal_pemesanan', '$tanggal_main', '$harga_tiket')";
                  $result = mysqli_query($koneksi, $query);
                  // periska query apakah ada error
                  if(!$result){
                      die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                           " - ".mysqli_error($koneksi));
                  } else {
                    //tampil alert dan akan redirect ke halaman index.php
                    //silahkan ganti index.php sesuai halaman yang akan dituju
                    echo "<script>alert('Data berhasil ditambah.');window.location='index.php';</script>";
                  }

            } else {     
             //jika file ekstensi tidak jpg dan png maka alert ini yang tampil
                echo "<script>alert('Ekstensi gambar yang boleh hanya jpg atau png.');window.location='tambah_produk.php';</script>";
            }
} else {
   $query = "INSERT INTO  produk (nama_pemesan, nama_tim, no_hp, perjam, jam, tanggal_pemesanan, tanggal_main, harga_tiket) VALUES ('$nama_pemesan', '$nama_tim', '$no_hp', '$perjam', '$jam', '$tanggal_pemesanan', '$tanggal_main', '$harga_tiket')";
                  $result = mysqli_query($koneksi, $query);
                  // periska query apakah ada error
                  if(!$result){
                      die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                           " - ".mysqli_error($koneksi));
                  } else {
                    //tampil alert dan akan redirect ke halaman index.php
                    //silahkan ganti index.php sesuai halaman yang akan dituju
                    echo "<script>alert('Data berhasil ditambah.');window.location='index.php';</script>";
                  }
}

 

