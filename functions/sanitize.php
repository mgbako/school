<?php
/**
 * Created by PhpStorm.
 * User: Mgbako
 * Date: 3/27/2015
 * Time: 2:08 PM
 */

function escape($string)
{
    return htmlentities($string, ENT_QUOTES, 'UTF-8');
}