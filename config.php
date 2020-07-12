<?php
// $Id: config.php,v0.0 2004/10/243 12:20:00 Y.Sakai Exp $
//  ------------------------------------------------------------------------ //
//                Bluemoon My FileManager for XOOPS 2.0.x                    //
//                    Copyright (c) 2004 Bluemoon inc.                       //
//                       <http://www.bluemooninc.biz/>                       //
//  ------------------------------------------------------------------------ //
//  This program is free software; you can redistribute it and/or modify     //
//  it under the terms of the GNU General Public License as published by     //
//  the Free Software Foundation; either version 2 of the License, or        //
//  (at your option) any later version.                                      //
//                                                                           //
//  You may not change or alter any portion of this comment or credits       //
//  of supporting developers from this source code or any supporting         //
//  source code which is considered copyrighted (c) material of the          //
//  original comment or credit authors.                                      //
//                                                                           //
//  This program is distributed in the hope that it will be useful,          //
//  but WITHOUT ANY WARRANTY; without even the implied warranty of           //
//  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the            //
//  GNU General Public License for more details.                             //
//                                                                           //
//  You should have received a copy of the GNU General Public License        //
//  along with this program; if not, write to the Free Software              //
//  Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307 USA //
//  ------------------------------------------------------------------------ //
//  This was QTO FileManeger : http://qto.com/fm/                            //
//  ------------------------------------------------------------------------ //
// CONFIGRATION HERE.**********************************************************
define( 'SAVE_AS_MBSTR' , 'UTF-8' );		// In case of multi-byte filename ( SJIS, UTF-8, etc... )
$path_img = XOOPS_ROOT_PATH."/uploads/";   			// Set Normal Image file folder
$path_thumb = XOOPS_ROOT_PATH."/uploads/thumbs/";	// Set Thumbs file folder
$path_attach = XOOPS_ROOT_PATH."/uploads/";   		// Set Attach file folder
$path_url = XOOPS_URL."/uploads/";								// Set Normal Image folder URL
$MaxFileSize = "1000000"; // max file size in bytes
$HDDSpace = "100000000"; // max total size of all files in directory
$HiddenFiles = array(".DAV",".DS_Store",".htaccess","fileicon.gif","foldericon.gif","arrowicon.gif","COPYING","xoops_version.php","index.php","index.html","index.htm" ); // add any file names to this array which should remain invisible
$EditOn = 0; // make this = 0 if you dont want the to use the edit function at all
$EditExtensions = array("htm","html","txt","php"); // add the extensions of file types that you would like to be able to edit
$MakeDirOn = 0; // make this = 0 if you dont want to be able to make directories
$thumb_ext = ".+\.jpe?g$|.+\.png$|.+\.gif$|.+\.bmp$";	// Thumb image target file extentions
$ThisFileName = ""; // get the file name
// ****************************************************************************
?>
