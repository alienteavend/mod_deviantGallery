<?php
/**
 * DeviantArt gallery importer helper
 * 
 * @package    eraden.software
 * @subpackage Modules
 * @link http://eraden-software.com
 */
class deviantGalleryHelper
{ 
  public static function getDeviations($params) {
    $da_username = $params->get( 'da_username','derwishe');
    $da_gallery_number = intval( $params->get( 'da_gallery_number', 0));
    $limit = intval( $params->get( 'limit', 0 ));
    $start = intval( $params->get( 'start', 0 ));
    $url='';
    if($da_gallery_number != 0)
    {
      $url = 'http://backend.deviantart.com/rss.xml?q=gallery:'.$da_username.'/'.$da_gallery_number;    
    }
    else
    {
      $url = 'http://backend.deviantart.com/rss.xml?q=gallery:'.$da_username;  
    }
    $feed      = simplexml_load_file($url);
    $channel   = $feed->channel;
    $i         = 0;
    $deviations = array();

    foreach($channel->item as $item) {
        if($i < $start) { $i++; continue; }
        if(($limit != 0) && $i == $start + $limit) break;

        $object = (object)array(
            "title"         => $item->title,
            "url"           => $item->link,
            "date"          => $item->pubDate,
            "desc"          => $item->children('media', true)->description,
            "thumbS"        => $item->children('media', true)->thumbnail->{0}->attributes()->url,
            "thumbL"        => $item->children('media', true)->thumbnail->{1}->attributes()->url,
            "image"         => $item->children('media', true)->content->attributes()->url,
            "rating"        => $item->children('media', true)->rating,
            "categoryUrl"   => $item->children('media', true)->category,
            "category"      => $item->children('media', true)->category->attributes()->label,
            "deviantName"   => $item->children('media', true)->credit->{0},
            "deviantAvatar" => $item->children('media', true)->credit->{1},
            "deviantUrl"    => $item->children('media', true)->copyright->attributes()->url,
            "copyright"     => $item->children('media', true)->copyright
        );

        array_push($deviations, $object);
        $i++;
    }
    return $deviations;
  }
}
?>