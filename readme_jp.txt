/*******************************************************************************
Moudule Name : Bluemoon.MyFileManager (bmfile)
Copyright    : Bluemoon inc. 
Home Page    : www.bluemooninc.biz
Auther       : Y.Sakai
Licence      : GPL Version 2.
Origin       : QTO FileManeger (http: //www.qto.com/fm)
*******************************************************************************/
���С���������

V0.00 2004/10/23 �ץ�ȥ����״���
V0.01 2004/10/24 smarty�б�
V0.02 2004/10/24 �Ѹ��Ǵ���

������

���Υ⥸�塼��ϡ�

1:Newbb_fileup
2:News_fileup
3:Mydl_fileup
4:PopnupBlog
5:Bluemoon.Multi-Entry Form

�嵭���⥸�塼���Ѥδʰץե�����ޥ͡�����Ǥ����ץ�ȥ����פǤ��Τǡ��������ƥ���������������
���ˤ��������꤬ȯ�������ǽ��������ޤ�����ư��Υ����Ȥǻ��Ѥ�����ˤϤ��줰����갷���ˤ���
�դ����������ϥå����󡦥ѥå��󶡤��紿�ޤǤ���

����ǽ
������͡��롦�����ե���������Ⱥ���ʥ���͡����������ȸ���������˺����
��ź�եե�����ϥե��������ɽ���Ⱥ���Τ�
����Ͽ�桼�����ϼ�ʬ�Υե�����α����Ⱥ������ǽ��
�������Ԥ����ƤΥե�����α����Ⱥ������ǽ��
������¾��ħ
QTO FileManager �ϥե������������ư��txt,html�ե�������Խ�����¸��ǽ������ޤ�����������bmfile��
�����ӥ��ȥ��åץ��ɺѤߥե�������������ò��������ȤʤäƤ��ޤ�������Ū�ˤϥե����롦����
�ץ��ɤ�ե����붦ͭ�Ȥ�����ǽ����������ʤ��顢���̤ϸĿ��Ѥα����������ȴ����ԤΥե����������
Ū��ʤäƳ�ȯ���ޤ���

�������ͽ��
�����֤䥵�������¤��ؤ�
�������Ԥξ��˥桼�����̤Υե��륿������Ԥ�
���ڡ����ڤ��ؤ�
�����ꥸ�ʥ����ɽ���λ��ϡ����ե����뤺���������ڡ�������
���ʥ���͡�������ܥ��ꥸ�ʥ룱�礬�٥��ȡˡ���������ä�����

�����󥹥ȡ���
ftp�ˤƥ����Ф˥��åץ��ɡ�xoops/modules/����������ơ�
������˥塼��ꢪ�⥸�塼��������ޥ��ե�����Υ��󥹥ȡ��륢������򥯥�å�

�������config.php��
define( 'SAVE_AS_MBSTR' , 'SJIS' );		// Mac,Unix ��UTF-8
$path_img = "c:/apps/apache/htdocs/xoops/uploads/";   			// �����ե����������
$path_thumb = "c:/apps/apache/htdocs/xoops/uploads/thumbs/";	// ����͡���ե����������
$path_attach = "c:/apps/apache/htdocs/xoops/uploads/";   		// ź�եե�����ե����������
$path_url = XOOPS_URL."/uploads/";								// �����ե�����Σգң̤�����
�������鲼�ιԤ��������פǤ���
$MaxFileSize = "1000000"; // max file size in bytes
$HDDSpace = "100000000"; // max total size of all files in directory
$HiddenFiles = array(".DAV",".htaccess","fileicon.gif","foldericon.gif","arrowicon.gif","COPYING","xoops_version.php","index.php" ); // add any file names to this array which should remain invisible
$EditOn = 0; // make this = 0 if you dont want the to use the edit function at all
$EditExtensions = array("htm","html","txt","php"); // add the extensions of file types that you would like to be able to edit
$MakeDirOn = 0; // make this = 0 if you dont want to be able to make directories
$thumb_ext = ".+\.jpe?g$|.+\.png$|.+\.gif$|.+\.bmp$";	// Thumb image target file extentions
$ThisFileName = ""; // get the file name

�ʾ�
