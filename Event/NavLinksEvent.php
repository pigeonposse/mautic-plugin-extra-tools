<?php

/**
 *
 * @links     https://developer.mautic.org/?php#events
 */

namespace MauticPlugin\PigeonPosseExtraToolsBundle\Event;

use Mautic\CoreBundle\Event\CommonEvent;
use MauticPlugin\PigeonPosseExtraToolsBundle\Entity\NavLinks;

/**
 * Class NavLinksEvent.
 */
class NavLinksEvent extends CommonEvent {
	
    /**
     * @param bool|false $isNew
     */
    public function __construct(
    	NavLinks $navlinks, 
    	$isNew = false
    ){

        $this->entity = $navlinks;
        $this->isNew  = $isNew;

    }

    /**
     * Sets the NavLinks entity.
     */
    public function setNavLinks(
    	NavLinks $navlinks
    ) {

        $this->entity = $navlinks;

    }

    /**
     * Returns the NavLinks entity.
     *
     * @return NavLinksEvent
     */
    public function getNavLinks() {

        return $this->entity;

    }

}
