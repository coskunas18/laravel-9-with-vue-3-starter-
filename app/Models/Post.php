<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = ['code','name','summary','status'];

    public function author(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function authors(){
        return $this->belongsToMany(User::class);
    }
}
