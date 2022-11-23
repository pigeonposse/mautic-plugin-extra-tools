<?php

namespace MauticPlugin\PigeonPosseExtraToolsBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Mautic\CoreBundle\Form\Type\FormButtonsType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Validator\Constraints\Callback;
use Symfony\Component\Validator\Context\ExecutionContextInterface;

class NavLinksType extends AbstractType {

    public function buildForm(
    	FormBuilderInterface $builder, 
    	array $options
    ) {

        $location = [
            'main' 		=> 'Primary',
            'admin' 	=> 'Admin',
            'profile' 	=> 'Profile',
            'extra' 	=> 'Extra'
        ];

        $type = [
            'blank' 	=> 'Blank',
            'iframe' 	=> 'iFrame'
        ];



        $parent = [
            'admin' 	=> 'Administrator',
            'iframe' 	=> 'iFrame'
        ];

        $builder->add(
        	'name', 
        	TextType::class, 
        	[
	            'label' 	=> 'plugin.pigeonposse.navlinks.form.label',
	            'required' 	=> true,
	            'attr' 		=> [
	            	'class' 	=> 'form-control',
	            	// 'tooltip' 	=> 'plugin.pigeonposse.navlinks.form.label.desc'
	            ]
	        ]
	    );

        $builder->add(
        	'url', 
        	TextType::class, 
        	[
	            'label' 	=> 'plugin.pigeonposse.navlinks.form.url',
	            'required' 	=> true,
	            'attr' 		=> [
	            	'class' 	=> 'form-control',
	            	// 'tooltip' 	=> 'plugin.pigeonposse.navlinks.form.url.desc'
	            ]
	        ]
	    );

        $builder->add( 
        	'location', 
        	ChoiceType::class, 
        	[
	            'label'             => 'plugin.pigeonposse.navlinks.form.location',
	            'required'          => true,
	            'choices'           => array_flip($location), 
	            'attr'              => [
	            	'class'	 	=> 'form-control',
	            	'tooltip' 	=> 'plugin.pigeonposse.navlinks.form.location.desc'
	            ],         
	        ]
	    );

        // $builder->add( 
        // 	'permission', 
        // 	ChoiceType::class, 
        // 	[
	    //         'label'             => 'plugin.pigeonposse.navlinks.form.permission',
	    //         'required'          => false,
	    //         'choices'           => array_flip($permissions), 
	    //         'attr'              => [
	    //         	'class'	 	=> 'form-control',
	    //         	'tooltip' 	=> 'plugin.pigeonposse.navlinks.form.permission.desc'
	    //         ],         
	    //     ]
	    // );

        // $builder->add( 
        // 	'parent', 
        // 	ChoiceType::class, 
        // 	[
	    //         'label'             => 'plugin.pigeonposse.navlinks.form.parent',
	    //         'required'          => false,
	    //         'choices'           => array_flip($parent), 
	    //         'attr'              => [
	    //         	'class'	 	=> 'form-control',
	    //         	'tooltip' 	=> 'plugin.pigeonposse.navlinks.form.parent.desc'
	    //         ],         
	    //     ]
	    // );

        $builder->add(
        	'order', 
        	NumberType::class, 
        	[
	            'label' 	=> 'plugin.pigeonposse.navlinks.form.order',
	            'required' 	=> false,
	            'attr' 		=> [
	            	'class' 	=> 'form-control',
	            	'tooltip' 	=> 'plugin.pigeonposse.navlinks.form.order.desc'
	            ]
	        ]
	    );

        $builder->add(
        	'icon', 
        	TextType::class, 
        	[
	            'label' 	=> 'plugin.pigeonposse.navlinks.form.icon',
	            'required' 	=> false,
	            'attr' 		=> [
	            	'class' 	=> 'form-control',
	            	'tooltip' 	=> 'plugin.pigeonposse.navlinks.form.icon.desc'
	            ]
	        ]
	    );

        $builder->add(
        	'type', 
        	ChoiceType::class, 
        	[
	            'label'             => 'plugin.pigeonposse.navlinks.form.type',
	            'required'          => true,
	            'choices'           => array_flip($type),
	            'attr' 		=> [
	            	'class' 	=> 'form-control',
	            	'tooltip' 	=> 'plugin.pigeonposse.navlinks.form.type.desc'
	            ]
	        ]
	    );
	            
        $builder->add(
            'buttons',
            FormButtonsType::class
        );

        if (!empty($options['action'])) {
            $builder->setAction($options['action']);
        }   
         
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix() {

        return 'pigeonposse_navlinks';
        
    }

}