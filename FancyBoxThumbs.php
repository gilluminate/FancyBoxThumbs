<?php
/**
 * FancyBoxThumbs MediaWiki Extension
 * @version 2.0
 * @example at http://gilluminate.com/mediawiki/
 * @author [http://www.gilluminate.com Jason Gill]
 * @license [http://www.gnu.org/licenses/gpl.html GPLv3]
*/

/**
 * fancyBox - jQuery Plugin
 * @version: 2.1.4 (Thu, 17 Jan 2013)
 * @example at http://fancyapps.com/fancybox/
 * @license www.fancyapps.com/fancybox/#license
 * @copyright Copyright 2012 Janis Skarnelis - janis@fancyapps.com
 */

if ( !defined( 'MEDIAWIKI' ) ) {
	echo( "This file is part of an extension to the MediaWiki software and cannot be used standalone.\n" );
	die( 1 );
}

$fbtFancyBoxOptions = "{}";
 
//Register Credits
$wgExtensionCredits['media'][] = array(
    'name'        => 'FancyBoxThumbs',
    'url'         => 'http://www.mediawiki.org/wiki/Extension:FancyBoxThumbs',
    'author'      => '[http://www.gilluminate.com Jason Gill]',
    'description' => 'Displays thumbnailed images in a Mac-style "lightbox" that floats overtop of web page. A simple and fancy lightbox alternative',
    'version'     => '2.0'
);

$wgResourceModules['ext.FancyBoxThumbs'] = array(
	'scripts' => array('fancyBox/source/jquery.fancybox.js','ext.FancyBoxThumbs.js'),
	'styles' => 'fancyBox/source/jquery.fancybox.css',
	'localBasePath' => dirname( __FILE__ ).'/modules',
	'remoteExtPath' => 'FancyBoxThumbs/modules',
);

$wgHooks['BeforePageDisplay'][] = 'fbtBeforePageDisplay';

function fbtBeforePageDisplay(&$out){
	global $fbtFancyBoxOptions;
	$out->addModules( 'ext.FancyBoxThumbs' );
	$out->addInlineScript('var fbtFancyBoxOptions = '.$fbtFancyBoxOptions.';');
	return true;
}