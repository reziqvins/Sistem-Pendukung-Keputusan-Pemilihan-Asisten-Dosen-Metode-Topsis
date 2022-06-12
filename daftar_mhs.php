<?php 
session_start();
include('koneksi.php');
?>

<?php 
	if(isset($_POST["tambah_mhs"])){
		$nama             = $_POST["nama"];
		$nilai_publik     = $_POST["nilai_publik"];
		$ipk              = $_POST["ipk"];
		$nilai_tes_pemweb = $_POST["nilai_tes_pemweb"];
		$nilai_kerjasama  = $_POST["nilai_kerjasama"];
		$nilai_agama      = $_POST["nilai_agama"];
		
		$sql = "INSERT INTO `tb_asdos` (`id`, `nama_mhs`, `nilai_publik`, `ipk`, `nilai_tes_pemweb`, `nilai_kerjasama`, `nilai_agama`) 
				VALUES (NULL, :nama_mhs, :nilai_publik, :ipk, :nilai_tes_pemweb, :nilai_kerjasama, :nilai_agama)";
		$stmt = $db->prepare($sql);
		$stmt->bindValue(':nama_mhs', $nama);
		$stmt->bindValue(':nilai_publik', $nilai_publik);
		$stmt->bindValue(':ipk', $ipk);
		$stmt->bindValue(':nilai_tes_pemweb', $nilai_tes_pemweb);
		$stmt->bindValue(':nilai_kerjasama', $nilai_kerjasama);
		$stmt->bindValue(':nilai_agama', $nilai_agama);
		$stmt->execute();
	}

	if(isset($_POST["hapus_mhs"])){
		$id_hapus_mhs = $_POST['id_hapus_mhs'];
		$sql_delete = "DELETE FROM `tb_asdos` WHERE `id` = :id_hapus_mhs";
		$stmt_delete = $db->prepare($sql_delete);
		$stmt_delete->bindValue(':id_hapus_mhs', $id_hapus_mhs);
		$stmt_delete->execute();
		$query_reorder_id=mysqli_query($selectdb,"ALTER TABLE tb_asdos AUTO_INCREMENT = 1");
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Sistem Pendukung Keputusan Pemilihan Asisten Dosen</title>
	<!--Import Google Icon Font-->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<!--Import materialize.css-->
	<link type="text/css" rel="stylesheet" href="assets/css/materialize.css"  media="screen,projection"/>
	<link rel="stylesheet" href="assets/css/table.css">
	<link rel="stylesheet" href="assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

	<!--Let browser know website is optimized for mobile-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<!--Import jQuery before materialize.js-->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script type="text/javascript" src="assets/js/materialize.js"></script>
	
	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">

	<!-- Data Table -->
	<link rel="stylesheet" type="text/css" href="assets/dataTable/jquery.dataTables.min.css">
	<script type="text/javascript" charset="utf8" src="assets/dataTable/jquery.dataTables.min.js"></script>

</head>
<body>

<nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="home.php mr-5">Pemilihan Asisten Dosen Pemrograman Web</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="home.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="bobot.php">Bobot</a>
        </li>
		<li class="nav-item">
          <a class="nav-link active" href="daftar_mhs.php">Daftar Mahasiswa</a>
        </li>
		<li class="nav-item">
          <a class="nav-link" href="about.php">About</a>
        </li>
        <li class="nav-item dropdown" style="margin-left:480px;">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Admin
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Profile</a></li>
            <li><a class="dropdown-item" href="#">Setting</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="index.html">Keluar</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>

	<div style="background-color:#434343">
		<div class="container">
		    <div class="section-card" style="padding: 40px 0px 20px 0px;">
				<ul>
				    <li>
						<div class="row">
						<div class="card"style="background-color: #efefef">
								<div class="card-content" >
									<center><h4 style="margin-bottom: 0px; margin-top: -8px;">Daftar Mahasiswa</h4></center>
									<a class="btn btn-success mb-2" href="#tambah" role="button">Tambah</a>
									<table class="table table-striped"  style="width:100%;">
											<thead style="border-top: 1px solid #d0d0d0;">
												<tr>
													<th><center>No </center></th>
													<th><center>Nama Mahasiswa</center></th>
													<th><center>Nilai Publik Speaking</center></th>
													<th><center>IPK</center></th>
													<th><center>Nilai Tes Pemweb</center></th>
													<th><center>Nilai Kerjasama</center></th>
													<th><center>Nilai Agama</center></th>
													<th><center>Hapus</center></th>
												</tr>
											</thead>
											<tbody>
												<?php
												$query=mysqli_query($selectdb,"SELECT * FROM tb_asdos");
												$no=1;
												while ($data=mysqli_fetch_array($query)) {
												?>
												<tr>
													<td><center><?php echo $no; ?></center></td>
													<td><center><?php echo $data['nama_mhs'] ?></center></td>
													<td><center><?php echo $data['nilai_publik']?></center></td>
													<td><center><?php echo $data['ipk'] ?></center></td>
													<td><center><?php echo $data['nilai_tes_pemweb']?></center></td>
													<td><center><?php echo $data['nilai_kerjasama']?></center></td>
													<td><center><?php echo $data['nilai_agama'] ?></center></td>
													<td>
														<center>
															<form method="POST">
																<input type="hidden" name="id_hapus_mhs" value="<?php echo $data['id'] ?>">
																<button type="submit" name="hapus_mhs"  class="btn btn-danger"><i style="line-height: 32px;" class="fa fa-trash"></i></button>
															</form>
														</center>
													</td>
												</tr>
												<?php
														$no++;}
												?>
											</tbody>
									</table>
									</div>
									
							</div>
						</div>
				    </li>
				</ul>	     
	    	</div>
		</div>
	</div>

<!-- Kriteria -->
<div style="background-color:#434343">
		<div class="container">
		    <div class="section-card" style="padding: 1px 20% 24px 20%;">
				<ul>
				    <li>
						<div class="row">
							<div class="card" style="background-color: #efefef">
								<div class="card-content" style="padding-top: 10px;">
									<center><h5 style="margin-bottom: 5px;">Kriteria</h5></center>
									<table class="table table-striped"style="width:100%;">
									
											<thead style="border-top: 1px solid #d0d0d0;">
												<tr>
													<th><center>No</center></th>
													<th><center>Kriteria</center></th>
												</tr>
											</thead>
											<tbody>
												
												<tr>
												<td><center>1</center></td>
												<td><center>Nilai Publik </center></td>
												</tr>
												<tr>
												<td><center>2</center></td>
												<td><center>IPK </center></td>
												</tr>
												<tr>
												<td><center>3</center></td>
												<td><center>Pemrograman Web </center></td>
												</tr>
												<tr>
												<td><center>4</center></td>
												<td><center>Nilai Kerjasama </center></td>
												</tr>
												<tr>
												<td><center>5</center></td>
												<td><center>Nilai Agama</center></td>
												</tr>
												
											</tbody>
									</table>
									</div>
							</div>
						</div>
				    </li>
				</ul>	     
	    	</div>
		</div>
	</div>

	<!-- alternatif Start -->
	<div style="background-color:#434343">
		<div class="container">
		    <div class="section-card" style="padding: 1px 20% 24px 20%;">
				<ul>
				    <li>
						<div class="row">
							<div class="card" style="background-color: #efefef">
								<div class="card-content" style="padding-top: 10px;">
									<center><h5 style="margin-bottom: 10px;">Alternatif</h5></center>
									<table class="table table-striped"style="width:100%;">
									
											<thead style="border-top: 1px solid #d0d0d0;">
												<tr>
													<th><center>No</center></th>
													<th><center>Nama Mahasiswa</center></th>
												</tr>
											</thead>
											<tbody>
												<?php
												$query=mysqli_query($selectdb,"SELECT * FROM tb_asdos");
												$no=1;
												while ($data=mysqli_fetch_array($query)) {
												?>
												<tr>
												<td><center><?php echo $no; ?></center></td>
												<td><center><?php echo $data['nama_mhs'] ?></center></td>
												</tr>
												<?php
														$no++;}
												?>
											</tbody>
									</table>
									</div>
							</div>
						</div>
				    </li>
				</ul>	     
	    	</div>
		</div>
	</div>


	<!-- alternatif End -->
	<div style="background-color:#434343">
		<div class="container">
		    <div class="section-card" style="padding: 1px 20% 24px 20%;">
				<ul>
				    <li>
						<div class="row">
							<div class="card" style="background-color: #efefef">
								<div class="card-content" style="padding-top: 10px;">
									<center><h5 style="margin-bottom: 10px;">Analisa Mahasiswa</h5></center>
									<table class="table table-striped"style="width:100%;">
									
											<thead style="border-top: 1px solid #d0d0d0;">
												<tr>
													<th><center>Alternatif</center></th>
													<th><center>C1 (Benefit)</center></th>
													<th><center>C2 (Benefit)</center></th>
													<th><center>C3 (Benefit)</center></th>
													<th><center>C4 (Benefit)</center></th>
													<th><center>C5 (Benefit)</center></th>
												</tr>
											</thead>
											<tbody>
												<?php
												$query=mysqli_query($selectdb,"SELECT * FROM tb_asdos");
												$no=1;
												while ($data=mysqli_fetch_array($query)) {
												?>
												<tr>
													<td><center><?php echo "A",$no ?></center></td>
													<td><center><?php echo $data['nilai_publik'] ?></center></td>
													<td><center><?php echo $data['ipk'] ?></center></td>
													<td><center><?php echo $data['nilai_tes_pemweb'] ?></center></td>
													<td><center><?php echo $data['nilai_kerjasama'] ?></center></td>
													<td><center><?php echo $data['nilai_agama'] ?></center></td>
												</tr>
												<?php
														$no++;}
												?>
											</tbody>
									</table>
									</div>
							</div>
						</div>
				    </li>
				</ul>	     
	    	</div>
		</div>
	</div>
	<!-- Daftar hp End -->

	<!-- Modal Start -->
	<div id="tambah" class="modal" style="width: 40%; height: 100%;">
		<div class="modal-content">
			<div class="col s6">
					<div class="card-content">
						<div class="row">
							<center><h5 style="margin-top:-8px;">Input Data Mahasiswa</h5></center>
							<form method="POST" action="">
								<div class = "row">
									<div class="col s12">

										<div class="col s6" style="margin-top: 10px;">
											<b>Nama</b>
										</div>
										<div class="col s6">
											<input style="height: 2rem;" name="nama" type="text" required>
										</div>

										<div class="col s6" style="margin-top: 10px;">
											<b>Nilai Publik Speaking</b>
										</div>
										<div class="col s6">
											<input style="height: 2rem;" name="nilai_publik" type="number" required>
										</div>
										
										<div class="col s6" style="margin-top: 10px;">
										<b>ipk</b>
										</div>
										<div class="col s6">
											<input style="height: 2rem; margin-top:25px" name="ipk" type="varchar" required>
										</div>

										<div class="col s6" style="margin-top: 10px;">
											<b>Nilai tes Pemweb</b>
										</div>
										<div class="col s6">
											<input style="height: 2rem;" name="nilai_tes_pemweb" type="number" required>
										</div>

										<div class="col s6" style="margin-top: 10px;">
											<b>nilai kerjasama</b>
										</div>
										<div class="col s6">
											<input style="height: 2rem;" name="nilai_kerjasama" type="number" required>
										</div>

										<div class="col s6" style="margin-top: 10px;">
											<b>Nilai Agama</b>
										</div>
										<div class="col s6">
											<input style="height: 2rem;" name="nilai_agama" type="number" required>
										</div>

									</div>  
								</div> 
								<center><button name="tambah_mhs" type="submit" class="waves-effect waves-light btn teal" style="margin-top: 0px;">Tambah</button></center>	
							</form>
						</div>
					</div>
				</div>
			</div>
		<div style="height: 0px; "class="modal-footer">
          <a  class="modal-action modal-close waves-effect waves-green btn-flat">Tutup</a>
        </div>
	</div>

    <!-- Body End -->

    <!-- Footer Start -->
	<div class="footer-copyright" style="padding: 0px 0px;background-color:#434343">
      <div class="container">
        <p align="center" style="color: #999">&copy; Sistem Pendukung Keputusan Pemilihan Asisten Dosen.</p>
      </div>
    </div>
    <!-- Footer End -->
    <script type="text/javascript">
	  	$(document).ready(function(){
		$('.parallax').parallax();
		$('.modal').modal();
		$('#table_id').DataTable({
    		"paging": false
		});
	    });
	</script>
</body>
</html>