<?php

namespace SI\Di;

class Container
{

	public static function getModel($name)
	{
		$stringClass = "\\App\\Models\\" . ucfirst($name);
		$class = new $stringClass(\App\Init::getDb());

		return $class;
	}
}