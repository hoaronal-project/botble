<?php
function findAndReplace(){
    $find_key = '';
    $replace_key = '';
    $file = public_path('a.html');
    $file_content = file_get_contents($file);
    dump($file_content);
}
