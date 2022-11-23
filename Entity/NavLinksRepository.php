<?php

namespace MauticPlugin\PigeonPosseExtraToolsBundle\Entity;

use Mautic\CoreBundle\Entity\CommonRepository;

class NavLinksRepository extends CommonRepository {

    public function getNavLinksByPublished( $isPublished = true ){

        $q = $this->createQueryBuilder('ppnl');

        $q->select('nl')
	        ->from( NavLinks::class, 'nl' )
	        ->where( 'nl.isPublished = :isPublished' )
	        ->setParameters(
	        	['isPublished' => $isPublished]
	        );

        return $q->getQuery()->getResult();
    }
    
}