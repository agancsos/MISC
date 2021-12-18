<?php
    ini_set('max_execution_time', 300);
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    include_once("{$__ROOT_FROM_PAGE__}/classes/SR.php");
    include_once("{$__ROOT_FROM_PAGE__}/classes/arloCommon/arlocommon_all.php");
    include_once("{$__ROOT_FROM_PAGE__}/classes/arloGUI/BaseViewModel.php");
	include_once("{$__ROOT_FROM_PAGE__}/classes/arloGUI/ArloViewModel.php");

    class HomeViewModel extends BaseViewModel {
        public function load() {
            /*if (! isset($_COOKIE[SR::$tokenCookieName])) {
                $this->isLinksEnabled = False;
                $this->printHeader();
                print("<div id='login-wrapper'>");
                print("<form id='login-form' method='POST' action='setter.php'>");
                print("<label for='login-username'>Username</label><input type='text' id='login-username' name='login-username' placeholder='jdoe' />");
                print("<label for='login-password'>Password</label><input type='password' id='login-password' name='login-password' placeholder='***********' />");
                print("<input type='submit' name='login-submit' value='" . SR::$loginButtonLabel . "'/>");
                print("</form>");
                print("</div>");
            }
            else {*/
                //$this->isLinksEnabled = True;
				$this->printHeader();
				$arloView = new ArloViewModel($this);
				$arloView->load();
            //}
            $this->printFooter();
        }

        public function getName() { return "Home"; }
        public function getTitle() { return "Home"; }
        public function getIsSecure() { return False; }
        public function getIsEnabled() { return True; }
    }
?>
