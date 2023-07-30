function LZ_Create_Folder($folderName, $ylogin, $phpdisk_info ,$Parent_id = -1, $folder_description = 'def description creatby bklol')
{
    $cookie = "ylogin=$ylogin;phpdisk_info=$phpdisk_info";
    $url = 'https://pc.woozooo.com/doupload.php?parent_id='.$Parent_id;
    $postData = [
        'task' => '2',
        'folder_id' => $Parent_id,
        'folder_name' => $folderName,
        'folder_description'=> $folder_description
    ];
    $headers = [
        'Cookie: ' . $cookie,
    ];
    $options = [
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => http_build_query($postData),
        CURLOPT_HTTPHEADER => $headers,
    ];
    $ch = curl_init();
    curl_setopt_array($ch, $options);
    $response = json_decode(curl_exec($ch) , true);
    curl_close($ch);
    if($response['zt'] != 1)
        return -1;
    else
        return $response['text'];
}

function LZ_Upload_File($filePath, $folderId = -1, $ylogin, $phpdisk_info)
{
    $cookie = "ylogin=$ylogin;phpdisk_info=$phpdisk_info";
    $url = 'https://up.woozooo.com/html5up.php';
    $fileContent = file_get_contents($filePath);

    $boundary = '----WebKitFormBoundary' . uniqid();
    $headers = [
        'Content-Type: multipart/form-data; boundary=' . $boundary,
        'Cookie: ' . $cookie,
    ];

    $postData = [
        '--' . $boundary,
        'Content-Disposition: form-data; name="id"',
        '',
        'WU_FILE_1',
        '--' . $boundary,
        'Content-Disposition: form-data; name="vie"',
        '',
        '2',
        '--' . $boundary,
        'Content-Disposition: form-data; name="ve"',
        '',
        '2',
        '--' . $boundary,
        'Content-Disposition: form-data; name="size"',
        '',
        filesize($filePath),
        '--' . $boundary,
        'Content-Disposition: form-data; name="folder_id_bb_n"',
        '',
        $folderId,
        '--' . $boundary,
        'Content-Disposition: form-data; name="task"',
        '',
        '1',
        '--' . $boundary,
        'Content-Disposition: form-data; name="upload_file"; filename="' . basename($filePath) . '"',
        'Content-Type: application/octet-stream',
        '',
        $fileContent,
        '--' . $boundary . '--'
    ];

    $postBody = implode("\r\n", $postData);

    $options = [
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => $postBody,
        CURLOPT_HTTPHEADER => $headers,
    ];

    $ch = curl_init();
    curl_setopt_array($ch, $options);
    $response = json_decode(curl_exec($ch), true);
    curl_close($ch);
    if($response['zt'] != 1)
        return -1;
    else
        return $response['text'][0]['is_newd'].'/'.$response['text'][0]['f_id'];
}
