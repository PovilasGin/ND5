<?php
    $uploaddir = __DIR__."\\uploads\\";
    $files = [];
    $files = normalize_files_array($_FILES);
    foreach($files['pictures'] as $file){
        $uploadfile = $uploaddir . basename($file['name']);
        if (move_uploaded_file($file['tmp_name'], $uploadfile)) {
            echo "File is valid, and was successfully uploaded.\n";
        } else {
            echo "Possible file upload attack!\n";
        }
    };
    function normalize_files_array($files = []) {
        $normalized_array = [];
        foreach($files as $index => $file) {
            if (!is_array($file['name'])) {
                $normalized_array[$index][] = $file;
                continue;
            }
            foreach($file['name'] as $idx => $name) {
                $normalized_array[$index][$idx] = [
                    'name' => $name,
                    'type' => $file['type'][$idx],
                    'tmp_name' => $file['tmp_name'][$idx],
                    'error' => $file['error'][$idx],
                    'size' => $file['size'][$idx]
                ];
            }
        };
        return $normalized_array;
    }
    

        $file = 'people.txt';
$data = "/n".'name'.date('m-d-Y_H:i:s');
if(!file_exists($file)){
    
    file_put_contents($file, $data);
} else {
   
    file_put_contents($file, $data, FILE_APPEND);
};

$data = array_map("str_getcsv", file("people.txt"));
echo '<pre>';
    print_r($data);
echo '<pre>';
    ?>