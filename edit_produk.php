 <?php
  // memanggil file koneksi.php untuk membuat koneksi
include 'koneksi.php';

  // mengecek apakah di url ada nilai GET id
  if (isset($_GET['id'])) {
    // ambil nilai id dari url dan disimpan dalam variabel $id
    $id = ($_GET["id"]);

    // menampilkan data dari database yang mempunyai id=$id
    $query = "SELECT * FROM produk WHERE id='$id'";
    $result = mysqli_query($koneksi, $query);
    // jika data gagal diambil maka akan tampil error berikut
    if(!$result){
      die ("Query Error: ".mysqli_errno($koneksi).
         " - ".mysqli_error($koneksi));
    }
    // mengambil data dari database
    $data = mysqli_fetch_assoc($result);
      // apabila data tidak ada pada database maka akan dijalankan perintah ini
       if (!count($data)) {
          echo "<script>alert('Data tidak ditemukan pada database');window.location='index.php';</script>";
       }
  } else {
    // apabila tidak ada data GET id pada akan di redirect ke index.php
    echo "<script>alert('Masukkan data id.');window.location='index.php';</script>";
  }         
  ?>
<!DOCTYPE html>
<html>
  <head>
    <title>CRUD Sewa Lapangan Futsal</title>
    <style type="text/css">
      * {
        font-family: "Trebuchet MS";
        background: #4ab4c0;
      }
      h1 {
        text-align: center;
	font-weight: 300;
      }
    button {
      background: #46de4b;
	color:blue;
	font-size: 11pt;
	width: 100%;
	border: none;
	border-radius: 3px;
	padding: 10px 20px;
    }
    label {
      box-sizing : border-box;
	width: 100%;
	padding: 10px;
	font-size: 11pt;
	margin-bottom: 20px;
  width: 200px;
  border: 1px solid black;
  padding: 10px;
    width: 350px;
    color: black;
    margin: 20px auto;
    border-radius: 40px;
    border-radius: 5px;
    }
    input {
      padding: 6px;
      width: 100%;
      box-sizing: border-box;
      background: #f8f8f8;
      border: 2px solid #ccc;
      outline-color: salmon;
    }
    div {
      width: 100%;
      height: auto;
    }
    .base {
      width: 400px;
      height: auto;
      padding: 20px;
      margin-left: auto;
      margin-right: auto;
      background: #ededed;
    }
    </style>
  </head>
  <body>
      <center>
        <h1>Edit Pemesanan <?php echo $data['nama_pemesan']; ?></h1>
      <center>
      <form method="POST" action="proses_edit.php" enctype="multipart/form-data" >
      <section class="base">
        <!-- menampung nilai id produk yang akan di edit -->
        <input name="id" value="<?php echo $data['id']; ?>"  hidden />
        <div>
          <label>Nama Pemesan</label>
          <input type="text" name="nama_pemesan" value="<?php echo $data['nama_pemesan']; ?>" autofocus="" required="" />
        </div>
        <div>
          <label>Nama Tim</label>
         <input type="text" name="nama_tim" value="<?php echo $data['nama_tim']; ?>" />
        </div>
        <div>
          <label>No Hp</label>
         <input type="number" name="no_hp" value="<?php echo $data['no_hp']; ?>" />
        </div>
        <div>
          <label>Perjam</label>
         <select name="perjam">
				<option value="Pilih Berapa Jam">
				<option value="1Jam">1Jam
				<option value="2Jam">2Jam
				<option value="3Jam">3Jam
        </div>
        <div>
          <label>Jam</label>
         <input type="number" name="jam" />
        </div>
        <div>
          <label>Tanggal Pemesanan</label>
         <input type="date" name="tanggal_pemesanan" value="<?php echo $data['tanggal_pemesanan']; ?>" />
        </div>
        <div>
          <label>Tanggal Main</label>
         <input type="date" name="tanggal_main" value="<?php echo $data['tanggal_main']; ?>" />
        </div>
        <div>
          <label>Harga tiket</label>
         <input type="number" name="harga_tiket" required=""value="<?php echo $data['harga_tiket']; ?>" />
        </div>
         <button type="submit">Simpan Perubahan</button>
        </div>
        </section>
      </form>
  </body>
</html>