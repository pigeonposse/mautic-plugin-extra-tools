<?php

namespace MauticPlugin\PigeonPosseExtraToolsBundle\Controller;

use Mautic\CoreBundle\Controller\AbstractStandardFormController;
use Mautic\CoreBundle\Form\Type\DateRangeType;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class NavLinksController extends AbstractStandardFormController {
    
    /**
     * @return string
     */
    protected function getControllerBase() {

        return 'PigeonPosseExtraToolsBundle:NavLinks';

    }

    /**
     * Get template base different than MauticCoreBundle:Standard.
     *
     * @return string
     */
    protected function getTemplateBase() {

        return 'PigeonPosseExtraToolsBundle:NavLinks';

    }

    /**
     * @return string
     */
    protected function getModelName() {

        return 'navlinks';

    }

    /**
     * Get template base different than MauticCoreBundle:Standard.
     *
     * @return string
     */
    protected function getTranslationBase() {

        return 'plugin.pigeonposse.navlinks';

    }

    /**
     * Generates new form and processes post data.
     *
     * @return JsonResponse|Response
     */
    public function newAction() {

        return parent::newStandard();
        
    }

    /**
     * Generates edit form and processes post data.
     *
     * @param int  $objectId
     * @param bool $ignorePost
     *
     * @return JsonResponse|Response
     */
    public function editAction($objectId, $ignorePost = false) {

        return parent::editStandard($objectId, $ignorePost);

    }    

    /**
     * Displays details on a post.
     *
     * @param $objectId
     *
     * @return array|JsonResponse|RedirectResponse|Response
     */
    public function viewAction($objectId) {

        return parent::viewStandard(
        	$objectId, 
        	'navlinks', 
        	'plugin.pigeonposse.navlinks'
        );

    }

    /**
     * Clone an entity.
     *
     * @param int $objectId
     *
     * @return JsonResponse|RedirectResponse|Response
     */
    public function cloneAction($objectId) {

        return parent::cloneStandard($objectId);

    }

    /**
     * Deletes the entity.
     *
     * @param int $objectId
     *
     * @return JsonResponse|RedirectResponse
     */
    public function deleteAction($objectId) {

        return parent::deleteStandard($objectId);

    }

    /**
     * Deletes a group of entities.
     *
     * @return JsonResponse|RedirectResponse
     */
    public function batchDeleteAction() {

        return parent::batchDeleteStandard();

    }

    /**
     * Index
     * 
     * @param int $page
     *
     * @return JsonResponse|RedirectResponse|Response
     */
    public function indexAction($page = 1) {

        return parent::indexStandard($page);

    }

    /**
     * Custom page action
     */
    public function iframeAction( $page ) {

        $url  = $this->request->get('url');
        $page = $this->request->get('id');
        $name = $this->request->get('name');

        $params = [
            'viewParameters' 	=> [
                'url' 	=> $url,
                'id' 	=> $page,
                'name' 	=> $name,
            ],
            'contentTemplate' 	=> 'PigeonPosseExtraToolsBundle:NavLinks:iframe.html.php',
            'passthroughVars' 	=> [
                'activeLink' 		=> 'mautic_navlinks_iframe',
                'route'         => $this->generateUrl(
                	'mautic_navlinks_iframe', 
                	[
                		'page' => $page
                	]
                ),
            ],

        ];

        return $this->delegateView( $params );

    }

}