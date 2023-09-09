<?php // Delete data

if(isset($_GET['id']) && !empty($_GET['id'])) {
    $dir    = './data';
    if(!is_dir($dir)) mkdir($dir, 0777, true);

    $file = $dir . '/' . $_GET['id'] . '.json';
    
    if(file_exists($file)) {
        // remove file
        unlink($file);
        echo "Data berhasil dihapus!";
    } else {
        echo "Data tidak ditemukan!";
    }

}