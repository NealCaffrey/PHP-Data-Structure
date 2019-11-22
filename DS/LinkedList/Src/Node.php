<?php

namespace DS\LinkedList\Src;

class Node
{
	
	public $data = NULL;
	public $next = NULL;
	public $prev = NULL;

	public function __construct($data = NULL)
	{
		$this->data = $data;
	}
	
}