<?php

namespace App\Controller;

class Controller {

	/**
	 * @return mixed
	 * 
	 */
	public function view($view, $data = [])
	{
		
		$header = "../views/templates/header.view.php";
		$footer = "../views/templates/footer.view.php";
		$file = "../views/{$view}.view.php";
		if(file_exists($file)){
			require_once $header;
			require_once $file;
			require_once $footer;
		} else {
			throw new Exception("Error view not found", 1);
		}
	}

	/**
	 * @return  mixed
	 * 
	 */
	public function model($model)
	{
		$model = "App\\Models\\".$model;
		if(class_exists($model)) {
			return new $model;
		} else {
			dd($model . " not found!");
		}
	}


}