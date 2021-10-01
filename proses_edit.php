<?php
// memanggil file koneksi.php untuk melakukan koneksi database
include 'koneksi.php';

	// membuat variabel untuk menampung data dari form
  $id = $_POST['id'];
  $nama_pemesan   = $_POST['nama_pemesan'];
  $nama_tim     = $_POST['nama_tim'];
  $no_hp     = $_POST['no_hp'];
  $perjam     = $_POST['perjam'];
  $jam     = $_POST['jam'];
  $tanggal_pemesanan     = $_POST['tanggal_pemesanan'];
  $tanggal_main     = $_POST['tanggal_main'];
  $harga_tiket    = $_POST['harga_tiket'];
  //cek dulu jika merubah gambar produk jalankan coding ini

                      
// jalankan query UPDATE berdasarkan ID yang produknya kita edit
 if(!$result){
                   $query  = "UPDATE produk SET nama_pemesan = '$nama_pemesan', nama_tim = '$nama_tim', no_hp = '$no_hp', perjam = '$perjam', jam = '$jam', tanggal_pemesanan = '$tanggal_pemesanan', tanggal_main = '$tanggal_main', harga_tiket = '$harga_tiket'";
                    $query .= "WHERE id = '$id'";
                    $result = mysqli_query($koneksi, $query);
                    // periska query apakah ada error
                    if(!$result){
                        die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                             " - ".mysqli_error($koneksi));
                    } else {
                      //tampil alert dan akan redirect ke halaman index.php
                      //silahkan ganti index.php sesuai halaman yang akan dituju
                      echo "<script>alert('Data berhasil diubah.');window.location='index.php';</script>";
                    }
              

      // periska query apakah ada error
      if(!$result){
            die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                             " - ".mysqli_error($koneksi));
      } else {
        //tampil alert dan akan redirect ke halaman index.php
        //silahkan ganti index.php sesuai halaman yang akan dituju
          echo "<script>alert('Data berhasil diubah.');window.location='index.php';</script>";
      }
    }
  

