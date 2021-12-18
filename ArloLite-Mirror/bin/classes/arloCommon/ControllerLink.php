<?php
	ini_set('max_execution_time', 300);
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
	class ControllerLink {
		private $name;
		private $label;
		private $path;

		public function __construct($name="", $label="", $path="") {
			$this->name = $name;
			$this->label = $label;
			$this->path = $path;
		}

		public function getName() { return $this->name; }
		public function getLabel() { return $this->label; }
		public function getPath() { return $this->path; }
	}
?>
