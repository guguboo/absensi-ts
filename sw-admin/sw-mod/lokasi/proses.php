<?php
session_start();
if(empty($_SESSION['SESSION_USER']) && empty($_SESSION['SESSION_ID'])){
    header('location:../../login/');
 exit;}
else {
require_once'../../../sw-library/sw-config.php';
require_once'../../login/login_session.php';
include('../../../sw-library/sw-function.php'); 

switch (@$_GET['action']){
case 'add':
  $error = array();
  
  if (empty($_POST['name'])) {
      $error[] = 'tidak boleh kosong';
    } else {
      $name = mysqli_real_escape_string($connection, $_POST['name']);
  }

  if (empty($_POST['address'])) {
      $error[] = 'tidak boleh kosong';
    } else {
      $address= mysqli_real_escape_string($connection, $_POST['address']);
  }

  if (empty($_POST['latitude'])) {
      $error[] = 'tidak boleh kosong';
    } else {
      $latitude= mysqli_real_escape_string($connection, $_POST['latitude']);
  }

  if (empty($_POST['longitude'])) {
      $error[] = 'tidak boleh kosong';
    } else {
      $longitude= mysqli_real_escape_string($connection, $_POST['longitude']);
  }

  if (empty($_POST['radius'])) {
      $error[] = 'tidak boleh kosong';
    } else {
      $radius= mysqli_real_escape_string($connection, $_POST['radius']);
  }


      /* --  Membuat Random Karakter ---- */
      $random_karakter = md5($name);
      $shuffle  = substr(str_shuffle($random_karakter),0,5);
      $code   = ''.$year.'/'.strtoupper($shuffle).'/'.$date.'';
      /* --  End Random Karakter ---- */
      
  if (empty($error)) { 
    $latitude_longtitude = ''.$latitude.','.$longitude.'';
    $add ="INSERT INTO  building (code,
                        name,
                        address,
                        latitude_longtitude,
                        radius) values('$code',
                        '$name',
                        '$address',
                        '$latitude_longtitude',
                        '$radius')"; 
    if($connection->query($add) === false) { 
        die($connection->error.__LINE__); 
        echo'Data tidak berhasil disimpan!';
    } else{
        echo'success';
    }}
    else{           
        echo'Bidang inputan masih ada yang kosong..!';
    }
break;

/* ------------------------------
    Update
---------------------------------*/
case 'update':
 $error = array();
   if (empty($_POST['id'])) {
      $error[] = 'ID tidak boleh kosong';
    } else {
      $id = mysqli_real_escape_string($connection, $_POST['id']);
  }

  if (empty($_POST['name'])) {
      $error[] = 'tidak boleh kosong';
    } else {
      $name= mysqli_real_escape_string($connection, $_POST['name']);
  }

  if (empty($_POST['address'])) {
      $error[] = 'tidak boleh kosong';
    } else {
      $address= mysqli_real_escape_string($connection, $_POST['address']);
  }

  if (empty($_POST['latitude'])) {
      $error[] = 'tidak boleh kosong';
    } else {
      $latitude= mysqli_real_escape_string($connection, $_POST['latitude']);
  }

  if (empty($_POST['longitude'])) {
      $error[] = 'tidak boleh kosong';
    } else {
      $longitude= mysqli_real_escape_string($connection, $_POST['longitude']);
  }

  if (empty($_POST['radius'])) {
      $error[] = 'tidak boleh kosong';
    } else {
      $radius= mysqli_real_escape_string($connection, $_POST['radius']);
  }

  if (empty($error)) { 
     $latitude_longtitude = ''.$latitude.','.$longitude.'';
    $update="UPDATE building SET name='$name',
            address='$address',
            latitude_longtitude='$latitude_longtitude',
            radius='$radius' WHERE building_id='$id'"; 
    if($connection->query($update) === false) { 
        die($connection->error.__LINE__); 
        echo'Data tidak berhasil disimpan!';
    } else{
        echo'success';
    }}
    else{           
        echo'Bidang inputan tidak boleh ada yang kosong..!';
    }

break;
/* --------------- Delete ------------*/
case 'delete':
  $id       = mysqli_real_escape_string($connection,epm_decode($_POST['id']));
  $query ="SELECT building.building_id,employees.building_id FROM building,employees WHERE building.building_id=employees.building_id AND employees.building_id='$id'";
  $result = $connection->query($query);
  if(!$result->num_rows > 0){
    $deleted  = "DELETE FROM building WHERE building_id='$id'";
    if($connection->query($deleted) === true) {
        echo'success';
      } else { 
        //tidak berhasil
        echo'Data tidak berhasil dihapus.!';
        die($connection->error.__LINE__);
       
    }
  }else{
      echo'Lokasi digunakan, Data tidak dapat dihapus.!';
    }
break;

}

}
