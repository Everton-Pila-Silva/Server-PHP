<?php

namespace App\Controllers;

use SI\Controller\Action;
use SI\Di\Container;

class Index extends Action
{
	private $task;

	public function __construct()
	{

		$this->task = Container::getModel("task");
	}

	public function index()
	{
		//$this->view->taskList = $this->task->fetchALL();
		$this->taskList = $this->task->fetchALL();
		$this->render('index');

	}

	public function add()
	{
		$result = $this->task->add($_POST);
		var_dump($result); exit;

	}
	public function edit()
	{
		$idVindoDoLinkEditar = 3;
		$taskForEdit = $this->task->find($idVindoDoLinkEditar);
		$this->render('edit');
	}
	public function update()
	{

		//$taskUpdated = $this->task->update($data, 3);
	}

	public function delete()
	{
		$idVindoDoLinkDeletar = 5;
		$taskDeleted = $this->task->delete($idVindoDoLinkDeletar);


	}
}