<!DOCTYPE html>
<html>
<head>
	<title>Sistem Pendukung Keputusan Pemilihan Asisten Dosen</title>
	<meta property="og:image" content="assets/image/laptop.jpg" />
	<meta name="description" content="">
	<!--Import Google Icon Font-->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<!--Import materialize.css-->
	<link type="text/css" rel="stylesheet" href="assets/css/materialize.css"  media="screen,projection"/>
	<link rel="stylesheet" href="assets/css/table.css">
	<link rel="stylesheet" href="assets/css/style.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

	<link rel="apple-touch-icon" sizes="76x76" href="assets/image/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="assets/image/favicon.png">

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
	<script>
	$(document).ready(function(){
	  $(".button-collapse").sideNav();
	  $(".dropdown-button").dropdown();
	});
	</script>
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
          <a class="nav-link active" aria-current="page" href="home.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="bobot.php">Bobot</a>
        </li>
		<li class="nav-item">
          <a class="nav-link" href="daftar_mhs.php">Daftar Mahasiswa</a>
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
<!-- 
	<div class="navbar-fixed">
	<nav>
    	<div class="container">
						<div class="nav-wrapper">
								<ul class="left" style="margin-left: -52px;">
									<li><a class="active" href="index.php">Home</a></li>
									<li><a href="bobot.php">Bobot</a></li>
									<li><a href="daftar_mhs.php">Daftar Mahasiswa</a></li>
									<li><a href="#about">About</a></li>
								</ul>
						</div>
					
        </div>
		</nav>
		</div> -->
    <!-- Body Start -->

		<!-- Jumbotron Start -->
		<div id="index-banner" class="parallax-container" >
			<div class="section no-pad-bot">
				<div class="container">
					<div class="row center">
						<br>
						<br>
						<br>
					</div>
					<!-- <div class="row center"> -->
					<a class="btn btn-info" style="margin-top:320px; margin-left:180px" href="bobot.php" role="button">Masukan Bobot</a>
							<!-- </div> -->
				</div>
			</div>
			<div class="parallax"><img src="assets/image/bg.png" alt="bg"></div>
		</div>
		<!-- Jumbotron End -->

	<!-- Info Start -->
	<div >
		<div class="container">
		    <div class="section-card" style="padding: 36px 0px;background-color: white">
		    	<div class="row">
		    		<div class="col s6">
			    		<center><h5 class="header" style="margin-left: 0px; margin-bottom: 0px; margin-top: 25px; color: #635c73">INFO SISTEM</h5></center><br>
			    		<p style="text-align: justify; padding-right: 16px;">Sistem Pendukung Keputusan Pemilihan Asisten Dosen. Website ini dibuat dengan bahasa php. Dan sistem ini dibuat untuk memenuhi nilai UAS mata kuliah Sistem Pendukung Keputusan </p>
						</div>
			    	<div class="col s6">
			    		<center><h5 class="header" style="margin-left: 0px; margin-bottom: 0px; margin-top: 25px; color: #635c73">INFO METODE</h5></center><br>
							<p style="text-align: justify; padding-left: 16px;">Metode yang digunakan adalah metode TOPSIS. Metode TOPSIS adalah salah satu metode penyelesaian pada sistem pendukung keputusan. Metode ini mengevaluasi beberapa alternatif terhadap sekumpulan atribuat atau kriteria, dimana setiap atribut saling tidak bergantung satu dengan yang lainnya.
							</p>
							</div>
		    	</div>
	    	</div>
		</div>
	</div>
	<!-- Info End -->

	
    <!-- Body End -->

    <!-- Footer Start -->
	<div class="footer-copyright" style="padding: 0px 0px">
      <div class="container">
        <p align="center" style="color: #999">&copy; Sistem Pendukung Keputusan Pemilihan Asisten Dosen</p>
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