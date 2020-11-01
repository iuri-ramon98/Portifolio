
<html>
	<head>
		<title></title>
		<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/css/bootstrap.css" />
		
		<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/script.js"></script>
	</head>
	<body>
    <h4>Descrição do topico</h4>
    <div><textarea name="descricao" cols="30" rows="5" readonly> <?php echo $topico['descricao']; ?></textarea></div>


    <button class="btn btn-secondary"><a href="<?php echo BASE_URL; ?>arquivo/adicionarArquivo/<?php echo $topico['id']; ?>">ADICIONAR</a></button>

<div class="arquivos">
	<h4>Tópicos</h4>
	<?php foreach($arquivos as $item): //para cada registro retornado do banco?>
		<div class="menu">

			<button class="btn btn-warning"><a href="<?php echo BASE_URL; ?>arquivo/index/<?php echo $item['id']; ?>"><?php echo $item['id']; ?> - <?php echo $item['nome_mostrado']; ?></a></button>
            <button class="btn btn-secondary"><a href="<?php echo BASE_URL; ?>arquivo/editarArquivo/<?php echo $item['id']; ?>">EDITAR</a></button>
            <button class="btn btn-secondary"><a href="<?php echo BASE_URL; ?>arquivo/excluirArquivo/<?php echo $item['id']; ?>">EXCLUIR</a></button>

        </div>
	<?php endforeach; ?>
</div>
        <script type="text/javascrpit" src="<?php echo BASE_URL; ?>assets/js/bootstrap.min.js"></script>
		<script type="text/javascrpit" src="<?php echo BASE_URL; ?>assets/js/bootstrap.bundle.js"></script>
	</body>
</html>