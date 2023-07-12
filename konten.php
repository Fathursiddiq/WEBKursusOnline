<?php
include 'config/koneksi.php';
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

  <?php
  if ($_GET['page'] == 'home') {
  ?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Sistem Informasi Kursus </h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Home</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body">
          Selamat datang di pemrograman sederhana sistem informasi WEB.<br>
          Kursus Online.
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          Create by Fathur @2023
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  <?php
  } else if ($_GET['page'] == 'barang') {
  ?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Kursus </h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Informasi Kursus yang Tersedia</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body">

          <table id="example1" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Deskripsi</th>
                <th>Durasi</th>
              </tr>
            </thead>
            <?php
            $hasil = $db->query(" 
        SELECT id_kursus, judul , deskripsi, durasi 
        FROM kursus   
     ");

            if (!$hasil)
              echo "ada masalah " . $db->error;

            while ($d = $hasil->fetch_assoc()) {
              echo "
        <tr>
            <td>$d[id_kursus]</td>
            <td>$d[judul]</td>
            <td>$d[deskripsi]</td>
            <td>$d[durasi]</td>
        </tr>";
            }
            ?>
          </table>


        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          Create by Fathur @2023
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  <?php
  } else if ($_GET['page'] == 'login') {
  ?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Login ke Admin</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Login</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-lg-4 col-6">
              <form action="?page=ceklogin" method="POST">
                <div class="card-body">
                  <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" name="user" placeholder="Masukkan Username anda">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" name="pass" id="exampleInputPassword1" placeholder="Password">
                  </div>
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Login</button>
                  </div>
              </form>
            </div>
          </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              Create by Fathur @2023
            </div>
            <!-- /.card-footer-->
          </div>
          <!-- /.card -->

    </section>
    <!-- /.content -->
  <?php
  } else if ($_GET['page'] == 'ceklogin') {
    $pass = md5($_POST['pass']);
    $hasil = $db->query("
        select * from user where username = '$_POST[user]'
        ");

    if (!$hasil)
      echo "ada masalah " . $db->error;

    $d = $hasil->fetch_assoc();

    if ($d['password'] == $pass) {
      session_start();
      //Username Pass Benar
      $_SESSION['username'] = $d['username'];
      $_SESSION['password'] = $pass;
      header('location:admin/tampil.php?page=home');
    } else {
      //Username Pass Salah
      echo "Username Password anda Salah.";
    }
  } else if ($_GET['page'] == 'logout') {
    session_start();
    session_destroy();
  ?>
    <section class="content-header">
      <div class="container-fluid">
        <h1>Logout Berhasil</h1>
      </div><!-- /.container-fluid -->
    </section>
  <?php
  }
  ?>
</div>
<!-- /.content-wrapper -->