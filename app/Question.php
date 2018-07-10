<?php

namespace Faq;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    //
    protected $table="questions";
    protected $primaryKey = 'id';
    public $incrementing = TRUE;
    public $timestamps = TRUE;
    protected $guarded = ['id'];
    
    public function category() {
        return $this->belongsTo('Faq\Category');        
    }
    
}
