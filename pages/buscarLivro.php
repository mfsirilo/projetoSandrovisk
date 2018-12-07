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
				<a href="buscarLivro.php" class="activeSN">Buscar Livros</a>
				<a href="emprestimos.php">Emprestimos</a>
				<a href="pagamento.php">Pagamento</a>
				<a href="devolucao.php">Devolução</a>
			</div>
			<div class="row" id="main">
				<div class="row" style="width: 100% !important;">
					<form action="buscarLivro.php" method="post" class='row' style="width: 100% !important;">
						<div class="col-lg-1 col-sm-12 col-md-4">
							<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
								<a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Nome</a>
								<a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Autor</a>
								<a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Edição</a>
								<a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Ano</a>
							</div>
						</div>
						<div class="col-lg-10 col-sm-12 col-md-8">
							<div class="tab-content" id="v-pills-tabContent">
								<div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
									<div class="row">
										<div class="col-10">
											<input type="text" class="form-control" id="exampleInputEmail1" placeholder="Digite o nome do Livro" name="livro">
											<input type="hidden" name="type" value="1">
										</div>
										<div class="col-2">
											<!-- <a href=""  class="btn btn-warning"></a> -->
											<button type="submit" class="btn btn-warning"><b>Buscar</b></button>
										</div>
									</div>
								</div>
								<div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
									<div class="row">
										<div class="col-10">
											<input type="text" class="form-control" id="exampleInputEmail1" placeholder="Digite o nome do Autor" name="autor">
											<input type="hidden" name="type" value="2">
										</div>
										<div class="col-2">
											<button type="submit" class="btn btn-warning"><b>Buscar</b></button>
										</div>
									</div>
								</div>
								<div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
									<div class="row">
										<div class="col-10">
											<input type="text" class="form-control" id="exampleInputEmail1" placeholder="Digite a edição do Livro" name="edicao">
											<input type="hidden" name="type" value="3">
										</div>
										<div class="col-2">
											<button type="submit" class="btn btn-warning"><b>Buscar</b></button>
										</div>
									</div>
								</div>
								<div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
									<div class="row">
										<div class="col-10">
											<input type="text" class="form-control" id="exampleInputEmail1" placeholder="Digite o ano do Livro" name="ano">
											<input type="hidden" name="type" value="4">
										</div>
										<div class="col-2">
											<button type="submit" class="btn btn-warning"><b>Buscar</b></button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</form>
				</div>

				<div class="row" style="width: 100% !important;">
					<table class="table table-hover text-center">
						<thead>
							<tr>
								<th scope="col">Código</th>
								<th scope="col">Nome</th>
								<th scope="col">Categoria</th>
								<th scope="col">Autor</th>
								<th scope="col">Quantidade</th>
								<th scope="col">Ano</th>
								<th scope="col">Edição</th>
								<th scope="col">Informações</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$sql = "select * from livro";
								if(isset($_POST['type'])) {
									if($_POST['type'] == 1) {
										$sql = "select * from livro where nome like "+$_POST['livro'];
									} else if ($_POST['type'] == 2) {
										$sql = "select * from livro where autor like "+$_POST['livro'];
									} else if ($_POST['type'] == 3) {
										$sql = "select * from livro where edicao ="+$_POST['edicao'];
									} else if ($_POST['type'] == 4) {
										$sql = "select * from livro where ano ="+$_POST['ano'];
									} else {
										$sql = "select * from livro";
									}
								}
								// if(isset($_POST['livro'])) {
								// 	$sql = "select * from livro where nome like "+$_POST['livro'];
								// } else if(isset($_POST['autor'])) {
								// 	$sql = "select * from livro where autor like "+$_POST['livro'];
								// } else if(isset($_POST['edicao'])) {
								// 	$sql = "select * from livro where edicao ="+$_POST['edicao'];
								// } else if(isset($_POST['ano'])) {
								// 	$sql = "select * from livro where ano ="+$_POST['edicao'];
								// } else {
								// 	$sql = "select * from livro";
								// }
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
												<th scope='row'>".$row['ano']."</th>
												<th scope='row'>".$row['edicao']."</th>
												<th scope='row'><a class='btn btn-warning' href='buscaLivro.php?id=".$row['idlivro']."'><b>Informações</b></a></th>
											</tr>
											");
										}
									}
								}
							?>
						</tbody>
					</table>
				</div>
			</div>
		</main>

		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	</body>
</html>