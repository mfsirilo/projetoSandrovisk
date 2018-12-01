<?php include("./fixed/conexao.php"); ?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Biblioteca</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" media="screen" href="../css/style.css" />
	</head>
	<body style="padding-top:0%;">
		<?php include("./fixed/navbar.php"); ?>

		<main>
			<div class="container">
				<div class="" id="main">
					<div class="card-deck">
						<div class="card">
							<i class="fas fa-book fa-7x text-dark text-center" style="margin-top:3%;"></i>
							<div class="card-body">
								<h3 class="card-title text-center text-dark">Livros</h3>
							</div>
							<div class="card-footer text-center">
								<small class="text-muted"><a href="" class="btn bg-dark"><b class="text-warning">Acessar</b></a></small>
							</div>
						</div>
						<div class="card">
							<i class="fas fa-book fa-7x text-dark text-center" style="margin-top:3%;"></i>
							<div class="card-body">
								<h5 class="card-title text-center">Meus Emprestimos</h5>
							</div>
							<div class="card-footer text-center">
								<small class="text-muted"><a href="" class="btn bg-dark"><b class="text-warning">Acessar</b></a></small>
							</div>
						</div>
						
					</div>
				</div>
			</div>
		</main>

		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	</body>
</html>