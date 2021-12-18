<?php
	class User {
		private $rawObject = null;

		public function __construct($raw=null) {
			$this->rawObject = $raw;
		}
	
		public function getFullName() {
			if ($this->rawObject == null) {
				return "";
			}
			return $this->rawObject->{"firstName"} . " " . $this->rawObject->{"lastName"};
		}
	}
?>
