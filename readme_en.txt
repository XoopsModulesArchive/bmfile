/*******************************************************************************
Moudule Name : Bluemoon.MyFileManager (bmfile)
Copyright    : Bluemoon inc. 
Home Page    : www.bluemooninc.biz
Auther       : Y.Sakai
Licence      : GPL Version 2.
Origin       : QTO FileManeger (http: //www.qto.com/fm)
*******************************************************************************/

/*********************
* Version Infomation *
*********************/
V0.00 2004/10/23 prototype completion
V0.01 2004/10/24 smarty correspondence 
V0.02 2004/10/24 English edition completion 

/****************
* Intoroduction *
****************/

This module is the simple file manager for the above-mentioned 5 modules.

1:Newbb_fileup
2:News_fileup
3:Mydl_fileup
4:PopnupBlog
5:Bluemoon.Multi-Entry Form

Handling with care, this is prototype. there is a possibility problem 
occurring in security and safety operativity etc. Hack information patch 
offer is large welcome. 
  
/*****************
* About Function *
*****************/
1.Thumbnail,Original picture viewer with delete button.
  You can delete thumbnail and original one time.
2.Attached file view with delete button.
  You can download or delete it.
3.Admin can control all users files and user can controll only users files.
4.In addition feature
  QTO FileManager had the function of make or move folder and edit txt,html
  file. But this bmfile has become picture viewer and uploaded file management.
  In the future, it will be a personal strage service module. I hope.

/******************
* Future schedule *
******************/
1.Change the sort of list for time or type.
2.Select and filter to the list of target user by admin mode.
3.Page control
4.One file one page as original picture view mode. 

/*****************
* How to install *
*****************/
1.Ectruct "bmfile" folder to "xoops/modules/".
2.Login as Admin. -> module management -> clicking the installation of 
Bluemoon.MyFileManager.

/****************
* How to setup  *
****************/
Edit "bmfile/config.php".

define('SAVE_AS_MBSTR','SJIS'); 								// Mac,UNIX are UTF-8
$path_img = "C:/apps/apache/htdocs/xoops/uploads/"; 			// Picture folder setting 
$path_thumb = "C:/apps/apache/htdocs/xoops/uploads/thumbs/"; 	// thumbsnail folder setting 
$path_attach = "C:/apps/apache/htdocs/xoops/uploads/";			// Attachment file folder setting 
$path_url = XOOPS_URL."/uploads/";								// URL of the picture folder
$MaxFileSize = "1000000"; // max file size in bytes
$HDDSpace = "100000000"; // max total size of all files in directory
$HiddenFiles = array(".DAV",".htaccess","fileicon.gif","foldericon.gif","arrowicon.gif","COPYING","xoops_version.php","index.php" ); // add any file names to this array which should remain invisible
$EditOn = 0; // make this = 0 if you dont want the to use the edit function at all
$EditExtensions = array("htm","html","txt","php"); // add the extensions of file types that you would like to be able to edit
$MakeDirOn = 0; // make this = 0 if you dont want to be able to make directories
$thumb_ext = ".+\.jpe?g$|.+\.png$|.+\.gif$|.+\.bmp$";	// Thumb image target file extentions
$ThisFileName = ""; // get the file name
