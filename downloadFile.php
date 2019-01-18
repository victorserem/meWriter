<?php
$path_parts = pathinfo($_GET['fileName']);
$fileName  = $path_parts['basename'];
$filePath  = 'uploads/' . $fileName;

    if(file_exists($filePath)) {
        $filename = basename($filePath);
        $fileSize = filesize($filePath);

        // Output headers.
        header("Cache-Control: private");
        header("Content-Type: application/stream");
        header("Content-Length: ".$fileSize);
        header("Content-Disposition: attachment; filename=".$filename);

        // Output file.
        readfile ($filePath);                   
        exit();
    }
    else {
        die('The provided file path is not valid.');
    }
?>