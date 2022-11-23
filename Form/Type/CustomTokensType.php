<?php

namespace MauticPlugin\PigeonPosseExtraToolsBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Mautic\CoreBundle\Form\Type\FormButtonsType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Callback;
use Symfony\Component\Validator\Context\ExecutionContextInterface;

class CustomTokensType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {

        $builder->add('name', TextType::class, [
            'label' 	=> 'plugin.pigeonposse.customtokens.form.name',
            'required' 	=> true,
            'attr' 		=> ['class' => 'form-control']
        ]);

        $builder->add('textarea', TextareaType::class, [
            'label' 	=> 'plugin.pigeonposse.customtokens.form.textarea',
            'required' 	 => true,
            'label_attr' => ['class' => 'control-label'],
            'attr' 		 => ['class' => 'form-control editor editor-advanced']
        ]);
            
        $builder->add(
            'buttons',
            FormButtonsType::class
        );

        if (!empty($options['action'])) {
            $builder->setAction($options['action']);
        }    

    }

    public function getBlockPrefix() {

        return 'pigeonposse_customtokens';
        
    }
}