<?php
    include_once("{$__ROOT_FROM_PAGE__}/classes/SR.php");
    ini_set('max_execution_time', 300);
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    class ConfigurationService {
        private static $instance = NULL;
        private $configFilePath = NULL;
        private $jsonObject = NULL;
        public $__DISABLE_ACCESS_CHECK__ = NULL;
        public $__DEBUG__ = "";
        public $__SILENT_MODE__ = "0";
        private function __construct() {
            $this->reload();
        }
        public function reload() {
            global $__ROOT_FROM_PAGE__;
            $this->configFilePath = SR::$configFilePath;
            $tempFile = fopen($__ROOT_FROM_PAGE__. $this->configFilePath, 'r');
            $fileContents = fread($tempFile, filesize($__ROOT_FROM_PAGE__. $this->configFilePath));
            fclose($tempFile);
            $this->jsonObject = json_decode($fileContents);
            $this->__DISABLE_ACCESS_CHECK__ = $this->setValue("DisableAccessCheck", NULL);
            $this->__DEBUG__ = $this->setValue("DEBUG", "");
            $this->__SILENT_MODE__ == $this->setValue("SILENT_MODE", "0");
        }
        private function setValue($map, $default) {
            if (!property_exists($this->jsonObject, $map)) {
                return $default;
            }
            if ($this->jsonObject->{$map} == "") {
                return $default;
            }
            return $this->jsonObject->{$map};
        }
        public static function getInstance() {
            if(ConfigurationService::$instance == NULL) {
                ConfigurationService::$instance = new ConfigurationService();
            }
            return ConfigurationService::$instance;
        }
        public function getProperty($name) {
            $this->reload();
			@$result = $this->jsonObject->{$name};
            return $result;
        }
    }
?>
