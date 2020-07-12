/*******************************************************************************
Moudule Name : Bluemoon.MyFileManager (bmfile)
Copyright    : Bluemoon inc. 
Home Page    : www.bluemooninc.biz
Auther       : Y.Sakai
Licence      : GPL Version 2.
Origin       : QTO FileManeger (http: //www.qto.com/fm)
*******************************************************************************/
■バージョン情報

V0.00 2004/10/23 プロトタイプ完成
V0.01 2004/10/24 smarty対応
V0.02 2004/10/24 英語版完成

■概要

このモジュールは、

1:Newbb_fileup
2:News_fileup
3:Mydl_fileup
4:PopnupBlog
5:Bluemoon.Multi-Entry Form

上記５モジュール用の簡易ファイルマネージャです。プロトタイプですので、セキュリティや安全性・操作性
等において問題が発生する可能性があります。稼動中のサイトで使用する場合にはくれぐれも取り扱いにご注
意ください。ハック情報・パッチ提供は大歓迎です。

■機能
・サムネール・画像ファイル閲覧と削除（サムネールを削除すると元画像も一緒に削除）
・添付ファイルはファイル一覧表示と削除のみ
・登録ユーザーは自分のファイルの閲覧と削除が可能。
・管理者は全てのファイルの閲覧と削除が可能。
・その他特徴
QTO FileManager はフォルダ作成・移動やtxt,htmlファイルの編集・保存機能がありましたが、このbmfileは
画像ビュワーとアップロード済みファイルの整理に特化した作りとなっています。将来的にはファイル・アッ
プロードやファイル共有という可能性を持たせながら、当面は個人用の閲覧・整理と管理者のフォルダ管理に
的を絞って開発します。

■今後の予定
・時間やサイズで並べ替え
・管理者の場合にユーザー別のフィルタ処理を行う
・ページ切り替え
・オリジナル画像表示の時は、１ファイルずつ前・次ページ処理
　（サムネール一覧＋オリジナル１枚がベスト）・・・ちょっと難題

■インストール
ftpにてサーバにアップロード「xoops/modules/ここに入れて」
管理メニューより→モジュール管理→マイファイルのインストールアイコンをクリック

■設定（config.php）
define( 'SAVE_AS_MBSTR' , 'SJIS' );		// Mac,Unix はUTF-8
$path_img = "c:/apps/apache/htdocs/xoops/uploads/";   			// 画像フォルダを設定
$path_thumb = "c:/apps/apache/htdocs/xoops/uploads/thumbs/";	// サムネールフォルダを設定
$path_attach = "c:/apps/apache/htdocs/xoops/uploads/";   		// 添付ファイルフォルダを設定
$path_url = XOOPS_URL."/uploads/";								// 画像フォルダのＵＲＬを設定
ここから下の行は設定不要です。
$MaxFileSize = "1000000"; // max file size in bytes
$HDDSpace = "100000000"; // max total size of all files in directory
$HiddenFiles = array(".DAV",".htaccess","fileicon.gif","foldericon.gif","arrowicon.gif","COPYING","xoops_version.php","index.php" ); // add any file names to this array which should remain invisible
$EditOn = 0; // make this = 0 if you dont want the to use the edit function at all
$EditExtensions = array("htm","html","txt","php"); // add the extensions of file types that you would like to be able to edit
$MakeDirOn = 0; // make this = 0 if you dont want to be able to make directories
$thumb_ext = ".+\.jpe?g$|.+\.png$|.+\.gif$|.+\.bmp$";	// Thumb image target file extentions
$ThisFileName = ""; // get the file name

以上
