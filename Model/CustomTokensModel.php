<?php

/*
 * @copyright   2016 Mautic, Inc. All rights reserved
 * @author      Mautic, Inc
 *
 * @link        https://mautic.org
 *
 * @license     GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 */

namespace MauticPlugin\PigeonPosseExtraToolsBundle\Model;

use Doctrine\DBAL\Query\QueryBuilder;
use Doctrine\ORM\EntityManager;
use Mautic\CoreBundle\Event\TokenReplacementEvent;
use Mautic\CoreBundle\Helper\Chart\ChartQuery;
use Mautic\CoreBundle\Helper\Chart\LineChart;
use Mautic\CoreBundle\Helper\TemplatingHelper;
use Mautic\CoreBundle\Model\FormModel;
use Mautic\LeadBundle\Entity\Lead;
use Mautic\LeadBundle\Model\FieldModel;
use Mautic\LeadBundle\Tracker\ContactTracker;
use Mautic\PageBundle\Model\TrackableModel;
use MauticPlugin\PigeonPosseExtraToolsBundle\Entity\CustomTokens;
use MauticPlugin\PigeonPosseExtraToolsBundle\Entity\CustomTokensRepository;
use MauticPlugin\PigeonPosseExtraToolsBundle\Form\Type\CustomTokensType;
use Symfony\Component\EventDispatcher\ContainerAwareEventDispatcher;
use Symfony\Component\EventDispatcher\Event;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

class CustomTokensModel extends FormModel {


    /**
     * @return string
     */
    public function getActionRouteBase() {
        return 'customtokens';
    }

    /**
     * @return string
     */
    public function getPermissionBase() {
        return 'customtokens:items';
    }

    /**
     * {@inheritdoc}
     *
     * @param object                              $entity
     * @param \Symfony\Component\Form\FormFactory $formFactory
     * @param null                                $action
     * @param array                               $options
     *
     * @throws NotFoundHttpException
     */
    public function createForm(
    	$entity, 
    	$formFactory,
    	$action = null, 
    	$options = []
    ) {

        if (!$entity instanceof CustomTokens) {
            throw new MethodNotAllowedHttpException(['CustomTokens']);
        }

        if (!empty($action)) {
            $options['action'] = $action;
        }

        return $formFactory->create(
        	CustomTokensType::class, 
        	$entity, 
        	$options
        );
    }

    /**
     * {@inheritdoc}
     *
     * @return \MauticPlugin\PigeonPosseExtraToolsBundle\Entity\CustomTokensRepository
     */
    public function getRepository() {

    	$repo = $this->em->getRepository( CustomTokens::class );

        return $repo;

    }

    /**
     * {@inheritdoc}
     *
     * @param null $id
     *
     * @return CustomTokens
     */
    public function getEntity($id = null) {

        if (null === $id) {
            return new CustomTokens();
        }

        return parent::getEntity($id);
        
    }

    /**
     * {@inheritdoc}
     *
     * @param CustomTokens  $entity
     * @param bool|false 	$unlock
     */
    public function saveEntity( $entity, $unlock = true ) {

        parent::saveEntity($entity, $unlock);
        $this->getRepository()->saveEntity($entity);

    }

    /**
     * ...
     */
    public function getCustomTokens() {

        $repo   = $this->getRepository();
        $tokens = $repo->getCustomTokensByPublished();
        $prefix = 'pigeontoken=';
        $res 	= [];

        if ( !isset($tokens) || empty($tokens) ) return [];

        foreach( $tokens as $token ) {

        	$id 	 = '{'.$prefix.$token->getId().'}';
        	$name 	 = '{'.$prefix.'"'.$token->getName().'"}';
        	$content = $token->getTextarea();

	        $res[$id] 	= $content;
	        $res[$name] = $content;

        }

        return $res;

    }

}
