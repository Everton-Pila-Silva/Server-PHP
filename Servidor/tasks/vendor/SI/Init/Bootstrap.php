<?php

namespace SI\Init;

abstract class Bootstrap
{
	private $routes;

	public function __construct()
	{
		$this->initRoutes();
		$this->run($this->getUrl());
	}
	abstract protected function  initRoutes();

	public function setRoutes(Array $routes)
	{
	$this->routes = $routes;
	}

	protected function run($url)
	{
	//url que o usuario digitou = minhas rotas
	array_walk($this->routes, function($route) use ($url) {
		if($url == $route['route']){
		$class = "App\\Controllers\\" . ucfirst($route['controller']);
			$controller = new $class;
			$action = $route['action'];
			$controller->$action();
			}
		});
	}

	protected function getUrl()
	{
	// recuperar a url que o usuário digitou
	return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
	}

}