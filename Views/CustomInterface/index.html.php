<?php

/*
 * @copyright   2016 Mautic, Inc. All rights reserved
 * @author      Mautic, Inc
 *
 * @link        https://mautic.org
 *
 * @license     GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 */
$view->extend('MauticCoreBundle:Default:content.html.php');
$view['slots']->set(
	'headerTitle', 
	$view['translator']->trans('plugin.pigeonposse.custominterface.name')
);

?>

<div class="page-list">
<div class="table-responsive">
    	<?php //$customInterface->run(); ?>
    </div>
</div>