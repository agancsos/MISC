<?php
	error_reporting(E_ALL);
	ini_set('display_errors', 1);
	include_once("{$__ROOT_FROM_PAGE__}/classes/arloService/arloservice_all.php");
	include_once("{$__ROOT_FROM_PAGE__}/classes/arloCommon/arlocommon_all.php");
	include_once("{$__ROOT_FROM_PAGE__}/classes/arloGUI/LinksViewModel.php");
	include_once("{$__ROOT_FROM_PAGE__}/classes/arloGUI/RestHelper.php");
	
	function redirectPage($target) { 
		print("<meta http-equiv=\"refresh\" content=\"0; url={$target}\" />"); 
	}

	abstract class BaseViewModel {
		protected $__ROOT__ = __DIR__;
		protected $sessionService = NULL;
		protected $service = NULL;
		protected $isLinksEnabled = True;
		protected $linksViewModel = NULL;
		protected $configService = NULL;
		protected $search = "";
		protected $encoder = NULL;
		
		public function __construct($root = "./") {
			$this->__ROOT__ = $root;
			$this->sessionService = SessionService::getInstance();
			$this->configService = ConfigurationService::getInstance();	
			if (isset($_COOKIE[SR::$tokenCookieName])) {
				@$this->sessionService->setUser(new User(RestHelper::getInstance()->getUser2($_COOKIE[SR::$tokenCookieName])));
				@$this->sessionService->setToken($_COOKIE[SR::$tokenCookieName]);
			}
			$this->sessionService->heartbeat();
			if(isset($_GET['path'])) {
				$this->search = $_GET['path'];
			}
		}


		private function redirectPage($target) {
        	print("<meta http-equiv=\"refresh\" content=\"0; url={$target}\" />");
    	}

		protected function ensure() {
			if(@$this->configService->__DISABLE_ACCESS_CHECK__ == "1") {
				return;
			}
			if($this->getIsEnabled() == False) {
				$this->redirectPage("/");
			}
			if($this->getIsSecure() == True) {
				if($this->sessionService->getToken() == NULL || $this->sessionService->getToken() == "") {
					$this->redirectPage("/signout.php");
				}
				else {
					$this->sessionService->setUser(new User(RestHelper::getInstance()->getUser2($this->sessionService->getToken())));
				}
			}
		}

		public static function alert($msg) {
			print("<script>alert('" . $msg . "');</script>");
		}

		protected function printHeader() { 
			$this->ensure();
			print("<html>");
			print("<head>");
			print("<title>" . SR::$applicationName . "</title>");
			print("<meta name = 'keywords' contents = ''/>");
			print("<meta name = 'author' contents = '" . SR::$copyrightText . "'/>");
			print("<link href='/main.css' rel='stylesheet' type='text/css'/>");
			print("<link rel=\"icon\" type=\"image/png\" href=\"/favicon.png\">");
			print("<script type=\"text/javascript\" src=\"/functions-all.js\"></script>");
			print("</head>");
			print("<body>");
			print("<div id = 'banner'>");
			print("<div id = 'banner-inner'>");
			print("<a href = '/'>");
			print("<div id = 'logo' class = 'h1'>" . SR::$applicationLabel);
			print("</div></a>");
			print("</div>");
			print("</div>");
			print("<div id = 'links'>");
			print("<div id = 'links-inner'>");
			if($this->isLinksEnabled) {
				$this->linksViewModel = new LinksViewModel($this->__ROOT__, $this->isLinksEnabled, $this->getName());
				$this->linksViewModel->load($this->search);
			}
			print("</div>");
			print("</div>");
			print("<div id = 'main'>");
			print("<div id = 'main-inner'>");
		}
		
		public function printFooter() { 
			print("</div>");
        	print("</div>");
        	print("<div id = 'footer'>");
        	print("<div id = 'footer-inner'>");
        	print("&copy; " . date("Y") ." " . SR::$copyrightText . "<br/>All Rights Reserved");
			print("<br />Version " . ConfigurationService::getInstance()->getProperty("version"));
        	print("</div>");
        	print("</div>");
        	print("</body>");
        	print("</html>");
		}
	
		public abstract function getName(); 
		public abstract function getTitle();
		public abstract function getIsSecure();
		public abstract function getIsEnabled();
		public abstract function load();
		public function getSearch() { return $this->search; }
	}
?>
