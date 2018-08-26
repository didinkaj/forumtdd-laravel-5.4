<?php
/**
 * Created by PhpStorm.
 * User: jdidinya
 * Date: 26/08/2018
 * Time: 23:15
 */

namespace App\Inspections;

use Exception;


class InvalidKeywords
{
    protected   $invalidKeywords = [
        'yahoo customer support'
    ];
    
    public function detect($body)
    {
       
    
        foreach ($this->invalidKeywords as $Keyword)
        {
            if(stripos($body, $Keyword) !== false)
            {
                throw new \Exception('Your reply contains span');
            }
        }
    }
    
}