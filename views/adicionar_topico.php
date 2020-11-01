
<html>
	<head>
		<title></title>
		<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/css/bootstrap.css" />
		
		<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/script.js"></script>
	</head>
	<body>
        <h3>Adicionar Tópico</h3>

        <div><h4><?php echo $etapa['nome']; ?></h4></div>

        <form method="POST" action="<?php echo BASE_URL; ?>topico/salvarTopicoAdicionado">

            <input type="hidden" name="id_etapa" value="<?php echo $etapa['id']; ?>"/>

            Nome:<br/>
            <input type="text" name="nome" /><br/><br/>

            Descrição:<br/>
            <input type="text" name="descricao" /><br/><br/>

            <input type="submit" value="Adicionar" />

        </form>
        <script type="text/javascrpit" src="<?php echo BASE_URL; ?>assets/js/bootstrap.min.js"></script>
		<script type="text/javascrpit" src="<?php echo BASE_URL; ?>assets/js/bootstrap.bundle.js"></script>
	</body>
</html>