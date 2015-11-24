<?php

	class Instruction

	{
		protected $instruction = "";
		protected $done = FALSE;

		function __construct($instruction)
		{
			$this->instruction = $instruction;
		}

		function makeDone()
		{
			$this->done = TRUE;
		}

		function makeUndDone(){
			$this->done = TRUE;
		}

		function getInstruction(){
			return $this->instruction;
		}


	}


?>