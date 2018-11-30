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

		<?php
			if(isset($_POST['usuario'])) {

			}
		?>

		<main>
			<div class="sidenav-fixed-right bg-dark d-none d-md-block">
				<a href="admin.php" class="text-center text-dark bg-warning menu" style="">Menu</a>
				<a href="cadastroLivro.php">Cadastrar Livro</a>
				<a href="cadastroCliente.php">Cadastrar Cliente</a>
				<a href="buscarLivro.php">Buscar Livros</a>
				<a href="emprestimos.php">Emprestimos</a>
				<a href="pagamento.php"  class="activeSN">Pagamento</a>
				<a href="devolucao.php">Devolução</a>
			</div>
			<div class="row" id="main">
				<div class="col text-center">
					<h2>Realização de Pagamento</h2>
				</div>
			</div>
			<div class="row" id="main">
				<div class="col">
					<form action="pagamento.php" method="post">
						<div class="form-group">
						<label for="formGroupExampleInput2">Cliente</label>
							<select class="custom-select">
								<option selected>Selecione um Cliente</option>
								<?php
									$sql = "select emprestimo.idEmprestimo, emprestimo.data_prevista, emprestimo.data_devolucao, livro.nome, usuario.nome from ((emprestimo inner join usuario on emprestimo.livro_idlivro = livro.idlivro) inner join usuario on emprestimo.usuario_idusuario = usuario.idusuario";
								?>
								<option value="1">One</option>
								<option value="2">Two</option>
								<option value="3">Three</option>
							</select>
						</div>
						<div class="form-group">
							<label for="disabledInput">Valor</label>
							<input class="form-control" id="disabledInput" type="text" placeholder="Valor a ser Pago" disabled>
						</div>
						<div class="col text-center">
							<a class="btn btn-warning text-center" data-toggle="modal" data-target="#exampleModal"><b>Pagar</b></a>
						</div>
						<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header bg-warning text-dark">
										<h5 class="modal-title" id="exampleModalLabel">Confirmação de Pagamento</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">
										...
									</div>
									<div class="modal-footer">
										<a href="" class="btn btn-secondary text-light" data-dismiss="modal"><b>Cancelar</b></a>
										<a href="" class="btn btn-danger text-dark"><b>Confirmar</b></a>
									</div>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
			<div class="row" id="main">
				<div class="col text-center">
					<h2>Pagamentos em Aberto</h2>
				</div>
			</div>
			<div class="row" id="main">
				<table class="table table-hover text-center">
					<thead>
						<tr>
						<th scope="col">Código</th>
						<th scope="col">Usuário</th>
						<th scope="col">Livro</th>
						<th scope="col">Data do Emprestimo</th>
						<th scope="col">Data Prevista</th>
						<th scope="col">Data de Devolução</th>
						<th scope="col">Valor da Multa</th>
						<th scope="col">Confirmação de Pagamento</th>
						<th scope="col">Excluir</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$sql = "select * from emprestimo";
							$result = mysqli_query($con, $sql);
							if(mysqli_num_rows($result) > 0) {
								while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
									if($row['status'] == 1) {
										echo ("
										<tr>
											<th scope='row'>".$row['idemprestimo']."</th>
											<th scope='row'>".$row['nome']."</th>
											<th scope='row'>".$row['categoria']."</th>
											<th scope='row'>".$row['autor']."</th>
											<th scope='row'>".$row['quantidade']."</th>
											<th scope='row'><a class='btn btn-warning' href='cadastroLivro.php?id=".$row['idlivro']."'><b>Confirmar Pagamento</b></a></th>
											<th scope='row'><a class='btn btn-danger' href='removerLivro.php?id=".$row['idlivro']."'><b>Excluir</b></a></th>
										</tr>
										");
									}
								}
							}
						?>
					</tbody>
				</table>
			</div>
		</main>

		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	</body>
</html>