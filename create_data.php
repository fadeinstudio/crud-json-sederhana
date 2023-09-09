<?php // Create data!

function save_data_json($data, $id = 12345) {
    $dir    = './data';
    if(!is_dir($dir)) mkdir($dir, 0777, true);
    $file   = $dir . '/' . $id . '.json';
    
    // check file 
    if(file_exists($file)) {
        $id = (int)$id + 1;
        save_data_json($data, $id);
    } else {
        file_put_contents($file, $data);
        echo "Data berhasil disimpan!";
    }

}

if(isset($_POST) && !empty($_GET)) {
    // get data from $_POST
    $name       = (!empty($_POST['name']) ? $_POST['name'] : 'no name');
    $address    = (!empty($_POST['address']) ? $_POST['address'] : 'mars');

    // save data to file JSON
    $data_array = array(
        'name'      => $name,
        'address'   => $address
    );

    // convert to JSON
    $data_json  = json_encode($data_array);

    // save data JSON
    save_data_json($data_json);
    
}