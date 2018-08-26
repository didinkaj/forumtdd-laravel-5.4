<?php

namespace App;

class Spam{
    
    public function detect($body)
    {
        $this->detectInvalidKeyWords($body);
        
        return false;
    
    }
    
    public function detectInvalidKeyWords($body)
    {
        $invalidKeywords = [
            'yahoo customer support'
        ];
        
        foreach ($invalidKeywords as $Keyword)
        {
            if(stripos($body, $Keyword) !== false)
            {
                throw new \Exception('Your reply contains span');
            }
        }
    }

}