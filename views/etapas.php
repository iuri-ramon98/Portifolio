
<html>
	<head>
		<title></title>
		<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/css/bootstrap.css" />
		
		<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/script.js"></script>
	</head>
	<body>
    <button class=><a href="<?php echo BASE_URL; ?>etapa/adicionarEtapa">ADICIONAR</a></button>

<div class="etapas">
	<h4>Etapas</h4>
	<?php foreach($lista as $item): //para cada registro retornado do banco?>
		<div class="menu">

			<button ><a href="<?php echo BASE_URL; ?>topico/index/<?php echo $item['id']; ?>"><?php echo $item['id']; ?> - <?php echo $item['nome']; ?></a></button>
            <button ><a href="<?php echo BASE_URL; ?>etapa/editarEtapa/<?php echo $item['id']; ?>">EDITAR</a></button>
            <!--<button class="btn btn-secondary"><a href="<?php echo BASE_URL; ?>contatos/del/<?php echo $item['id']; ?>">EXCLUIR</a></button>-->

        </div>
	<?php endforeach; ?>
</div>
        <script type="text/javascrpit" src="<?php echo BASE_URL; ?>assets/js/bootstrap.min.js"></script>
		<script type="text/javascrpit" src="<?php echo BASE_URL; ?>assets/js/bootstrap.bundle.js"></script>
	</body>
</html>
