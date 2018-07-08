<?php

namespace Faq;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table="categories";
    protected $fillable=['name'];
    
    
    public function questions() {
        return $this->hasMany('Faq\Question');        
    }
}
