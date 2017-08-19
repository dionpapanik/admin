<?php
/**
 * Author: Dionisis Papanikolaou
 * Date: 17/8/2017
 */

defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('get_image_url')) {
    function get_image_url($img_name = '')
    {
        $path = 'assets/images/' . $img_name;
        return base_url($path);
    }
}