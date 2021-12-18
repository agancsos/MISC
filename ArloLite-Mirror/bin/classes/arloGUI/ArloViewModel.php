<?php
    ini_set('max_execution_time', 300);
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    include_once("{$__ROOT_FROM_PAGE__}/classes/SR.php");
    include_once("{$__ROOT_FROM_PAGE__}/classes/arloCommon/arlocommon_all.php");
    include_once("{$__ROOT_FROM_PAGE__}/classes/arloGUI/BaseActionViewModel.php");
	include_once("{$__ROOT_FROM_PAGE__}/classes/arloGUI/TreeViewModel.php");

    class ArloViewModel extends BaseActionViewModel {
        public function load() {
			print("<div class='grid-container2'>");
			print("<div class='grid-left'>");
			print("<div class='tree-div'>");
            $treeViewModel = new TreeViewModel($this);
            $treeViewModel->load();
            print("</div>");
			print("</div>");
			print("<div class='grid-right'>");
			if (isset($_GET['id'])) {
				$mediaPath = $this->getMediaPath($_GET['id'], (isset($_GET['path']) ? str_replace(".", "", SR::$baseRecordingDir) . "/" . $_GET['path'] : NULL));
				$mediaPath = str_replace("\.", "", str_replace("./", "", $mediaPath));
				print("<video class='player' controls='true'> <source src='./player.php?path=" . $mediaPath . "' type='video/mp4'></video>");
			}
			print("</div>");
			print("</div>");
        }

		private function getMediaPath($id, $path=NULL) {
			if ($path == NULL) {
				$path = SR::$baseRecordingDir;
				$this->getMediaPath($id, $path);
			}
			else {
				$children = scandir($path);
				foreach ($children as $child) {
					if (explode(".", $child)[0] == $id) { 
						return "{$path}/{$child}"; 
					}
					if (is_dir("{$path}/{$child}")) { 
						$result = $this->getMediaPath($id, "{$path}/{$child}"); 
						if ($result != "") { return $result; }
					}
					else {
						if (array_search($child, $children) == sizeof($children) - 1) { return ""; }
					}
				}
			}
		}

        public function getName() { return "arlo"; }
        public function getTitle() { return "arlo"; }
		public function getSearch() { return True; }
    }
?>
