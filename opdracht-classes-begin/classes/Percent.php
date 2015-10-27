<?php

	class Percent{
		
		public $relative;
		public $absolute;
		public $hunderd;
		public $nominal;

		public function __construct( $new, $unit )
		{
			$this->absolute = $this->formatNumber($new / $unit);
			$this->relative = $this->formatNumber($this->absolute - 1);
			$this->hunderd = $this->formatNumber($this->relative * 100);

			$this->nominal == "status quo";

			if($this->hunderd > 1)
			{
				$this->nominal = "positive";
			}

			elseif($this->hunderd == 1)
			{
				$this->nominal = "status-quo";
			}
			elseif($this->hunderd < 1)
			{
				$this->nominal = "negative";
			}
		}



		public function formatNumber( $number )
		{
			return number_format($number, 2, '.', ' ');
		}
	}

?>