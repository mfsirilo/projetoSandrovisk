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
			<div class="sidenav-fixed-right bg-dark">
				<a href="admin.php" class="text-center text-dark bg-warning menu" style="">Menu</a>
				<a href="cadastroLivro.php">Cadastrar Livro</a>
				<a href="cadastroCliente.php">Cadastrar Cliente</a>
				<a href="buscarLivro.php">Buscar Livros</a>
				<a href="emprestimos.php" class="activeSN">Emprestimos</a>
				<a href="pagamento.php">Pagamento</a>
				<a href="devolucao.php">Devolução</a>
			</div>
			<div class="row" id="main">
				<div class="col text-center">
					<h2>Realização de Emprestimos</h2>
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
									include("./fixed/conexao.php");
									$sql = "select * from usuario where status = 1";
									$result = mysqli_query($con, $sql);
									if(mysqli_num_rows($result) > 0) {
										while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
											echo ("
											<option value='".$row['idcliente']."'><b>Cliente:</b> ".$row['nome']."</option>
											");
										}
									}
								?>
							</select>
						</div>
						<div class="form-group">
							<label for="formGroupExampleInput2">Livro</label>
							<select class="custom-select">
								<option selected>Selecione um Livro</option>
								<?php
									$sql = "select * from livro where qtd_disponivel > 0";
									$result = mysqli_query($con, $sql);
									if(mysqli_num_rows($result) > 0) {
										while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
											echo ("
											<option value='".$row['idlivro']."'><b>Livro:</b> ".$row['nome']."</option>
											");
										}
									}
								?>
							</select>
						</div>
						<div class="col text-center">
							<a class="btn btn-warning text-center" data-toggle="modal" data-target="#exampleModal"><b>Emprestimo</b></a>
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
					<h2>Emprestimos Pendentes</h2>
				</div>
			</div>
			<div class="row" id="main">
				<table class="table table-hover text-center">
					<thead>
						<tr>
							<th scope="col">Código</th>
							<th scope="col">Cliente</th>
							<th scope="col">Livro</th>
							<th scope="col">Data do Emprestimo</th>
							<th scope="col">Data da Entrega</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$sql = "select idemprestimo, data_emprestimo, data_prevista, livro.nome, usuario.nome from ((emprestimo inner join livro on livro_idlivro = livro.idlivro) inner join usuario on usuario_idusuario = usuario.idusuario)";
							$result = mysqli_query($con, $sql);
							if(mysqli_num_rows($result) > 0) {
								while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
									echo ("
									<tr>
										<th scope='row'>".$row['idemprestimos']."</th>
										<td>".$row['usuario.nome']."</td>
										<td>".$row['livro.nome']."</td>
										<td>".$row['data_emprestimo']."</td>
										<td>".$row['data_prevista']."</td>
									</tr>
									");
								}
							}
						?>
						<!-- <tr>
							<th scope="row">1</th>
							<td>Mark</td>
							<td>Otto</td>
							<td>Otto</td>
							<td>Otto</td>
						</tr> -->
					</tbody>
				</table>
			</div>
		</main>
		
	</body>
</html>