<?php
// $Id: index.php,v0.0 2004/10/23 19:43:00 Y.Sakai Exp $
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
include("../../mainfile.php");
include(XOOPS_ROOT_PATH."/header.php");
include_once XOOPS_ROOT_PATH."/include/xoopscodes.php";

require('config.php');		// CONFIGRATION FILE LOAD

$bmfile_version = "0.02";	// Version Infomation

if(
	!defined('XOOPS_ROOT_PATH') ||
	!defined('XOOPS_CACHE_PATH') ||
	!is_dir(XOOPS_CACHE_PATH)
){
	exit();
}
if(!empty($xoopsConfig)){
	$lang_folder = XOOPS_ROOT_PATH.'/modules/'.$xoopsModule->dirname().'/language/'.$xoopsConfig['language'];
	if(file_exists($lang_folder.'/main.php')){
		require_once $lang_folder.'/main.php';
	}
}
function local_refcheck() {
	global $xoopsModule;
	$ref = xoops_getenv('HTTP_REFERER');
	if (strpos($ref, XOOPS_URL."/modules/".$xoopsModule->dirname()) !== 0 )
		return false;
	else
		return true;
}

$flag = local_refcheck();

$back = $flag ? $_REQUEST{'back'} : null;
$cancel = $flag ? $_REQUEST{'cancel'} : null;
$delete = $flag ? $_REQUEST{'delete'} : null;
$dirname = $flag ? $_REQUEST{'dirname'} : null;
$edit = $flag ? $_REQUEST{'edit'} : null;
$login = $flag ? $_REQUEST{'login'} : null;
$loginfailed = $flag ? $_REQUEST{'loginfailed'} : null;
$mkdir = $flag ? $_REQUEST{'mkdir'} : null;
$newcontent = $flag ? $_REQUEST{'newcontent'} : null;
$pathext = $flag ? $_REQUEST{'pathext'} : null;
$save = $flag ? $_REQUEST{'save'} : null;
$savefile = $flag ? $_REQUEST{'savefile'} : null;
$u = $flag ? $_REQUEST{'u'} : null;
$upload = $flag ? $_REQUEST{'upload'} : null;
$filedata = $flag ? $_REQUEST{'filedata'} : null;
$path_no = $flag ? $_REQUEST{'path'} : null;

unset($flag);

$msg="";
$path = $path_thumb;	// default folder
if($path_no){
	switch($path_no) {
		case "1": $path = $path_thumb;	break;
		case "2": $path = $path_img;	break;
		case "3": $path = $path_attach;	break;
	}
} else {
	$path_no = 1;
}
if($back){
	$pathext = substr($pathext, 0, -1);
	$slashpos = strrpos($pathext, "/");
	if($slashpos == 0)	{
		$pathext = "";	
	}else{
		$pathext = substr($pathext, 0, ($slashpos+1));
	}
}
if($xoopsUser){
	// get the total size of all files in the directory including any sub directorys
	$HDDTotal = dirsize($path);
	// if the upload button was pressed
	if ( $upload ){ 
		// if a file was actually uploaded 
		if($HTTP_POST_FILES['uploadedfile']['name']){
			// remove any % signs from the file name
			$HTTP_POST_FILES['uploadedfile']['name'] = str_replace("%","",$HTTP_POST_FILES['uploadedfile']['name']);  
			// if the file size is within allowed limits
			if($HTTP_POST_FILES['uploadedfile']['size'] > 0 && $HTTP_POST_FILES['uploadedfile']['size'] < $MaxFileSize){
				// if adding the file will not exceed the maximum allowed total
				if(($HDDTotal + $HTTP_POST_FILES['uploadedfile']['size']) < $HDDSpace){
					// put the file in the directory
					move_uploaded_file($HTTP_POST_FILES['uploadedfile']['tmp_name'], $path.$pathext.$HTTP_POST_FILES['uploadedfile']['name']);	
				}else{
			 		$msg = "<font face='Verdana, Arial, Hevetica' size='2' color='#ff0000'>There is not enough free space and the file could<br>not be uploaded.</font><br>";
				}
			}else{
				$MaxKB = $MaxFileSize/1000; // show the max file size in Kb
				$msg =  "<font face='Verdana, Arial, Hevetica' size='2' color='#ff0000'>The file was greater than the maximum allowed<br>file size of $MaxKB Kb and could not be uploaded.</font><br>";
			}
		}else{
			$msg =  "<font face='Verdana, Arial, Hevetica' size='2' color='#ff0000'>Please press the browse button and select a file<br>to upload before you press the upload button.</font><br>";
		}
	}elseif($delete){ // if the delete button was pressed
		// delete the file or directory
		if(is_dir($path.$pathext.$delete)){
			$result = @rmdir($path.$pathext.$delete);
			if($result == 0){
				$msg = "<font face='Verdana, Arial, Hevetica' size='2' color='#ff0000'>
				The folder could not be deleted. The folder must be <br>
				empty before you can delete it. You also may <br>
				not be authorised to delete this folder.</font><br>";
			}
		}else{
			//echo $path."-".$pathext."-".$delete;
			$delete = rawurldecode($delete);
			unlink($path.$pathext.$delete);
			unlink($path_img.$pathext.$delete);
		}
	}elseif($mkdir && $MakeDirOn){
		$result = @mkdir($path.$pathext.$dirname, 0700);
		if($result == 0){
			$msg = "<font face='Verdana, Arial, Hevetica' size='2' color='#ff0000'>
			The folder could not be create.<br>
			File name is not input right, or folder name is invalid.</font><br>";
		}
	}
	$HDDTotal = dirsize($path); // get the total size of all files in the directory including any sub directorys
	$freespace = ($HDDSpace - $HDDTotal)/1000; // work out how much free space is left
	$HDDTotal = (int) ($HDDTotal/1000); // convert to Kb instead of bytes and type cast it as an int
	$freespace = (int) $freespace; // type cast as an int
	$HDDSpace = (int) ($HDDSpace/1000); // convert to Kb instead of bytes and type cast it as an int
	$MaxFileSizeKb = (int) ($MaxFileSize/1000); // convert to Kb instead of bytes and type cast it as an int
	// if $MakeDirOn has been set to on show some html for making directories
	if($MakeDirOn){
		$mkdirhtml = "<input type=\"text\" name=\"dirname\" size=\"15\">
		<input type=\"submit\" name=\"mkdir\" value=\"Make a new folder\">";
	}
	// build the html that makes up the file manager
	// the $filemanager variable holds the first part of the html
	// including the form tags and the top 2 heading rows of the table which
	// dont display files
	$xoopsTpl->assign("lang_title", _MD_TITLE);
	$xoopsTpl->assign("lang_url_thumb", _MD_URL_THUMB);
	$xoopsTpl->assign("lang_url_image", _MD_URL_IMAGE);
	$xoopsTpl->assign("lang_url_attach", _MD_URL_ATTACH);
	$xoopsTpl->assign("lang_list_image", _MD_LIST_IMAGE);
	$xoopsTpl->assign("lang_list_filename", _MD_LIST_FILENAME);
	$xoopsTpl->assign("lang_list_filesize", _MD_LIST_FILESIZE);
	$xoopsTpl->assign("lang_list_filetype", _MD_LIST_FILETYPE);
	$xoopsTpl->assign("lang_list_filedate", _MD_LIST_FILEDATE);
	$xoopsTpl->assign("lang_list_delete", _MD_LIST_DELETE);
	
	$xoopsTpl->assign('thumb_url', 	"$PHP_SELF?path=1&u=$u");
	$xoopsTpl->assign('img_url',	"$PHP_SELF?path=2&u=$u");
	$xoopsTpl->assign('attach_url',	"$PHP_SELF?path=3&u=$u");
	// if the current directory is a sub directory show a back link to get back to the previous directory
	if($pathext){
		$filemanager .= <<<content
		<tr>
		<td class=even >&nbsp;<img src="arrowicon.gif">&nbsp;</td>
		<td class=even >&nbsp;<a href="$PHP_SELF?u=$u&back=1&pathext=$pathext">
			<font face="Verdana, Arial, Helvetica" size="2" color="#666666">&laquo;BACK</font></a>&nbsp;</td>
		<td class=even ></td>
		<td class=even ></td>
		<td class=even ></td>
		</tr>
content;
	}
	// build the table rows which contain the file information
	$newpath = substr($path.$pathext, 0, -1);   // remove the forward or backwards slash from the path
	$dir = @opendir($newpath); // open the directory
	$content = "";
	$uname=$xoopsUser->getVar('uname');
	$content = array();
	$i = 0;
	while($file = readdir($dir)){ // loop once for each name in the directory
		// if the name is not a directory and the name is not the name of this program file
		if($file != "." && $file != ".." && $file != "$ThisFileName"){
			$match = 0;
			foreach($HiddenFiles as $name){ // for each value in the hidden files array
				if($file == $name){ // check the name is not the same as the hidden file name
					$match = 1;	 // set a flag if this name is supposed to be hidden
				}
			}	
			if ( $path_no==3 ){
				if (eregi( $thumb_ext,$file)) $match = 1;
			}else{
				if (!eregi( $thumb_ext,$file)) $match = 1;
			}
			if (!$xoopsUser->isAdmin() && !ereg("^".$uname,$file)) $match = 1;
			if(!$match){ // if there were no matches the file should not be hidden
				//$filedata = stat($directory.$path.$pathext.$file); // get some info about the file
				$filedata = stat($path.$pathext.$file); // get some info about the file
				// find out if the file is one that can be edited
				$img_link = "";
				if(eregi( $thumb_ext,$file)){
					$filename = rawurlencode($file);
					if ( $path_no==1)
						$img_link = "<a href=\"".$path_url.$filename."\" target=\"_blank\">
						<img src=".$path_url."thumbs/".$filename."><a/>";
					else
						$img_link = "<img src=".$path_url.$filename.">";
				}
				
				// create some html for a link to delete files 
				$filename = rawurlencode($file);
				$deletelink = "<a href=\"$PHP_SELF?delete=$filename&u=$u&pathext=$pathext\">
				<img src='icon/delete.gif' width=16 height=16 alt='ºï½ü' border=0></a>";
				
				// if it is a directory change the file name to a directory link
				if(is_dir($path.$pathext.$file)){
					$filename = "<a href=\"$PHP_SELF?u=$u&pathext=$pathext$file/\">
						<font color=\"#666666\">$file</font></a>";
					$fileicon = "&nbsp;<img src=\"foldericon.gif\">&nbsp;";
					if(!$MakeDirOn){
						$deletelink = "";
					}
				}else{
					$filename = cnv_mbstr($file,"EUC-JP");
					$fileicon = "&nbsp;<img src=\"fileicon.gif\">&nbsp;";
				}
				// append 2 table rows to the $content variable, the first row has the file
				// informtation, the 2nd row makes a black line 1 pixel high
				$timestamp= strftime("%Y/%m/%d %H:%M", $filedata[10]);
				if ( $path_no==1)
					$file_link = $path_url."thumbs/".$filename;
				else
					$file_link = $path_url.$filename;

				$content[$i]['img_link']  = $img_link;
				$content[$i]['file_link']  = $file_link;
				$content[$i]['filename']  = $filename;
				$content[$i]['fileicon']  = $fileicon;
				$content[$i]['filesize']  = $filedata[7];
				$content[$i]['timestamp']  = $timestamp;
				$content[$i]['deletelink']  = $deletelink;
				$i++;
			}
		}
	}
	closedir($dir); // now that all the rows have been built close the directory
	$xoopsOption['template_main'] = 'bmfile_list.html';
	$xoopsTpl->assign('content', $content);
	$xoopsTpl->assign('version',$bmfile_version);
}else{
	redirect_header(XOOPS_URL.'/',1,_MD_REGTOUSE);
	exit();
}
function dirsize($dir){
// calculate the size of files in $dir
	$dh = opendir($dir);
	$size = 0;
	while (($file = readdir($dh)) !== false){
		if ($file != "." and $file != ".."){
			$path = $dir."/".$file;
			if (is_dir($path)){
				$size += dirsize("$path/");
			}elseif (is_file($path)){
				$size += filesize($path);
			}
		}
	}
	closedir($dh);
	return $size;
}
//
// Convert for Multi-byte Strings
//
function cnv_mbstr($str,$code=SAVE_AS_MBSTR) {
	if (extension_loaded('mbstring')){
		return  mb_convert_encoding($str,$code,"auto");
	} else {
		return $str;
	}
}
require(XOOPS_ROOT_PATH.'/footer.php');
