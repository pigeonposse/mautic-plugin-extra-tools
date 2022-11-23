<?php

namespace MauticPlugin\PigeonPosseExtraToolsBundle\Controller;

use Mautic\CoreBundle\Controller\AbstractStandardFormController;

class CiPController extends AbstractStandardFormController {

    /**
     * @return string
     */
    protected function getControllerBase() {
        return 'PigeonPosseExtraToolsBundle:CiP';
    }

    /**
     * @return string
     */
    protected function getModelName() {
        return 'cip';
    }
    
    public function indexAction() {

		include_once( 'CiP/cmds-in-php.php' );
		$cmds = new \PigeonCMDSinPHP();

        return $this->delegateView(
            [
                'contentTemplate' => 'PigeonPosseExtraToolsBundle:CiP:index.html.php',
                'viewParameters'  => array(
                    'cmds' => $cmds
                ),            
            ]
        );
    }

}