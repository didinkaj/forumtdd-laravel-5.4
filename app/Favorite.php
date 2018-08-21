<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    use RecordsActivity;
    //
    protected $guarded = [];
    
    public function favorited()
    {
        return $this->morphTo();
    }
    
    public function unfavorite()
    {
        $attributes = ['user_id' => auth()->id()];
        $this->favorites()->where($attributes)->delete();
    }
    
    public function getIsFavoritedAttribute()
    {
        return $this->isFavorited();
    }
    
}
