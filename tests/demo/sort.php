<?php
/**
 * Created by PhpStorm.
 * User: Windows
 * Date: 2016/11/15
 * Time: 13:16
 */

if(!function_exists('getfile')){
    function getfile($dir){
        $files = array();

        if($handles = opendir($dir)){
                while (($file=readdir($handles))!==false){
                    if($file != '..' && $file != '.'){
                        if(is_dir($dir."/".$file))
                        {
                            $files[$file]=my_scandir($dir."/".$file);
                        }
                        else{
                            $files[] = $file;
                        }
                    }
                }
        }
        closedir($handles);
        return $files;
    }
}