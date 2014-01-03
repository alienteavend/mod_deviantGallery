<?php
/**
 * DeviantArt gallery importer
 * 
 * @package    eraden.software
 * @subpackage Modules
 * @link http://eraden-software.com
 */
 
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

if(!defined('DS')) {
   define('DS', DIRECTORY_SEPARATOR);
}

// Include the syndicate functions only once
require_once( dirname(__FILE__).DS.'helper.php' );

$url='http://backend.deviantart.com/rss.xml?q=gallery:groovebird/33949998';

$deviations = deviantGalleryHelper::getDeviations( $params );
require( JModuleHelper::getLayoutPath( 'mod_deviantgallery' ) );
?>

