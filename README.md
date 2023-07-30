# lzupload
上传蓝奏云脚本  
`pip install lanzou-api`  
`py lzupload.py ylogin_cookie phpdisk_info_cookie dirname filename`  
---------------------------------------------------------------------------
# php 伪代码:  
`include_once('lz.php');`  
`folderid = LZ_Create_Folder(folderName, ylogin_cookie, phpdisk_info_cookie ,Parent_id)`  
`url = LZ_Upload_File(filename, folderid, ylogin_cookie, phpdisk_info_cookie);` //如果为-1 上传失败
