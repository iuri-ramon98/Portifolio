<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/css/bootstrap.css" />
		
		<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/script.js"></script>
       <script type="text/javascrpit" src="<?php echo BASE_URL; ?>assets/js/bootstrap.min.js"></script>
		<script type="text/javascrpit" src="<?php echo BASE_URL; ?>assets/js/bootstrap.bundle.js"></script>
		
	</head>
	<body>
    <h4>Descrição do topico</h4>
    <div><textarea name="descricao" cols="30" rows="5" readonly> <?php echo $topico['descricao']; ?></textarea></div>


    

<div class="arquivos">
	<h3>Arquivos</h3>
	<button><a href="<?php echo BASE_URL; ?>arquivo/adicionarArquivo/<?php echo $topico['id']; ?>">Adicionar Novo Arquivo</a></button><br/>
	<hr/><br/>
	<?php foreach($arquivos as $item): //para cada registro retornado do banco?>
		<?php 
		switch ($item['tipo']) {
			case 'pdf':
				$imagem = 'pdf.png';
				break;
			case 'docx':
				$imagem = 'docx.jpg';
				break;
			case 'png':
				$imagem = 'imagem.png';
				break;
			case 'PNG':
				$imagem = 'imagem.png';
				break;	
			case 'jpg':
				$imagem = 'imagem.png';
				break;
			case 'txt':
				$imagem = 'txt.png';
				break;			
			default:
				$imagem = 'file.png';
				break;
		}?>
		<div class="menu">
			<div class="div_arquivo">
				<h4><?php echo $item['nome_mostrado']; ?></h4><br/>
				<a href="<?php echo BASE_URL; ?>assets/arquivos/<?php echo $item['nome_pasta']; ?>" target="_blank"><img id="imagemArquivo" src="<?php echo BASE_URL; ?>assets/images/<?php echo $imagem?>" width="75" height="75"></a><br/><br/>
				<textarea name="descricaoArquivo" cols="30" rows="5" readonly><?php echo $item['descricao']; ?></textarea><br/>
				<button><a href="<?php echo BASE_URL; ?>arquivo/download/<?php echo $item['nome_pasta']; ?>">Baixar</a></button>
				<button ><a href="<?php echo BASE_URL; ?>arquivo/editarArquivo/<?php echo $item['id']; ?>">Editar</a></button>
	            <button ><a href="<?php echo BASE_URL; ?>arquivo/excluirArquivo/<?php echo $item['id']; ?>" onclick="return confirm('Deseja mesmo excluir este arquivo?');">Excluir</a></button>
				<hr/>	
		</div>
        </div>
	<?php endforeach; ?>
</div>

	</body>
</html>