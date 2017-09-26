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


if (!function_exists('get_active_menu')) {
    function get_active_menu($term)
    {
        $CI = get_instance();
        $controller = $CI->router->fetch_class();
        return ($controller == $term)
            ? true
            : false;
    }
}


/**
 * Debug helper function.  This is a wrapper for var_dump() that adds
 * the <pre /> tags, cleans up newlines and indents, and runs
 * htmlentities() before output.
 *
 * @param  mixed $var The variable to dump.
 * @param  string $label OPTIONAL Label to prepend to output.
 * @param  bool $echo OPTIONAL Echo output if true.
 * @return string
 */
if (!function_exists('dump')) {
    function dump($var, $label = null, $echo = true)
    {
        // format the label
        $label = ($label === null) ? '' : rtrim($label) . ' ';

        // var_dump the variable into a buffer and keep the output
        ob_start();
        var_dump($var);
        $output = ob_get_clean();

        // neaten the newlines and indents
        $output = preg_replace("/\]\=\>\n(\s+)/m", "] => ", $output);
        if (!extension_loaded('xdebug')) {
            $flags = ENT_QUOTES;
            // PHP 5.4.0+
            if (defined('ENT_SUBSTITUTE')) {
                $flags = ENT_QUOTES | ENT_SUBSTITUTE;
            }
            $output = htmlspecialchars($output, $flags);
        }

        $output = '<pre>'
            . $label
            . $output
            . '</pre>';


        if ($echo) {
            echo($output);
        }
        return $output;
    }
}
