<?php
// ========= Cek, apakah yang akses sudah login ==================
if (empty($_SESSION['username']) || empty($_SESSION['password'])) {
	echo "Maaf, anda harus login.";
} 
else 
{
  // ====== Else panjang yang akan di eksekusi jika sudah login =====
  include '../config/koneksi.php';
?>
	<!-- Wajib ada, punya adminLTE Content Wrapper. Contains page content -->
	<div class="content-wrapper">

		<?php
//================================[ HOME ]====================================		
		if ($_GET['page'] == 'home') 
//----------------------------------------------------------------------------
		{
		?>
			<!-- Content Header (Page header) -->
			<section class="content-header">
				<div class="container-fluid">
					<h1>Selamat Datang Ardi Admin Kursus</h1>
				</div><!-- /.container-fluid -->
			</section>

			<!-- Main content -->
			<section class="content">

				<!-- Default box -->
				<div class="card">
					<div class="card-header">
						<h3 class="card-title">Home</h3>
					</div>
					<div class="card-body">
						Selamat datang di Aplikasi Kursus online sederhana.<br>
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
		}

//==============================[ Kursus ]==================================		
		else if ($_GET['page'] == 'kursus')
//--------------------------------------------------------------------------	
		{
		?>
			<section class="content-header">
				<div class="container-fluid">
					<h1>Data Kursus</h1>
				</div>
			</section>

			<section class="content">

				<div class="card">
					<div class="card-header">
						<h3 class="card-title">Informasi Kursus</h3>
					</div>
					<div class="card-body">
						<a href="?page=kursus_tambah" class="btn btn-primary"> Tambah Kursus </a>
						<table id="example2" class="table table-bordered table-hover">
							<thead>
								<tr>
									<th>No</th>
									<th>Judul</th>
									<th>Deskripsi</th>
									<th>Durasi</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<?php
							$hasil = $db->query(" 
								SELECT *
								FROM kursus     
								");

							if (!$hasil)
								echo "ada masalah " . $db->error;

							while ($d = $hasil->fetch_assoc()) 
							{
							echo "
							<tr>
								<td>$d[id_kursus]</td>
								<td>$d[judul]</td>
								<td>$d[deskripsi]</td>
								<td>$d[durasi]</td>
								<td>
									<a href=?page=kursus_form_edit&id=$d[id_kursus]><img src='../adminlte310/dist/img/edit.png'</a>&nbsp&nbsp
									<a href=?page=kursus_hapus&id=$d[id_kursus] 
									onclick = \" return confirm('Yakin Hapus $d[judul]'); \"
									><img src='../adminlte310/dist/img/delete.png' </a>				
								</td>				
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
		} 

		//------------------------------------------------------------
		else if ($_GET['page'] == 'kursus_tambah') 
		//------------------------------------------------------------
		{
		?>
			<section class="content-header">
				<div class="container-fluid">
					<h1>Data Kursus</h1>
				</div>
			</section>

			<section class="content">

				<div class="card">
					<div class="card-header">
						<h3 class="card-title">Informasi Kursus</h3>
					</div>
					<div class="card-body">
						<div class="card card-primary">
							<div class="card-header">
								<h3 class="card-title">Tambah Kursus</h3>
							</div>
							<!-- /.card-header -->
							<!-- form start -->
							<form action="?page=kursus_simpan" method="POST" class="form-horizontal">
								<div class="card-body">

									<div class="form-group row">
										<label for="judul" class="col-sm-3 col-form-label">Judul</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" name="judul" id="judul" placeholder="Masukkan Judul" name="judul">
										</div>
									</div>

									<div class="form-group row">
										<label for="deskripsi" class="col-sm-3 col-form-label">Deskripsi</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" name="deskripsi" id="deskripsi" placeholder="Masukkan Deskripsi" name="deskripsi">
										</div>
									</div>
									<div class="form-group row">
										<label for="durasi" class="col-sm-3 col-form-label">Durasi</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" nama="durasi" id="durasi" placeholder="Masukkan Durasi Kursus" name="durasi">
										</div>
									</div>
								</div>
								<!-- /.card-body -->

								<div class="card-footer">
									<button type="submit" class="btn btn-primary">Simpan</button>
								</div>
							</form>
						</div>
						<!-- /.card -->
					</div>
				</div>
			</section>
		<?php
		} 

		//------------------------------------------------------------
		else if ($_GET['page'] == 'kursus_simpan') 
		{
			$hasil = $db->query("	
					INSERT INTO kursus (judul, deskripsi, durasi) 
					VALUES ('$_POST[judul]','$_POST[deskripsi]','$_POST[durasi]'); 
					");
			if (!$hasil)
				echo "Ada Masalah Penyimpanan data = $db->error";
			else
				header("location:tampil.php?page=kursus");
		} 

		//------------------------------------------------------------					
		else if ($_GET['page'] == 'kursus_form_edit') 
		//------------------------------------------------------------			
		{
			$hasil = $db->query("select * from kursus where id_kursus = '$_GET[id]' ");

			if (!$hasil)
				echo "ada masalah " . $db->error;

			$d = $hasil->fetch_assoc();
		?>
			<section class="content-header">
				<div class="container-fluid">
					<h1>EDIT Data Kursus</h1>
				</div>
			</section>

			<section class="content">

				<div class="card">
					<div class="card-header">
						<h3 class="card-title">Informasi Kursus</h3>
					</div>
					<div class="card-body">
						<div class="card card-primary">
							<div class="card-header">
								<h3 class="card-title">EDIT Kursus</h3>
							</div>
							<!-- /.card-header -->
							<!-- form start -->
							<form action="?page=kursus_edit_simpan" method="POST" class="form-horizontal">
								<div class="card-body">
									
									<div class="form-group row">
										<label for="id_kursus" class="col-sm-3 col-form-label">ID Kursus</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" name="id_kursus" id="id_kursus" 
											value="<?php echo $d['id_kursus'];?>" name="id_kursus" readonly>
										</div>
									</div>

									<div class="form-group row">
										<label for="judul" class="col-sm-3 col-form-label">Judul</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" name="judul" id="judul" placeholder="Masukkan judul" name="judul" 
											value="<?php echo $d['judul'] ?>">
										</div>
									</div>

									<div class="form-group row">
										<label for="deskripsi" class="col-sm-3 col-form-label">Deskripsi</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" name="deskripsi" id="deskripsi" placeholder="Masukkan deskripsi" name="deskripsi" 
											value="<?php echo $d['deskripsi'] ?>">
										</div>
									</div>

									<div class="form-group row">
										<label for="durasi" class="col-sm-3 col-form-label">Durasi</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" nama="durasi" id="durasi" placeholder="Masukkan durasi" name="durasi" value="<?php echo $d['durasi'] ?>">
										</div>
									</div>
								</div>
								<!-- /.card-body -->

								<div class="card-footer">
									<button type="submit" class="btn btn-primary">Simpan</button>
								</div>
							</form>
						</div>
						<!-- /.card -->
					</div>
				</div>
			</section>
		<?php
		}

		//------------------------------------------------------------					
		else if ($_GET['page'] == 'kursus_edit_simpan') 
		{
			$db->query("
					UPDATE kursus SET 
					 	id_kursus = '$_POST[id_kursus]',
					 	judul = '$_POST[judul]',
					 	deskripsi 		= '$_POST[deskripsi]',
					 	durasi 		= '$_POST[durasi]'
					WHERE id_kursus = '$_POST[id_kursus]'
				");
			if (!$db)
				echo "Ada Masalah Penyimpanan data = $db->error";
			else
				header("location:tampil.php?page=kursus");
		} 

		//------------------------------------------------------------							
		else if ($_GET['page'] == 'kursus_hapus') 
		//------------------------------------------------------------					
		{
			$db->query(" DELETE FROM kursus WHERE id_kursus = '$_GET[id]' ");
			if (!$db)
				echo "Ada Masalah Hapus data = $db->error";
			else
				header("location:tampil.php?page=kursus");
		}

		//============================[ MATERI ]==================================		
		else if ($_GET['page'] == 'materi')
		//--------------------------------------------------------------------------
		{
		?>
						<section class="content-header">
				<div class="container-fluid">
					<h1>Data materi</h1>
				</div>
			</section>

			<section class="content">

				<div class="card">
					<div class="card-header">
						<h3 class="card-title">Informasi materi</h3>
					</div>
					<div class="card-body">
						<a href="?page=materi_tambah" class="btn btn-primary"> Tambah materi </a>
						<table id="example2" class="table table-bordered table-hover">
							<thead>
								<tr>
									<th>No</th>
									<th>Judul</th>
									<th>Deskripsi</th>
									<th>Link Embed Materi</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<?php
							$hasil = $db->query(" 
								SELECT *
								FROM materi     
								");

							if (!$hasil)
								echo "ada masalah " . $db->error;

							while ($d = $hasil->fetch_assoc()) 
							{
							echo "
							<tr>
								<td>$d[id_materi]</td>
								<td>$d[judul_materi]</td>
								<td>$d[deskripsi_materi]</td>
								<td>$d[link]</td>
								<td>
									<a href=?page=materi_form_edit&id=$d[id_materi]><img src='../adminlte310/dist/img/edit.png'</a>&nbsp&nbsp
									<a href=?page=materi_hapus&id=$d[id_materi] 
									onclick = \" return confirm('Yakin Hapus $d[judul_materi]'); \"
									><img src='../adminlte310/dist/img/delete.png' </a>				
								</td>				
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
		} 

		//------------------------------------------------------------
		else if ($_GET['page'] == 'materi_tambah') 
		//------------------------------------------------------------
		{
		?>
			<section class="content-header">
				<div class="container-fluid">
					<h1>Data materi</h1>
				</div>
			</section>

			<section class="content">

				<div class="card">
					<div class="card-header">
						<h3 class="card-title">Informasi materi</h3>
					</div>
					<div class="card-body">
						<div class="card card-primary">
							<div class="card-header">
								<h3 class="card-title">Tambah materi</h3>
							</div>
							<!-- /.card-header -->
							<!-- form start -->
							<form action="?page=materi_simpan" method="POST" class="form-horizontal">
								<div class="card-body">

									<div class="form-group row">
										<label for="judul_materi" class="col-sm-3 col-form-label">Judul</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" name="judul_materi" id="judul_materi" placeholder="Masukkan Judul" name="judul_materi">
										</div>
									</div>

									<div class="form-group row">
										<label for="deskripsi_materi" class="col-sm-3 col-form-label">Deskripsi</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" name="deskripsi_materi" id="deskripsi_materi" placeholder="Masukkan Deskripsi" name="deskripsi_materi">
										</div>
									</div>
									<div class="form-group row">
										<label for="link" class="col-sm-3 col-form-label"> Link Embed Materi</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" nama="link" id="link" placeholder="Masukkan Link materi" name="link">
										</div>
									</div>
								</div>
								<!-- /.card-body -->

								<div class="card-footer">
									<button type="submit" class="btn btn-primary">Simpan</button>
								</div>
							</form>
						</div>
						<!-- /.card -->
					</div>
				</div>
			</section>
		<?php
		} 

		//------------------------------------------------------------
		else if ($_GET['page'] == 'materi_simpan') 
		{
			$hasil = $db->query("	
					INSERT INTO materi (judul_materi, deskripsi_materi, link) 
					VALUES ('$_POST[judul_materi]','$_POST[deskripsi_materi]','$_POST[link]'); 
					");
			if (!$hasil)
				echo "Ada Masalah Penyimpanan data = $db->error";
			else
				header("location:tampil.php?page=materi");
		} 

		//------------------------------------------------------------					
		else if ($_GET['page'] == 'materi_form_edit') 
		//------------------------------------------------------------			
		{
			$hasil = $db->query("select * from materi where id_materi = '$_GET[id]' ");

			if (!$hasil)
				echo "ada masalah " . $db->error;

			$d = $hasil->fetch_assoc();
		?>
			<section class="content-header">
				<div class="container-fluid">
					<h1>EDIT Data materi</h1>
				</div>
			</section>

			<section class="content">

				<div class="card">
					<div class="card-header">
						<h3 class="card-title">Informasi materi</h3>
					</div>
					<div class="card-body">
						<div class="card card-primary">
							<div class="card-header">
								<h3 class="card-title">EDIT materi</h3>
							</div>
							<!-- /.card-header -->
							<!-- form start -->
							<form action="?page=materi_edit_simpan" method="POST" class="form-horizontal">
								<div class="card-body">
									
									<div class="form-group row">
										<label for="id_materi" class="col-sm-3 col-form-label">ID materi</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" name="id_materi" id="id_materi" 
											value="<?php echo $d['id_materi'];?>" name="id_materi" readonly>
										</div>
									</div>

									<div class="form-group row">
										<label for="judul_materi" class="col-sm-3 col-form-label">Judul</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" name="judul_materi" id="judul_materi" placeholder="Masukkan judul" name="judul_materi" 
											value="<?php echo $d['judul_materi'] ?>">
										</div>
									</div>

									<div class="form-group row">
										<label for="deskripsi_materi" class="col-sm-3 col-form-label">Deskripsi</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" name="deskripsi_materi" id="deskripsi_materi" placeholder="Masukkan deskripsi_materi" name="deskripsi_materi" 
											value="<?php echo $d['deskripsi_materi'] ?>">
										</div>
									</div>

									<div class="form-group row">
										<label for="link" class="col-sm-3 col-form-label">Link Embed Materi</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" nama="link" id="link" placeholder="Masukkan link" name="link" value="<?php echo $d['link'] ?>">
										</div>
									</div>
								</div>
								<!-- /.card-body -->

								<div class="card-footer">
									<button type="submit" class="btn btn-primary">Simpan</button>
								</div>
							</form>
						</div>
						<!-- /.card -->
					</div>
				</div>
			</section>
		<?php
		}

		//------------------------------------------------------------					
		else if ($_GET['page'] == 'materi_edit_simpan') 
		{
			$db->query("
					UPDATE materi SET 
					 	id_materi = '$_POST[id_materi]',
					 	judul_materi = '$_POST[judul_materi]',
					 	deskripsi_materi 		= '$_POST[deskripsi_materi]',
					 	link 		= '$_POST[link]'
					WHERE id_materi = '$_POST[id_materi]'
				");
			if (!$db)
				echo "Ada Masalah Penyimpanan data = $db->error";
			else
				header("location:tampil.php?page=materi");
		} 

		//------------------------------------------------------------							
		else if ($_GET['page'] == 'materi_hapus') 
		//------------------------------------------------------------					
		{
			$db->query(" DELETE FROM materi WHERE id_materi = '$_GET[id]' ");
			if (!$db)
				echo "Ada Masalah Hapus data = $db->error";
			else
				header("location:tampil.php?page=kursus");
		}
	}
	?>

	</div>
	<!-- Wajib ada, penutup konten milik AdminLTE /.content-wrapper -->