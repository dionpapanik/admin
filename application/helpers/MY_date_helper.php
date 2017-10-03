<?php
/**
 * Author: Dionisis Papanikolaou
 * Date: 17/8/2017
 */

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 *
 * @param string $timezone
 * @param string $output date|time|both
 * @return string
 */
function getCurrentDateTime($output = 'both', $timezone = 'Europe/Athens')
{
    $datetime = new DateTime('now', new DateTimeZone($timezone));
    switch ($output) {
        case 'both':
            $format = 'd-m-Y H:i';
            break;
        case 'date':
            $format = 'd-m-Y';
            break;
        case 'time':
            $format = 'H:i';
            break;
    }
    return $datetime->format($format);
}

