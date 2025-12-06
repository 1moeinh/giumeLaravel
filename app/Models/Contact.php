<?php

namespace App\Models;

use App\Models\Type;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Contact extends Authenticatable
{
    use HasFactory;
    protected $fillable = ['name' , 'phone_number', 'password'];

    public function service() {
        return $this->belongsToMany(Type::class);
    }

    public function comment(){
        return $this->hasMany(Comment::class);
    }
}
