<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    include_once("{$__ROOT_FROM_PAGE__}/classes/arloService/arloservice_all.php");
    abstract class BaseActionViewModel {
        protected $__ROOT__ = __DIR__;
        protected $parent = NULL;
        protected $search = NULL;
        protected $configService = NULL;
        public function __construct($parent) {
            $this->parent = $parent;
            $this->search = $parent->getSearch();
            $this->configService = ConfigurationService::getInstance();
        }
        public abstract function getName();
        public abstract function getTitle();
        public abstract function load();
        public static function alert($msg) {
            print("<script>alert('".$msg."');</script>");
        }
    }
?>
