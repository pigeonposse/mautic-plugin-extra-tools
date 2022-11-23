<?php

    $view->extend('MauticCoreBundle:Default:content.html.php');
    
    $view['slots']->set('mauticContent', 'navlinks');
    
    $view['slots']->set(
    	'headerTitle', 
    	$view['translator']->trans(
    		'plugin.pigeonposse.navlinks.name'
    	).': '.$item->getName()
    );

    $view['slots']->set(
        'actions',
        $view->render(
            'MauticCoreBundle:Helper:page_actions.html.php',
            [
                'item'            => $item,
                'templateButtons' => [
                    'edit' => $view['security']->hasEntityAccess(
                        $permissions['navlinks:items:editown'],
                        $permissions['navlinks:items:editother'],
                        $item->getCreatedBy()
                    ),
                    'clone'  => $permissions['navlinks:items:create'],
                    'delete' => $view['security']->hasEntityAccess(
                        $permissions['navlinks:items:deleteown'],
                        $permissions['navlinks:items:deleteother'],
                        $item->getCreatedBy()
                    ),
                    'close' => $view['security']->isGranted('navlinks:items:view'),
                ],
                'routeBase' => 'navlinks',
                'langVar'   => 'navlinks',
            ]
        )
    );

?>

<div class="collapse in">
    <div class="pr-md pl-md pb-md">
        <div class="panel shd-none mb-0">
            <table class="table table-bordered table-striped mb-0">
            <tbody>

                <tr>
                    <td width="20%">
                    	<span class="fw-b textTitle">
                    		<?php echo $view['translator']->trans(
                    			'plugin.pigeonposse.navlinks.form.id'
                    		); ?>
                    	</span>
                    </td>
                    <td><?php echo $item->getId(); ?></td>
                </tr>

                <tr>
                    <td width="20%">
                    	<span class="fw-b textTitle">
                    		<?php echo $view['translator']->trans(
                    			'plugin.pigeonposse.navlinks.form.name'
                    		); ?>
                    	</span>
                    </td>
                    <td><?php echo $item->getName(); ?></td>
                </tr>

               <tr>
                    <td width="20%">
                    	<span class="fw-b textTitle">
                    		<?php echo $view['translator']->trans(
                    			'plugin.pigeonposse.navlinks.form.url'
                    		); ?>
                    	</span>
                    </td>
                    <td><?php echo $item->getUrl(); ?></td>
                </tr>

                <tr>
                    <td width="20%">
                    	<span class="fw-b textTitle">
                    		<?php echo $view['translator']->trans(
                    			'plugin.pigeonposse.navlinks.form.location'
                    		); ?>
                    	</span>
                    </td>
                    <td><?php echo $item->getLocation(); ?></td>
                </tr>

                <tr>
                    <td width="20%">
                    	<span class="fw-b textTitle">
                    		<?php echo $view['translator']->trans(
                    			'plugin.pigeonposse.navlinks.form.order'
                    		); ?>
                    	</span>
                    </td>
                    <td><?php echo $item->getOrder(); ?></td>
                </tr>

                <tr>
                    <td width="20%">
                    	<span class="fw-b textTitle">
                    		<?php echo $view['translator']->trans(
                    			'plugin.pigeonposse.navlinks.form.icon'
                    		); ?>
                    	</span>
                    </td>
                    <td><?php echo $item->getIcon(); ?></td>
                </tr>

                <tr>
                    <td width="20%">
                    	<span class="fw-b textTitle">
                    		<?php echo $view['translator']->trans(
                    			'plugin.pigeonposse.navlinks.form.type'
                    		); ?>
                    	</span>
                    </td>
                    <td><?php echo $item->getType(); ?></td>
                </tr>

            </tbody>
            </table>
        </div>
    </div>
</div>


