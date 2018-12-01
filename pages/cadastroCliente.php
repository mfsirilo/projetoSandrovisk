<?php
	include("./fixed/conexao.php");
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
				<a href="cadastroLivro.php">Cadastrar Livro</a>
				<a href="cadastroCliente.php" class="activeSN">Cadastrar Cliente</a>
				<a href="buscarLivro.php">Buscar Livros</a>
				<a href="emprestimos.php">Emprestimos</a>
				<a href="pagamento.php">Pagamento</a>
				<a href="devolucao.php">Devolução</a>
			</div>
			<div class="row" id="main">
				<div class="col text-center">
					<h2>Cadastro de Cliente</h2>
				</div>
			</div>
			<div class="row" id="main">
				<div class="col">
					<?php
						if(isset($_POST['nome'])) {
							if(isset($_POST['edit'])) {
								$id = $_POST['id'];
								$nome = $_POST['nome'];
								$email = $_POST['email'];
								$endereco = $_POST['endereco'];
								$senha = $_POST['senha'];
								$telefone = $_POST['telefone'];
					
								$sql = "update usuario set nome='$nome', email='$email', senha='$senha', endereco='$endereco', telefone='$telefone' where idusuario=$id";
								mysqli_query($con, $sql);
								echo ("<script>alert('Usuário alterado');</script>");
							} else {
								$nome = $_POST['nome'];
								$email = $_POST['email'];
								$endereco = $_POST['endereco'];
								$senha = $_POST['senha'];
								$telefone = $_POST['telefone'];
					
								$sql = "insert into usuario values(default,'$nome','$email','$senha','NMR','$endereco','$telefone','1')";
								mysqli_query($con, $sql);
								echo ("<script>alert('Usuário cadastrado');</script>");
							}
						}
				
						if(isset($_GET['id'])) {
							$sql = "select * from usuario where idusuario=".$_GET['id'];
							$result = mysqli_query($con, $sql);
							if(mysqli_num_rows($result) > 0) {
								while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
									echo 
									("
									<form action='cadastroCliente.php' method='post'>
										<input type='hidden' name='id' value=".$row['idusuario'].">
										<input type='hidden' name='edit' value='true'>
										<div class='form-group'>
											<label for='nome'>Nome</label>
											<input type='text' class='form-control' id='nome' name='nome' value='".$row['nome']."'>
										</div>
										<div class='form-group'>
											<label for='email'>E-mail</label>
											<input type='email' class='form-control' id='email' name='email' value='".$row['email']."'>
										</div>
										<div class='form-group'>
											<label for='endereco'>Endereço</label>
											<input type='text' class='form-control' id='endereco' name='endereco' value='".$row['endereco']."'>
										</div>
										<div class='form-row'>
											<div class='form-group col-md-9'>
												<label for='senha'>Senha</label>
												<input type='password' class='form-control' id='senha' name='senha' value='".$row['senha']."'>
											</div>
											<div class='form-group col-md-3'>
												<label for='telefone'>Telefone</label>
												<input type='text' class='form-control' id='telefone' name='telefone' value='".$row['telefone']."'>
											</div>
										</div>
										<div class='col text-center'>
											<a class='btn btn-warning' data-toggle='modal' data-target='#modal-edita".$row['idusuario']."'><b>Editar</b></a>
										</div>
										<div class='modal fade' id='modal-edita".$row['idusuario']."' tabindex='-1' role='dialog' aria-labelledby='cria-modal' aria-hidden='true'>
											<div class='modal-dialog' role='document'>
												<div class='modal-content'>
													<div class='modal-header bg-warning text-center'>
														<h5 class='modal-title text-dark' id='cria-modal'>Cadastrar Cliente</h5>
														<button type='button' class='close' data-dismiss='modal' aria-label='Close'>
															<span aria-hidden='true'>&times;</span>
														</button>
													</div>
													<div class='modal-body text-center'>
														<p>Deseja editar o cliente <b>".$row['nome']."</b>?</p>
													</div>
													<div class='modal-footer'>
														<a href='' class='btn btn-secondary text-light' data-dismiss='modal'><b>Cancelar</b></a>
														<button type='submit' class='btn btn-success text-dark'><b>Alterar</b></button>
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
							<form action='cadastroCliente.php' method='post'>
								<div class='form-group'>
									<label for='nome'>Nome</label>
									<input type='text' class='form-control' id='nome' name='nome' placeholder='Nome'>
								</div>
								<div class='form-group'>
									<label for='email'>E-mail</label>
									<input type='email' class='form-control' id='email' name='email' placeholder='E-mail'>
								</div>
								<div class='form-group'>
									<label for='endereco'>Endereço</label>
									<input type='text' class='form-control' id='endereco' name='endereco' placeholder='Endereço'>
								</div>
								<div class='form-row'>
									<div class='form-group col-md-9'>
										<label for='senha'>Senha</label>
										<input type='password' class='form-control' id='senha' name='senha' placeholder='Senha'>
									</div>
									<div class='form-group col-md-3'>
										<label for='telefone'>Telefone</label>
										<input type='text' class='form-control' id='telefone' name='telefone' placeholder='Telefone'>
									</div>
								</div>
								<div class='col text-center'>
									<a class='btn btn-warning text-dark' data-toggle='modal' data-target='#modal-cria'><b>Cadastrar</b></a>
								</div>
								<div class='modal fade' id='modal-cria' tabindex='-1' role='dialog' aria-labelledby='cria-modal' aria-hidden='true'>
									<div class='modal-dialog' role='document'>
										<div class='modal-content'>
											<div class='modal-header bg-warning text-center'>
												<h5 class='modal-title text-dark' id='cria-modal'>Cadastrar Cliente</h5>
												<button type='button' class='close' data-dismiss='modal' aria-label='Close'>
													<span aria-hidden='true'>&times;</span>
												</button>
											</div>
											<div class='modal-body text-center'>
												<p>Deseja cadastrar um novo cliente?</p>
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
					<h2>Clientes Cadastrados</h2>
				</div>
			</div>
			<div class="row" id="main">
				<table class="table table-hover text-center">
					<thead>
						<tr>
						<th scope="col">Código</th>
						<th scope="col">Nome</th>
						<th scope="col">E-mail</th>
						<th scope="col">Status</th>
						<th scope="col">Editar</th>
						<th scope="col">Excluir</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$sql = "select * from usuario";
							$result = mysqli_query($con, $sql);
							if(mysqli_num_rows($result) > 0) {
								while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
									if($row['status'] == 1) {
										echo ("
										<tr>
											<th scope='row'>".$row['idusuario']."</th>
											<th scope='row'>".$row['nome']."</th>
											<th scope='row'>".$row['email']."</th>
											<th scope='row'>0</th>
											<th scope='row'><a class='btn btn-warning' href='cadastroCliente.php?id=".$row['idusuario']."'><b>Editar</b></a></th>
											<th scope='row'><a class='btn btn-danger' href='removerCliente.php?id=".$row['idusuario']."'><b>Excluir</b></a></th>
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
		
		<?php #include_once("./fixed/footer.php"); ?>
	</body>
</html>