<?php
    ini_set('max_execution_time', 300);
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    include_once("{$__ROOT_FROM_PAGE__}/classes/SR.php");
    include_once("{$__ROOT_FROM_PAGE__}/classes/arloCommon/arlocommon_all.php");

    class LinksViewModel {
        private $root = NULL;
        private $isEnabled = NULL;
        private $model = NULL;
        private $links = NULL;

        public function __construct($root="/", $enabled=False, $modelName) {
            $this->root = $root;
            $this->isEnabled = $enabled;
            $this->model = $modelName;
            $this->links = [
                new ControllerLink("Home", "Home", "/"),
				new ControllerLink("Search", "Search", "")
            ];
        }

        public function load($search="") {
            if ($this->isEnabled) {
                //SessionService::pingUser2($_SESSION[SR::$tokenCookieName]);
                print("<table id = 'link-buttons'>");
                print("<tr>");
                foreach ($this->links as $cursor) {
                    print("<th");
                    if ($cursor->getLabel() != "Search") {
                        if ($this->model == $cursor->getLabel()) {
                            print(" class = 'selected-page'");
                        }
                        print(" onclick=\"ViewService.gotoPage('" . $cursor->getPath() . "')\">" . $cursor->getLabel() . "");
                        if ($cursor->getName() == "Welcome") {
                            print("<img title = 'Signout' onclick=\"ViewService.gotoPage('/signout')\" src = '/media/icons/signout_black.png' alt=''></img>");
                        }
                    }
                    else {
                        print("><form id='search-form' method='GET'>");
                        print("<input type='text' name='path' value='" . $search . "' placeholder='/2019/04' />");
                        print("</form>");
                    }
                    print("</th>");
                }
                print("</tr>");
                print("</table>");
            }
        }
    }
?>
