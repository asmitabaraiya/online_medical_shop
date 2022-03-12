<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $guarded=[];
    use HasFactory;

    public function userInfo(){
        return $this->belongsTo(User::class , 'user_id' , 'id');
    }
}
