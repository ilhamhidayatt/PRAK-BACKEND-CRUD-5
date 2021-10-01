<?php
  include('koneksi.php'); //agar index terhubung dengan database, maka koneksi sebagai penghubung harus di include
  
?>
<!DOCTYPE html>
<html>
  <head>
    <title>CRUD Pemesanan Tiket Futsal Online</title>
    <style type="text/css">
    body{
	font-family:'Century Gothic', CenturyGothic, AppleGothic, sans-serif; font-size: 14px; font-style: normal; font-variant: normal; font-weight: 400; line-height: 21px;
	background: #4ab4c0;
}
    table{
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
    thead tr {
        background-color: #0ff0ff;
    }
      
    </style>
  </head>
  <body>
    <center><h1>Data Pemesanan</h1><center>
    <center><a href="tambah_produk.php">+ &nbsp; Input Pemesanan Tiket Futsal</a><center>
    <br/>
    <table>
      <thead>
        <tr>
          <th>No</th>
          <th>Nama Pemesan</th>
          <th>Nama Tim</th>
          <th>No Hp</th>
          <th>Perjam</th>
          <th>Jam</th>
          <th>Tanggal Pemesanan</th>
          <th>Tanggal Main</th>
          <th>Harga Tiket</th>
          <th>Action</th>
        </tr>
    </thead>
    <tbody>
      <?php
      // jalankan query untuk menampilkan semua data diurutkan berdasarkan nim
      $query = "SELECT * FROM produk ORDER BY id ASC";
      $result = mysqli_query($koneksi, $query);
      //mengecek apakah ada error ketika menjalankan query
      if(!$result){
        die ("Query Error: ".mysqli_errno($koneksi).
           " - ".mysqli_error($koneksi));
      }

      //buat perulangan untuk element tabel dari data mahasiswa
      $no = 1; //variabel untuk membuat nomor urut
      // hasil query akan disimpan dalam variabel $data dalam bentuk array
      // kemudian dicetak dengan perulangan while
      while($row = mysqli_fetch_assoc($result))
      {
      ?>
       <tr>
          <td><?php echo $no; ?></td>
          <td><?php echo $row['nama_pemesan']; ?></td>
          <td><?php echo substr($row['nama_tim'], 0, 20); ?>...</td>
          <td><?php echo $row['no_hp']; ?></td>
          <td><?php echo $row['perjam']; ?></td>
          <td><?php echo $row['jam']; ?></td>
          <td><?php echo $row['tanggal_pemesanan']; ?></td>
          <td><?php echo $row['tanggal_main']; ?></td>
          <td>Rp <?php echo number_format($row['harga_tiket'],0,',','.'); ?></td>
          <td>
              <a href="edit_produk.php?id=<?php echo $row['id']; ?>">Edit</a> |
              <a href="proses_hapus.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Anda yakin akan menghapus data ini?')">Hapus</a>
          </td>
      </tr>
         
      <?php
        $no++; //untuk nomor urut terus bertambah 1
      }
      ?>
    </tbody>
    </table>
  </body>
</html>