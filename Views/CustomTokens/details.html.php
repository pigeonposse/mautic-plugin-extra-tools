<?php

    $view->extend('MauticCoreBundle:Default:content.html.php');
    
    $view['slots']->set('mauticContent', 'customtokens');
    
    $view['slots']->set(
    	'headerTitle', 
    	$view['translator']->trans(
    		'plugin.pigeonposse.customtokens.name'
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
                        $permissions['customtokens:items:editown'],
                        $permissions['customtokens:items:editother'],
                        $item->getCreatedBy()
                    ),
                    'clone'  => $permissions['customtokens:items:create'],
                    'delete' => $view['security']->hasEntityAccess(
                        $permissions['customtokens:items:deleteown'],
                        $permissions['customtokens:items:deleteother'],
                        $item->getCreatedBy()
                    ),
                    'close' => $view['security']->isGranted('customtokens:items:view'),
                ],
                'routeBase' => 'customtokens',
                'langVar'   => 'customtokens',
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
                    			'plugin.pigeonposse.customtokens.token'
                    		); ?>
                    	</span>
                    </td>
                    <td>
                    	<p>
                    		{pigeontoken=<?php echo $item->getId(); ?>}
                    	</p>
                    	<p>
                    		{pigeontoken="<?php echo $item->getName(); ?>"}
                    	</p>
                    </td>
                </tr>
                <tr>
                    <td width="20%">
                    	<span class="fw-b textTitle">
                    		<?php echo $view['translator']->trans(
                    			'plugin.pigeonposse.customtokens.form.id'
                    		); ?>
                    	</span>
                    </td>
                    <td><?php echo $item->getId(); ?></td>
                </tr>
                <tr>
                    <td width="20%">
                    	<span class="fw-b textTitle">
                    		<?php echo $view['translator']->trans(
                    			'plugin.pigeonposse.customtokens.form.name'
                    		); ?>
                    	</span>
                    </td>
                    <td><?php echo $item->getName(); ?></td>
                </tr>
                <tr>
                    <td width="20%">
                    	<span class="fw-b textTitle">
                    		<?php echo $view['translator']->trans(
                    			'plugin.pigeonposse.customtokens.form.textarea'
                    		); ?>
                    	</span>
                    </td>
                    <td><?php echo $item->getTextarea(); ?></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>


