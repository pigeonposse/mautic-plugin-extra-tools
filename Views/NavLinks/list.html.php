<?php 

$view->extend('MauticCoreBundle:Standard:list.html.php');

$view['slots']->set(
	'headerTitle', 
	$view['translator']->trans('plugin.pigeonposse.navlinks.name')
);
