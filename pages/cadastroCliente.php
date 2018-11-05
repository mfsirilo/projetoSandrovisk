<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<link rel="stylesheet" href="../css/style.css">
		<title>Biblioteca</title>
		<style>
			
		</style>
	</head>
	<body id="body">
		<?php include_once("./fixed/navbar.php"); ?>

		<main>
			<div class="sidenav-fixed-right bg-dark">
				<a href="admin.php" class="text-center text-dark bg-warning menu" style="">Menu</a>
				<a href="cadastroLivro.php">Cadastrar Livro</a>
				<a href="cadastroLivro.php" class="activeSN">Cadastrar Cliente</a>
				<a href="buscarLivro.php">Buscar Livros</a>
				<a href="emprestimos.php">Emprestimos</a>
			</div>
			<div class="row" id="main">
				<div class="col-3">
				<h2>Cadastro de Cliente</h2>
				</div>
				<div class="col">
					<form action="" method="post">
						<div class="form-group">
							<label for="nome">Nome</label>
							<input type="text" class="form-control" id="nome" placeholder="Nome">
						</div>
						<div class="form-group">
							<label for="email">E-mail</label>
							<input type="email" class="form-control" id="email" placeholder="E-mail">
						</div>
						<div class="form-group">
							<label for="endereco">Endereço</label>
							<input type="email" class="form-control" id="endereco" placeholder="Endereço">
						</div>
						<div class="form-row">
							<div class="form-group col-md-9">
								<label for="senha">Senha</label>
								<input type="password" class="form-control" id="senha" nome="senha" placeholder="Senha">
							</div>
							<div class="form-group col-md-3">
								<label for="telefone">Telefone</label>
								<input type="text" class="form-control" id="telefone" nome="telefone" placeholder="Telefone">
							</div>
						</div>
						<div class="col text-center">
							<button type="submit" class="btn btn-warning">Cadastrar</button>
						</div>
					</form>
				</div>
			</div>
		</main>

		<?php include_once("./fixed/footer.php"); ?>
	</body>
</html>