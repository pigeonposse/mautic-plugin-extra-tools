<?php

/**
 * ***********************************************************************
 * REQUIRE 
 * ***********************************************************************
 **/
require_once 'cip-list.php';
require_once 'cip-functs.php';

/**
 * ***********************************************************************
 * REQUIRE FROM CORE
 * ***********************************************************************
 **/
/** Mautic root **/
$mautic_root = getcwd();

require_once $mautic_root.'/autoload.php';
require_once $mautic_root.'/app/AppKernel.php';
require $mautic_root.'/vendor/autoload.php';

/**
 * ***********************************************************************
 * USE
 * ***********************************************************************
 **/
use Symfony\Bundle\FrameworkBundle\Console\Application;
use Symfony\Component\Console\Input\ArgvInput;
use Symfony\Component\Console\Output\BufferedOutput;

/**
 * ***********************************************************************
 * CONSTANT
 * ***********************************************************************
 **/
defined('IN_MAUTIC_CONSOLE') or define('IN_MAUTIC_CONSOLE', 1);

/**
 * ***********************************************************************
 * RUN
 * ***********************************************************************
 **/
class PigeonCMDSinPHP extends PigeonCiPCore {

	/**
	 * Set functionality
	 **/
	private function set( $text ) {

		/** parameter for cmd **/
		$param 	= isset( $_GET['task'] ) ? $_GET['task'] : false;

		/** RUN **/
		if ($param) {

			$this->cmd_exec( $text, $param );

		}else {

			$this->cmds_list( $text );

		}

	}

	/**
	 * Get method
	 **/
	public function run( $text ) {

		$this->set( $text );

	}
}
