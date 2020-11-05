<!doctype html>
<html>
	<head>
		<title>Meu site</title>
		<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/css/bootstrap.css" />
	</head>
	<body>
<header>
  <!-- Fixed navbar -->
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <a class="navbar-brand" href="<?php echo BASE_URL; ?>home/index">Nome do projeto</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item ">
          <a class="nav-link" href="<?php echo BASE_URL; ?>home/index">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item ">
          <a class="nav-link" href="<?php echo BASE_URL; ?>etapa/index">Etapas de desenvolvimento</a>
        </li>
        <li class="nav-item ">
          <a class="nav-link" href="<?php echo BASE_URL; ?>home/membros" >Sobre os membros</a>
        </li>
      </ul>
    </div>
  </nav>
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