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
	<link rel="apple-touch-icon" sizes="76x76" href="assets/image/apple-icon.png"> 	<link rel="icon" type="image/png" sizes="96x96" href="assets/image/favicon.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

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
          <a class="nav-link active" href="bobot.php">Bobot</a>
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

		<!-- Body Start -->

        <div style="background-color:#434343">
        <div class="container" >
            <div class="row">
                <div class="card mt-5" style="background-color: #efefef">
                    <div class="card-body">
                    <center><h4>Masukan Bobot</h4></center>
                                                <br>

                                                <form class="col s12" method="POST" action="hasil.php">
                                                <div class="row">
                                                    <div class="col s12">

                                                        <div class="col s6" style="margin-top: 0px;">
                                                            <b>Publik Speaking</b>
                                                        </div>
                                                        <div class="col s6">
                                                            <input style="height: 3rem;" name="nilai_publik" type="text" required>
                                                        </div>

                                                        <div class="col s6" style="margin-top: 10px;">
                                                            <b>IPK</b>
                                                        </div>
                                                        <div class="col s6">
                                                            <input style="height: 3rem;" name="ipk" type="text" required>
                                                        </div>

                                                        <div class="col s6" style="margin-top: 10px;">
                                                            <b>Nilai Tes PemWeb</b>
                                                        </div>
                                                        <div class="col s6">
                                                            <input style="height: 3rem;" name="nilai_tes_pemweb" type="text" required>
                                                        </div>

                                                        <div class="col s6" style="margin-top: 10px;">
                                                            <b>Nilai Kerjasama</b>
                                                        </div>
                                                        <div class="col s6">
                                                            <input style="height: 3rem;" name="nilai_kerjasama" type="text" required>
                                                        </div>

                                                        <div class="col s6" style="margin-top: 10px;">
                                                            <b>Nilai Agama</b>
                                                        </div>
                                                        <div class="col s6">
                                                            <input style="height: 3rem;" name="nilai_agama" type="text" required>
                                                        </div>
                                                    </div>
                                                    <center><button type="submit" class="btn btn-success" style="margin-bottom:20px; margin-top:30px">Hitung</button></center>	
                                                </form>       
                    </div>
                </div>
            </div>
        </div>
</div>
        

    <!-- Body End -->

    <!-- Footer Start -->
	<div class="footer-copyright" style="padding: 0px 0px; background-color: white; margin-top: auto; background-color:#434343">
      <div class="container">
        <p align="center" style="color: #999">&copy; Sistem Pendukung Keputusan Pemilihan Asisten Dosen.</p>
      </div>
    </div>
    <!-- Footer End -->
    <script type="text/javascript">
	  $(document).ready(function(){
	      $('.parallax').parallax();
          $('select').material_select();
          $('.modal').modal();
	    });
    </script>
</body>
</html>