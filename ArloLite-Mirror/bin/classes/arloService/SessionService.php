<?php
	include_once("{$__ROOT_FROM_PAGE__}/classes/SR.php");
	include_once("{$__ROOT_FROM_PAGE__}/classes/arloService/ConfigurationService.php");
	
	ini_set('max_execution_time', 300);
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
	class SessionService {
		private static $instance = NULL;
		private $configuration = NULL;
		public $version = NULL;
		private $user = NULL;
		private $token = NULL;
		
		private function __construct() {
			$this->configuration = ConfigurationService::getInstance();
            $this->version = $this->configuration->getProperty("version");
		}
		
		public function signout() {
			$this->user = NULL;
			setcookie(SR::$tokenCookieName, "");
		}
		
		public static function getInstance() {
			if (SessionService::$instance == NULL) {
				SessionService::$instance = new SessionService();
			}
			return SessionService::$instance;
		}
		
		public function heartbeat() {
			
		}

		public function getSessionId($sessionToken) {
			$result = -1;
			return $result;
		}
	
		public function pingUser($user) {
		}

		public function pingUser2($token) {
		}

		public function isStale($token) {
			return false;
		}
		
		public function getUser() { return $this->user; }
        public function setUser($a) { $this->user = $a; }
		public function getToken() { return $this->token; }
		public function setToken($a) { $this->token = $a; }
	}
?>
