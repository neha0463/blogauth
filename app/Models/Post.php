<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [];
public function getTitleAttribute($value){
    return ucfirst($value);
}
public function getAuthorAttribute($value){
    return  "body " . $value;
   
}
public function setBodyAttribute($value){
$this->attributes['body'] = strtoupper($value);

}
}