<?php
/**
 * Created by PhpStorm.
 * User: jdidinya
 * Date: 26/08/2018
 * Time: 23:15
 */

namespace App\Inspections;

use Exception;


class KeyHeldDown
{
    protected   $invalidKeywords = [
        'yahoo customer support'
    ];
    
    public function detect($body)
    {
        if(preg_match('/(.)\\1{4,}/', $body))
        {
            throw new \Exception('Your reply contains span');
        }
    }
    
}