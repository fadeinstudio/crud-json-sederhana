<?php // List data

$dir    = './data';
if(!is_dir($dir)) mkdir($dir, 0777, true);

$data['data'] = '';
foreach(glob($dir . '/*.json') as $file) {
    if(file_exists($file)) {
        $json = file_get_contents($file);
        $array = json_decode($json, true);
        $data['data'][] = $array;
    }
}

$output = json_encode($data);
echo $output;