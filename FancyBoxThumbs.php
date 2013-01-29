<?php
/*
 * FancyBoxThumbs extension 2.0
 * Displays thumbnailed images in a Mac-style "lightbox" that floats overtop of web page.
 *
 * by [http://www.gilluminate.com Jason Gill]
 *
*/

if ( !defined( 'MEDIAWIKI' ) ) {
	echo( "This file is part of an extension to the MediaWiki software and cannot be used standalone.\n" );
	die( 1 );
}
 
//Register Credits
$wgExtensionCredits['media'][] = array(
    'name'        => 'FancyBoxThumbs',
    'url'         => 'http://www.mediawiki.org/wiki/Extension:FancyBoxThumbs',
    'author'      => '[http://www.gilluminate.com Jason Gill]',
    'description' => 'Displays thumbnailed images in a Mac-style "lightbox" that floats overtop of web page. A simple and fancy lightbox alternative',
    'version'     => '2.0'
);

$wgResourceModules['ext.FancyBoxThumbs'] = array(
	'scripts' => array('fancybox/jquery.fancybox-1.3.4.js','FancyBoxThumbs.js'),
	'styles' => 'fancybox/jquery.fancybox-1.3.4.css',
	'localBasePath' => dirname( __FILE__ ),
	'remoteExtPath' => 'FancyBoxThumbs',
);

$wgHooks['BeforePageDisplay'][] = 'fbtBeforePageDisplay';

function fbtBeforePageDisplay(&$out){
	$out->addModules( 'ext.FancyBoxThumbs' );
	return true;
}