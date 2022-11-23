<?php

/*
 * @copyright   2016 Mautic, Inc. All rights reserved
 * @author      Mautic, Inc
 *
 * @link        https://mautic.org
 *
 * @license     GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 */

/** Extend view page  **/
$view->extend('MauticCoreBundle:Default:content.html.php');

$view['slots']->set(
	'headerTitle', 
	$view['translator']->trans('plugin.pigeonposse.cip.name')
);

/*
 * HTML
 */
?>
<div class="page-list">
<div class="table-responsive">
    	<?php $cmds->run($view['translator']); ?>
    </div>
</div>
