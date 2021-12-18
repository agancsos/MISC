<?php
    ini_set('max_execution_time', 300);
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    include_once("{$__ROOT_FROM_PAGE__}/classes/SR.php");
    include_once("{$__ROOT_FROM_PAGE__}/classes/arloCommon/arlocommon_all.php");
    include_once("{$__ROOT_FROM_PAGE__}/classes/arloGUI/BaseActionViewModel.php");

    class TreeViewModel extends BaseActionViewModel {
        public function load() {
			print("<ul class='object-tree'>");
			$this->loadTree((isset($_GET['path']) ? SR::$baseRecordingDir . "/". $_GET['path'] : NULL));
			print("</ul>");
        }

		private function loadTree($node=NULL, $indent=0) {
			if ($node == NULL) {
				$node = SR::$baseRecordingDir;
				print("<li id='root'>Arlo");
				$children = scandir($node);
				print("<ul>");
				foreach ($children as $child) {
					if ($child[0] == ".") { continue; }
					$this->loadTree("{$node}/$child", $indent+5);
				}
				print("</ul>");
				print("</li>");
			}
			else {
				print("<li style='margin-left:" . $indent . ";' id='" . $node . "'");
				if (sizeof(explode(".", basename($node))) > 1 && explode(".", basename($node))[1] == "mp4") {
					print(" onclick=\"window.location ='./?id=" . explode(".", basename($node))[0]);
					if (isset($_GET['path'])) {
						print("&path=" . str_replace(SR::$baseRecordingDir . "/", "", $_GET['path']));
					}
					print("'\"");
				}
				print(">" . (isset($_GET['path']) && $node == SR::$baseRecordingDir . "/" . $_GET['path'] ? "Arlo (" : "") 
					. explode(".", basename($node))[0] . (isset($_GET['path']) && $node == SR::$baseRecordingDir . "/" . $_GET['path'] ? ")" : ""));
				if (is_dir($node)) {
					$children = scandir($node);
					print("<ul>");
					foreach ($children as $child) {
						if ($child[0] == ".") { continue; }
						$this->loadTree("{$node}/{$child}", $indent+5);
					}
					print("</ul");
				}
				print("</li>");
			}
		}

        public function getName() { return "tree"; }
        public function getTitle() { return "tree"; }
    }
?>
