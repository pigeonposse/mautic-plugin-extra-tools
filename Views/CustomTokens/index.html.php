<?php

/**
 * @author      Angelo <angelo@pigeonposse.com>
 * @link        https://pigeonposse.com
 * 
 * @license     GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 * 
 */

$view->extend('MauticCoreBundle:standard:index.html.php');

$view['slots']->set(
	'mauticContent', 
	'customtokens'
);

$view['slots']->set(
	'headerTitle', 
	$view['translator']->trans('plugin.pigeonposse.customtokens.name')
);

$view['slots']->set(
    'actions',
    $view->render(
        'MauticCoreBundle:Helper:page_actions.html.php',
        [
            'templateButtons' => [
                'new' => $permissions['customtokens:items:create'],
            ],
            'routeBase' => 'customtokens',
        ]
    )
);

?>

<div class="panel panel-default bdr-t-wdh-0 mb-0">
    <?php echo $view->render(
        'MauticCoreBundle:Helper:list_toolbar.html.php',
        [
            'searchValue' => $searchValue,
            'searchHelp'  => 'mautic.core.help.searchcommands',
            'action'      => $currentRoute,
        ]
    ); ?>
    <div class="page-list">
        <?php $view['slots']->output('_content'); ?>
    </div>
</div>
