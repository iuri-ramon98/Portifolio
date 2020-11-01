
<html>
	<head>
		<title></title>
		<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/css/bootstrap.css" />
		
		<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/script.js"></script>
	</head>
	<body>
        <h3>Editar Tópico</h3>

        <form method="POST" >

            Nome:<br/>
            <input type="text" name="nome" value="<?php echo $info['nome']; ?>" /><br/><br/>

            Descrição:<br/>
            <input type="text" name="descricao" value="<?php echo $info['descricao']; ?>"/><br/><br/>

            <input type="submit" value="Editar" />

        </form>
        <script type="text/javascrpit" src="<?php echo BASE_URL; ?>assets/js/bootstrap.min.js"></script>
		<script type="text/javascrpit" src="<?php echo BASE_URL; ?>assets/js/bootstrap.bundle.js"></script>
	</body>
</html>
