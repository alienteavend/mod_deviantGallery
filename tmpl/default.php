<?php // no direct access
  defined( '_JEXEC' ) or die( 'Restricted access' );
  
	$document	= JFactory::getDocument();
	$document->addStyleSheet(JURI::base(true).'/modules/mod_deviantgallery/tmpl/styles.css');	
  $i = 0;
  foreach($deviations as $deviation): ?>
      <div class="deviation">
          <div class="col col-p <?php echo $params->get('moduleclass-sfx' , '') ?>">
              <?php if(intval( $params->get( 'show_title', 1 ) ) == 1) 
              { ?>
                <a href="<?= $deviations[$i]->url; ?>"><h2><?=$deviations[$i]->title; ?></h2></a>
              <?php } ?>
              
              <?php if(intval( $params->get( 'show_image', 1 ) ) == 1) 
              { ?>
                <a href="<?= $deviations[$i]->url; ?>"><img src="<?= $deviations[$i]->image; ?>" alt="<?= $deviations[$i]->title; ?>" class="deviation_image"/></a>
              <?php } ?>
              <?php if(intval( $params->get( 'show_thumbnail', 1 ) ) == 1) 
              { ?>
                <p>Thumbnail src: <a href="<?= $deviations[$i]->thumbS; ?>">150px</a> | <a href="<?= $deviations[$i]->thumbL; ?>">300px</a>
              <?php } ?>
          </div>
          <div class="col col-s">
              <?php if(intval( $params->get( 'show_info', 1 ) ) == 1) 
              { ?>
                <h2>Deviation Info</h2>
              <?php } ?>
              
              <?php if(intval( $params->get( 'show_date', 1 ) ) == 1) 
              { ?>
                <p><small><?= $deviations[$i]->date; ?></small></p>
              <?php } ?>
              <?php if(intval( $params->get( 'show_desc', 1 ) ) == 1) 
              { ?>
                <p><strong><?= $deviations[$i]->desc; ?></strong></p>
              <?php } ?>
                
              <?php if(intval( $params->get( 'show_rating', 1 ) ) == 1) 
              { ?>
                <p>Rating: <?= $deviations[$i]->rating; ?></p>
              <?php } ?>
                
              <?php if(intval( $params->get( 'show_category', 1 ) ) == 1) 
              { ?>
                <p>Category: <a href="http://browse.deviantart.com/<?= $deviations[$i]->categoryUrl; ?>"><?= $deviations[$i]->category; ?></a></p>
              <?php } ?>
              
              <?php if(intval( $params->get( 'show_artist', 1 ) ) == 1) 
              { ?>
                <p>By <a href="<?= $deviations[$i]->deviantUrl; ?>"><?= $deviations[$i]->deviantName; ?></a></p>
              <?php } ?>
                
              <?php if(intval( $params->get( 'show_avatar', 1 ) ) == 1) 
              { ?>
                <img src="<?= $deviations[$i]->deviantAvatar; ?>"/>
              <?php } ?>
                
              <?php if(intval( $params->get( 'show_copyright', 1 ) ) == 1) 
              { ?>
                <p><?= $deviations[$i]->copyright; ?></p>
              <?php } ?>
          </div>
      </div>
<?php
      $i++;
  endforeach;
?>