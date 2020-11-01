<!doctype html>
<html>
	<head>
		<title>Meu site</title>
		<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/css/bootstrap.css" />
	</head>
	<body>
		<header>
			<h1>Nome do projeto</h1>
			<div class="menu">
				<button class="btn btn-secondary"><a href="<?php echo BASE_URL; ?>home/index">Home</a></button>
				<button class="btn btn-secondary"><a href="<?php echo BASE_URL; ?>etapa/index">Etapas de desenvolvimento</a></button>
				<button class="btn btn-secondary"><a href="<?php echo BASE_URL; ?>home/membros">Sobre os membros</a></button>				
			</div>
		</header>
		<section>
			<?php $this->loadView($viewName, $viewData); ?>
		</section>
		<footer>
			Todos os direitos reservados
		</footer>

		<script type="text/javascrpit" src="<?php echo BASE_URL; ?>assets/js/bootstrap.min.js"></script>
		<script type="text/javascrpit" src="<?php echo BASE_URL; ?>assets/js/bootstrap.bundle.js"></script>
	</body>
</html>