<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Places extends Model
{
    use HasFactory;

    protected $guarded=[];

    // отношения с Image <3
    public function image(){
        return $this->hasMany(Images::class, 'place_id', 'id')->orderBy('updated_at', 'desc');
    }

    // получение только поля name из БД
    public function scopePlaceIdAndNameOnly($query){
        return $query->select(['id', 'name']);
    }
}
