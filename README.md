# py

上传蓝奏云脚本  
`pip install lanzou-api`  
`python lzupload.py ylogin_cookie phpdisk_info_cookie dirname filename`  
---------------------------------------------------------------------------
# php:  
`include_once('lz.php');`  
`$ylogin = 'your ylogin cookie';`  
`$phpdisk_info = 'your phpdisk_info cookie';`  
`$folderid = LZ_Create_Folder('测试文件夹', $ylogin, $phpdisk_info, -1 , '这是测试文件夹注释');`  
`echo $url = LZ_Upload_File('1.rar', $folderid, $ylogin, $phpdisk_info);`  
