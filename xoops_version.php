<?php
$modversion['name'] = _MI_BMFILE_NAME;
$modversion['version'] = 0.02;
$modversion['description'] = _MI_BMFILE_DISC;
$modversion['credits'] = "Bluemoon.FileManager by http://www.bluemooninc.biz/";
$modversion['author'] = "Y.Sakai";
$modversion['help'] = "I can't even help myself!";
$modversion['license'] = "GPL see LICENSE";
$modversion['official'] = "no";
$modversion['image'] = "logo.gif";
$modversion['dirname'] = "bmfile";

// Admin things
$modversion['hasAdmin'] = 0;
$modversion['adminmenu'] = "";

// Menu
$modversion['hasMain'] = 1;

$modversion['templates'][] = array(
	'file'        => 'bmfile_list.html',
	'description' => 'File List'
);

?>