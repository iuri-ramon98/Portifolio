<?php
class Core {

	public function run() {

		$url = '/'; //cria uma variavel url colocando seu valor como raiz
		if(isset($_GET['url'])) { //caso tenha sido recebida alguma url via get
			$url .= $_GET['url']; //passa esta url para url
		}

		$params = array(); //cria um array para armazenar os parametros enviados via url

		if(!empty($url) && $url != '/') { // caso a url não esteja vazia
			$url = explode('/', $url);  //divide a string em um array, pelas barras
			array_shift($url); //neste processo o 1° registro do array possui um valor nulo, 
							   //portanto ele é retirado

			$currentController = $url[0].'Controller';//o 1° registro do array é passado para variavel controller
			array_shift($url);//este registro é retirado do array

			if(isset($url[0]) && !empty($url[0])) {//caso ainda existam registros no array
				$currentAction = $url[0];//coloca o 1° registro do array para a variavel action
				array_shift($url);//este registro é retirado do array
			} else {//caso a url já estiver vazia 
				$currentAction = 'index';// coloca index como a ação padrao
			}

			if(count($url) > 0) {//se ainda tiver algum registro no array
				$params = $url;//passa estes registros para o array parametros
			}

		} else {//caso a url esteja vazia
			$currentController = 'homeController';//coloca home como controller padrão
			$currentAction = 'index';// coloca index como a ação padrao
		}

		//caso o controle e ação selecionados não existam
		if(!file_exists('controllers/'.$currentController.'.php') || !method_exists($currentController, $currentAction)) {
			$currentController = 'notfoundController'; //controler de erro padrão
			$currentAction = 'index'; //index deste controller
		}

		$c = new $currentController(); //passa o controller para uma variavel

		call_user_func_array(array($c, $currentAction), $params); //chama o controller, ação, com os parametros determinados
		
	}

}