<?php
/**
 * Created by PhpStorm.
 * User: Mgbako
 * Date: 4/18/2015
 * Time: 6:19 AM
 */

class Image
{
    public static function exist($image)
    {
        return file_exists($_FILES[$image]['tmp_name']);
    }

    public static function getImage($image, $default = null)
    {
        return static::exist($image)
                ? base64_encode(file_get_contents(addslashes($_FILES[$image]['tmp_name'])))
                : $default ;
    }

    public static function name($image)
    {
        return addslashes($_FILES[$image]['name']);
    }

    public static function size($image)
    {
        //return getimagesize($_FILES[$image]['tmp_name']);          
        return ($_FILES[$image]['size']);
    }

    public static function type($image)
    {
        return addslashes($_FILES[$image]['type']);
    }
}