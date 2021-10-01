<?php
  include('koneksi.php'); //agar index terhubung dengan database, maka koneksi sebagai penghubung harus di include
  
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Sewa Lapangan Futsal Online</title>
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
      font-size: 11pt;
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
    </style>
  </head>
  <body>
      <center>
        <h1>Input Pemesanan Tiket Futsal Online</h1>
      <center>
      <form method="POST" action="proses_tambah.php" enctype="multipart/form-data" >
      <section class="base">
        <div>
          <label>Nama Pemesan</label>
          <input type="text" name="nama_pemesan" autofocus="" required="" />
        </div>
        <div>
          <label>Nama Tim</label>
         <input type="text" name="nama_tim" />
        </div>
        <div>
          <label>No Hp</label>
         <input type="number" name="no_hp" />
        </div>
        <div>
          <label>Perjam</label>
         <select name="perjam">
				<option value="Pilih Berapa Jam">---Berapa jam---
				<option value="1Jam">1Jam
				<option value="2Jam">2Jam
				<option value="3Jam">3Jam
        </div>
        <div>
          <label>Jam</label>
         <input type="number" name="jam" />
        </div>
        <div>
          <label>Tanggal_Pemesanan</label>
         <input type="date" name="tanggal_pemesanan" />
        </div>
        <div>
          <label>Tanggal Main</label>
         <input type="date" name="tanggal_main" />
        </div>
        <div>
          <label>Harga Tiket</label>
         <input type="text" name="harga_tiket" required="" />
        </div>
        <div>
        <div>
         <button type="submit">Simpan</button>
        </div>
        </section>
      </form>
  </body>
</html>