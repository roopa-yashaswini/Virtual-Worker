<?php
    function isempty($errors_array){
        $errors_present = array();
        for($i=0; $i<count($errors_array); $i++){
            if(!empty($errors_array[$i])){
                array_push($errors_present, $errors_array[$i]);
            }
        }
        return count($errors_present);
    }

    function emptyDir($dir) {
        if (is_dir($dir)) {
            $scn = scandir($dir);
            foreach ($scn as $files) {
                if ($files !== '.') {
                    if ($files !== '..') {
                        if (!is_dir($dir . '/' . $files)) {
                            unlink($dir . '/' . $files);
                        } else {
                            emptyDir($dir . '/' . $files);
                            rmdir($dir . '/' . $files);
                        }
                    }
                }
            }
        }
    }

    function generate_token(){
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
        return substr(str_shuffle($characters), 0, 8);
    }

?>