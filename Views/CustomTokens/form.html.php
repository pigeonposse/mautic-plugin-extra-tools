<?php
$view->extend('MauticCoreBundle:Default:content.html.php');


$view['slots']->set('mauticContent', 'customtokens');

$header = ($entity->getId())
    ?
    $view['translator']->trans(
        'plugin.pigeonposse.customtokens.edit',
    ).': '.$entity->getName()
    :
    $view['translator']->trans('plugin.pigeonposse.customtokens.new');
$view['slots']->set('headerTitle', $header);

//$attr = $form->vars['attr'];
echo $view['form']->start($form);
?>

<!-- start: box layout -->
<div class="box-layout">
     <!-- container -->
     <div class="col-md-9 bg-auto height-auto bdr-r pa-md">
     
            <div class="row">
                <div class="col-md-12">
                    <?php echo $view['form']->row($form['name']); ?>
                </div>
                <div class="col-md-12">
                    <?php echo $view['form']->row($form['textarea']); ?>
                </div>
            </div>

     </div>     
</div>

<div class="modal-form-buttons" style="margin-left: 15px;">
    
</div>
<?php echo $view['form']->end($form); ?>