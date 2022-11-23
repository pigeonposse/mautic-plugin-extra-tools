<?php

namespace MauticPlugin\PigeonPosseExtraToolsBundle\Controller;

use Mautic\CoreBundle\Controller\AbstractStandardFormController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
// use Mautic\CoreBundle\Form\Type\DateRangeType;

class CustomTokensController extends AbstractStandardFormController {

    /**
     * Get controller base if different than MauticCoreBundle:Standard.
     * 
     * @return string
     */
    protected function getControllerBase() {

        return 'PigeonPosseExtraToolsBundle:CustomTokens';

    }

    /**
     * Get template base different than MauticCoreBundle:Standard.
     *
     * @return string
     */
    protected function getTemplateBase() {

        return 'PigeonPosseExtraToolsBundle:CustomTokens';

    }

    /**
     * Get this controller's model name.
     * 
     * @return string
     */
    protected function getModelName() {

        return 'customtokens';

    }

    /**
     * Get the base to override core translation keys.
     * 
     * @return string
     */
    protected function getTranslationBase() {

        return 'plugin.pigeonposse.customtokens';

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
        	'customtokens', 
        	'plugin.pigeonposse.customtokens'
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


}