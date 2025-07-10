<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <title>Halaman Gaji - Absensi Radius</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet" />

    <style>
        /* Navbar dengan warna elegan (biru tua) dan tulisan putih */
        .navbar-custom {
            background-color: #cccccc; /* biru navy elegan */
        }
        .navbar-custom .navbar-brand,
        .navbar-custom .nav-link {
            color: #ffffff !important; /* putih abu-abu terang */
            font-weight: 800;
        }
        .navbar-custom .nav-link:hover {
            color: #f39c12 !important; /* kuning emas saat hover */
        }
        body {
            background-color: #f8f9fa; /* warna background lembut */
        }
        h1 {
            color: #2c3e50;
            font-weight: 700;
        }
        .btn-primary {
            background-color: #2980b9;
            border-color: #2980b9;
        }
        .btn-primary:hover {
            background-color: #3498db;
            border-color: #3498db;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-custom">
  <a class="navbar-brand" href="#">Absensi Radius</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" 
    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon" style="filter: invert(1);"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Gaji <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Dashboard</a>
      </li>
    </ul>
  </div>
</nav>

<div class="container mt-5">
    <h1>Halaman Gaji Karyawan </h1>
    <p>Silahkan Input Data Gaji Karyawan !</p>

    <form>
        <div class="form-group">
            <label>Nama</label>
            <input type="text" class="form-control" value="Contoh Nama" readonly />
        </div>
        <div class="form-group">
            <label>Mulai Gaji</label>
            <input type="date" class="form-control" value="<?php echo date('Y-m-d'); ?>" />
        </div>
        <div class="form-group">
            <label>Berakhir Gaji</label>
            <input type="date" class="form-control" />
        </div>
        <div class="form-group">
            <label>Tanggal Masuk Kerja</label>
            <input type="date" class="form-control" />
        </div>
        <div class="form-group">
            <label>Jumlah Gaji</label>
            <input type="number" class="form-control" />
        </div>
        <div class="form-group">
            <label>Keterangan</label>
            <textarea class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>

<!-- Bootstrap & jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
