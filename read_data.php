<?php // read data

if(isset($_GET['id']) && !empty($_GET['id'])) {
    $dir  = './data';
    if(!is_dir($dir)) mkdir($dir, 0777, true);

    $file = $dir . '/' . $_GET['id'] . '.json';

    if(file_exists($file)) {
        $json = file_get_contents($file);
        $data = json_decode($json);

        echo "Name: " . $data->name;
        echo "</br>";
        echo "Address: " . $data->address;
    } else {
        echo "Data tidak ditemukan!";
    }
}