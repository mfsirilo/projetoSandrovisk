<?php session_start(); ?>

<header>
	<nav class="navbar navbar-dark bg-dark navbar-expand-lg ">
		<a class="navbar-brand text-warning" href="#" style="margin-left:5%;">Sistema Bibliotecário</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarText">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item active">
					<a class="nav-link" href="#">Início<span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item active">
					<a class="nav-link" href="#">Sobre</a>
				</li>
			</ul>
			<span class="navbar-text" style="margin-right:5%;">
				<?php
					if(isset($_SESSION['nome'])) {
						echo "<a class='nav-link text-warning' href='#'><b>Olá</b>".$_SESSION['nome']."</a>";
					} else {
						echo "<a class='nav-link text-warning' href='../login.php'>Login</a>";
					}
				?>
			</span>
		</div>
	</nav>
</header>