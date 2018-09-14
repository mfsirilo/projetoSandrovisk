<?php session_start(); ?>

<header>
	<nav class="navbar navbar-dark bg-dark navbar-expand-lg">
		<a class="navbar-brand" href="#">Sistema Bibliotecário</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarText">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item active">
					<a class="nav-link" href="#">Início<span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Sobre</a>
				</li>
			</ul>
			<span class="navbar-text">
				<?php
					if(isset($_SESSION['nome'])) {
						echo "<a class='nav-link' href='#'><b>Olá</b>".$_SESSION['nome']."</a>";
					} else {
						echo "<a class='nav-link' href='../login.php'>Login</a>";
					}
				?>
			</span>
		</div>
	</nav>
</header>