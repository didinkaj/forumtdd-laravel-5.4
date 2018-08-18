<?php
/**
 * Created by PhpStorm.
 * User: jdidinya
 * Date: 19/08/2018
 * Time: 01:47
 */

namespace App\Filters;


use Illuminate\Http\Request;

abstract class Filters
{
    protected $request, $builder;
    protected $filters = [];
    
    /**
     * ThreadFilter constructor
    */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }
    
    /**
     * @param $builder
     * @return mixed
     */
    public function apply($builder)
    {
        $this->builder = $builder;
        //apply filters to constructor
        
        foreach ($this->getFilters() as $filter => $value){
            if(method_exists($this, $filter)){
                $this->$filter($value);
            }
            
        }
        return $this->builder;
        
    }
    
    public function getFilters()
    {
        return $this->request->intersect($this->filters);
    }
    
}