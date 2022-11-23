<?php

namespace MauticPlugin\PigeonPosseExtraToolsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Mapping\ClassMetadata;
use Mautic\CoreBundle\Doctrine\Mapping\ClassMetadataBuilder;
use Mautic\CoreBundle\Entity\CommonEntity;
use Mautic\CoreBundle\Entity\FormEntity;
use Mautic\FormBundle\Entity\Form;
use Mautic\CategoryBundle\Entity\Category;

class NavLinks extends FormEntity {

    /**
     * @var int
     */
    private $id;

    /**
     * 
     * @var string
     */
    private $location;

    /**
     * @var int
     */
    private $order;

    /**
     * 
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $icon;

    /**
     *      
     * @var string
     */
    private $url;

    /**
     * 
     * @var string
     */
    private $type;

    /**
     * 
     * @var string
     */
    private $permission;

    /**
     * 
     * @var string
     */
    private $parent;

    // /**
    //  * 
    //  * @var string
    //  */
    // private $parentbool;

    /**
     * loadValidatorMetadata
     */
    public static function loadValidatorMetadata(
    	ClassMetadata $metadata
    ) {

    	$notBlank = [
        	'message' => 'plugin.pigeonpose.navlinks.form.required.notBlank'
    	];

    	$url = [
        	'message' => 'plugin.pigeonpose.navlinks.form.required.url'
    	];

        $metadata->addConstraint(
        	new UniqueEntity([
	            'fields' => 'name',
	        ])
        );

        $metadata->addPropertyConstraint(
            'location',
            new Assert\NotBlank( $notBlank )
        );

        $metadata->addPropertyConstraint(
            'name',
            new Assert\NotBlank( $notBlank )
        );

        $metadata->addPropertyConstraint(
            'url',
            new Assert\NotBlank( $notBlank )
        );

        $metadata->addPropertyConstraint(
            'url',
            new Assert\Url( $url )
        );

    }

    /**
     * @param ORM\ClassMetadata $metadata
     */
    public static function loadMetadata(
    	ORM\ClassMetadata $metadata
    ) {

        $builder = new ClassMetadataBuilder( $metadata );

        $builder->setTable('pigeonposse_navlinks');
        $builder->setCustomRepositoryClass(NavLinksRepository::class);

        $builder->addId();
        
        $builder->createField('location', 'string')
            ->columnName('location')
            ->build();

        $builder->createField('order', 'integer')
            ->columnName('priority')
            ->nullable()
            ->build();

        $builder->createField('name', 'string')
            ->columnName('name')
            ->build();

        $builder->createField('icon', 'string')
	        ->columnName('icon')
	        ->nullable()
	        ->build();
        
        $builder->createField('url', 'string')
	        ->columnName('url')
	        ->build(); 

        $builder->createField('type', 'string')
	        ->columnName('type')
	        ->build(); 
    
    }

    /**
     * @return mixed
     */
    public function getId() {

        return $this->id;

    }

    /**
     * @return string
     */
    public function getLocation() {

        return $this->location;

    }

    /**
     * @param string $location
     *
     * @return NavLinks
     */
    public function setLocation($location) {

        $this->location = $location;

        return $this;
    
    }

    /**
     * @return integer
     */
    public function getOrder() {

        return $this->order;
    
    }

    /**
     * @param integer $order
     *
     * @return NavLinks
     */
    public function setOrder($order) {
    
        $this->order = $order;

        return $this;
    
    }

    /**
     * @return string
     */
    public function getName() {
    
        return $this->name;
    
    }

    /**
     * @param string $name
     *
     * @return NavLinks
     */
    public function setName($name) {

        $this->name = $name;

        return $this;
    
    }

    /**
     * @return string
     */
    public function getIcon() {
    
        return $this->icon;
    
    }

    /**
     * @param string $icon
     *
     * @return NavLinks
     */
    public function setIcon($icon) {

        $this->icon = $icon;

        return $this;
    
    }

    /**
     * @return string
     */
    public function getUrl() {

        return $this->url;
    
    }

    /**
     * @param string $url
     *
     * @return NavLinks
     */
    public function setUrl($url) {

        $this->url = $url;

        return $this;

    }

    /**
     * @return string
     */
    public function getType() {

        return $this->type;

    }

    /**
     * @param string $type
     *
     * @return NavLinks
     */
    public function setType($type) {

        $this->type = $type;

        return $this;

    }

}

