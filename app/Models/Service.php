<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $fillable = ['service_name','service_from','service_to'];


    //Service belongsToMany to Medican
    public function medican(){

        return $this->belongsToMany(Medican::class,'service_medicans','service_id','medican_id','id','id');
    }

}
