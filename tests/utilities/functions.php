<?php

function create($class, $attributes = [], $times = null)
{

    return factory($class, $times)->create($attributes);

}

function make($class, $attribute = [], $times = null)
{

    return factory($class, $times)->make($attribute);

}