<?php

return array(
	'main' => array(
    	// Custom tokens
        'plugin.pigeonposse.customtokens.name' => array(
            'route'     => 'mautic_customtokens_index',
            'iconClass' => 'fa-thumb-tack',
            'access'    => 'admin',
            'priority'  => 0
        ),
    ),
    'admin' => array(
    	// parent
        'plugin.pigeonposse.menu.admin.name' => array(
            'id'  		=> 'pigeonposse_extra_tools_menu',
            'iconClass' => 'fa-code',
            'access'    => 'admin',
            'priority'  => 10
        ),
    	// custominterface
        // 'plugin.pigeonposse.custominterface.name' => array(
        //     'route'     => 'pigeon_custominterface_index',
        //     // 'iconClass' => 'fa-paint-brush',
        //     'access'    => 'admin',
        //     'parent' 	=> 'plugin.pigeonposse.menu.admin.name',
        // ),
        // Cmds in PHP
        'plugin.pigeonposse.cip.name' => array(
            'route'     => 'mautic_cip_index',
            // 'iconClass' => 'fa-terminal',
            'access'    => 'admin',
            'parent' 	=> 'plugin.pigeonposse.menu.admin.name',
        ),
        // Nav Links
        'plugin.pigeonposse.navlinks.name' => array(
            'route'     => 'mautic_navlinks_index',
            // 'iconClass' => 'fa-link',
            'access'    => 'admin',
            'parent' 	=> 'plugin.pigeonposse.menu.admin.name',
        ),
    )
);