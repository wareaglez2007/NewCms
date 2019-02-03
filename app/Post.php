<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
/*
 * The Post model ORM (Obect Relation Mapping) For table posts
 */
class Post extends Model
{
    use SoftDeletes; //This will disable Model's all() !Warning
    //This will override the fillable in model class and allow for mass insertions in mentioned table
    protected $fillable = [
        'title',
        'content',
        'author'
    ];
    //For soft delete It adds a column to posts called deleted at
    protected $date = ['deleted_at'];

    public function user(){
        return $this->belongsTo('App\User');
    }
}
