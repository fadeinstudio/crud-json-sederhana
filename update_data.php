<?php // update data

if(!empty($_GET['id'])) {
    
    $dir  = './data';
    if(!is_dir($dir)) mkdir($dir, 0777, true);

    $file = $dir . '/' . $_GET['id'] . '.json';
    
    if(file_exists($file)) {
    
        $old_data_json  = file_get_contents($file);
        $old_data_array = json_decode($old_data_json, true);

        if(isset($_POST) && !empty($_POST)) {
    
            // get new data from $_POST
            $name       = (!empty($_POST['name']) ? $_POST['name'] : 'no name');
            $address    = (!empty($_POST['address']) ? $_POST['address'] : 'mars');
    
            // array new data
            $new_data_array = array(
                'name'      => $name,
                'address'   => $address
            );

            // replace data
            $data_array = array_replace($old_data_array, $new_data_array);

            // convert to JSON
            $data_json = json_encode($data_array);

            // save data
            file_put_contents($file, $data_json);

            echo "Data berhasil diubah!";
        }
    } else {
        echo "Data tidak ditemukan!";
    }
}
