<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostComment extends Model
{
    protected $table = 'postcomments';

    protected $fillable = [
        'post_id', 'user_id', 'comentario'
    ]; 
}
