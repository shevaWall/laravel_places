<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Places extends Model
{
    use HasFactory;

    protected $guarded=[];

    public function image(){
        return $this->hasMany(Images::class, 'place_id', 'id')->orderBy('updated_at', 'desc');
    }
}
