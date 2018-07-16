<?php

namespace Faq;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $guarded = ['id'];
    
    public function category() {
        return $this->belongsTo('Faq\Category');        
    }
    
}
