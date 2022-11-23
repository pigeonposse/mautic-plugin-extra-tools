<?php

$pp_menusD  = include 'config-menu-default.php';
$pp_menusC 	= include 'config-menu-custom.php';
$pp_menus 	= array_merge_recursive(
	$pp_menusD,
	$pp_menusC
); 
