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
				<a href="cadastroCliente.php">Cadastrar Cliente</a>
				<a href="buscarLivro.php">Buscar Livros</a>
				<a href="emprestimos.php">Emprestimos</a>
				<a href="pagamento.php">Pagamento</a>
				<a href="devolucao.php"  class="activeSN">Devolução</a>
			</div>
			<div class="row" id="main">
				<div class="col text-center">
					<h2>Realização de Devolução</h2>
				</div>
			</div>
			<div class="row" id="main">
				<div class="col">
					<form action="pagamento.php" method="post">
						<div class="form-group col-xl-12">
							<label for="inputEmail4">Usuário</label>
							<input type="text" class="form-control" id="inputUsuário4" name="usuario" placeholder="Usuário">
						</div>
						<div class="form-group col-xl-12">
							<label for="inputPassword4">Livro</label>
							<input type="text" class="form-control" id="inputLivro4" name="livro" placeholder="Livro">
						</div>
						<div class='col text-center'>
							<a class='btn btn-warning' data-toggle='modal' data-target='#modal-confirma'><b>Devolução</b></a>
						</div>
						<div class='modal fade' id='modal-confirma' tabindex='-1' role='dialog' aria-labelledby='cria-modal' aria-hidden='true'>
							<div class='modal-dialog' role='document'>
								<div class='modal-content'>
									<div class='modal-header bg-warning text-dark'>
										<h5 class='modal-title' id='cria-modal'>Confirmar Devolução</h5>
										<button type='button' class='close' data-dismiss='modal' aria-label='Close'>
											<span aria-hidden='true'>&times;</span>
										</button>
									</div>
									<div class='modal-body text-center'>
										<p>Deseja realizar a devolução?</p>
									</div>
									<div class='modal-footer'>
										<a href='' class='btn btn-secondary text-light' data-dismiss='modal'><b>Cancelar</b></a>
										<button type='submit' class='btn btn-warning text-dark'><b>Confirma</b></button>
									</div>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</main>

		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	</body>
</html>