<?php 
if ($mod ==''){
    header('location:../404');
    echo'kosong';
}else{
    include_once 'sw-mod/sw-header.php';
if(!isset($_COOKIE['COOKIES_MEMBER']) OR !isset($_COOKIE['COOKIES_COOKIES'])){

$query = mysqli_query($connection, "SELECT max( employees_code) as kodeTerbesar FROM employees");
$data = mysqli_fetch_array($query);
$kode_karyawan = $data['kodeTerbesar'];
$urutan = (int) substr($kode_karyawan, 3, 3);
$urutan++;
$huruf = "OM";
$kode_karyawan = $huruf . sprintf("%03s", $urutan);

 echo'
 <!-- App Capsule -->
    <div id="appCapsule">
        <div class="section mt-1 text-center">
            <h1>Lupa Password</h1>
            <h4>Silakan kontak admin untuk menyetel ulang password!</h4>
        </div>
        <div class="section mb-5 p-2">
            <div class="form-button-group transparent">
                <a href="home" class="btn btn-primary btn-block btn-lg">Kembali</a>
            </div>
        </div>

    </div>
    <!-- * App Capsule -->';}
  else{
  }

  include_once 'sw-mod/sw-footer.php';
} ?>