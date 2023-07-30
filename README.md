# py

上传蓝奏云脚本  
`pip install lanzou-api`  
`python lzupload.py ylogin_cookie phpdisk_info_cookie dirname filename`  
---------------------------------------------------------------------------
# php:  
`include_once('lz.php');`  
`$ylogin = '';`  
`$phpdisk_info = '';`  
`$cookie = MakeCookie($ylogin, $phpdisk_info);`  
`$folderid = LZ_Create_Folder('测试文件夹', $cookie, 文件夹创建位置根目录为-1其他请传入上一个$folderid参数, '这是测试文件夹注释');`  
`echo $url = LZ_Upload_File('上传文件名字', $folderid, $cookie);`  
