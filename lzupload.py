from lanzou.api import LanZouCloud
import sys
lanzou = LanZouCloud()
cookie = {'ylogin': sys.argv[1], 'phpdisk_info': sys.argv[2]}
if lanzou.login_by_cookie(cookie) != LanZouCloud.SUCCESS:
    print("{\"login\":\"failed\"}")
    exit(1)
    
fid = lanzou.mkdir(-1, sys.argv[3])
if fid == LanZouCloud.MKDIR_ERROR:
    print("{\"mkdir\":\"failed\"}")
    exit(1)
    
def handle(fid, is_file):
    if is_file:
        fileDetail = lanzou.get_share_info(fid, is_file)
        if fileDetail.code == LanZouCloud.SUCCESS:
            print("{\"upload\":\"success\",\"url\":\"%s\"}" % (fileDetail.url))
            exit(0)
        else:
            print("{\"upload\":\"failed\",\"code\":\"%s\"}" % (fileDetail.code))
            exit(0)

code = lanzou.upload_file(sys.argv[4], fid, callback = None,uploaded_handler = handle)
if code != 0:
    print("{\"upload\":\"failed\",\"code\":\"%i\"}" % (code))
    exit(0)
print("{\"upload\":\"unknow\",\"code\":\"%i\"}" % (code)) #should never happend