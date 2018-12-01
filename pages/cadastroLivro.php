<?php
	include("./fixed/conexao.php");
	include("./fixed/verificacao.php");
?>

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
				<a href="cadastroLivro.php" class="activeSN">Cadastrar Livro</a>
				<a href="cadastroCliente.php">Cadastrar Cliente</a>
				<a href="buscarLivro.php">Buscar Livros</a>
				<a href="emprestimos.php">Emprestimos</a>
				<a href="pagamento.php">Pagamento</a>
				<a href="devolucao.php">Devolução</a>
			</div>
			<div class="row" id="main">
				<div class="col text-center">
					<h2>Cadastro de Livro</h2>
				</div>
			</div>
			<div class="row" id="main">
				<div class="col">
					<?php
							
							if(isset($_POST['nome'])) {
								if(isset($_POST['edit'])) {
									$id = $_POST['id'];
									$nome = $_POST['nome'];
									$categoria = $_POST['categoria'];
									$autor = $_POST['autor'];
									$editora = $_POST['editora'];
									$edicao = $_POST['edicao'];
									$qtd = $_POST['qtd'];
									$ano = $_POST['ano'];
									$desc = $_POST['descricao'];

									$sql = "update livro set nome='$nome', categoria='$categoria', editora='$editora', autor='$autor', edicao='$edicao' where idlivro=$id";
									mysqli_query($con, $sql);
									echo ("<script>alert('Livro alterado');</script>");
								} else {
									$nome = $_POST['nome'];
									$categoria = $_POST['categoria'];
									$autor = $_POST['autor'];
									$editora = $_POST['editora'];
									$edicao = $_POST['edicao'];
									$qtd = $_POST['qtd'];
									$ano = $_POST['ano'];
									$desc = $_POST['descricao'];
						
									$sql = "insert into livro values(default,'$nome','$categoria','$qtd','$autor','$editora','$edicao','$ano','$qtd','$desc',default)";
									mysqli_query($con, $sql);
									echo ("<script>alert('Livro cadastrado');</script>");
								}
							}

						if(isset($_GET['id'])) {
							$sql = "select * from livro where idlivro=".$_GET['id'];
							$result = mysqli_query($con, $sql);
							if(mysqli_num_rows($result) > 0) {
								while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
									echo
									("
									<form action='cadastroLivro.php' method='post'>
										<div class='form-group'>
											<label for='nome'>Nome</label>
											<input type='text' class='form-control' id='nome' name='nome' value='".$row['nome']."'>
										</div>
										<div class='form-row'>
											<div class='form-group col-md-9'>
												<label for='categoria'>Categoria</label>
												<input type='text' class='form-control' id='categoria' name='categoria' value='".$row['categoria']."'>
											</div>
											<div class='form-group col-md-3'>
												<label for='qtd'>Quantidade Disponível</label>
												<input type='number' class='form-control' id='qtd' name='qtd' value='".$row['quantidade']."'>
											</div>
										</div>
										<div class='form-group'>
											<label for='autor'>Autor</label>
											<input type='text' class='form-control' id='autor' name='autor' value='".$row['autor']."'>
										</div>
										<div class='form-row'>
											<div class='form-group col-md-6'>
												<label for='editora'>Editora</label>
												<input type='text' class='form-control' id='editora' name='editora' value='".$row['editora']."'>
											</div>
											<div class='form-group col-md-3'>
												<label for='edicao'>Edição</label>
												<input type='number' class='form-control' id='edicao' name='edicao' value='".$row['edicao']."'>
											</div>
											<div class='form-group col-md-3'>
												<label for='ano'>Ano</label>
												<input type='number' class='form-control' id='ano' name='ano' value='".$row['ano']."'>
											</div>
										</div>
										<div class='form-group'>
											<label for='descricao'>Descrição</label>
											<textarea class='form-control' id='descricao' rows='4' name='descricao'>".$row['descricao']."</textarea>
										</div>
										<input type='hidden' name='id' value='".$row['idlivro']."'>
										<input type='hidden' name='edit'>
										<div class='col text-center'>
											<a class='btn btn-warning' data-toggle='modal' data-target='#modal-edita".$row['idlivro']."'><b>Editar</b></a>
										</div>
										<div class='modal fade' id='modal-edita".$row['idlivro']."' tabindex='-1' role='dialog' aria-labelledby='cria-modal' aria-hidden='true'>
											<div class='modal-dialog' role='document'>
												<div class='modal-content'>
												<div class='modal-header bg-warning text-dark'>
													<h5 class='modal-title' id='cria-modal'>Editar Livro</h5>
													<button type='button' class='close' data-dismiss='modal' aria-label='Close'>
														<span aria-hidden='true'>&times;</span>
													</button>
												</div>
												<div class='modal-body text-center'>
													<p>Deseja editar o livro <b>".$row['nome']."</b>?</p>
												</div>
												<div class='modal-footer'>
													<a href='' class='btn btn-secondary text-light' data-dismiss='modal'><b>Cancelar</b></a>
													<button type='submit' class='btn btn-success text-dark'><b>Editar</b></button>
												</div>
												</div>
											</div>
										</div>
									</form>
									");
								}
							}
						} else {
							echo
							("
							<form action='cadastroLivro.php' method='post'>
								<div class='form-group'>
									<label for='nome'>Nome</label>
									<input type='text' class='form-control' id='nome' name='nome' placeholder='Nome'>
								</div>
								<div class='form-row'>
									<div class='form-group col-md-9'>
										<label for='categoria'>Categoria</label>
										<input type='text' class='form-control' id='categoria' name='categoria' placeholder='Categoria'>
									</div>
									<div class='form-group col-md-3'>
										<label for='qtd'>Quantidade Disponível</label>
										<input type='number' class='form-control' id='qtd' name='qtd' placeholder='Quantidade'>
									</div>
								</div>
								<div class='form-group'>
									<label for='autor'>Autor</label>
									<input type='text' class='form-control' id='autor' name='autor' placeholder='Autor'>
								</div>
								<div class='form-row'>
									<div class='form-group col-md-6'>
										<label for='editora'>Editora</label>
										<input type='text' class='form-control' id='editora' name='editora' placeholder='Editora'>
									</div>
									<div class='form-group col-md-3'>
										<label for='edicao'>Edição</label>
										<input type='number' class='form-control' id='edicao' name='edicao' placeholder='Edição'>
									</div>
									<div class='form-group col-md-3'>
										<label for='ano'>Ano</label>
										<input type='number' class='form-control' id='ano' name='ano' placeholder='Ano'>
									</div>
								</div>
								<div class='form-group'>
									<label for='descricao'>Descrição</label>
									<textarea class='form-control' id='descricao' rows='4' name='descricao'></textarea>
								</div>
								<input type='hidden' name='type' value='2'>
								<div class='col text-center'>
									<a class='btn btn-warning' data-toggle='modal' data-target='#modal-cria'><b>Cadastrar</b></a>
								</div>
								<div class='modal fade' id='modal-cria' tabindex='-1' role='dialog' aria-labelledby='cria-modal' aria-hidden='true'>
									<div class='modal-dialog' role='document'>
										<div class='modal-content'>
										<div class='modal-header bg-warning text-dark'>
											<h5 class='modal-title' id='cria-modal'>Cadastrar Livro</h5>
											<button type='button' class='close' data-dismiss='modal' aria-label='Close'>
												<span aria-hidden='true'>&times;</span>
											</button>
										</div>
										<div class='modal-body text-center'>
											<p>Deseja cadastrar um novo livro?</p>
										</div>
										<div class='modal-footer'>
											<a href='' class='btn btn-secondary text-light' data-dismiss='modal'><b>Cancelar</b></a>
											<button type='submit' class='btn btn-success text-dark'><b>Cadastrar</b></button>
										</div>
										</div>
									</div>
								</div>
							</form>
							");
						}
					?>
					
				</div>
			</div>
			<div class="row" id="main">
				<div class="col text-center">
					<h2>Livros Cadastrados</h2>
				</div>
			</div>
			<div class="row" id="main">
				<table class="table table-hover text-center">
					<thead>
						<tr>
						<th scope="col">Código</th>
						<th scope="col">Nome</th>
						<th scope="col">Categoria</th>
						<th scope="col">Autor</th>
						<th scope="col">Quantidade</th>
						<th scope="col">Editar</th>
						<th scope="col">Excluir</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$sql = "select * from livro";
							$result = mysqli_query($con, $sql);
							if(mysqli_num_rows($result) > 0) {
								while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
									if($row['status'] == 1) {
										echo ("
										<tr>
											<th scope='row'>".$row['idlivro']."</th>
											<th scope='row'>".$row['nome']."</th>
											<th scope='row'>".$row['categoria']."</th>
											<th scope='row'>".$row['autor']."</th>
											<th scope='row'>".$row['quantidade']."</th>
											<th scope='row'><a class='btn btn-warning' href='cadastroLivro.php?id=".$row['idlivro']."'><b>Editar</b></a></th>
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