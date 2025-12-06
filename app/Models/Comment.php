<?php

namespace App\Models;

use App\Models\Type;
use App\Models\Contact;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class comment extends Model
{
    use HasFactory;
    protected $fillable =['submit','contacts_id','types_id','description'];

    public function contact(){
        return $this->belongsTo(Contact::class);
    }
    public function type(){
        return $this->belongsTo(Type::class);
    }
}
