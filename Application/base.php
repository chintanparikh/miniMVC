<?php 
/**
* 
*/
class Application
{
	public $model = array();
	
	function __construct()
	{
		$controllerPath = BASE_PATH . '/Controllers';
		define("CONTROLLER_PATH", $controllerPath);
		$modelPath = BASE_PATH . '/Models';
		define("MODEL_PATH", $modelPath);
		$viewPath = BASE_PATH . '/Views';
		define("VIEW_PATH", $viewPath);
		$classPath = BASE_PATH . '/Classes';
		define("CLASS_PATH", $classPath);
	}

	function loadController($fileName)
	{
		require_once( CLASS_PATH . '/' . $fileName . '.php'); 
		$controller = new $fileName;
		return $this;
	}

	function loadModel($fileName)
	{
		require_once( MODEL_PATH . '/' . $fileName . '.php'); 
		$this->model[$fileName] = new $fileName;
		return $this;
		
	}

	function loadView($fileName, $data = nul)
	{
		if(is_array($data)){
			extract($data);
		}
		ob_start();
		require_once('Application/Views/' . $fileName . '.php'); 
		ob_end_flush();
		return $this;
	}

	function loadClass($fileName)
	{
		require_once( CLASS_PATH . '/' . $fileName . '.class.php');
		return $this;
	}

}


?>