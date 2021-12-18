<?php
	$__ROOT_FROM_PAGE__ = realpath(".");
	include_once("{$__ROOT_FROM_PAGE__}/classes/arloGUI/HomeViewModel.php");
	$viewModel = new HomeViewModel($__ROOT_FROM_PAGE__);
	$viewModel->load();
?>
	
