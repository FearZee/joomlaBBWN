<?php

use Joomla\CMS\Factory;
use Joomla\CMS\Language\Associations;
use Joomla\CMS\Layout\LayoutHelper;
use Joomla\CMS\Router\Route;
use Joomla\CMS\Uri\Uri;
use Joomla\Component\Content\Administrator\Extension\ContentComponent;
use Joomla\Component\Content\Site\Helper\RouteHelper;

// Create a shortcut for params.
$params = $this->item->params;
$canEdit = $this->item->params->get('access-edit');
$info    = $params->get('info_block_position', 0);

// Check if associations are implemented. If they are, define the parameter.
$assocParam = (Associations::isEnabled() && $params->get('show_associations'));

$currentDate   = Factory::getDate()->format('Y-m-d H:i:s');
$isUnpublished = ($this->item->state == ContentComponent::CONDITION_UNPUBLISHED || $this->item->publish_up > $currentDate)
	|| ($this->item->publish_down < $currentDate && $this->item->publish_down !== null);

?>


    
<?php 
    $bild1s = $this->item->jcfields[6]->fieldparams->get('sizes')->sizes0->src;
    $bild1m = $this->item->jcfields[6]->fieldparams->get('sizes')->sizes1->src;
    $bild1l = $this->item->jcfields[6]->fieldparams->get('sizes')->sizes2->src;
    //print_r($this->item->jcfields[6]); 
?>
<!-- <img src="<?php echo $bild1s ?>" /> -->


<article>
    <h2 <?php echo (strlen($this->item->title) < 20) ? 'class="big"' : 'class="small"' ?>><?php echo $this->item->title; ?></h2>

    <?php if (isset($bild1s)) : ?>
        <figure>
            <picture>
                <source srcset="<?php echo $bild1l ?>" media="(min-width: 90em)">
                <source srcset="<?php echo $bild1m ?>" media="(min-width: 64em)">
                <img src="<?php echo $bild1s ?>" />
            </picture>
            <figcaption>Yo Bildtitle</figcaption>
        </figure>
    <?php endif; ?>

    <?php if (isset($this->item->jcfields[2]->rawvalue)) : ?>
        <p class="teaser_2col"><?php print_r($this->item->jcfields[2]->rawvalue) ?></p>
    <?php endif; ?>
</article>