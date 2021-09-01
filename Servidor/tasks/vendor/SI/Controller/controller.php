<?php

namespace SI\Controller;

class Action
{
	protected $action;

	public function render($action, $Layout=true)
	{
		$this->action = $action;

		if($layout == true && file_exists ("../App/views/layout.phtml")) {
		include_once("../App/views/layout.phtml");

		}else{

			$this->content();
		}
	}

	public function content()
	{
		$actual = get_class($this);

		$singleClassName = strtolower(str_replace("App\\Controllers\\", "", $actual));

		include_once '..App/views/' . $singleClassName . '/' . $this->action . '.phtml';
			}
}