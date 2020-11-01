
<html>
	<head>
		<title></title>
		<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/css/bootstrap.css" />
		
		<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/script.js"></script>
	</head>
	<body>
        <h3>Adicionar Arquivo</h3>

        <form method="POST" enctype="multipart/form-data">
            Escolher arquivo:<br/>
            <input type="file" name="arquivo" /><br/><br/>

            Descrição:<br/>
            <input type="text" name="descricao" /><br/><br/>

            <input type="submit" value="Adicionar" />

        </form>
        <script type="text/javascrpit" src="<?php echo BASE_URL; ?>assets/js/bootstrap.min.js"></script>
		<script type="text/javascrpit" src="<?php echo BASE_URL; ?>assets/js/bootstrap.bundle.js"></script>
	</body>
</html>