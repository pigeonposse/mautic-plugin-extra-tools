<?php

/**
 * Mautic leverages a simple array config file that will register routes, menu items, services and custom configuration parameters.
 * 
 * info: dev   - https://developer.mautic.org/?php#plugin-config-file
 * 		 dev   - https://symfony.com/doc/
 * 		 icons - https://fontawesome.com/v4/icons/
 */

include 'config-menu.php';

//$pp_menus = '';
$pp_route = 'pigeon-posse';

return [
	/*
	 * DESCRIPTION
	 */
    'name'        => 'Extra tools by PigeonPosse',
    'description' => 'Pigeon Posse functions for extend Mautic',
    'version'     => '1.0.0',
    'author'      => 'Angelo (PigeonPosse)',
	/*
	 * ROUTES
	 */
    'routes'   => array(
        'main' => array(
        	// Custom tokens
            'mautic_customtokens_index'  => array(
                'path'       => '/'.$pp_route.'/custom-tokens/{page}',
                'controller' => 'PigeonPosseExtraToolsBundle:CustomTokens:index',
            ),
            'mautic_customtokens_action'  => array(
                'path'       => '/'.$pp_route.'/custom-tokens/{objectAction}/{objectId}',
                'controller' => 'PigeonPosseExtraToolsBundle:CustomTokens:execute'
            ),
            // Nav links
            'mautic_navlinks_index'  => array(
                'path'       => '/'.$pp_route.'/nav-links/{page}',
                'controller' => 'PigeonPosseExtraToolsBundle:NavLinks:index',
            ),
            'mautic_navlinks_action'  => array(
                'path'       => '/'.$pp_route.'/nav-links/{objectAction}/{objectId}',
                'controller' => 'PigeonPosseExtraToolsBundle:NavLinks:execute'
            ),
			'mautic_navlinks_iframe' => array(
				'path' => '/'.$pp_route.'/nav-links/iframe/{page}',
				'controller' => 'PigeonPosseExtraToolsBundle:NavLinks:iframe',
			),
            // Cmds in PHP
            'mautic_cip_index'  => array(
                'path'       => '/'.$pp_route.'/cip',
                'controller' => 'PigeonPosseExtraToolsBundle:CiP:index'
            ),
            // custom Interface
            'pigeon_custominterface_index'  => array(
                'path'       => '/'.$pp_route.'/custom-interface',
                'controller' => 'PigeonPosseExtraToolsBundle:CustomInterface:index'
            ),
        ),
    ),
	/**
	 * MENU
	 */
    'menu' => $pp_menus,
	/**
	 * SERVICES
	 */
    'services' => [
		/**
		 * FORMS
		 */
		'forms' => [
			// Custom tokens
			'mautic.form.type.customtokens' => [
				'class' => \MauticPlugin\PigeonPosseExtraToolsBundle\Form\Type\CustomTokensType::class,
			],
			// NavLinks
			'mautic.form.type.navlinks' => [
				'class' => \MauticPlugin\PigeonPosseExtraToolsBundle\Form\Type\NavLinksType::class,
			],
		],
		/**
		 * EVENTS
		 */
        'events' => [
			// Custom tokens
			'mautic.events.subscriber.customtokens' => [
				'class' => MauticPlugin\PigeonPosseExtraToolsBundle\EventListener\CustomTokensSubscriber::class,
	        	'arguments' => [
					'mautic.customtokens.model.customtokens',
				],
			],
			// NavLinks
			'mautic.events.subscriber.navlinks' => [
				'class' => MauticPlugin\PigeonPosseExtraToolsBundle\EventListener\NavLinksSubscriber::class,
	        	'arguments' => [
					0 => 'router',
					1 => 'mautic.helper.ip_lookup',
					2 => 'mautic.core.model.auditlog',
					3 => 'mautic.page.model.trackable',
					4 => 'mautic.page.helper.token',
					5 => 'mautic.asset.helper.token',
					6 => 'mautic.navlinks.model.navlinks',
					7 => 'request_stack',
				],
			],
        ],
		/**
		 * MODELS
		 */
        'models' => [
			// Custom tokens
        	'mautic.customtokens.model.customtokens' => [
	        	'class' => \MauticPlugin\PigeonPosseExtraToolsBundle\Model\CustomTokensModel::class,
	        	'arguments' => array (
					0 => 'mautic.form.model.form',
					1 => 'mautic.page.model.trackable',
					2 => 'mautic.helper.templating',
					3 => 'event_dispatcher',
					4 => 'mautic.lead.model.field',
					5 => 'mautic.tracker.contact',
					6 => 'doctrine.orm.entity_manager',
				),
		        'public' => true,
		        'alias' => 'model.customtokens.customtokens',
        	],
			// NavLinks
        	'mautic.navlinks.model.navlinks' => [
	        	'class' => \MauticPlugin\PigeonPosseExtraToolsBundle\Model\NavLinksModel::class,
	        	'arguments' => array (
					0 => 'mautic.form.model.form',
					1 => 'mautic.page.model.trackable',
					2 => 'mautic.helper.templating',
					3 => 'event_dispatcher',
					4 => 'mautic.lead.model.field',
					5 => 'mautic.tracker.contact',
					6 => 'doctrine.orm.entity_manager',
				),
		        'public' => true,
		        'alias' => 'model.navlinks.navlinks',
        	],
	    ],

    ],
];

