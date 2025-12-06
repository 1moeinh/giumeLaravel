<?php

namespace App\Models;

use App\Models\Comment;
use App\Models\Contact;
use App\Models\Service;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Type extends Model
{
    use HasFactory;
    protected $fillable =['service_name','service_price'];

    public function service() {
        return $this->belongsToMany(Contact::class);
    }

    public function comment(){
        return $this->hasMany(Comment::class);
    }
}
