<?php 
session_start();
include('koneksi.php');

//Bobot
$W1	= $_POST['nilai_publik'];
$W2	= $_POST['ipk'];
$W3	= $_POST['nilai_tes_pemweb'];
$W4	= $_POST['nilai_kerjasama'];
$W5	= $_POST['nilai_agama'];

//Pembagi Normalisasi
function pembagiNM($matrik)
{
	for ($i = 0; $i < 5; $i++) {
		$pangkatdua[$i] = 0;
		for ($j = 0; $j < sizeof($matrik); $j++) {
			$pangkatdua[$i] = $pangkatdua[$i] + pow($matrik[$j][$i], 2);
		}
		$pembagi[$i] = sqrt($pangkatdua[$i]);
	}
	return $pembagi;
}

//Normalisasi
function Transpose($squareArray)
{

	if ($squareArray == null) {
		return null;
	}
	$rotatedArray = array();
	$r = 0;

	foreach ($squareArray as $row) {
		$c = 0;
		if (is_array($row)) {
			foreach ($row as $cell) {
				$rotatedArray[$c][$r] = $cell;
				++$c;
			}
		} else $rotatedArray[$c][$r] = $row;
		++$r;
	}
	return $rotatedArray;
}

function JarakIplus($aplus, $bob)
{
	for ($i = 0; $i < sizeof($bob); $i++) {
		$dplus[$i] = 0;
		for ($j = 0; $j < sizeof($aplus); $j++) {
			$dplus[$i] = $dplus[$i] + pow(($aplus[$j] - $bob[$i][$j]), 2);
		}
		$dplus[$i] = round(sqrt($dplus[$i]), 8);
	}
	return $dplus;
}

?>
<!DOCTYPE html>
<html>
<head>
	
	<title>Sistem Pendukung Keputusan Pemilihan Smartphone</title>
	<!--Import Google Icon Font-->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<!--Import materialize.css-->
	<link type="text/css" rel="stylesheet" href="assets/css/materialize.css"  media="screen,projection"/>
	<link rel="stylesheet" href="assets/css/table.css">
	<link rel="stylesheet" href="assets/css/style.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

	<link rel="apple-touch-icon" sizes="76x76" href="assets/image/apple-icon.png"> 	<link rel="icon" type="image/png" sizes="96x96" href="assets/image/favicon.png">

	<!--Let browser know website is optimized for mobile-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<!--Import jQuery before materialize.js-->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script type="text/javascript" src="assets/js/materialize.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>

	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
</head>

<body>


<nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="home.php">Pemilihan Asisten Dosen</a>
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
          <a class="nav-link" href="daftar_mhs.php">Daftar Mahasiswa</a>
        </li>
		<li class="nav-item">
          <a class="nav-link active" href="hasil.php">Perhitungan</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
	<!-- Body Start -->

	<!-- Daftar Laptop Start -->
	<div style="background-color: #434343">
		<div class="container">
			<div class="section-card" style="padding: 20px 0px">
				<!--   Icon Section   -->


				<center>
					<h4 class="header" style="margin-left: 24px; margin-bottom: 0px; margin-top: 24px; color: #ffffff;"> <br> Hasil Rekomendasi Mahasiswa</h4>
				</center>
				<ul>
					<li>
						<div class="row">
							<div class="card">
								<div class="card-content">
									<h5 style="margin-bottom: 16px; margin-top: -6px;">Matrik Mahasiswa</h5>
									<table class="table table-striped">

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
											while ($data_mhs=mysqli_fetch_array($query)) {
												$Matrik[$no-1]=array($data_mhs['nilai_publik'],$data_mhs['ipk'],$data_mhs['nilai_tes_pemweb'],$data_mhs['nilai_kerjasama'],$data_mhs['nilai_agama'] );
												?>
												<tr>
													<td><center><?php echo "A",$no ?></center></td>
													<td><center><?php echo $data_mhs['nilai_publik'] ?></center></td>
													<td><center><?php echo $data_mhs['ipk'] ?></center></td>
													<td><center><?php echo $data_mhs['nilai_tes_pemweb'] ?></center></td>
													<td><center><?php echo $data_mhs['nilai_kerjasama'] ?></center></td>
													<td><center><?php echo $data_mhs['nilai_agama'] ?></center></td>
												</tr>
												<?php
												$no++;
											}
											?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</li>
				</ul>


				<center>
					<h4 class="header" style="margin-left: 24px; margin-bottom: 0px; margin-top: 24px; color: #ffffff;">Matriks ternormalisasi, R:</h4>
				</center>
				<ul>
					<li>
						<div class="row">
							<div class="card">
								<div class="card-content">
									<h5 style="margin-bottom: 16px; margin-top: -6px;">Matriks Normalisasi "R"</h5>
									<table class="table table-striped">

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
											$pembagiNM=pembagiNM($Matrik);
											while ($data_mhs=mysqli_fetch_array($query)) {

												$MatrikNormalisasi[$no-1]=array($data_mhs['nilai_publik']/$pembagiNM[0],
													$data_mhs['ipk']/$pembagiNM[1],
													$data_mhs['nilai_tes_pemweb']/$pembagiNM[2],
													$data_mhs['nilai_kerjasama']/$pembagiNM[3],
													$data_mhs['nilai_agama']/$pembagiNM[4]);

													?>
													<tr>
														<td><center><?php echo "A",$no ?></center></td>
														<td><center><?php echo round($data_mhs['nilai_publik']/$pembagiNM[0],6)?></center></td>
														<td><center><?php echo round($data_mhs['ipk']/$pembagiNM[1],6) ?></center></td>
														<td><center><?php echo round($data_mhs['nilai_tes_pemweb']/$pembagiNM[2],6) ?></center></td>
														<td><center><?php echo round($data_mhs['nilai_kerjasama']/$pembagiNM[3],6) ?></center></td>
														<td><center><?php echo round($data_mhs['nilai_agama']/$pembagiNM[4],6) ?></center></td>
													</tr>
													<?php
													$no++;
												}
												?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</li>
					</ul>


					<center>
						<h4 class="header" style="margin-left: 24px; margin-bottom: 0px; margin-top: 24px; color: #ffffff;">BOBOT (W)</h4>
					</center>
					<ul> 
						<li>
							<div class="row">
								<div class="card">
									<div class="card-content">
									<h5 style="margin-bottom: 16px; margin-top: -6px;">BOBOT (W)</h5>
									<table class="table table-striped">
											<thead>
												<tr>
													<th><center>Value Kriteria Nilai Publik</center></th>
													<th><center>Value Kriteria IPK</center></th>
													<th><center>Value Kriteria Nilai Tes PemWeb</center></th>
													<th><center>Value Kriteria Nilai Kerjasama</center></th>
													<th><center>Value Kriteria Nilai Agama</center></th>
												</tr>
											</thead>
											<tbody>
												<!--count($W)-->
												<tr>
													<td><center><?php echo($W1);?></center></td>
													<td><center><?php echo($W2);?></center></td>
													<td><center><?php echo($W3);?></center></td>
													<td><center><?php echo($W4);?></center></td>
													<td><center><?php echo($W5);?></center></td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</li>
					</ul>


					<center>
						<h4 class="header" style="margin-left: 24px; margin-bottom: 0px; margin-top: 24px; color:#ffffff;">Matriks ternormalisasi terbobot, Y:</h4>
					</center>
					<ul>
						<li>
							<div class="row">
								<div class="card">
									<div class="card-content">
										<h5 style="margin-bottom: 16px; margin-top: -6px;">Matriks Normalisasi terBobot "Y"</h5>
										<table class="table table-striped">

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
												$pembagiNM=pembagiNM($Matrik);
												while ($data_mhs=mysqli_fetch_array($query)) {
													
													$NormalisasiBobot[$no-1]=array(
														$MatrikNormalisasi[$no-1][0]*$W1,
														$MatrikNormalisasi[$no-1][1]*$W2,
														$MatrikNormalisasi[$no-1][2]*$W3,
														$MatrikNormalisasi[$no-1][3]*$W4,
														$MatrikNormalisasi[$no-1][4]*$W5 );

														?>
														<tr>
															<td><center><?php echo "A",$no ?></center></td>
															<td><center><?php echo round($MatrikNormalisasi[$no-1][0]*$W1,6) ?></center></td>
															<td><center><?php echo round($MatrikNormalisasi[$no-1][1]*$W2,6) ?></center></td>
															<td><center><?php echo round($MatrikNormalisasi[$no-1][2]*$W3,6) ?></center></td>
															<td><center><?php echo round($MatrikNormalisasi[$no-1][3]*$W4,6) ?></center></td>
															<td><center><?php echo round($MatrikNormalisasi[$no-1][4]*$W5,6) ?></center></td>
														</tr>
														<?php
														$no++;
													}
													?>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</li>
						</ul>


						<center>
							<h4 class="header" style="margin-left: 24px; margin-bottom: 0px; margin-top: 24px; color: #ffffff;">Matrik Solusi ideal positif dan negatif
							</h4>
						</center>
						<ul>
							<li>
								<div class="row">
									<div class="card">
										<div class="card-content">
											<h5 style="margin-bottom: 16px; margin-top: -6px;">Matrik Solusi ideal positif "A+" dan negatif "A-"
											</h5>
											<table class="table table-striped">

												<thead style="border-top: 1px solid #d0d0d0;">
													<tr>
														<th><center></center></th>
														<th><center>Y1 (Benefit)</center></th>
														<th><center>Y2 (Benefit)</center></th>
														<th><center>Y3 (Benefit)</center></th>
														<th><center>Y4 (Benefit)</center></th>
														<th><center>Y5 (Benefit)</center></th>
													</tr>
												</thead>
												<tbody>
													<?php
													$NormalisasiBobotTrans = Transpose($NormalisasiBobot);
													?>
													<tr>
														<?php  
														$idealpositif=array(max($NormalisasiBobotTrans[0]),max($NormalisasiBobotTrans[1]),max($NormalisasiBobotTrans[2]),max($NormalisasiBobotTrans[3]),max($NormalisasiBobotTrans[4]));
														?>
														<td><center><?php echo "Y+" ?> </center></td>
														<td><center><?php echo(round(max($NormalisasiBobotTrans[0]),6));?>&nbsp(max)</center></td>
														<td><center><?php echo(round(max($NormalisasiBobotTrans[1]),6));?>&nbsp(max)</center></td>
														<td><center><?php echo(round(max($NormalisasiBobotTrans[2]),6));?>&nbsp(max)</center></td>
														<td><center><?php echo(round(max($NormalisasiBobotTrans[3]),6));?>&nbsp(max)</center></td>
														<td><center><?php echo(round(max($NormalisasiBobotTrans[4]),6));?>&nbsp(max)</center></td>
													</tr>
													<tr>
														<?php  
														$idealnegatif=array(min($NormalisasiBobotTrans[0]),min($NormalisasiBobotTrans[1]),min($NormalisasiBobotTrans[2]),min($NormalisasiBobotTrans[3]),min($NormalisasiBobotTrans[4]));
														?>
														<td><center><?php echo "Y-" ?> </center></td>
														<td><center><?php echo(round(min($NormalisasiBobotTrans[0]),6));?>&nbsp(min)</center></td>
														<td><center><?php echo(round(min($NormalisasiBobotTrans[1]),6));?>&nbsp(min)</center></td>
														<td><center><?php echo(round(min($NormalisasiBobotTrans[2]),6));?>&nbsp(min)</center></td>
														<td><center><?php echo(round(min($NormalisasiBobotTrans[3]),6));?>&nbsp(min)</center></td>
														<td><center><?php echo(round(min($NormalisasiBobotTrans[4]),6));?>&nbsp(min)</center></td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</li>
						</ul>


						<center>
							<h4 class="header" style="margin-left: 24px; margin-bottom: 0px; margin-top: 24px; color: #ffffff;">Jarak antara nilai terbobot setiap alternatif terhadap solusi ideal positif												
							</h4>
						</center>
						<ul>
							<li>
								<div class="row">
									<div class="card">
										<div class="card-content">
										<table class="table table-striped">

												<thead style="border-top: 1px solid #d0d0d0;">
													<tr>
														<th><center>D+</center></th>
														<th><center></center></th>
														<th><center>D-</center></th>
														<th><center></center></th>
													</tr>
												</thead>
												<tbody>
													<?php
													$query=mysqli_query($selectdb,"SELECT * FROM tb_asdos");
													$no=1;
													$Dplus=JarakIplus($idealpositif,$NormalisasiBobot);
													$Dmin=JarakIplus($idealnegatif,$NormalisasiBobot);
													while ($data_mhs=mysqli_fetch_array($query)) {

														?>
														<tr>
															<td><center><?php echo "D",$no ?></center></td>
															<td><center><?php echo round($Dplus[$no-1],6) ?></center></td>
															<td><center><?php echo "D",$no ?></center></td>
															<td><center><?php echo round($Dmin[$no-1],6) ?></center></td>
														</tr>
														<?php
														$no++;
													}
													?>
												</tbody>
											</table>

										</div>
									</div>
								</div>
							</li>
						</ul>


						<center>
							<h4 class="header" style="margin-left: 24px; margin-bottom: 0px; margin-top: 24px; color: #ffffff;">Nilai Preferensi untuk Setiap alternatif (V)												
							</h4>
						</center>
						<ul>
							<li>
								<div class="row">
									<div class="card">
										<div class="card-content">
										<table class="table table-striped">

												<thead style="border-top: 1px solid #d0d0d0;">
													<tr>
														<th><center>Nilai Preferensi "V"</center></th>
														<th><center>Nilai</center></th>
													</tr>
												</thead>
												<tbody>
													<?php
													$query=mysqli_query($selectdb,"SELECT * FROM tb_asdos");
													$no=1;
													$nilaiV = array();
													while ($data_mhs=mysqli_fetch_array($query)) {
														
														array_push($nilaiV, $Dmin[$no-1]/($Dmin[$no-1]+$Dplus[$no-1]));
														?>
														<tr>
															<td><center><?php echo "V",$no ?></center></td>
															<td><center><?php echo $Dmin[$no-1]/($Dmin[$no-1]+$Dplus[$no-1]); ?></center></td>
														</tr>
														<?php
														$no++;
													}

													?>
													<?php
														for ($i = 0; $i < 6; $i++) {
															$nilai = $nilaiV[$i];
															$query = mysqli_query($selectdb, "UPDATE tb_asdos SET preferensi = $nilai where id = $i+1");
														}
														?>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</li>
						</ul>


						<center>
							<h4 class="header" style="margin-left: 24px; margin-bottom: 0px; margin-top: 24px; color: #ffffff;">Hasil Perangkingan
							</h4>
						</center>
						<ul>
							<li>
								<div class="row">
									<div class="card">
										<div class="card-content">
										<table class="table table-striped">

										<thead style="border-top: 1px solid #d0d0d0;">
											<tr>
												<th>
													<center>No</center>
												</th>
												<th>
													<center>Alternatif Mahasiswa</center>
												</th>
												<th>
													<center>Nilai Preferensi</center>
												</th>
											</tr>
										</thead>
										<tbody>
											<?php
											$query = mysqli_query($selectdb, "SELECT * FROM tb_asdos order BY preferensi desc");
											$no = 1;
											while ($data = mysqli_fetch_array($query)) {
											?>
												<tr>
													<td>
														<center><?php echo $no; ?></center>
													</td>
													<td>
														<center><?php echo $data['nama_mhs'] ?></center>
													</td>
													<td>
														<center><?php echo $data['preferensi'] ?></center>
													</td>
												</tr>
											<?php
												$no++;
											}
											?>
										</tbody>
										</table>
									</div>
								</div>
							</div>
						</li>
					</ul>
					<div class="row center" \>
						<a href="bobot.php" id="download-button" class="btn btn-success" style="margin-top: 0px">Hitung Rekomendasi Ulang</a>
					</div>
				</div>
			</div>
		</div>
		<!-- Daftar Laptop End -->
		<!-- Modal Start -->
		<div id="about" class="modal">
			<div class="modal-content">
			<h4>Tentang</h4>
	  <center><p>Sistem Pendukung Keputusan Untuk pemilihan asisten dosen. yang dibuat dengan metode TOPSIS dan dengan Bahasa PHP
	  </p></center> 
	    <center><h5 >Thanks To </h5><br></center> 
		<center> <p>Allah Swt <br></center>
		<center> Zulfi Osman <br></center>
		<center> Wahid Arinanto Nugroho <br></center>
		<center> dan teman - teman <br></center>
	  </p> <br>
	  <center> <p>yang telah bekerjasama atas jalannya sistem ini</p></center>
      <!-- <p>Sistem Pendukung Keputusan Pemilihan Smartphone ini menggunakan metode TOPSIS yang dibangun menggunakan bahasa PHP.
				Sistem ini dibuat sebagai Tugas Akhir Mata Kuliah Sistem Pendukung Keputusan Prodi Teknik Informatika Universitas Trunojoyo Madura. <br> -->
				<br>
				<center> <h5>kami</h5></center>
				<center> 1. Muhammad Reziq Darusman (20090127)<br></center>
				<center> 2. Sifa  </p></center>
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Tutup</a>
    </div>
	</div>
		<!-- Modal End -->

		<!-- Body End -->

		<!-- Footer Start -->
		<div class="footer-copyright" style="padding: 0px 0px; background-color:  #434343">
			<div class="container">
				<p align="center" style="color: #999">&copy; Sistem Pendukung Keputusan Pemilihan Asisten Dosen.</p>
			</div>
		</div>
		<!-- Footer End -->
		<script type="text/javascript">
			$(document).ready(function(){
				$('.parallax').parallax();
				$('.modal').modal();
			});
		</script>
			</body>
	</html>