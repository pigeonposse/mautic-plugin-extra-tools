<?php

namespace MauticPlugin\PigeonPosseExtraToolsBundle\Controller;

use Mautic\CoreBundle\Controller\AbstractStandardFormController;

class CustomInterfaceController extends AbstractStandardFormController {

    /**
     * @return string
     */
    protected function getControllerBase() {
        return 'PigeonPosseExtraToolsBundle:CustomInterface';
    }

    /**
     * @return string
     */
    protected function getModelName() {
        return 'custominterface';
    }

    public function indexAction() {

    	// include_once ('custominterface/index.php');
    	// $cmi = new \CustomMauticInterface();

        return $this->delegateView(
            [
                'contentTemplate' => 'PigeonPosseExtraToolsBundle:CustomInterface:index.html.php',
                // 'viewParameters'  => array(
                //     'customInterface' => $cmi
                // ), 
            ]
        );
    }

}