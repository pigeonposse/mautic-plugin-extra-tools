<?php

namespace MauticPlugin\PigeonPosseExtraToolsBundle\Entity;

use Mautic\CoreBundle\Entity\CommonRepository;

class CustomTokensRepository extends CommonRepository {

    /*
     * getCustomTokensByPublished
     */
    public function getCustomTokensByPublished( $isPublished = true ){

        $q = $this->createQueryBuilder('ppct');

        $q->select('cvl')
	        ->from( CustomTokens::class, 'cvl' )
	        ->where( 'cvl.isPublished = :isPublished' )
	        ->setParameters(
	        	['isPublished' => $isPublished]
	        );

        return $q->getQuery()->getResult();

    }
    
}