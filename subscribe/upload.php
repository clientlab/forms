<?php
$data = array();
 

    $error = false;
    $files = array();
 
    $uploaddir = './uploads/'; // . - текущая папка где находится submit.php
 
    // Создадим папку если её нет
 
    if( ! is_dir( $uploaddir ) ) mkdir( $uploaddir, 0777 );
 
    // переместим файлы из временной директории в указанную
    foreach( $_FILES as $file ){
        if( move_uploaded_file( $file['tmp_name'], $uploaddir . basename($file['name']) ) ){
            $files[] = realpath( $uploaddir . $file['name'] );
        }
        else{
            $error = true;
        }
    }
 
    $data = $error ? array('error' => 'Ошибка загрузки файлов.') : array('files' => $files );
 
    echo json_encode( $data );

?>