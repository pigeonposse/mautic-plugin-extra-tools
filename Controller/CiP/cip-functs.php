<?php

/**
 * ***********************************************************************
 * CMD in PHP Core class
 * ***********************************************************************
 **/
require_once 'cip-html.php';

class PigeonCiPCore {

	use PigeonCiPHTML;
	
	protected $mautic_root;
	protected $console_root;
	protected $request_uri;

	public function __construct() {

    	$this->mautic_root  = getcwd();
    	$this->console_root = $this->mautic_root.'/bin/console';
    	$this->request_uri  = $this->getRequestUri();

    }
    
    private function getRequestUri() {

    	$https 		= (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://";
		$host  		= $_SERVER['HTTP_HOST'];
		$request 	=  parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
		
		$link  = "{$https}{$host}{$request}";

		return $link;

    }

	/**
	 * Text for translation
	 **/
	private function text( $value ) {
		return [
			'list-name'    => $value->trans('plugin.pigeonposse.cip.page.list.name'),
			'list-desc'    => $value->trans('plugin.pigeonposse.cip.page.list.description'),
			'table-cmd'    => $value->trans('plugin.pigeonposse.cip.page.list.table.cmd'),
			'table-name'   => $value->trans('plugin.pigeonposse.cip.page.list.table.name'),
			'table-desc'   => $value->trans('plugin.pigeonposse.cip.page.list.table.description'),
			'alert' 	   => $value->trans('plugin.pigeonposse.cip.page.list.alert'),
			'return' 	   => $value->trans('plugin.pigeonposse.cip.page.cmd.returnBtn'),
			'cmd-name' 	   => $value->trans('plugin.pigeonposse.cip.page.cmd.name'),
			'cmd-desc' 	   => $value->trans('plugin.pigeonposse.cip.page.cmd.description'),
			'cmd-not-allowed' => $value->trans('plugin.pigeonposse.cip.page.cmd.notAllowed'),
			'cmd-allowed'     => $value->trans('plugin.pigeonposse.cip.page.cmd.allowed'),
			'cmd-res' 	   => $value->trans('plugin.pigeonposse.cip.page.cmd.result'),
		];
	}

	/**
	 * Get list of array key
	 **/
	protected function get_array_key_list( $value, $key ) {

		$res = [];

		foreach ($value as $value_k => $val) {
			$res[] = $val[$key];
		}

		return $res;

	}

	/**
	 * Get json with cmds
	 **/
	protected function get_cmds_json( ) {

		$cmd = 'php '.$this->console_root.' list --format=json';
		$output=null;
		$retval=null;
		exec($cmd, $output, $retval);

		return json_decode($output[0], TRUE);

	}

	/**
	 * Get cmds list
	 **/
	protected function get_cmds_list() {

		$res = [];
		$cmds = $this->get_cmds_json();

		foreach($cmds as $key => $value) {
			if ($key == 'commands') {
			    foreach ($value as $cmd_k => $cmd) {
			    
			        $link = $this->request_uri.'?task='.urlencode($cmd['name']);
			    	$link = '<a href="'.$link.'" target=""><code>'.$cmd['name']."</code></a>";

			    	$res[$cmd_k] 		= $cmd;
			    	$res[$cmd_k]['cmd'] = $link;

			    }
			}
		}
		return $res;
	}

	/**
	 * Command Not allowed
	 **/
	private function cmd_not_allowed( $cmd, $txt ) {

		$name = $txt['cmd-name']." <code>".$cmd."</code>";

		$this->header( $name, $txt['cmd-desc'] );
		$this->panel( $this->notification( $txt['cmd-not-allowed'], "danger" ) );
    	$this->btn_return_to_list_page( 
    		$txt['return'], 
    		$this->request_uri,
    	 	"6",
    		"3"
    	);

	}

	/**
	 * Command allowed
	 **/
	private function cmd_allowed( $cmd, $txt ) {
		
		$output		=null;
		$retval		=null;

		exec($cmd, $output, $retval );

		$res = "<h4>".$txt['cmd-res']."</h4>";
		$res .= "<pre>".print_r($output,true)."</pre>";
		$name = $txt['cmd-name']." <code>".$cmd."</code>";
		//$res .= "<pre>".print_r($retval,true)."</pre>";

		$this->header( $name, $txt['cmd-desc'] );
		$this->notification( $txt['cmd-allowed'], "success" );
	    $this->column( $res );
	    $this->btn_return_to_list_page( 
    		$txt['return'], 
    		$this->request_uri 
    	);

	}
	/**
	 * ***********************************************************************
	 * Commands exectution 
	 * ***********************************************************************
	 **/

	protected function cmd_exec( 
		$text, 
		$param
	) {

		$txt     = $this->text( $text );
		$task    = urldecode( $param );
		$cmds 	 = $this->get_cmds_list();
		$comands = $this->get_array_key_list( $cmds, 'name' );
		$cmd 	  = 'php '.$this->console_root.' '.$task;
		/**
		 * If is not allowed
		 **/
		if (!in_array($task, $comands)) {
			return $this->cmd_not_allowed( $cmd, $txt );
		}else {
			return $this->cmd_allowed( $cmd, $txt );
		}

	}

	/**
	 * ***********************************************************************
	 * Commands LIST 
	 * ***********************************************************************
	 **/
	protected function cmds_list( 
		$text
	) {

		$txt 	= $this->text( $text ); 
		$cmds 	= $this->get_cmds_list();

		$header = [
			"cmd" 			=> $txt['table-cmd'],
			"description" 	=> $txt['table-desc']
		];

		$this->header( $txt['list-name'], $txt['list-desc'] );
		$this->table( $header, $cmds );
		$this->notification( $txt['alert'], "danger" );;


	}

}

