<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogComment extends Model
{
    protected $guarded=[];
    use HasFactory;

    public function users(){
        return $this->belongsTo(User::class , 'user_id' , 'id');
    }
}
