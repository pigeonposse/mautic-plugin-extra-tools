<?php

namespace MauticPlugin\PigeonPosseExtraToolsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Mapping\ClassMetadata;
use Mautic\CategoryBundle\Entity\Category;
use Mautic\CoreBundle\Doctrine\Mapping\ClassMetadataBuilder;
use Mautic\CoreBundle\Entity\CommonEntity;
use Mautic\CoreBundle\Entity\FormEntity;
use Mautic\FormBundle\Entity\Form;

class CustomTokens extends FormEntity {

    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */  
    private $name;

    /**
     * @var string
     */
    private $textarea;
    
    /**
     * @var \DateTime
     */
    private $publishUp;

    /**
     * @var \DateTime
     */
    private $publishDown;

    /**
     * loadValidatorMetadata
     */
    public static function loadValidatorMetadata( 
    	ClassMetadata $metadata 
    ){

        $metadata->addConstraint(new UniqueEntity([
            'fields' => 'name',
        ]));

    	$notBlank = [
        	'message' => 'plugin.pigeonpose.customtokens.form.name.required'
    	];

        $metadata->addPropertyConstraint(
            'name',
            new Assert\NotBlank( $notBlank )
        );

        $metadata->addPropertyConstraint(
            'textarea',
            new Assert\NotBlank( $notBlank )
        );

    }

    /**
     * @param ORM\ClassMetadata $metadata
     */
    public static function loadMetadata( 
    	ORM\ClassMetadata $metadata 
    ) {

        $builder = new ClassMetadataBuilder($metadata);

        $builder->setTable('pigeonposse_customtokens');
        $builder->setCustomRepositoryClass(CustomTokensRepository::class);
       
        $builder->addId();
        
        $builder->createField('name', 'string')
            ->columnName('name')
            ->build();

        $builder->createField('textarea', 'text')
            ->columnName('textarea')
            ->nullable()
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
    public function getTextarea() {

        return $this->textarea;

    }

    /**
     * @param string $url
     *
     * @return CustomTokens
     */
    public function setTextarea($textarea) {

        $this->textarea = $textarea;
        return $this;

    }

    /**
     * @return string
     */
    public function getName() {

        return $this->name;

    }

    /**
     * @param string $url
     *
     * @return CustomTokens
     */
    public function setName($name) {

        $this->name = $name;
        return $this;

    }

    /**
     * @return \DateTime
     */
    public function getPublishUp(){

        return $this->publishUp;

    }

    /**
     * @param \DateTime $publishUp
     *
     * @return CustomTokens
     */
    public function setPublishUp($publishUp) {

        $this->isChanged('publishUp', $publishUp);
        $this->publishUp = $publishUp;

        return $this;

    }

    /**
     * @return \DateTime
     */
    public function getPublishDown() {

        return $this->publishDown;

    }

    /**
     * @param \DateTime $publishDown
     *
     * @return CustomTokens
     */
    public function setPublishDown($publishDown) {

        $this->isChanged('publishDown', $publishDown);
        $this->publishDown = $publishDown;

        return $this;

    }

    
}