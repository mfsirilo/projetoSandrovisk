<?php include("./fixed/conexao.php"); ?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<link rel="stylesheet" href="../css/style.css">
		<title>Biblioteca</title>
	</head>
	<body id="body">
		<?php include_once("./fixed/navbar.php"); ?>

		<main>
			<div class="sidenav-fixed-right bg-dark d-none d-md-block">
				<a href="admin.php" class="text-center text-dark bg-warning menu" style="">Menu</a>
				<a href="cadastroLivro.php">Cadastrar Livro</a>
				<a href="cadastroLivro.php">Cadastrar Cliente</a>
				<a href="buscarLivro.php">Buscar Livros</a>
				<a href="emprestimos.php">Emprestimos</a>
				<a href="pagamento.php">Pagamento</a>
				<a href="devolucao.php">Devolução</a>
			</div>
			<div class="row" id="main">
				
			</div>
		</main>

		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	</body>
</html>