<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<title>Layout</title>
		<link rel="stylesheet" href="<?=base_url()?>public/css/style.css">
		<!--Bootstrap.css-->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
		<!--JQuery-->
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<!--Popper.js-->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		<!--Bootstrap.js-->
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
	</head>
	<body>
		<header id="main-header">
			<div class="container-fluid">
				<div class="row">
					<div class="col-sm-6"><a href="#" class="home-link px-sm-5">Plantilla</a></div>
					<div class="col-sm-6"></div>
				</div>
			</div>
		</header>
		<div class="container" id="principal-container">
			<? $this->load->view($view)?>
		</div>
		<footer id="main-footer">
			<div class="container-fuid">
				<div class="row">
					<div class="col-sm-12 col-md-6 text-right links-footer">
						<a href="#">Inicio</a>
						<a href="#">Terms and Conditions</a>
						<a href="#"> About</a>
					</div>
				</div>
				<div class="row">
					<div class="col-auto mx-auto">
						Layot - xbaxtian
					</div>
				</div>
			</div>
		</footer>
	</body>
</html>
